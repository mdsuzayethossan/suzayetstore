<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class GuardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:customerregisters,email',
            'password' => 'required',
            'password' => Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            'cpassword' => 'required|same:password'
        ];
    }
}
