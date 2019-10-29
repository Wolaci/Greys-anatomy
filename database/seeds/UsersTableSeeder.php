<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Medic User
        User::create([
            'name' => 'Medic',
            'email' => 'Medic@Medic.com',
            'password' => Hash::make('123123123'),
            'bloodType'=> 1,
            'userType'=> 2,
        ]);
        //Medic Patient
        User::create([
            'name' => 'Patient',
            'email' => 'Patient@Patient.com',
            'password' => Hash::make('123123123'),
            'bloodType'=> 1,
            'userType'=> 1,
        ]);
    }
}
