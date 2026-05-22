<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Inertia\Inertia;

class View extends Controller
{
    public function __invoke(Room $room)
    {
        $room->load('createdBy');

        return Inertia::render('Rooms/View', [
            'room' => $room
        ]);
    }
}
