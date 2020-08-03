<?php

namespace App\Modules\Contract;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'contract_provider' => ['required', 'max:255'],
            'contract_budgeted' => ['required'],
            'activity_id' => ['required']
        ];
    }
}
