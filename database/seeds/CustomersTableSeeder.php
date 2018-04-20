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
            'created_by' => 1,
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
            'created_by' => 1,
            'name' => 'Leonelo',
            'surname' => 'Puga Collazo',
            'nit' => '26348196',
            'email' => 'LeoneloPugaCollazo@gmail.com',
            'address' => 'Fuente del Gallo, 85',
            'phone' => '625 293 299',
            'latitude' => -16.500683,
            'longitude' => -68.122433,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'created_by' => 16,
            'name' => 'Goio',
            'surname' => 'Castellanos Arévalo',
            'nit' => '12530763',
            'email' => 'GoioCastellanosArevalo@gmail.com',
            'address' => 'Canónigo Valiño, 83',
            'phone' => '673 865 235',
            'latitude' => -16.509761,
            'longitude' => -68.129359,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'created_by' => 16,
            'name' => 'Farisa',
            'surname' => 'Carrión Guevara',
            'nit' => '56530694',
            'email' => 'FarisaCarrionGuevara@gmail.com',
            'address' => 'C/ Canarias, 38',
            'phone' => '699 453 013',
            'latitude' => -16.503011,
            'longitude' => -68.134509,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'created_by' => 16,
            'name' => 'Inaquí',
            'surname' => 'Pena Meza',
            'nit' => '40685517',
            'email' => 'InaquiPenaMeza@gmail.com',
            'address' => 'Camiño Real, 51',
            'phone' => '671 106 806',
            'latitude' => -16.497198,
            'longitude' => -68.123557,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'created_by' => 16,
            'name' => 'Adeliz',
            'surname' => 'Carrera Abeyta',
            'nit' => '37554651',
            'email' => 'AdelizCarreraAbeyta@gmail.com',
            'address' => 'C/ Libertad, 67',
            'phone' => '780 282 947',
            'latitude' => -16.521573,
            'longitude' => -68.108303,
            'note' => null,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('customers')->insert([
            'created_by' => 16,
            'name' => 'Carlos Ischia',
            'surname' => 'Baute Mesa',
            'nit' => '2664161016',
            'email' => 'mygvs.mh@gmail.com',
            'address' => 'Av. Armando Escobar Uria #999',
            'phone' => '68055274',
            'latitude' => -16.508648,
            'longitude' => -68.099914,
            'note' => "Ofrecer libros de: Ciencia Ficción",
            'created_at' => '2018-04-18 23:18:21',
            'updated_at' => '2018-04-18 23:18:21'
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