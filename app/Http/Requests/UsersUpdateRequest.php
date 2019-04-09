<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersUpdateRequest extends Request
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
            'photo_id' => 'dimensions:width=128,height=128'

        ];
    }

    public function messages()
    {
        return [

            'dimensions' => 'Please find image which dimensions are 128 x 128'

        ];
    }
}
