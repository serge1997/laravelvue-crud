<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class employe extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = "employes";
    
    protected $fillable = [
        'name',
        'position',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
