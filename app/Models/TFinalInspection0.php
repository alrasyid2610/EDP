<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFinalInspection0 extends Model
{
    use HasFactory;

    protected $table = 'TFinalInspection0';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $fillable = ['COFCode'];

    protected $hidden = ['RowId'];
}
