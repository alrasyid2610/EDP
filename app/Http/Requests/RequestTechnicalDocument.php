<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTechnicalDocument extends FormRequest
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
            'no_document' => ['min:3', 'unique:technical_documents,no_document'],
            'user' => 'required|min:4',
            'departement' => 'required',
            'description' => 'required',
            'document_recipient' => 'required|min:4',
            // 'pelaksana' => 'required|min:4',
        ];
    }
}
