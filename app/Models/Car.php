<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'seats',
        'price',
        'year',
        'start',
        'finish',
        // Aggiungi altri campi della tua tabella "cars" qui
    ];

    public function users()
    {
            return $this -> belongsToMany(User::class);
    }
}
