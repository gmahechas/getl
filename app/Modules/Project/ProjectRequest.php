<?php

namespace App\Modules\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'project_name' => ['required', 'max:255'],
            'project_financing' => ['required'],
            'macroproject_id' => ['required']
        ];
    }
}
