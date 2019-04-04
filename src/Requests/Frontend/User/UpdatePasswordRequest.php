<?php

namespace Csteamengine\LaravelAuth\Requests\Frontend\User;

use Csteamengine\LaravelAuth\Rules\Auth\ChangePassword;
use Csteamengine\LaravelAuth\Rules\Auth\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use DivineOmega\LaravelPasswordExposedValidationRule\PasswordExposed;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->canChangePassword();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password'     => [
                'required',
                'confirmed',
                new ChangePassword(),
                new PasswordExposed(),
                new UnusedPassword($this->user()),
            ],
        ];
    }
}
