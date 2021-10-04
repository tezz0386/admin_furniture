<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'icon',
        'logo',
        'address',
        'contact_no',
        'email',
        'location',
        'title_tag',
        'meta_keywords',
        'meta_description',
    ];

    public function rules()
    {
     $rules=[
        'name'=>'required|unique:site_settings',
        'description'=>'required',
        'icon'=>'required|mimes:jpg,jpeg,png',
        'logo'=>'required|mimes:jpeg,jpg,png',
        'address'=>'required',
        'contact_no'=>'required|unique:site_settings|max:14|min:9',
        'email'=>'required|unique:site_settings|email',
        'location'=>'required|url',
        'title_tag'=>'required',
        'meta_keywords'=>'required',
        'meta_description'=>'required',
    ];
    return $rules;
    }
    public function message()
    {
     $message = [
        'name.required'=>'The name field must be filled',
        'name.unique'=>'The name field must be unique, this name has already taken',
        'description.required'=>'The description must be filled',
        'icon.required'=>'The icon of you web site must be choosen',
        'icon.mimes'=>'The icon of you web site must be  type of jpg, jpeg or png',
        'logo.required'=>'The logo of you web site  must be choosen',
        'logo.mimes'=>'The logo of your site must be type of jpg, jpeg or png',
        'address.required'=>'Your address must be filled',
        'contact_no.required'=>'The Contact No must be provided',
        'contact_no.min'=>'The Contact no must be more then 9 and less then 14',
        'contact_no.max'=>'The Contact no must be more then 9 and less then 14',
        'email.required'=>'The email must be filled',
        'email.email'=>'Invalid Email',
        'location.required'=>'The location must be filled',
        'location.url'=>'The location field must be URL of your location map',
        'title_tag.required'=>'The Title Tag must be Filled',
        'meta_keywords.required'=>'The Meta Keywords must be filled',
        'meta_description.required'=>'The Meta Description must be filled',
    ];
    return $message;
    }
}
