<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonTeknik extends Model
{
    use HasFactory;
    protected $table = 'tbl_bon_teknik_barang';
    protected $fillable = ['no_bon', 'tgl_buat', 'user', 'dept', 'keterangan', 'tgl_buat', 'penerima_bon', 'pelaksana', 'tgl_terima_bon'];
}