<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        /**
        * Wykonaj seedy.
        */
        User::insert(
            [
                [
                    'id' => '1', 'email' => 'Adam@gmail.com', 'password' => Hash::make('adam123'),
                    'name' => 'Adam', 'last_name' => 'Nowak', 'phone_number' => '123456789',
                    'address' => 'ul. Malinowa 8', 'role' => 'administrator'
                ],
                [
                    'id' => '2', 'email' => 'Marta@gmail.com', 'password' => Hash::make('marta123'),
                    'name' => 'Marta', 'last_name' => 'Grzelczyk', 'phone_number' => '987654321',
                    'address' => 'ul. 3 Maja 5', 'role' => 'user'
                ],
                [
                    'id' => '3', 'email' => 'Marek@gmail.com', 'password' => Hash::make('marek123'),
                    'name' => 'Marek', 'last_name' => 'Wojna', 'phone_number' => '321456789',
                    'address' => 'ul. Lwowska 3', 'role' => 'user'
                ],
                [
                    'id' => '4', 'email' => 'Ela@gmail.com', 'password' => Hash::make('ela123'),
                    'name' => 'Elzbieta', 'last_name' => 'Danek', 'phone_number' => '345678901',
                    'address' => 'ul. Krakowka 32', 'role' => 'user'
                ],
                [
                    'id' => '5', 'email' => 'Janusz@gmail.com', 'password' => Hash::make('janusz123'),
                    'name' => 'Janusz', 'last_name' => 'Tracz', 'phone_number' => '908765123',
                    'address' => 'Powstańców Warszawy 8', 'role' => 'user'
                ],
                [
                    'id' => '6', 'email' => 'Piotr@gmail.com', 'password' => Hash::make('piotr123'),
                    'name' => 'Piotr', 'last_name' => 'Magik', 'phone_number' => '876345938',
                    'address' => 'ul. Rejtana 23', 'role' => 'user'
                ],
                [
                    'id' => '7', 'email' => 'Marcin@gmail.com', 'password' => Hash::make('marcin123'),
                    'name' => 'Marcin', 'last_name' => 'Małysz', 'phone_number' => '194586738',
                    'address' => 'ul. Hetmańska 12', 'role' => 'user'
                ],
                [
                    'id' => '8', 'email' => 'Patryk@gmail.com', 'password' => Hash::make('patryk123'),
                    'name' => 'Patryk', 'last_name' => 'Olszewski', 'phone_number' => '758493201',
                    'address' => 'ul. 3 Maja 5', 'role' => 'user'
                ],
                [
                    'id' => '9', 'email' => 'Anna@gmail.com', 'password' => Hash::make('anna123'),
                    'name' => 'Anna', 'last_name' => 'Kowalska', 'phone_number' => '489321905',
                    'address' => 'ul. Cicha 8', 'role' => 'user'
                ],
                [
                    'id' => '10', 'email' => 'Woj@gmail.com', 'password' => Hash::make('woj123'),
                    'name' => 'Wojciech', 'last_name' => 'Król', 'phone_number' => '857238192',
                    'address' => 'ul. Słocińska 10', 'role' => 'user'
                ]
            ]
            );
    }
}
