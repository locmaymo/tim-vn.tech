<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobEditFormRequest extends FormRequest
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
//    hàm này để kiểm tra các trường trong form
    public function rules(): array
    {
        return [
            'feature_image' => 'mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'job_type' => 'required',
            'date' => 'required',
            'roles' => 'required',
        ];
    }
}
