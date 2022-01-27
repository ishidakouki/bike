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
            'attachments' =>'required',
            'attachments.*.photo' =>'file|image|mimes:jpg,bmp,png,jpeg',
            'explanation' => 'string|required|max:500',
        ];
    }
}
