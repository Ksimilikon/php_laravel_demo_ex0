<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money_flow extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "money_flows";

    public function Booking() : BelongsTo{
        return $this->belongsTo(Booking::class);
    }
    public function User() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
