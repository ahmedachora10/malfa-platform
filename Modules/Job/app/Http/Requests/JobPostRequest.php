<?php

namespace Modules\Job\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'title' => 'required|array',
            'title.*' => 'required|string',
        ];
    }
}