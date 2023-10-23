<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;
use App\Models\Produit;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i=0; $i < 30 ; $i++) {
            Produit::create([
                'titre' => $faker->sentence(15),
                'slug' => $faker->slug,
                'description' => $facker->text,
                'prix' => $faker->numberBetween(5000, 15000),
                'quantite' => $faker->numberBetween(20, 60),
                'image' => 'https://via.placeholder.com/390x447',
            ]);
        }
    }
}
