<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PhonebookRequest extends FormRequest
{
    /**
     * Kullanıcının bu isteği yapmaya yetkili olup olmadığını belirleyin.
     *
     * @return bool
     */
    public function authorize()
    {
        //true yaptık
        return true;
    }

    /**
     * İstek için geçerli olan doğrulama kurallarını alın.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'=> 'required|max:50',
            'phone' => 'required|max:10',
            //unique:phonebook=>benzersiz email demektir.
            'email' => 'required|email|unique:phonebooks,email,'.$request->id
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>  'Adınızı Boş Bırakmayınız.',
            'phone.required'=> 'Telefon Numaranızı Boş Bırakmayınız.',
            'email.required'=> 'E-Mail Adresinizi Boş Bırakmayınız.',
            'name.max' => 'Adınız 50 Karakterden fazla olmamalıdır.',
            'email.unique' => 'Bu mail adresi kullanılmaktadır.',
            'email.email' => 'Geçerli E-Mail Adresi Giriniz',
             'phone.max' => 'Telefon numaranız 10 karakter olmalıdır.',
        ];
    }
}
