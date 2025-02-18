<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms_status_line extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "rooms_status_lines";

    public function Room() : BelongsTo {
        return $this->belongsTo(Room::class);
    }
}
