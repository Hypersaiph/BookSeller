<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:255',
            'email' => [
                'required',
                'min:10',
                'max:255',
                $id? Rule::unique('users', 'email')->ignore($id,'id') : 'unique:users,email',
            ],
            'phone' => 'required|alpha_dash|min:7|max:45',
            'address' => 'required|string|min:15|max:255',
            'roles' => 'required|array',
            'roles.*' => 'integer'
        ];
    }
}
