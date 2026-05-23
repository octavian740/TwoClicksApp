<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomInvitation;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Index extends Controller
{
    public function __invoke()
    {

        $availableInvitations = RoomInvitation::where('status', true)
            ->where('accepted', true)
            ->where('status', true)
            ->where('inviting_id', auth()->user()->id)
            ->pluck('room_id');

        $rooms = Room::where(function ($query) use ($availableInvitations) {
            $query->whereIn('id', $availableInvitations)
                ->orWhere('created_by', auth()->id());
        })
            ->with('createdBy')
            ->get();

        return Inertia::render('Rooms/Index', [
            'rooms' => $rooms
        ]);
    }
}
