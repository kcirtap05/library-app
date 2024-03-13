<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'location' => 'required|string|max:255'
                ];
                break;
            CASE 'PUT':
                return [
                    'id' => 'sometimes|numeric',
                    'name' => 'required|string|max:255',
                    'location' => 'required|string|max:255'
                ];
                break;
        }
    }
}
