<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopDevice extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'series',
        'type',
        'processor',
        'os',
        'ram',
        'storage',
        'type_storage',
        'label_laptop'
    ];
}
