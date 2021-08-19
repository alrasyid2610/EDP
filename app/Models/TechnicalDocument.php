<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalDocument extends Model
{
    use HasFactory;
    // protected $table = 'tbl_bon_teknik_barang';
    protected $fillable = [
        'id',
        'shipping_document_id',
        'no_document',
        'user',
        'departement',
        'create_date',
        'create_date',
        'description',
        'document_recipient',
        'executor',
        'status',
        'recived_date',
    ];


    // public function shippingDocument()
    // {
    //     return $this->belongsTo(ShippingDocument::class);
    // }

    static function getDataShipping()
    {
        return ShippingDocument::leftJoin('technical_documents', 'shipping_documents.id', '=', 'technical_documents.shipping_document_id')->select('shipping_documents.*', 'technical_documents.shipping_document_id')->get();
    }
}
