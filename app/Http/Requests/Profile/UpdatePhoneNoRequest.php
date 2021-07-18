<?php

namespace App\Http\Requests\Profile;

use App\Rules\Phone;
use App\Rules\PhoneUnique;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhoneNoRequest extends FormRequest
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
            'phone_no' => ['required', new Phone, new PhoneUnique]
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
