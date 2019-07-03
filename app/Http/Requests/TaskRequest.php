<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class TaskRequest extends FormRequest
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
            'inputTitle' => 'required|min:6|',
            'inputContent' => 'required|min:18',
            'inputDueDate' => 'required|Date|',
            'inputFile' => 'image',
        ];
    }
    public function messages(){
        $messages = [
            'inputTitle.required' => 'Title is blank',
            'inputTitle.min' => 'Title needs at least 6 minutes',
            'inputContent.required' => 'Content cannot be blank',
            'inputContent.min' => 'Content need at least 18 char',
            'DueDate.required' => "DueDate can't be blank",
            'DueDate.Date' => 'We need to a format day',
            'inputFile.image' => 'We need a image format here',
        ];
        return $messages;
    }
}
