<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            'title' => 'Laskar Pelangi',
            'director' => 'Riri Riza',
            'published_year' => 2008,
            'description' => 'Kisah perjuangan 10 anak di Belitung dalam mengejar mimpi dan pendidikan.',
        ]);

        Film::create([
            'title' => 'Pengabdi Setan',
            'director' => 'Joko Anwar',
            'published_year' => 2017,
            'description' => 'Keluarga yang mengalami kejadian supranatural teror setelah kematian sang ibu.',
        ]);

        Film::create([
            'title' => 'Agak Laen',
            'director' => 'Muhadkly Acho',
            'published_year' => 2024,
            'description' => 'Empat sekawan penjaga rumah hantu pasar malam yang mengalami kejadian tidak terduga.',
        ]);
    }
}
