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
                'unique:admins',
                'min:6',
                'max:12'
            ],
            'email' => [
                'required',
                'email',
                'unique:admins',
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
            'full_name.required' => __('validation.required'),
            'full_name.max' => __('validation.max.string'),
            'username.required' => __('validation.required'),
            'username.min' => __('validation.min.string'),
            'username.max' => __('validation.max.string'),
            'username.unique' => __('validation.unique'),
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique'),
            'email.email' => __('validation.email'),
            'email.max' => __('validation.max'),
            'password.required' => __('validation.required'),
            'password.min' => __('validation.min'),
            'password.max' => __('validation.max'),
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
