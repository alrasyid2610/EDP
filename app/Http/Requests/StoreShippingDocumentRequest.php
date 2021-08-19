<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingDocumentRequest extends FormRequest
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
            'id_bon_teknik' => ['required'],
            'dataGoods.goods.goods1.pc_name' => 'unique:computers,pc_name'
            // unique:shipping_documents,no_po
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            'dataGoods.goods.goods1.pc_name.unique' => 'The pc name has already been taken.',
        ];
    }
}
