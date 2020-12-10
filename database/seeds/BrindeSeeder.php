<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Models\Sorteio;

class BrindeSeeder extends Seeder
{

    public function run()
    {
        $sorteio = Sorteio::get()->first();
        DB::table('brindes')->truncate();
        DB::table('brindes')->insert(
            [
                [
                    "brinde_uid" => Uuid::uuid4(),
                    "sorteio_uid"=> $sorteio->sorteio_uid,
                    "nome" => "R$ 100,00"
                ],
                [
                    "brinde_uid" => Uuid::uuid4(),
                    "sorteio_uid"=> $sorteio->sorteio_uid,
                    "nome" => "Livro"
                ],
                [
                    "brinde_uid" => Uuid::uuid4(),
                    "sorteio_uid"=> $sorteio->sorteio_uid,
                    "nome" => "Cupom"
                ]
            ]);
    }
}
