<?php

use App\Models\Brinde;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class BrindeSeeder extends Seeder
{

    public function run()
    {
        DB::table('brindes')->truncate();

        Brinde::create([
            "brinde_uid" => Uuid::uuid4(),
            "nome" => "R$ 100,00"
        ]);

        Brinde::create([
            "brinde_uid" => Uuid::uuid4(),
            "nome" => "Livro"
        ]);

        Brinde::create([
            "brinde_uid" => Uuid::uuid4(),
            "nome" => "Cupom"
        ]);

    }
}
