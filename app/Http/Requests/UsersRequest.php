<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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

            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required',
            'email' => 'unique:users',
            'photo_id' => 'required|dimensions:width=128,height=128'

        ];
    }

    public function attributes()
    {
        return [
            'role_id' => 'role', //This will replace any instance of 'username' in validation messages with 'email'
            //'anyinput' => 'Nice Name',
            'photo_id' => 'photo'
        ];
    }

    //AKO ZELIMO DA PRILAGODIMO PORUKU

    public function messages()
    {
        return [

            'dimensions' => 'Please find image which dimensions are 128 x 128'

        ];
    }
}
