<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pc_name',
        'computer_operation',
        'pc_brand',
        'processor',
        'operating_system',
        'ram',
        'hdd',
        'ip',
        'internet',
        'nsi',
        'boss',
        'ms_office',
        'antivirus',
        'ups',
        'wsus',
        'click_one',
        'ax',
        'schedule_ppc',
        'location',
        'fa_computer',
        'fix_asset_id',
        'computer_description',
        'computer_date',
        'com_edp_number'
    ];

    static function store()
    {
    }

    // untuk kondisi 1
    static function store2($data)
    {
        // $this->create();
    }

    static function getNewFa()
    {
        return (int)Computer::max('fa_computer') + 1;
    }


    public function fix_asset()
    {
        return $this->belongsTo(FixAsset::class);
    }

    // static function insertFaComputer()
    // {
    // }
}
