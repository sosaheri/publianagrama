<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEvaluationRequest extends FormRequest
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

            'name' => 'required',
            'title'=> 'required|max:100',
            'eval'=> 'required|max:1000',
        ];

    }

    public function attributes(){
            return [

            'name' => 'Nombre',
            'title'=> 'Titulo',
            'eval'=> 'Evaluación',

            ];


    }

    public function messages()
    {
        return [


                'name.required' => 'El campo :attribute es obligatorio',
                'title.required' => 'El campo :attribute es obligatorio',
                'eval.required' => 'El campo :attribute es obligatorio',
                'title.max' => 'El campo :attribute no puede superar 100 caracteres',
                'eval.max' => 'El campo :attribute no puede superar 1000 caracteres',

            ];


    }
}
