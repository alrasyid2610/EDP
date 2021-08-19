<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'scanner_brand',
        'port_connection',
        'fix_asset_id',
        'type_scanner'
    ];
}
