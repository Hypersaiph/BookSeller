<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'user_id' => 16,
            'message' => 'Hola a Todos',
            'delivery_date' => '2018-04-18',
            'delivery_time' => '15:40',
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
    }
}
