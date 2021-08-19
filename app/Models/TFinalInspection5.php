<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection5 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection5';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
