<?php

use Illuminate\Database\Seeder;
use App\Products;
use App\User;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = User::where('email', 'admin@daomusic.vn')->first();
        $doitac1 = User::where('email', 'dt1@daomusic.vn')->first();
        $doitac2 = User::where('email', 'dt2@daomusic.vn')->first();
        $faker = Faker\Factory::create();
        for ($i=0; $i < 2; $i++) { 
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
          $post = Products::create([
              'name' => $title, 
              'slug' => Str::slug($title),
              'price' => rand(1000, 10000000),
              'published' => rand(0,1),
              'user_id' => 2
          ]);
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
          $post = Products::create([
              'name' => $title, 
              'slug' => Str::slug($title),
              'price' => rand(1000, 10000000),
              'published' => rand(0,1),
              'user_id' => 2
          ]);
        }
    }
}
