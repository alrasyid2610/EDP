<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection2 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection2';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
