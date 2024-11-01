<?php

namespace Modules\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'subject' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string|min:3',
        ];
    }
}