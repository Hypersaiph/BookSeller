<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'INES CESPEDES ARMENDARIZ',
            'email' => 'geovas1@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055271',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'GLORIA CARRASCOSA LAGUNA',
            'email' => 'geovas2@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055272',
            'address' => 'Av. '.str_random(10),
            'blocked' => true,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'MARIA CONCEPCION CAÑO VALERA',
            'email' => 'geovas3@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055273',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'ENCARNACION NAVARRO PRADA',
            'email' => 'geovas4@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055275',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'BEATRIZ PINEDO CERRO',
            'email' => 'geovas5@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055276',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);


        DB::table('users')->insert([
            'name' => 'CRISTIAN MENACHO ARANGUREN',
            'email' => 'geovas6@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055277',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'JOSE ANGEL ALEGRE FALCON',
            'email' => 'geovas7@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055278',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'MARIANO CLAVERIA JODAR',
            'email' => 'geovas8@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055279',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'ALBERT MONTEAGUDO MILAN',
            'email' => 'geovas9@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055281',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'JOSE MANUEL SANJUAN ESPINOLA',
            'email' => 'geovas10@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055282',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);



        DB::table('users')->insert([
            'name' => 'LORENA REY BARROS',
            'email' => 'geovas11@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055283',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'RICARDO INSUA MAGAN',
            'email' => 'geovas12@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055284',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'MARCOS CAÑELLAS LAMAS',
            'email' => 'geovas13@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055274',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'LUISA MOURE CERON',
            'email' => 'geovas14@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055285',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'ISABEL GABALDON AYALA',
            'email' => 'geovas15@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055286',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2017-08-23 23:18:21',
            'updated_at' => '2017-08-23 23:18:21'
        ]);
        DB::table('users')->insert([
            'name' => 'Geovani Missael Mendoza Huanca',
            'email' => 'mygvs.mh@gmail.com',
            'password' => bcrypt('geovas123'),
            'phone' => '68055274',
            'address' => 'Av. '.str_random(10),
            'blocked' => false,
            'created_at' => '2018-04-07 23:18:21',
            'updated_at' => '2018-04-07 23:18:21',
        ]);
    }
}
