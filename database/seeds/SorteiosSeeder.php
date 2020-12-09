<?php

use Illuminate\Database\Seeder;
use App\Models\Sorteio;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SorteiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++){
            $sorteio = [
                'titulo' => $faker->sentence(4, true),
                'descricao' => $faker->text(200),
                'data_sorteio' => $faker->date(),
                'ativo' => $i % 50 === 0 ? true : false,
                'created_by' => 1,
                'updated_by' => null,
                'deleted_by' => null
            ];

            Sorteio::create($sorteio);
        }
    }
}
