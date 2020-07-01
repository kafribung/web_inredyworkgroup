<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:200', 'unique:inventories'],
            'img'   => ['required', 'mimes:png,jpg,jpeg'],
            'img'   => ['required', 'mimes:png,jpg,jpeg'],
            'owner' => ['required', 'string', 'min:3', 'max:150'],
            'owner' => ['required', 'string', 'min:3', 'max:150'],
            'total' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'category' => ['required', 'string'],
            'condition'=> ['required', 'string'],
            'description' => ['required'],
        ];
    }
}
