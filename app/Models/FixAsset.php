<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'fixed_asset_number',
        'edp_fixed_asset_number',
        'fixed_asset_date',
        'item_type',
        'status',
        'location'
    ];

    static function getNewFa()
    {
        return (int)FixAsset::max('fixed_asset_number') + 1;
    }

    public function computer()
    {
        return $this->hasOne(Computer::class);
    }


    static function getLastIndexItem($item, $section)
    {
        return FixAsset::where('item_type', 'like', '%' . $item . '%')
            ->where('edp_fixed_asset_number', 'like', '%' . $section . '%')
            ->get();
    }
}
