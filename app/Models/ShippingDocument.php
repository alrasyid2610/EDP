<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDocument extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'id',
        'no_po',
        'reciver',
        'recived_date',
        'supplier',
        'destination'
    ];

    // protected $table = 'shipping_documents';
}
