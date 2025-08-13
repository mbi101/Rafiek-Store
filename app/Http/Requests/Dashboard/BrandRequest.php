<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $brand_id = $this->route('brand');
        $status = $this->isMethod('PUT') ? 'nullable' : 'required';
        $rules = [
            'name.*' => ['required', 'string', 'min:3', 'max:100', UniqueTranslationRule::for('brands', 'name')->ignore($brand_id)],
            'image' => "$status|file|mimes:png,jpg,jpeg,webp,svg",
            'status' => "nullable|in:on,off,0,1"
        ];

        return $rules;
    }
}
