<?php

use Illuminate\Database\Seeder;

class BookPublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_publishers')->insert([
            'book_type_id' => 1,
            'publisher_id' => 1,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 2,
            'publisher_id' => 1,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 3,
            'publisher_id' => 6,
        ]);


        DB::table('book_publishers')->insert([
            'book_type_id' => 4,
            'publisher_id' => 2,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 5,
            'publisher_id' => 2,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 6,
            'publisher_id' => 6,
        ]);


        DB::table('book_publishers')->insert([
            'book_type_id' => 7,
            'publisher_id' => 3,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 8,
            'publisher_id' => 3,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 9,
            'publisher_id' => 7,
        ]);


        DB::table('book_publishers')->insert([
            'book_type_id' => 10,
            'publisher_id' => 4,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 11,
            'publisher_id' => 4,
        ]);


        DB::table('book_publishers')->insert([
            'book_type_id' => 12,
            'publisher_id' => 5,
        ]);
        DB::table('book_publishers')->insert([
            'book_type_id' => 13,
            'publisher_id' => 5,
        ]);
    }
}
