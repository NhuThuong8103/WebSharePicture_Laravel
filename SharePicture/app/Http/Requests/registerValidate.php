<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerValidate extends FormRequest
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
            'emailre'       =>'bail|required|email',
            'firstname'     =>'bail|required|max:25',
            'lastname'      =>'bail|required|max:25',
            'passwordre'        =>'bail|required|min:6|max:64',
            'passconfirm'   =>'bail|required|min:6|max:64'
        ];
    }
}
