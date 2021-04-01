<?php

namespace Database\Factories;

use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;


class TimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Time::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
            "nome"=> $this->faker->name,
            "frase"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            "descricao"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
            printer took a galley of type and scrambled it to make a type specimen book. It has survived not 
            only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "ativo"=>1,
            "numero_membros"=>rand(1,10),
            "facebook"=>"facebook",
            "instagram"=>"instagram",
            "gamersclub"=>"instagram",
            "faceit"=>"faceit",
            "steam"=>"steam",
            "twitter"=>"twitch",
            "twitch"=>"twitter",
            "email"=>"email@gmail.com",
            "caminho_imagem_time"=>null,
            "user_id"=>1











            
        ];
    }
}
