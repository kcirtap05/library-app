<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                    'title' => 'required|string|max:255',
                    'author' => 'required|string|max:255',
                    'library_id' => 'required|numeric',
                    'status' => 'required|string'
                ];
                break;
            CASE 'PUT':
                return [
                    'id' => 'sometimes|numeric',
                    'title' => 'required|string|max:255',
                    'author' => 'required|string|max:255',
                    'library_id' => 'required|numeric',
                    'status' => 'required|string'
                ];
                break;
        }
    }
}
