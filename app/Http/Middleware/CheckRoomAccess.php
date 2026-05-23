<?php

namespace App\Http\Middleware;

use App\Models\Room;
use App\Models\RoomInvitation;
use Closure;
use Illuminate\Http\Request;

class CheckRoomAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->user()->id;

        $room = $request->route('room');
        $roomId = is_object($room) ? $room->id : $room;

        if (!$roomId) {
            abort(404, 'Room not found.');
        }

        $isOwner = Room::where('id', $roomId)
            ->where('created_by', $userId)
            ->exists();

        if($isOwner) {
            return $next($request);
        }

        $isInvited = RoomInvitation::where('room_id', $roomId)
            ->with('room')
            ->whereHas('room', function($room) {
                $room->where('status', true);
            })
            ->where('inviting_id', $userId)
            ->where('status', true)
            ->where('accepted', true)
            ->exists();

        if($isInvited) {
            return $next($request);
        }

        abort(403, "You don't have access tot this room.");
    }
}
