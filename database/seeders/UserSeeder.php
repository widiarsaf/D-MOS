<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
           [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin123'),
                'level' => 1,

            ],
            [
                'id' => 2,
                'name' => 'waiter',
                'email' => 'waiter@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('waiter123'),
                'level' => 2,
            ],
            [
                 'id' => 3,
                'name' => 'chef',
                'email' => 'chef@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('chef123'),
                'level' => 3,
            ],
            [
                 'id' => 4,
                'name' => 'cashier',
                'email' => 'cashier@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('cashier123'),
                'level' => 4,
            ],
            
           
          ];

          User::insert($users);
    }
}
