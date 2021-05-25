<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCustomerRequest extends FormRequest
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
            'name' => 'required|unique:customer|min:5|max:30',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|min:6',
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Not empty nam!',
            'name.unique' => 'trung ten!',
            'name.min' => 'Name size must be between 5 and 30!',
            'name.max' => 'Name size must be between 5 and 30!',
            'email.required' => 'Not empty!',
            'email.regex' => 'Not gmail!',
            'email.min' => 'Email dai hon 6 ky tu!',

        ];
        return $messages;
    }
}
