<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCOIA0 extends Model
{
    use HasFactory;

    protected $table = 'TCOIA0';
    protected $connection = 'sqlsrv';

    public $timestamps = false;
    protected $fillable = ['COFCode'];
}
