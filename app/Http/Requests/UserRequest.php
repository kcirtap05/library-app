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
        switch ($this->method()) {
            CASE 'POST':
                return [
                    'name' => 'required|string|max:200',
                    'email' => 'required|string|max:200',
                    'password' => 'required|string',
                    'library_id' => 'required|numeric',
                ];
                break;
        }
    }
}
