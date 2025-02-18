<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\AuthManager;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "bookings";
    protected $fillable = [
        "date_time_in",
        "date_time_out",
        
    ];
    
    public function User():HasOne{
        return $this->hasOne(User::class);
    }
    public function Room() : HasOne{
        return $this->hasOne(Room::class);
    }
    public function Money_flows() : HasMany {
        return $this->hasMany(Money_flow::class);
    }
}
