<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection3 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection3';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
