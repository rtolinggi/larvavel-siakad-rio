<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'min:8', 'string', 'confirmed'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($validator->errors()->first() == "The email has already been taken.") {
            throw new HttpResponseException(
                response([
                    'success' => false,
                    'status' => 422,
                    'errors' => $validator->getMessageBag(),
                ], 422)
            );
        }

        throw new HttpResponseException(
            response([
                'success' => false,
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ], 400)
        );
    }
}
