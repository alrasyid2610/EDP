<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'current_user',
        'laptop_device_id',
        'no_laptop',
        'fix_asset_id',
        'batch',
        'departement',
        'division',
        'location',
        'code2',
        'status'
    ];


    function laptop_notes()
    {
        return $this->hasMany(LaptopNote::class, 'id_laptop');
    }
}
