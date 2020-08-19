<?php

namespace App\Modules\InvoiceStatus;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStatusRequest extends FormRequest
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
            'invoice_status_date' => ['required'],
            'invoice_status_responsable' => ['required'],
            'invoice_id_ref' => ['required'],
            'status_id' => ['required'],
        ];
    }
}
