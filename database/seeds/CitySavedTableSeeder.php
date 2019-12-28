<?php

use App\CitySaved;
use Illuminate\Database\Seeder;

class CitySavedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        CitySaved::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            CitySaved::create([
                'userID' => $i + 1,
                'jsonString' => $faker->paragraph,
            ]);
        }
    }
}
