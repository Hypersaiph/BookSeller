<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //system settings
        //payment
        DB::table('settings')->insert([
            'key' => 'penalty_percentage',//Interés por mora en los pagos
            'value' => '8',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'days_before_penalty',//Días naturales antes de aplicar intereses por mora
            'value' => '5',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'penalty_schedule',//Hora para el cálculo de intereses por mora
            'value' => '00:00',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'days_in_year',//Días del año
            'value' => '360',
            'locale' => null,
        ]);
        //notifications
        DB::table('settings')->insert([
            'key' => 'book_notification',//Enviar una notificación a todos los usuarios al crear nuevos Libros
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'book_type_notification',//Enviar una notificación a todos los usuarios cuando se cree una nueva presentacion de libro
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'inflows_notification',//Enviar una notificación a todos los usuarios cuando se agregue stock a un tipo de libro
            'value' => 'true',
            'locale' => null,
        ]);
        //recent activity
        DB::table('settings')->insert([
            'key' => 'sales_activity',//Ventas Recientes
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'customers_activity',//Nuevos Clientes
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'accounts_activity',//Registro de pago
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'inflows_activity',//registro de inventario
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'books_activity',//Nuevos Libros
            'value' => 'true',
            'locale' => null,
        ]);
        DB::table('settings')->insert([
            'key' => 'book_types_activity',//Nuevos Tipos de Libro
            'value' => 'true',
            'locale' => null,
        ]);


        //user app settings
        $users = User::all();
        foreach ($users as $user){
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'book_notification',
                'value' => 'true',
            ]);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'book_type_notification',
                'value' => 'true',
            ]);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'account_payment_notification',
                'value' => 'true',
            ]);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'news_notification',
                'value' => 'true',
            ]);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'message_notification',
                'value' => 'true',
            ]);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'key' => 'inflows_notification', //nuevo stock en cierto tipo de libro
                'value' => 'true',
            ]);
        }
    }
}
