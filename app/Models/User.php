<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;





class User extends Authenticatable
{
    protected $table='users';
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [

        //Metto i campi che voglio che siano modificabili prendendoli dalla migration corrispondente
        'username',
        'password',
        'role',
        'firstname',
        'lastname',
        'residence',
        'birthdate',
        'job'
    ];



   /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function cars()
    {
            return $this -> belongsToMany(Car::class);
    }

}


