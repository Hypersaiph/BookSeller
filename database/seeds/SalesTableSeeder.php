<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            'customer_id' => 7,
            'user_id' => 16,
            'sale_type_id' => 1,
            'code' => '180000001',
            'is_billed' => false,
            'months' => null,
            'anual_interest' => null,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('sales')->insert([
            'customer_id' => 7,
            'user_id' => 16,
            'sale_type_id' => 2,
            'code' => '180000002',
            'is_billed' => false,
            'months' => 4,
            'anual_interest' => 0.15,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
    }
}
