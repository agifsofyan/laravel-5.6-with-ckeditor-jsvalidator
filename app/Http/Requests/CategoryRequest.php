<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|max:200',
            'category_slug' => 'required|max:100|unique:categories,category_slug|regex:/^[a-zA-Z-]{1,100}$/',
        ];
    }

    public function messages(){
        return [
            'category_name.required'    => 'Nama kategori tidak boleh kosong',
            'category_name.max'         => 'Maksimal 200 karakter',
            'category_slug.required'    => 'Slug tidak boleh kosong',
            'category_slug.regex'  => 'slug hanya boleh diisi dengan huruf dan (-) sebagai pengganti spasi',
            'category_slug.max'    => 'slug tidak boleh melebihi dari 100 karakter',
            'category_slug.unique' => 'nama slug sudah ada yang menggunakan',
        ];
    }
}
