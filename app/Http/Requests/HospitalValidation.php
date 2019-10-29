<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class HospitalValidation extends FormRequest
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
            'user_id'=>'required | numeric',
            'date' =>'required',
            'height'=> 'required | numeric',
            'weight' => 'required | numeric',
            'pressure'=>'required | string | max:255',
            'glicouse' => 'required | numeric',
            'cholesterol_bad' =>'required | numeric',
            'cholesterol_good' =>'required | numeric',
            'observation' => 'string',
        ];
    }
    public function messages(){
        //Adicionem o Resto se quiserem :P
        return [
            'user_id.required' => ' O campo :attribute é necessário'
        ];
    }
    public function attributes(){
        return[
            'user_id' => 'paciente'
        ];
    }
}
