<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'qty',
        'description',
        'shipping_document_id'
    ];
}
