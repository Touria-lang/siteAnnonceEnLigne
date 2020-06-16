<?php

use Illuminate\Database\Seeder;
use App\Ad;
use App\User;
use Faker\Generator\Factory;
use Illuminate\Support\Str;

class AdSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        

       for ($i=0; $i < 10; $i++) { 
           Ad::create([
                'title' => $faker->sentence(2),
                'description' => $faker->sentence(16),
                'localisation' => $faker->address,
                'price' => random_int(200,500),
                'user_id' => random_int(1,3)
           ]);
       }
    }
}
