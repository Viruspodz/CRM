<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DealRepresentative;

class DealRepresentativesTableSeeder extends Seeder
{
    public function run()
    {
        $representatives = [
            ['name' => 'Mark Dela Cruz'],
            ['name' => 'Johna Marie Legaspi'],
            ['name' => 'Brian Mendoza'],
            ['name' => 'Miguel Young'],
            ['name' => 'Cindy Rubio'],
        ];

        foreach ($representatives as $representative) {
            DealRepresentative::create($representative);
        }
    }
}
