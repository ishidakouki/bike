<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' =>'string|required|max:30',
            'year' =>'string|required|max:30',
            'price' =>'string|required|max:10',
            'attachment1' =>'array|image|file',
            'attachment2' =>'array|image|file',
            'attachment3' =>'array|image|file',
            'attachment4' =>'array|image|file',
            'attachment5' =>'array|image|file',
            'explanation' => 'string|required|max:500',
        ];
    }
}
