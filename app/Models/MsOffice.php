<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'ms_office',
        'computer_id',
        'qty',
        'status',
        'shipping_document_id'
    ];
}
