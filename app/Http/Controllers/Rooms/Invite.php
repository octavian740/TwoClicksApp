<?php

namespace App\Http\Controllers\Rooms;

use App\Classes\HashGenerator;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Inertia\Inertia;

class Invite extends Controller
{
    public function index($invited_by, $room)
    {
        $hashids = new HashGenerator();

        $invited_by = User::find($hashids->decode($invited_by))->first();
        $room = Room::find($hashids->decode($room))->load('createdBy')->first();

        return Inertia::render('Rooms/Invitation/Index', [
            'invited_by' => $invited_by,
            'room' => $room
        ]);
    }
}