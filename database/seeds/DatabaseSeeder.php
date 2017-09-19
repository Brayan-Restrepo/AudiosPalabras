<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	for ($i=0; $i < 100; $i++) { 
    		
    		DB::table('audios')->insert([
            	'audio' =>  $faker->lastName,
            	'palabra' => $faker->firstName,
        	]);
    	}
    }
}
