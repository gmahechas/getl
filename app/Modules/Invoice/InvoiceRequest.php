<?php

namespace App\Modules\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'id_ref' => ['required'],
            'invoice_number' => ['required'],
            'invoice_responsable' => ['required'],
            'invoice_total' => ['required'],
            'contract_id' => ['required']
        ];
    }
}
