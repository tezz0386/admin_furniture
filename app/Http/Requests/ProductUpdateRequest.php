<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            //
            'title'=>'required|unique:products,title,'.$this->product->id,
            'category'=>'required',
            'qty'=>'required',
            'price'=>'required',
            'color'=>'required',
            'size'=>'required',
            'description'=>'required',
            'title_tag'=>'required|unique:products,title_tag,'.$this->product->id,
            'meta_keywords'=>'required',
            'meta_description'=>'required',
        ];
    }
}
