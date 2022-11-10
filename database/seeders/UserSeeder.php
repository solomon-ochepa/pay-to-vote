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
                'address'       => "Abuja, Nigeria",
                'is_admin'      => 1,
                'password'      => $password,
                'password_confirmation' => $password,
            ],
            [
                'first_name'    => "Developer",
                'last_name'     => "System",
                'username'      => "developer",
                'phone'         => "2340000000001",
                'email'         => "developer@example.com",
                'address'       => "Abuja, Nigeria",
                'is_admin'      => 1,
                'password'      => $password,
                'password_confirmation' => $password,
            ],
        ];

        $account = new CreateNewUser();
        foreach ($users as $key => $item) {
            $exists = User::where([
                'username' => $item['username'],
                'phone' => $item['phone'],
                'email' => $item['email'],
            ])->first();

            // dd($exists);

            if (!$exists) {
                $user = $account->create($item);

                $user->is_admin = $item['is_admin'] ?? 0;
                $user->save();
            }
        }
    }
}
