<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateJogador extends FormRequest
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
            'nick_jogador' => 'required|max:20',
            'frase_perfil' => 'nullable|max:50',
            'descricao_perfil_jogador' => 'nullable|max:2000',
            'facebook' => 'nullable|max:20',
            'instagram' => 'nullable|max:20',
            'gamersclub' => 'nullable|max:20',
            'faceit' => 'nullable|max:20',
            'twitter' => 'nullable|max:20',
            'steam' => 'nullable|max:20',
            'twitch' => 'nullable|max:20',
            'email_contato' => 'nullable',
            'imagem_perfil_jogador'=> 'nullable|mimes:jpg,bmp,png'
        ];
    }
}
