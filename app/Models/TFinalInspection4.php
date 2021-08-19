<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection4 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection4';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
