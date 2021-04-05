<?php

namespace Database\Factories;

use App\Models\Jogador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JogadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jogador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nick_jogador"=> $this->faker->name,
            "frase_perfil"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            "descricao_perfil_jogador"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
            printer took a galley of type and scrambled it to make a type specimen book. It has survived not 
            only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "ativo"=>1,
            "facebook"=>"facebook",
            "instagram"=>"instagram",
            "gamersclub"=>"instagram",
            "faceit"=>"faceit",
            "steam"=>"steam",
            "twitter"=>"twitch",
            "twitch"=>"twitter",
            "email_contato"=>"email@gmail.com",
            "caminho_imagem_perfil_jogador"=>"images/jogador/WSlLTYe6VHOhtrYiyVDu4VIoj8YVJETqblXwHWHp.jpg",
            "user_id"=>rand(100,500),
            "funcao_primaria"=>"Entry Fragger",
            "funcao_secundaria"=>"Awper",
            "funcao_adicional"=>"Capitao/IGL",
        ];
    }
}
