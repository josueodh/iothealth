<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
        ],[
            'name' => 'admin',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
        ]);
    }
}
