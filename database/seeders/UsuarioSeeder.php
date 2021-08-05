<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");
        foreach (range(1, 10) as $index) {
            DB::table('usuario')->insert([
                'nome' => $faker->name(),
                'email' => $faker->email(),
                'senha' => hash('sha256', $faker->password(6))
            ]);
        }
    }
}
