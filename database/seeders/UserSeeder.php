<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Exists;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '$Password;';
        $users = [
            [
                'first_name'    => "Admin",
                'last_name'     => "System",
                'username'      => "admin",
                'phone'         => "2340000000000",
                'email'         => "admin@example.com",
                'is_admin'      => 1,
                'password'      => $password,
                'password_confirmation' => $password,
            ]
        ];

        $account = new CreateNewUser();
        foreach ($users as $key => $user) {
            $exists = User::where([
                'username' => $user['username'],
                'phone' => $user['phone'],
                'email' => $user['email'],
            ]);

            if (!$exists)
                $account->create($user);
        }
    }
}
