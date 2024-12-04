<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'section' => 'required|string',
            'year' => 'required|integer',
            'grades.*.english' => 'integer|min:0|max:100',
            'grades.*.math' => 'integer|min:0|max:100',
            'grades.*.science' => 'integer|min:0|max:100',
            'grades.*.history' => 'integer|min:0|max:100',
        ];
    }
}
