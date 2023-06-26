<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'Users';
    public $timestamps = false;
    protected $fillable =
        [
            'firstname',
            'lastname',
            'email',
            'password'
        ];

    use HasFactory;
}
