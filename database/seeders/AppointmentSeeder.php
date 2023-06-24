<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Wykonaj seedy.
     */
    public function run(): void
    {
        Appointment::insert(
            [
                [
                    'id' => '1', 'id_product'=> 2,'id_user' => 2, 'date' => '2023-06-30', 'hour' => '12'
                ],
                [
                    'id' => '2', 'id_product'=> 3,'id_user' => 2, 'date' => '2023-04-30', 'hour' => '13'
                ],
                [
                    'id' => '3', 'id_product'=> 1,'id_user' => 2, 'date' => '2023-07-30', 'hour' => '14'
                ],
                [
                    'id' => '4', 'id_product'=> 4,'id_user' => 2, 'date' => '2023-02-20', 'hour' => '15'
                ],
                [
                    'id' => '5', 'id_product'=> 5,'id_user' => 2, 'date' => '2023-10-30', 'hour' => '16'
                ]
            ]
        );
    }
}
