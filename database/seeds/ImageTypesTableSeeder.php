<?php

use Illuminate\Database\Seeder;

class ImageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_types')->insert([
            'type' => 'banner',
            'position' => 'Izquierda',
            'html_class' => 'left-align',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('image_types')->insert([
            'type' => 'banner',
            'position' => 'Centro',
            'html_class' => 'center-align',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('image_types')->insert([
            'type' => 'banner',
            'position' => 'Derecha',
            'html_class' => 'right-align',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
    }
}
