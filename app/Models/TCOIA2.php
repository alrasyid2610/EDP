<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCOIA2 extends Model
{
    use HasFactory;

    protected $table = 'TCOIA2';
    protected $connection = 'sqlsrv';

    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
