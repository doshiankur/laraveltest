<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
    public function rules()
    {
        return [
            'username' => 'required|max:255',
            'useremail' => 'required|email|unique:userdetails,strUserEmail',
            'join_date' => 'required|date',
            'avatar'=>'required|max:10000|mimes:jpg,jpeg,png'
        ];
    }
}
