<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'category_id' => 'required|integer',
            'city_id' => 'required|integer',
            'name' => 'required|string|min:3',
            'photo' => 'required|array',
            'text' => 'required|string',
            'price' => 'required|between:0,9999.99',
            'new' => 'required|boolean',
            'saler_name' => 'required|string|min:3',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Elanın adı mütləq doldurulmalıdır',
            'name.min' => 'Elanın adı minimum 3 hərfdən ibarət olmalıdır',
            'name.string' => 'Elanın adı yalnız hərfdən ibarət olmalıdır',
            'category_id.required' => 'Kateqoriya seçili olmalıdır',
            'city_id.required' => 'Şəhər seçili olmalıdır',
            'photo.required' => 'Şəkil yüklü olmalıdır',
            'text.required' => 'Mətn mütləq doldurulmalıdır',
            'price.required' => 'Qiymət mütləq doldurulmalıdır',
            'price.between' => 'Qiymət 10000-dən aşağı olmalıdır',
            'new.required' => 'Vəziyyəti seçili olmalıdır',
            'saler_name.required' => 'Satıcının adı mütləq doldurulmalıdır',
            'saler_name.string' => 'Satıcının adı hərflərdən ibarət olmalıdır',
            'saler_name.min' => 'Satıcının adı minimum 3 hərfdən ibarət olmalıdır',
            'phone.required' => 'Telefon nömrəsi mütləq doldurulmalıdır',
            'email.required' => 'Email mütləq doldurulmalıdır',
            'email.email' => 'Email düzgün formatda qeyd edilməlidir',
        ];
    }
}
