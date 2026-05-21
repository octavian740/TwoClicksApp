<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Inertia\Inertia;

class Index extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Rooms/Index', [
            'rooms' => Room::with('createdBy')->get()
        ]);
    }
}
