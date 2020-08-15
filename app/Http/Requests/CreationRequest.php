<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreationRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:200', 'unique:creations'],
            'video' => ['required', 'active_url'],
            'team'  => ['required', 'string', 'min:3', 'max:200'],
            'concentration_id' => ['required', 'integer'],
            'description'      => ['required', 'min:5'],
        ];
    }
}
