<?php

namespace App\Http\Controllers\Rooms;

use App\Classes\HashGenerator;
use App\Events\ReceiveInvitationsEvent;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomInvitation;
use App\Models\User;
use Exception;
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

    public function internal($room, $receiver)
    {
        try {
            event(new ReceiveInvitationsEvent($receiver, $room));
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return response()->json(['status' => true], 200);
    }

    public function accept_declince(Room $room, $status)
    {
        $accepted = $status == 'decline' ? false : true;

        RoomInvitation::create([
            'room_id' => $room->id,
            'invited_by_id' => $room->created_by,
            'inviting_id' => auth()->user()->id,
            'status' => true,
            'accepted' => $accepted,
        ]);
    }
}
