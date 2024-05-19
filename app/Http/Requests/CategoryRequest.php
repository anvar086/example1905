<?php

namespace App\Http\Requests;

use App\Traits\FormRequestTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    use FormRequestTrait;
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
            'title' => 'required|min:3|max:30|',
            'min_description' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:300',
            'image' =>'required'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->errors(), 422));
    }
}
