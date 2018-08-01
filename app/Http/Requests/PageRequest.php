<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title'        => 'required',
            'slug'         => 'required|max:100|unique:pages,slug|regex:/^[a-zA-Z-]{1,100}$/',
            'content'      => 'required',
            'status'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'Nama tidak boleh kosong',
            'slug.required'    => 'slug tidak boleh kosong',
            'slug.regex'       => 'slug hanya boleh diisi dengan huruf dan (-) sebagai pengganti spasi',
            'slug.max'         => 'slug tidak boleh melebihi dari 100 karakter',
            'slug.unique'      => 'nama slug sudah ada yang menggunakan',
            'content.required' => 'Konten tidak boleh kosong',
            'status.required'  => 'required',
        ];
    }
}
