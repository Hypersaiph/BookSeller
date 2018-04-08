<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BookImageRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $id = substr($request->requestUri, strrpos($request->requestUri, '/') + 1);
        return [
            'big_text' => 'required|string|min:0|max:50',
            'small_text' => 'required|string|min:0|max:155',
            'image_type' => 'required|integer',
            'banner_image' => $id? $request->cover_image == null? '' : 'image|mimes:jpeg,jpg,png' : 'image|mimes:jpeg,jpg,png',
            'book_id' => 'required|integer',
        ];
    }
}
