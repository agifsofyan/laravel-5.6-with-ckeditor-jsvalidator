<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title'     => 'required',
            'post_slug'      => 'required|max:100|unique:posts,post_slug|regex:/^[a-zA-Z-]{1,100}$/',
            'post_content'   => 'required',
            'post_thumbnail' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        ];
    }

    public function messages()
    {
        return [
            'post_title.required'   => 'Nama tidak boleh kosong',
            'post_slug.required'    => 'slug tidak boleh kosong',
            'post_slug.regex'       => 'slug hanya boleh diisi dengan huruf dan (-) sebagai pengganti spasi',
            'post_slug.max'         => 'slug tidak boleh melebihi dari 100 karakter',
            'post_slug.unique'      => 'nama slug sudah ada yang menggunakan',
            'post_content.required' => 'Konten minimal 10 karakter',
        ];
    }
}
