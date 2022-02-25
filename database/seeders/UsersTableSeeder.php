<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'UserTest1',
            'email' => 'usertest@uno.com',
            'password' => bcrypt('46^9!Gg35Ps#')
        ]);

        User::create([
            'name' => 'UserTest2',
            'email' => 'vac.cs.2020@gmail.com',
            'password' => bcrypt('46$cE039Xo4h')
        ]);
    }
}
