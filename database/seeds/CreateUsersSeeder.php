<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'nurdinadmin@mail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Nurdin',
               'email'=>'nurdinahmada@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('bandung25'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
