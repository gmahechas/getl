<?php

namespace App\Modules\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'chapter_name' => ['required', 'max:255'],
            'chapter_budgeted' => ['required'],
            'project_id' => ['required']
        ];
    }
}
