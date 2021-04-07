<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
            ];
            \App\Models\Tag::create($array);
        }
    }//end of run

}//end of seeder
