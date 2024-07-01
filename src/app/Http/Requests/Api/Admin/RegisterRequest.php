<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'max:50'
            ],
            'username' => [
                'required',
                'unique:admin',
                'min:6',
                'max:12'
            ],
            'email' => [
                'required',
                'email',
                'unique:admin',
                'max:50'
            ],
            'password' => [
                'required',
                'min:8',
                'max:12',
            ],
        ];
    }

    /**
     * Get attribute validation error
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'full_name' => __('common.fields.full_name'),
            'username' => __('common.fields.username'),
            'email' => __('common.fields.email'),
            'password' => __('common.fields.password'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            '*.required' => __('validation.required'),
            '*.max' => __('validation.max.string'),
            '*.min' => __('validation.min.string'),
            '*.unique' => __('validation.unique'),
            '*.email' => __('validation.email'),
        ];
    }

    /**
     * The function return failed message validation api
     *
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(response()->json([
            'status' => ResponseStatus::HTTP_BAD_REQUEST,
            'message' => __('error.validation'),
            'data' => $validator->errors()
        ]));
    }
}
