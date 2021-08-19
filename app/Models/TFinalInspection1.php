<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection1 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection1';
    protected $connection = 'sqlsrv';

    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
