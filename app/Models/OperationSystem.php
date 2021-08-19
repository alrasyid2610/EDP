<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'os',
        'computer_id',
        'qty',
        'status',
        'shipping_document_id'
    ];
}
