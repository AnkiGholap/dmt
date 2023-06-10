<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseorderRequest extends FormRequest
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
            'product_sku_id'=>'required',
            'po_expected'=>'required',
            'open_po_quantity'=>'required',
            'next_inbound_quantity'=>'required',
            'next_inbound_date'=>'required'
        ];
    }
}
