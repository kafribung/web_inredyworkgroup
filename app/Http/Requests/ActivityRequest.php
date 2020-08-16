<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'title'      => ['required', 'string', 'min:3', 'max:200'],
            'location'   => ['required', 'string', 'min:5', 'max:200'],
            'date'       => ['required', 'date'],
            'status'     => ['required', 'string'],
            'description' => ['required', 'min:5'],
        ];
    }
}
