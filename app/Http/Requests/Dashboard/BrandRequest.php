<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
        $rules =  [
            'name.*'=>['required','string','max:100',UniqueTranslationRule::for('brands')->ignore($this->id)],
            'status'=>['required','in:0,1'],
        ];

        if($this->method() == 'PUT'){
            $rules['logo'] = ['nullable','max:2048'];
        }else{
            $rules['logo'] = ['required','max:2048'];
        }


        return $rules;
    }
}
