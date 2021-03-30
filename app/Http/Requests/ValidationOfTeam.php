<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationOfTeam extends FormRequest
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
            "nome"=>"required|max:30",
            "frase" => "nullable|max:30",
            "descricao" => "nullable|max:2000",
            "facebook" => "nullable|max:100",
            "instagram"=>"nullable|max:100",
            "gamersclub"=>"nullable|max:100",
            "faceit"=>"nullable|max:100",
            "steam"=>"nullable|max:100",
            "twitter"=>"nullable|max:100",
            "twitch"=>"nullable|max:100",
            "email"=>"nullable|max:100",
        ];
    }
}
