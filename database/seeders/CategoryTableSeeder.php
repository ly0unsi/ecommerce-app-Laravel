<?php

namespace Database\Seeders;

use App\Models\MyCategory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyCategory::create([
            'name'=>'books',
            'slug'=>'books',
        ]);
        MyCategory::create([
            'name'=>'High tech',
            'slug'=>'High tech',
        ]);
        MyCategory::create([
            'name'=>'Foods',
            'slug'=>'Foods',
        ]);
        MyCategory::create([
            'name'=>'Cars',
            'slug'=>'Cars',
        ]);
        MyCategory::create([
            'name'=>'Toys',
            'slug'=>'Toys',
        ]);
        MyCategory::create([
            'name'=>'Clothes',
            'slug'=>'Clothes',
        ]);
        MyCategory::create([
            'name'=>'jewelry',
            'slug'=>'jewelry',
        ]);
    }
}
