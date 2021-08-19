<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    use HasFactory;

    protected $fillable = [
        'projector_brand',
        'type',
        'shipping_documents_id',
        'fix_asset_id'
    ];
}
