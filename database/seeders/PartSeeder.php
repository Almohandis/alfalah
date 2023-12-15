<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // start page. 357 to p.386
        Part::factory()
            ->count(59)
            ->sequence(

                /**
                 *  // end of sura has been added
                 */



                ['sura'     =>  'النور',        'juz' =>    18,     'start' => 54, 'end' => 56,],
                ['sura'     =>  'النور',        'juz' =>    18,     'start' => 57, 'end' => 58,],
                ['sura'     =>  'النور',        'juz' =>    18,     'start' => 59, 'end' => 60,],
                ['sura'     =>  'النور',        'juz' =>    18,     'start' => 61, 'end' => 61,],
                ['sura'     =>  'النور',        'juz' =>    18,     'start' => 62, 'end' => 64,],
                ['sura'     =>  'الفرقان',      'juz' =>    18,     'start' => 1, 'end' => 6,],
                ['sura'     =>  'الفرقان',      'juz' =>    18,     'start' => 7, 'end' => 11,],
                ['sura'     =>  'الفرقان',      'juz' =>    18,     'start' => 12, 'end' => 17,],
                ['sura'     =>  'الفرقان',      'juz' =>    18,     'start' => 18, 'end' => 20,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 21, 'end' => 26,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 27, 'end' => 32,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 33, 'end' => 38,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 39, 'end' => 43,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 44, 'end' => 49,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 50, 'end' => 55,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 56, 'end' => 60,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 61, 'end' => 67,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 68, 'end' => 71,],
                ['sura'     =>  'الفرقان',      'juz' =>    19,     'start' => 72, 'end' => 77,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 1, 'end' => 10,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 11, 'end' => 19,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 20, 'end' => 28,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 29, 'end' => 39,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 40, 'end' => 48,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 49, 'end' => 60,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 61, 'end' => 71,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 72, 'end' => 83,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 84, 'end' => 98,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 99, 'end' => 111,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 112, 'end' => 123,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 124, 'end' => 136,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 137, 'end' => 149,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 150, 'end' => 159,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 160, 'end' => 172,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 173, 'end' => 183,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 184, 'end' => 193,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 194, 'end' => 206,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 207, 'end' => 218,],
                ['sura'     =>  'الشعراء',      'juz' =>    19,     'start' => 219, 'end' => 227,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 1, 'end' => 7,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 8, 'end' => 13,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 14, 'end' => 17,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 18, 'end' => 22,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 23, 'end' => 28,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 29, 'end' => 35,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 36, 'end' => 40,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 41, 'end' => 44,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 45, 'end' => 49,],
                ['sura'     =>  'النمل',        'juz' =>    19,     'start' => 50, 'end' => 55,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 56, 'end' => 60,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 61, 'end' => 63,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 64, 'end' => 69,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 70, 'end' => 76,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 77, 'end' => 83,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 84, 'end' => 88,],
                ['sura'     =>  'النمل',        'juz' =>    20,     'start' => 89, 'end' => 93,],
                ['sura'     =>  'القصص',        'juz' =>    20,     'start' => 1, 'end' => 5,],
                ['sura'     =>  'القصص',        'juz' =>    20,     'start' => 6, 'end' => 9,],
                ['sura'     =>  'القصص',        'juz' =>    20,     'start' => 10, 'end' => 13,],
            )->create();
    }
}
