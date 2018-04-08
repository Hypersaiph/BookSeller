<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 1
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 1,
            'user_id' => 2
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 3
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 4
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 5
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 6
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 1,
            'user_id' => 6
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 7
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 8
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 9
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 10
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 11
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 12
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 13
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 14
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 15
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 1,
            'user_id' => 16
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 2,
            'user_id' => 16
        ]);
    }
}
