<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SuratJalan;

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
        $id_surat_jalan = $request->id_surat_jalan;
        $data = SuratJalan::where('id_surat_jalan',  $id_surat_jalan)->first();
        
        if ( $data == null ) {
            dd("nilai gak ada brow");
        } else {
            dd("nah ini ada");
        }
        // dd(count(SuratJalan::where('id_surat_jalan', $id_surat_jalan)->get()));
        return $next($request);
    }
}
