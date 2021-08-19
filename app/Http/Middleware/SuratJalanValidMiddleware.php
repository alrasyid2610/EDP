<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ShippingDocument;

class SuratJalanValidMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->id_surat_jalan;
        $data = ShippingDocument::where('id',  $id)->first();
        // dd($data);
        // dd(var_dump($data));
        // dd(var_dump($id));
        
        if ( $data == null ) {
            // dd("nilai gak ada brow");
            return redirect('/goods_come/technical_documents/create');
        } else {
            // dd("ada brow");
            return $next($request);
        }
        // dd(count(SuratJalan::where('id_surat_jalan', $id_surat_jalan)->get()));
    }
}
