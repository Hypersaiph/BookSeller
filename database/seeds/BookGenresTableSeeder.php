<?php

use Illuminate\Database\Seeder;

class BookGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_genres')->insert([
            'book_id' => 1,
            'genre_id' => 9,
        ]);



        DB::table('book_genres')->insert([
            'book_id' => 2,
            'genre_id' => 5,
        ]);
        DB::table('book_genres')->insert([
            'book_id' => 2,
            'genre_id' => 33,
        ]);



        DB::table('book_genres')->insert([
            'book_id' => 3,
            'genre_id' => 5,
        ]);
        DB::table('book_genres')->insert([
            'book_id' => 3,
            'genre_id' => 18,
        ]);
        DB::table('book_genres')->insert([
            'book_id' => 3,
            'genre_id' => 22,
        ]);



        DB::table('book_genres')->insert([
            'book_id' => 4,
            'genre_id' => 15,
        ]);


        DB::table('book_genres')->insert([
            'book_id' => 5,
            'genre_id' => 11,
        ]);
    }
}
