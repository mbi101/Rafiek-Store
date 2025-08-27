<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = $this->route('user');
        $isRequired = request()->isMethod('PUT') ? 'nullable' : 'required';
        return [
            'name' => [$isRequired, 'max:150', 'min:4'],
            'email' => [$isRequired, 'email', Rule::unique('users', 'email')->ignore($user_id)],
            'phone' => [$isRequired, 'numeric', Rule::unique('users', 'phone')->ignore($user_id)],
            'password' => [$isRequired, 'string', Password::default()],
            'image' => ['nullable', 'file', 'mimes:png,jpg,svg,webp,jpeg'],
            'city_id' => ['sometimes', 'exists:cites,id'],
            'status' => ['nullable', 'in:0,1,on,off'],
            'active' => ["nullable", 'in:0,1,on,off']
        ];
    }
}
