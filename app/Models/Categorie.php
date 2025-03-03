<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categorie extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name',
        
    ];
    protected $visible = [
        'id',
        'name'
    ];

    public function Room():BelongsTo{
        return $this->belongsTo(Room::class);
    }
}
