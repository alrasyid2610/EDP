<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'monitor_brand',
        'edp_fixed_asset_number',
        'edp_fix_asset',
        'screen_plugs',
        // 'fa_monitor',
        'fix_asset_id',
        'monitor_date',
        'edp_monitor_number'
    ];

    public function fix_asset()
    {
        return $this->belongsTo(FixAsset::class, 'fix_asset_id');
    }
}
