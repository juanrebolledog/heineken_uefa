<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('usuarios')->delete();

        $users = array(
            'nombres' => 'Test User',
            'apellidos' => 'Rodriguez',
            'rut' => '12345678-9',
            'ciudad' => 'Dummy City XL',
            'email' => 'test@tests.org',
            'recibir_info' => 0,
            'uid' => 0,
            'access_token' => '',
            'access_token_secret' => '',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        );

        DB::table('usuarios')->insert($users);
    }

}
