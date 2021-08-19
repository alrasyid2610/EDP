<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_laptop',
        'no_laptop',
        'note_type',
        'sub_note_type',
        'description',
    ];
}
