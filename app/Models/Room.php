<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "rooms";
    protected $fillable = [
        "number", 
        "cost",
        'floor',
        'categorie_id',
    ];

    public function Categorie() : HasOne {
        return $this->hasOne(Categorie::class);
    }
    public function Statuses() : HasMany{
        return $this->hasMany(Rooms_status_line::class);
    }

    public function Booking() : BelongsTo {
        return $this->belongsTo(Booking::class);
    }

}
