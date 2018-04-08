<?php

use Illuminate\Database\Seeder;

class BookTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_types')->insert([
            'book_id' => 1,
            'type_id' => 1,
            'price' => '188.65',
            'pages' => 288,
            'isbn10' => '0062674676',
            'isbn13' => '978-0062674678',
            'serial_cd' => null,
            'duration' => null,
            'weight' => '1.1',
            'width' => '6',
            'height' => '1',
            'depth' => '9',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 1,
            'type_id' => 2,
            'price' => '99.56',
            'pages' => 289,
            'isbn10' => '0062845020',
            'isbn13' => '978-0062845023',
            'serial_cd' => null,
            'duration' => null,
            'weight' => '1.1',
            'width' => '6',
            'height' => '1',
            'depth' => '9',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 1,
            'type_id' => 3,
            'price' => '103.22',
            'pages' => null,
            'isbn10' => null,
            'isbn13' => null,
            'serial_cd' => 'abc123',
            'duration' => '8:2',
            'weight' => null,
            'width' => null,
            'height' => null,
            'depth' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);





        DB::table('book_types')->insert([
            'book_id' => 2,
            'type_id' => 1,
            'price' => '150.50',
            'pages' => 224,
            'isbn10' => '0062457713 ',
            'isbn13' => '978-0062457714',
            'serial_cd' => null,
            'weight' => '11.2',
            'width' => '5.5',
            'height' => '0.8',
            'depth' => '8.2',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 2,
            'type_id' => 2,
            'price' => '80.50',
            'pages' => 227,
            'isbn10' => '1925483592',
            'isbn13' => '978-1925483598',
            'serial_cd' => null,
            'weight' => '11.2',
            'width' => '5.5',
            'height' => '0.8',
            'depth' => '8.2',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 2,
            'type_id' => 3,
            'price' => '103.22',
            'pages' => null,
            'isbn10' => null,
            'isbn13' => null,
            'serial_cd' => 'abc1234',
            'duration' => '5:30',
            'weight' => null,
            'width' => null,
            'height' => null,
            'depth' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);





        DB::table('book_types')->insert([
            'book_id' => 3,
            'type_id' => 1,
            'price' => '109.51',
            'pages' => 371,
            'isbn10' => '1925483598',
            'isbn13' => '978-1400069286',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 3,
            'type_id' => 2,
            'price' => '98.04',
            'pages' => 371,
            'isbn10' => '081298160X',
            'isbn13' => '978-0812981605',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 3,
            'type_id' => 3,
            'price' => '103.22',
            'pages' => null,
            'isbn10' => null,
            'isbn13' => null,
            'serial_cd' => 'abc12345',
            'duration' => '10:57',
            'weight' => null,
            'width' => null,
            'height' => null,
            'depth' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);





        DB::table('book_types')->insert([
            'book_id' => 4,
            'type_id' => 1,
            'price' => '119.04',
            'pages' => 371,
            'isbn10' => '1594631018',
            'isbn13' => '978-1594631016',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 4,
            'type_id' => 2,
            'price' => '98.04',
            'pages' => 375,
            'isbn10' => '038534645X',
            'isbn13' => '978-0385346450',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);





        DB::table('book_types')->insert([
            'book_id' => 5,
            'type_id' => 1,
            'price' => '118.54',
            'pages' => 371,
            'isbn10' => '8301191570',
            'isbn13' => '978-8301191573',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('book_types')->insert([
            'book_id' => 5,
            'type_id' => 2,
            'price' => '98.04',
            'pages' => 375,
            'isbn10' => '0142181021',
            'isbn13' => '978-0142181027',
            'serial_cd' => null,
            'weight' => '9.6',
            'width' => '5.1',
            'height' => '0.9',
            'depth' => '8',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
    }
}
