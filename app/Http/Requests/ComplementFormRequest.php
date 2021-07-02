<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplementFormRequest extends FormRequest
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
        if (!empty($this->complement->id)) {
            return [
                'nombre' =>
                    'required|max:50|unique:complements,id,' .
                    $this->complement->id,
                'stock' => 'required|numeric',
                'descripcion' => 'max:500',
            ];
        } else {
            return [
                'nombre' => 'required|max:50|unique:complements',
                'stock' => 'required|numeric',
                'descripcion' => 'max:500',
            ];
        }
    }
}
