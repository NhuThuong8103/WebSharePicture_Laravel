<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newPhotoValidate extends FormRequest
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
            'tieude_photo'      =>  'bail|required',
            'mota_photo'        =>  'bail|required',
            'chedo_photo'       =>  'bail|required',
        ];
    }
}
