<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Order extends FormRequest
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
            'email'             => 'email|required',
            'name'              => 'string|required',
            'surname'           => 'string|required',
            'salary_bank_id'    => 'integer|required',
            'phone'             => 'integer|required',
            'image1'            => 'image|required',
            'image2'            => 'image|required',
            'actual_address'    => 'string|required',
            'amount'            => 'integer|required',
            'currency_id'       => 'string|required',
            'work'              => 'string|required',
            'bank_id'           => 'array|required',
            'salary'            => 'integer|required',
            'rule'              => 'boolean|required',
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
            'salary_bank_id.required'       => 'Əmək haqqı kartınıza xidmət göstərən bankı qeyd etmək məcburidir',
            'phone.integer'                 => 'Telefon nömrəsi rəqəm tipli olmalıdır',
            'phone.required'                => 'Telefon nömrəsi qeyd etmək məcburidir',
            'image1.image'                  => 'Şəxsiyət vəsiqəsinin surəti (ön üzü) düzgün formatda olmalıdır',
            'image2.image'                  => 'Şəxsiyət vəsiqəsinin surəti (arxa üzü) düzgün formatda olmalıdır',
            'image1.required'               => 'Şəxsiyət vəsiqəsinin surəti (ön üzü) seçilməlidir',
            'image2.required'               => 'Şəxsiyət vəsiqəsinin surəti (arxa üzü) seçilməlidir',
            'actual_address.required'       => 'Faktiki yaşayış ünvanınız qeyd edilməlidir',
            'actual_address.string'         => 'Faktiki yaşayış ünvanınız hərflərdən ibarət olmalıdır',
            'amount.required'               => 'Kreditin məbləği qeyd edilməlidir',
            'amount.integer'                => 'Kreditin məbləği rəqəmlərdən ibarət olmalıdır',
            'currency_id.required'          => 'Valyuta qeyd edilməlidir',
            'work.required'                 => 'İş yeriniz qeyd edilməlidir',
            'work.string'                   => 'İş yeriniz hərflərdən ibarət olmalıdır',
            'bank_id.required'              => 'Bank qeyd edilməlidir',
            'bank_id.array'                 => 'Bank qeyd edilməlidir',
            'salary.required'               => 'Maaş qeyd edilməlidir',
            'salary.integer'                => 'Maaş rəqəmlərdən ibarət olmalıdır',
            'rule.required'                 => 'Qaydalarla razılaşmalısınız',
            'rule.boolean'                  => 'Qaydalarla razılaşmalısınız',
        ];
    }
}
