<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $youtube = [
            'https://www.youtube.com/watch?v=Y49Ba16pK20',
            'https://www.youtube.com/watch?v=HuEmunei6ZY',
            'https://www.youtube.com/watch?v=iXKp4Pk3ic0',
            'https://www.youtube.com/watch?v=DQK-jxjEkEY'
        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'cat_id' => rand(1,10),
                'youtube' => $youtube[rand(0,3)],
                'published' => rand(0,1),
                'image' => 'default.png',
                'des' => $faker->paragraph,
                'user_id' => 1
            ];
            $video = \App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids , 2));
            $video->tags()->sync(array_rand($ids , 3));
        }
    }

}//end of seeder
