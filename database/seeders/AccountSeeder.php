<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['role_id' => 1, 'gender_id' => 1, 'first_name' => 'Sen', 'middle_name' => 'Di', 'last_name' => 'Awan', 'email' => 'sendiawan@amazing.com', 'password' => Hash::make('sen12345'), 'display_picture_link' => 'assets/foto1.jpg'],
            ['role_id' => 2, 'gender_id' => 1, 'first_name' => 'Mul', 'middle_name' => 'Jo', 'last_name' => 'No', 'email' => 'muljono@gmail.com', 'password' => Hash::make('mul12345'), 'display_picture_link' => 'assets/foto2.jpg'],
            ['role_id' => 2, 'gender_id' => 2, 'first_name' => 'In', 'middle_name' => 'Do', 'last_name' => 'Mie', 'email' => 'indomie@gmail.com', 'password' => Hash::make('ind12345'), 'display_picture_link' => 'assets/foto3.jpg']
        ];

        DB::table('accounts')->insert($accounts);
    }
}
