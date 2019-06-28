<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Contact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'email|required',
            'name'      => 'string|required',
            'surname'   => 'string|required',
            'phone'     => 'required',
            'message'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.email'                   => 'Email düzgün formatda qeyd edilməlidir',
            'email.required'                => 'Email ünvanı qeyd etmək məcburidir',
            'name.string'                   => 'Ad hərflərdən ibarət olmalıdır',
            'name.required'                 => 'Ad qeyd etmək məcburidir',
            'surname.string'                => 'Soyad hərflərdən ibarət olmalıdır',
            'surname.required'              => 'Soyad qeyd etmək məcburidir',
            'phone.required'                => 'Telefon nömrəsi qeyd etmək məcburidir',
            'message.required'              => 'Mesaj qeyd etmək məcburidir',
        ];
    }
}
