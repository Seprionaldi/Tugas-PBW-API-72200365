<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class KomikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker ::create();
        for($i=1;$i<=100;$i++)
{
        DB::table('Komiks')->insert([
            'title' => $faker->sentence (3),
            'genre' => $faker->word(),
            'year' => $faker->year(),
            'poster' => $faker->Url()
        ]);
    }
    }
}
