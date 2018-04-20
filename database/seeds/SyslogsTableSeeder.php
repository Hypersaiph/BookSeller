<?php

use Illuminate\Database\Seeder;

class SyslogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('syslogs')->insert([
            'user_id' => 16,
            'record_id' => 1,
            'event' => 'create',
            'table' => 'sales',
            'description' => 'Geovani Missael Mendoza Huanca created a record with ID=1 in the table sales on 2018-04-18',
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
        ]);
        DB::table('syslogs')->insert([
            'user_id' => 16,
            'record_id' => 5,
            'event' => 'create',
            'table' => 'books',
            'description' => 'Geovani Missael Mendoza Huanca created a record with ID=5 in the table books on 2018-04-17',
            'created_at' => '2018-04-17 23:18:21',
            'updated_at' => '2018-04-17 23:18:21'
        ]);
    }
}
