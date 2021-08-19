<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class IncomingGood extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_document_id',
        'fix_asset_id',
        'type_item'
    ];

    static function getData($id_goods)
    {

        $data = collect();
        $type_item = $id_goods->type_item;
        $shipping_document_id = $id_goods->shipping_document_id;
        $fix_asset_id = $id_goods->fix_asset_id;
        $jumlah_barang = IncomingGood::select()->where('shipping_document_id', '=', $shipping_document_id)->get();
        // dd($jumlah_barang);
        $s_data = DB::table('shipping_documents')->select()->where('id', '=', $shipping_document_id)->get();
        $t_data = DB::table('technical_documents')->select()->where('shipping_document_id', '=', $shipping_document_id)->get();
        $data->push($s_data[0], $t_data[0]);

        foreach ($jumlah_barang as $key => $value) {
            // COMPUTER
            if ($value->type_item == 'computer') {

                if (!isset($data->computer)) {
                    $data->computer = [];
                }
                $c_data = collect(); // untuk data computer
                $os_data = collect(); // untuk data os
                $ms_office = collect(); // untuk data office
                $fa_id = $value->fix_asset_id;
                // Get Computer
                $result = DB::table('computers')->select()->where('fix_asset_id', '=', $fa_id)->get()[0];
                $fa = DB::table('fix_assets')->select()->where('id', '=', $result->fix_asset_id)->get()[0];
                $result->fix_asset = $fa;

                $data->computer[] = $result;
            }

            // MONITOR
            if ($value->type_item == 'monitor') {
                if (!isset($data->monitor)) {
                    $data->monitor = [];
                }
                $fa_id = $value->fix_asset_id;
                $result = DB::table('monitors')->select()->where('fix_asset_id', '=', $fa_id)->get()[0];
                $fa = DB::table('fix_assets')->select()->where('id', '=', $result->fix_asset_id)->get()[0];
                $result->fix_asset = $fa;
                $data->monitor[] = $result;
            }

            // PRINTER
            if ($value->type_item == 'printer') {
                if (!isset($data->printer)) {
                    $data->printer = [];
                }
                $fa_id = $value->fix_asset_id;
                $result = DB::table('printerS')->select()->where('fix_asset_id', '=', $fa_id)->get();
                $result = $result[0];
                $fa = DB::table('fix_assets')->select()->where('id', '=', $result->fix_asset_id)->get()[0];
                $result->fix_asset = $fa;
                $data->printer[] = $result;
            }

            // PROJECTOR
            if ($value->type_item == 'projector') {
                if (!isset($data->projector)) {
                    $data->projector = [];
                }
                $fa_id = $value->fix_asset_id;
                $result = DB::table('projectors')->select()->where('fix_asset_id', '=', $fa_id)->get();
                $result = $result[0];
                $fa = DB::table('fix_assets')->select()->where('id', '=', $result->fix_asset_id)->get()[0];
                $result->fix_asset = $fa;
                $data->projector[] = $result;
                // dd($data[1][0]->supplier);

            }

            // PROJECTOR
            if ($value->type_item == 'scanner') {
                if (!isset($data->scanner)) {
                    $data->scanner = [];
                }
                $fa_id = $value->fix_asset_id;
                $result = DB::table('scanners')->select()->where('fix_asset_id', '=', $fa_id)->get();
                $result = $result[0];
                $fa = DB::table('fix_assets')->select()->where('id', '=', $result->fix_asset_id)->get()[0];
                $result->fix_asset = $fa;
                $data->scanner[] = $result;
            }
        }

        if (DB::table('operation_systems')->select()->where('shipping_document_id', '=', $shipping_document_id)->count() > 0) {
            $data->os = DB::table('operation_systems')->select()->where('shipping_document_id', '=', $shipping_document_id)->get()[0];
        }
        if (DB::table('ms_offices')->select()->where('shipping_document_id', '=', $shipping_document_id)->count() > 0) {
            $data->ms_office = DB::table('ms_offices')->select()->where('shipping_document_id', '=', $shipping_document_id)->get()[0];
        }


        // OTHER DEVICES
        $other_devices = DB::table('other_devices')->select()->where('shipping_document_id', '=', $shipping_document_id);
        if ($other_devices->count() > 0) {
            foreach ($other_devices->get() as $key => $value) {
                if (!isset($data->other_devices)) {
                    $data->other_devices = [];
                }

                $data->other_devices[] = $value;
            }
        }



        // dd($t_data);


        return $data;
    }

    static function removeGoodCome($id)
    {
        $incoming_good = IncomingGood::find($id);

        $shipping_document = ShippingDocument::find($incoming_good->shipping_document_id);
        $data_fa_and_id = IncomingGood::select('fix_asset_id', 'id', 'shipping_document_id')->where('shipping_document_id', '=', $incoming_good->shipping_document_id)->get();
        $technical_document = TechnicalDocument::where('shipping_document_id', '=', $shipping_document->id);
        // dd($data_fa_and_id);
        // $data_fa = $fix_asset->toArray();

        $data_fa = collect([]);

        if ($incoming_good->type_item == 'computer') {
            // $data = Computer::where('fix_asset_id', '=', $fix_asset->id)->delete();
            foreach ($data_fa_and_id as $key => $value) {
                // IncomingGood
                $id = $value->id;
                $fa_id = $value->fix_asset_id;
                $shipping_document_id = $value->shipping_document_id;
                IncomingGood::where('id', '=', $id)->delete();
                Computer::where('fix_asset_id', '=', $fa_id)->delete();
            }

            foreach ($data_fa_and_id as $key => $value) {
                $fa_id = $value->fix_asset_id;
                FixAsset::find($fa_id)->delete();
            }

            ShippingDocument::find($shipping_document_id)->delete();
        } else if ($incoming_good->type_item == 'scanner') {
            // $data = Scanner::where('fix_asset_id', '=', $fix_asset->id)->delete();
        } else if ($incoming_good->type_item == 'monitor') {
            foreach ($data_fa_and_id as $key => $value) {
                // IncomingGood
                $id = $value->id;
                $fa_id = $value->fix_asset_id;
                $shipping_document_id = $value->shipping_document_id;
                IncomingGood::where('id', '=', $id)->delete();
                Monitor::where('fix_asset_id', '=', $fa_id)->delete();
            }

            foreach ($data_fa_and_id as $key => $value) {
                $fa_id = $value->fix_asset_id;
                FixAsset::find($fa_id)->delete();
            }

            ShippingDocument::find($shipping_document_id)->delete();


            // $data_fa = $fix_asset[0];
            // for ($i = 0; $i < count($data_fa); $i++) {
            //     // Monitor::where('fix_asset_id', '=', $data_fa2->id)->delete();
            // }
            // return dd($fix_asset[0]->fix_asset_id);
        } else if ($incoming_good->type_item == 'printer') {
            // $data = Printer::where('fix_asset_id', '=', $fix_asset->id)->delete();
        }

        $technical_document->delete();



        return 'Data Berhasil di Delete';
    }
}
