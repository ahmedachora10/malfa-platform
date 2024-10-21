<?php

namespace Modules\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|array',
            'title.*' => 'required|string',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'image' => $this->isMethod('put') ? 'nullable|image' : 'required|image',
        ];
    }
}