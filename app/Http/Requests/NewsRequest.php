<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NewsRequest extends FormRequest
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
        $todays_date = new \DateTime();
        $delivery_cate = new \DateTime($request->get('delivery_date'));
        $date = $todays_date->format('d-m-Y');
        if($delivery_cate->format('d-m-Y') < $todays_date->format('d-m-Y')){
            $date_rule = 'after_or_equal:today';
        }else{
            $date_rule = $date_rule = $date == $request->get('delivery_date')?'after_or_equal:today':'after_or_equal:tomorrow';
        }
        return [
            'title' => 'required|string|min:10|max:255',
            'message' => 'required|string|min:10|max:255',
        ];
    }
}
