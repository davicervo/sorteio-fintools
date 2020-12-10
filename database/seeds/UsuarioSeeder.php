<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'is_admin' => 1,
            'name' => 'Fintools',
            'email' => 'fintools@oliveiratrust.com.br',
            'email_verified_at' => Carbon::now(),
            'password' => 'Senh@123'
        ]);
    }
}
