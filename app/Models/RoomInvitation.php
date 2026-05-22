<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomInvitation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by_id', 'id');
    }

    public function inviting()
    {
        return $this->belongsTo(User::class, 'inviting_id', 'id');
    }
}
