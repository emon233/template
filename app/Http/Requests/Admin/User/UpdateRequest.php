<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\Phone;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$this->user->id],
            'phone_no' => ['nullable', new Phone, 'unique:users,phone_no,'.$this->user->id],
            'password' => ['nullable', 'string', 'min:' . PASSWORD_MIN_LENGTH, 'max:' . PASSWORD_MAX_LENGTH],
            'c_password' => ['same:password']
        ];
    }

    /**
     * Prepare For Validation Method
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->has('phone_no'))
            $this->merge(['phone_no' => generateBangladeshiNumber($this->phone_no)]);
    }
}
