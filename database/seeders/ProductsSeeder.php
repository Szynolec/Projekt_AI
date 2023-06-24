<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Wykonaj seedy.
     */
    public function run(): void
    {
        Products::insert(
            [
                [
                    'id' => '1', 'type'=>'Fotografia Rodzinna','img' => 'obr1.jpg', 'des' => 'Fotografia rodzinna to fotografia, której głównym tematem jest więź pomiędzy najbliższymi osobami. Tym właśnie ten rodzaj fotografii odróżnia się od innych zdjęć grupowych oraz portretów.',
                    'cost' => 30
                ],
                [
                    'id' => '2', 'type'=>'Fotografia Do Dokumentów', 'img' => 'obr2.jpg', 'des' => 'Fotografia do dokumentów jest to uniwersalyn typ zdjęcia który można wykorzystac do wszelkiego rodzaju dokumentów.',
                    'cost' => 25
                ],
                [
                    'id' => '3', 'type'=>'Fotografia Portretowa', 'img' => 'obr3.jpg', 'des' => 'Fotografia portretowa lub portretowa to rodzaj fotografii mający na celu uchwycenie osobowości osoby lub grupy osób przy użyciu skutecznego oświetlenia, tła',
                    'cost' => 30
                ],
                [
                    'id' => '4', 'type'=>'Fotografia Modowa', 'img' => 'obr4.jpg', 'des' => 'Jest to połączenie fotografii produktu, portretowej, a nawet artystycznej. Fotografia mody to sposób, w jaki fotograf przy użyciu własnego spojrzenia i osobistej perspektywy wyróżnia, dobiera lub przekonuje w branży mody.',
                    'cost' => 50
                ],
                [
                    'id' => '5', 'type'=>'Fotografia Czarno Biała', 'img' => 'obr5.jpg', 'des' => 'W fotografii czarno-białej działamy nie kolorem, lecz plamą szarości, jasnością. Dlatego jeszcze większe niż zazwyczaj znaczenie zyskuje tonalność, kontrast, faktura, linia.',
                    'cost' => 25
                ]
            ]
        );
    }
}
