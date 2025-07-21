<?php

namespace App\Http\Requests;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $category_id = $this->route('category');
        return [
            'name.ar' => ['required', 'string', 'min:4', UniqueTranslationRule::for('categories', 'name')->ignore($category_id)],
            'name.en' => ['required', 'string', 'min:4', UniqueTranslationRule::for('categories', 'name')->ignore($category_id)],
            'slug' => [Rule::unique('categories', 'slug')->ignore($category_id)],
            'parent' => ['sometimes', 'exists:categories,id'],
            'status' => ['nullable', 'in:0,1,on,off'],
            'image' => ['nullable', 'file', 'mimes:png,jpg,jpeg,gif,svg,webp']
        ];
    }
}
