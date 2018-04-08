<?php

use Illuminate\Database\Seeder;

class BookImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_images')->insert([
            'book_id' => 1,
            'image_id' => 1,
        ]);
        DB::table('book_images')->insert([
            'book_id' => 1,
            'image_id' => 2,
        ]);
        DB::table('book_images')->insert([
            'book_id' => 1,
            'image_id' => 3,
        ]);
        DB::table('book_images')->insert([
            'book_id' => 1,
            'image_id' => 4,
        ]);
    }
}
