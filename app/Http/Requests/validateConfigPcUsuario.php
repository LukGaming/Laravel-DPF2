<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateConfigPcUsuario extends FormRequest
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
            "monitor"                   =>'nullable|max:30',
            "teclado"                   =>'nullable|max:30',
            "mouse"                     =>'nullable|max:30',
            "mousepad"                  =>'nullable|max:30',
            "processador"               =>'nullable|max:30',
            "placa_mae"                 =>'nullable|max:30',
            "placa_de_video"            =>'nullable|max:30',
            "memoria_ram"               =>'nullable|max:30',
            "fonte"                     =>'nullable|max:30',
            "gabinete"                  =>'nullable|max:30'
        ];
    }
}
