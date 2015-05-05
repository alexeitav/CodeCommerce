<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder{

    public function run() {

        DB::table('products')->truncate();

        $faker = Faker::create('pt_BR');
        
        foreach (range(1,15) as $i) {

            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' =>$faker->randomFloat(2,9,100)
            ]);

        }

    }

}