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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:25|min:5|string',
            'description' => 'required|min:5',
            'cover' => 'required|image|mimes:png,jpg', //size:2048,
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'title.min' => 'Please enter title more than 5 letters ',
            'title.max' => 'Please enter title less than 25 letters ',
            'title.string' => 'Please enter title only letters ',
            'description.required' => 'Please enter description',
            'description.min' => 'Please enter title more than 5 letters....... ',
            'cover.required' => 'Please enter cover',
            'cover.min' => 'cover type must be jpg or png',
            'images.required' => 'Please enter images',
            'images.*.mimes' => 'images type must be jpg or png',
        ];
    }
}
