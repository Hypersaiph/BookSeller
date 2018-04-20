<?php

use Illuminate\Database\Seeder;

class OutflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outflows')->insert([
            'book_type_id' => 4,
            'sale_id' => 1,
            'quantity' => 2,
            'selling_price' => 200.00,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('outflows')->insert([
            'book_type_id' => 5,
            'sale_id' => 1,
            'quantity' => 1,
            'selling_price' => 150.00,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('outflows')->insert([
            'book_type_id' => 13,
            'sale_id' => 2,
            'quantity' => 1,
            'selling_price' => 160.00,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('outflows')->insert([
            'book_type_id' => 12,
            'sale_id' => 2,
            'quantity' => 1,
            'selling_price' => 300.00,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('outflows')->insert([
            'book_type_id' => 11,
            'sale_id' => 2,
            'quantity' => 1,
            'selling_price' => 180.00,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
    }
}
