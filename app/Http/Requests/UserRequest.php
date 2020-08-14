<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'img'       => ['required', 'mimes:png,jpg,jpeg'],
            'nir'       => ['required', 'string', 'min:10', 'max:15', 'unique:users'],
            'name'      => ['required', 'string', 'min:3', 'max:25'],
            'email'     => ['required', 'email', 'unique:users'],
            'date_birth' => ['required', 'date'],
            'address'   => ['required'],
            'hp'        => ['required', 'string'],
            'password'  => ['required', 'string', 'min:6'],
            'job'       => ['required', 'string', 'min:5', 'max:255'],
            'position_id'  => ['required', 'string'],
            'concentration_id' => ['required', 'string']
        ];
    }
}
