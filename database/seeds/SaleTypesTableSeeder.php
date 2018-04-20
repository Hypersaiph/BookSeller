<?php

use Illuminate\Database\Seeder;

class SaleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_types')->insert([
            'type' => 'Venta al Contado',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('sale_types')->insert([
            'type' => 'Venta a Crédito',
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
    }
}
