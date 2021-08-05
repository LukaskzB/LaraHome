<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AlugueisSeeder extends Seeder
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
            DB::table('aluguel')->insert([
                'nome' => 'Casa de ' . $faker->name(),
                'endereco' => $faker->address(),
                'email' => $faker->email(),
                'tamanho' => $faker->numberBetween($min = 20, $max = 120),
                'animal' => rand(0, 1) == 1,
                'valor' => $faker->numberBetween($min = 500, $max = 1200),
                'comodos' => $faker->numberBetween($min = 3, $max = 11),
                'banheiros' => $faker->numberBetween($min = 1, $max = 4),
                'descricao' => $faker->text(),
                'fumante' => rand(0, 1) == 1,
                'carros' => $faker->numberBetween(0, 4),
                'dormitorios' => $faker->numberBetween(1, 4),
                'alugado' => null
            ]);
        }
    }
}
