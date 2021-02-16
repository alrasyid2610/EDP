<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBonTeknik extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_bon' => ['required', 'min:3', 'unique:tbl_surat_jalan_barang,no_po'],
            'user' => 'required|min:4',
            'dept' => 'required',
            'keterangan' => 'required',
            'penerima_bon' => 'required|min:4',
            'pelaksana' => 'required|min:4',
        ];
    }
}
