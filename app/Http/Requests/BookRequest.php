<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:10',
                'max:255',
                $id? Rule::unique('books', 'title')->ignore($id,'id') : 'unique:books,title',
            ],
            //'title' => 'required|string|min:10|max:255',
            'edition' => 'required|integer|min:1|max:100',
            'language' => 'required|integer',
            'genres' => 'array',
            'genres.*' => 'integer',
            'authors' => 'required|array|between:1,10',
            'description' => 'required',
            'publication_date' => 'required|date',
            'cover_image' => $id? $request->cover_image == null? '' : 'image|mimes:jpeg,jpg,png' : 'image|mimes:jpeg,jpg,png',
        ];
    }
}
