<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanya extends Model
{
    use HasFactory;

    public $table = 'tanya';
    public $timestamps = false;

    protected $fillable = [
        'kategori',
        'username',
        'user_id',
        'pertanyaan'
    ];
}
