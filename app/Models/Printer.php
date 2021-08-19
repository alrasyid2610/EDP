<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $fillable = [
        'printer_brand',
        'type',
        'port_connection',
        'fix_asset_id',
        'ip'
    ];
}
