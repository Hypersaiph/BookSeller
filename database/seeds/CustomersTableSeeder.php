<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Marín',
            'surname' => 'Loyola Riojas',
            'nit' => '64243418',
            'email' => 'LoyolaRiojasMarin@gmail.com',
            'address' => '49591 Riofrío de Aliste',
            'phone' => '776 820 383',
            'latitude' => -16.508898,
            'longitude' => -68.127875,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);


        DB::table('customers')->insert([
            'name' => '',
            'surname' => '',
            'nit' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'latitude' => 0,
            'longitude' => 0,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'name' => '',
            'surname' => '',
            'nit' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'latitude' => 0,
            'longitude' => 0,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'name' => '',
            'surname' => '',
            'nit' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'latitude' => 0,
            'longitude' => 0,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'name' => '',
            'surname' => '',
            'nit' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'latitude' => 0,
            'longitude' => 0,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'name' => '',
            'surname' => '',
            'nit' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'latitude' => 0,
            'longitude' => 0,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);

    }
}
/*DB::table('customers')->insert([
    'name' => '',
    'surname' => '',
    'nit' => '',
    'email' => '',
    'address' => '',
    'phone' => '',
    'latitude' => 0,
    'longitude' => 0,
    'note' => null,
    'created_at' => '2017-08-23 23:18:21',
    'updated_at' => '2017-08-23 23:18:21'
]);*/