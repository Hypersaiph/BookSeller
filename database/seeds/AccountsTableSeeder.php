<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'sale_id' => 1,
            'code' => '180000001-1',
            'amount' => 350.00,
            'penalty' => 0.00,
            'payment_date' => '2018-04-18',
            'is_active' => false,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('accounts')->insert([
            'sale_id' => 2,
            'code' => '180000002-1',
            'amount' => 168.00,
            'penalty' => 0.00,
            'payment_date' => '2018-04-20',
            'is_active' => true,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('accounts')->insert([
            'sale_id' => 2,
            'code' => '180000002-2',
            'amount' => 168.00,
            'penalty' => 0.00,
            'payment_date' => '2018-05-20',
            'is_active' => true,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('accounts')->insert([
            'sale_id' => 2,
            'code' => '180000002-3',
            'amount' => 168.00,
            'penalty' => 0.00,
            'payment_date' => '2018-06-20',
            'is_active' => true,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('accounts')->insert([
            'sale_id' => 2,
            'code' => '180000002-4',
            'amount' => 168.00,
            'penalty' => 0.00,
            'payment_date' => '2018-07-20',
            'is_active' => true,
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
    }
}
