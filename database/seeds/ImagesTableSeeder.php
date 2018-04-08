<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image_type_id'=> 2,
            'name' => '30.png',
            'big_text'=> 'This is our big Tagline!',
            'small_text'=> 'Here\'s our small slogan.',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('images')->insert([
            'image_type_id'=> 1,
            'name' => '31.png',
            'big_text'=> 'Left Aligned Caption',
            'small_text'=> 'Here\'s our small slogan.',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('images')->insert([
            'image_type_id'=> 3,
            'name' => '33.png',
            'big_text'=> 'Right Aligned Caption',
            'small_text'=> 'Here\'s our small slogan.',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('images')->insert([
            'image_type_id'=> 2,
            'name' => '28.png',
            'big_text'=> 'This is our big Tagline!',
            'small_text'=> 'Here\'s our small slogan.',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);

    }
}
