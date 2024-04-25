<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class LoginRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
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
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'password.required' => __('validation.required'),
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
