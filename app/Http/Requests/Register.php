<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required|max:50|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'İstifadəçi adı mütləq doldurulmalıdır',
            'name.min' => 'İstifadəçi adı minimum 3 hərfdən ibarət olmalıdır',
            'name.max' => 'İstifadəçi adı maksimum 50 hərfdən ibarət olmalıdır',
            'email.required' => 'Email mütləq doldurulmalıdır',
            'email.email' => 'Email düzgün formatda olmalıdır',
            'email.unique' => 'Bu email ilə istifadəçi var. Email bənzərsiz olmalıdır.',
            'password.required' => 'Şifrə mütləq doldurulmalıdır',
            'password.confirmed' => 'Şifrə ilə şifrənin təkrarı eyni olmalıdır',
            'password.min' => 'Şifrə minimum 6 hərfdən ibarət olmalıdır',
        ];
    }
}
