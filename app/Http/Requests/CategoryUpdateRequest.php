<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'title'=>'required|unique:categories,title,'.$this->category->id,
            'description'=>'required',
            'title_tag'=>'required',
            'meta_keywords'=>'required',
            'meta_description'=>'required',
        ];
    }
}
