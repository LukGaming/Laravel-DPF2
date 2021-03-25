<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateconfigcs extends FormRequest
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
            "resolucao" => 'nullable|max:20',
            "sensibilidade" => 'nullable|max:5',
            "crosshair" => 'nullable|max:500',
            "viewmodel" => 'nullable|max:500',
        ];
    }
}
