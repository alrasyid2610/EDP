<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nik',
        'name',
        'email',
        'user_login',
        'password',
        'section',
        'position',
    ];
}
