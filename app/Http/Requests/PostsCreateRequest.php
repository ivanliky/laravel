<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsCreateRequest extends Request
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

            'title' => 'required',
            'category_id' => 'required',
            'photo_id' => 'required',
            'body' => 'required'

        ];
    }

    public function attributes()
    {
        return [
            'photo_id' => 'photo', //This will replace any instance of 'username' in validation messages with 'email'
            //'anyinput' => 'Nice Name',
            'body' => 'description',
            'category_id' => 'category'

        ];
    }
}
