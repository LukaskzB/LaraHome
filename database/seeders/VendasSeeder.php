<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class VendasSeeder extends Seeder
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
            DB::table('venda')->insert([
                'nome' => 'Casa de ' . $faker->name(),
                'endereco' => $faker->address(),
                'email' => $faker->email(),
                'tamanho' => $faker->numberBetween($min = 10, $max = 100),
                'comodos' => $faker->numberBetween($min = 3, $max = 11),
                'carros' => $faker->numberBetween(0, 4),
                'banheiros' => $faker->numberBetween($min = 1, $max = 4),
                'dormitorios' => $faker->numberBetween(1, 4),
                'valor' => $faker->numberBetween($min = 100000, $max = 1000000),
                'descricao' => $faker->text(),
                'vendido' => null
            ]);
        }
    }
}
