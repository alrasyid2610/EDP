<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDocument extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'id',
        'no_po',
        'item',
        'qty',
        'reciver',
        'recived_shipping_date',
        'supplier',
        'destination',
        'status'
    ];

    // protected $table = 'shipping_documents';

    // public function technicalDocument() {
    //     return $this->hasOne(TechnicalDocument::class);
    // }

    static function getDataTechDoc()
    {
        return TechnicalDocument::where('shipping_document_id', '=', null)->get();
        // return TechnicalDocument::all();
    }
}
