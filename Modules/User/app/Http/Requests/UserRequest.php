<?php

namespace Modules\User\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Modules\User\Enums\UserStatus;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $isPutRequest = $this->isMethod('put');
        return [
            'name' => 'required|string',
            'email' => ['required','email', $isPutRequest ? Rule::unique(User::class)->ignore($this->route('user')) : 'unique:users,email','max:255'],
            'password' => [$isPutRequest ? 'nullable' : 'required','string','confirmed'],
            'status' => ['required',Rule::enum(UserStatus::class)],
            'image' => $isPutRequest ? 'nullable' : 'required' . '|image'
        ];
    }
}
