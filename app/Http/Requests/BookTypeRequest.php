<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookTypeRequest extends FormRequest
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
        $type_id = $request->get('type_id');
        return [
            'book_id' => 'required|integer',
            'type_id' => $id? 'required|integer' : Rule::unique('book_types')->where(function ($query) {$book_id = \Request::get('book_id');return $query->where('book_id', $book_id)->whereNull('deleted_at');}),
            'pages' => $type_id == 3? '' : 'required|integer',
            'price' => 'required|numeric|min:10|max:10000',
            'duration' => $type_id == 3? 'required|string|min:4|max:5' : '',
            'isbn10' => $type_id == 3? '' : 'required|string|min:3|max:60',
            'isbn13' => $type_id == 3? '' : 'max:60',
            'serial_cd' => $type_id == 3? 'required|string|min:3|max:60' : '',

            'width' => $type_id == 3? '' : 'required|string|min:1|max:5',
            'height' => $type_id == 3? '' : 'required|string|min:1|max:5',
            'depth' => $type_id == 3? '' : 'required|string|min:1|max:5',
            'weight' => $type_id == 3? '' : 'required|string|min:1|max:5',

            'publishers' => 'required|array|between:1,10',
        ];
    }
}
