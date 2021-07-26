<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'nombre' => 'required|max:200',
            'descripcion' => 'max:500',
            'precio' => 'required',
            //'image-data' => 'required', //mimes:jpg,jpeg|
            //'imagen' => $this->method() == 'PATCH' ? '' : 'required',
            //'estado' =>,
            //'stock' => 'required|numeric',
        ];

        if (!empty($this->articulo->id)) {
            return [
                'nombre' =>
                    'required|max:50|unique:products,id,' . $this->articulo->id,
                'descripcion' => 'max:500',
                'image-data' => 'required', //mimes:jpg,jpeg|
                //'estado' =>,
                'stock' => 'required|numeric',
            ];
        } else {
            return [
                'nombre' => 'required|max:50|unique:products',
                'descripcion' => 'max:500',
                'image-data' => 'required', //mimes:jpg,jpeg|
                //'estado' =>,
                'stock' => 'required|numeric',
            ];
        }
    }

    public function messages()
    {
        return [
            'image-data.required' => 'El campo de la imagen es obligatorio.',
            'imagen.required' => 'La imagen original se ha extraviado.',
        ];
    }
}
