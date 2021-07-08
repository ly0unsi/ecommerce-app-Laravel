<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) { 
            $faker = Faker::create('App/Models/Product');
          Product::create([
              'name'=>$faker->sentence(4),
              'subtitle'=>$faker->sentence(4),
              'description'=>$faker->text,
              'slug'=>$faker->slug,
              'price'=>$faker->numberbetween(15,300),
              'image'=>'https://via.placeholder.com/200x250'
          ])->categories()->attach([
              rand(1, 6),
              rand(1, 6)
          ]);
        }
    }
}
