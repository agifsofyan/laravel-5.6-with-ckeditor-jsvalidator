<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            // Reservation
            'name'      => 'required|regex:/^[a-zA-Z ]{1,30}$/',
            'age'       => 'required|numeric|regex:/^[0-9]{1,2}$/',
            'address'   => 'required',
            'phone'     => 'required|numeric|digits_between:11,13',
            'complaint' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Nama tidak boleh kosong',
            'name.regex'           => 'Nama tidak boleh ada angka',
            'age.required'         => 'Usia tidak boleh kosong',
            'age.numeric'          => 'Harus angka',
            'age.regex'            => 'Umur manusia jarang yang sampai 100 tahun',
            'address.required'     => 'Alamat tidak boleh kosong',
            'phone.required'       => 'Nomor telepone tidak boleh kosong',
            'phone.numeric'        => 'Harus angka',
            'phone.digits_between' => 'Nomor telephone minimal 11 digit',
            'complaint.required'   => 'Silahkan sampaikan keluhan anda',
        ];
    }
}
