<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
		'usuario' => 'required|string|unique:users',
		'email' => 'required|email|unique:users',
        'telefono' => 'required|string',
        'password' => 'required|min:8',
    ];

    protected $perPage = 20;

    //protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'usuario', 'password', 'email', 'telefono', 'rol', 'estado_cuenta', 'email_verified_at'
        //'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
