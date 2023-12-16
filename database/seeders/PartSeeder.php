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
                ['rank'     =>  2,      'name'    =>       'النور',        'juz'   =>      18,     'start' =>      54,     'end'   =>  56,     ],
                ['rank'     =>  2,      'name'    =>       'النور',        'juz'   =>      18,     'start' =>      57,     'end'   =>  58,     ],
                ['rank'     =>  2,      'name'    =>       'النور',        'juz'   =>      18,     'start' =>      59,     'end'   =>  60,     ],
                ['rank'     =>  2,      'name'    =>       'النور',        'juz'   =>      18,     'start' =>      61,     'end'   =>  61,     ],
                ['rank'     =>  2,      'name'    =>       'النور',        'juz'   =>      18,     'start' =>      62,     'end'   =>  64,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      18,     'start' =>      1,      'end'   =>  6,      ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      18,     'start' =>      7,      'end'   =>  11,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      18,     'start' =>      12,     'end'   =>  17,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      18,     'start' =>      18,     'end'   =>  20,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      21,     'end'   =>  26,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      27,     'end'   =>  32,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      33,     'end'   =>  38,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      39,     'end'   =>  43,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      44,     'end'   =>  49,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      50,     'end'   =>  55,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      56,     'end'   =>  60,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      61,     'end'   =>  67,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      68,     'end'   =>  71,     ],
                ['rank'     =>  3,      'name'    =>       'الفرقان',      'juz'   =>      19,     'start' =>      72,     'end'   =>  77,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      1,      'end'   =>  10,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      11,     'end'   =>  19,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      20,     'end'   =>  28,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      29,     'end'   =>  39,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      40,     'end'   =>  48,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      49,     'end'   =>  60,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      61,     'end'   =>  71,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      72,     'end'   =>  83,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      84,     'end'   =>  98,     ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      99,     'end'   =>  111,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      112,    'end'   =>  123,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      124,    'end'   =>  136,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      137,    'end'   =>  149,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      150,    'end'   =>  159,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      160,    'end'   =>  172,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      173,    'end'   =>  183,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      184,    'end'   =>  193,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      194,    'end'   =>  206,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      207,    'end'   =>  218,    ],
                ['rank'     =>  4,      'name'    =>       'الشعراء',      'juz'   =>      19,     'start' =>      219,    'end'   =>  227,    ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      1,      'end'   =>  7,      ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      8,      'end'   =>  13,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      14,     'end'   =>  17,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      18,     'end'   =>  22,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      23,     'end'   =>  28,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      29,     'end'   =>  35,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      36,     'end'   =>  40,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      41,     'end'   =>  44,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      45,     'end'   =>  49,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      19,     'start' =>      50,     'end'   =>  55,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      56,     'end'   =>  60,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      61,     'end'   =>  63,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      64,     'end'   =>  69,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      70,     'end'   =>  76,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      77,     'end'   =>  83,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      84,     'end'   =>  88,     ],
                ['rank'     =>  5,      'name'    =>       'النمل',        'juz'   =>      20,     'start' =>      89,     'end'   =>  93,     ],
                ['rank'     =>  6,      'name'    =>       'القصص',        'juz'   =>      20,     'start' =>      1,      'end'   =>  5,      ],
                ['rank'     =>  6,      'name'    =>       'القصص',        'juz'   =>      20,     'start' =>      6,      'end'   =>  9,      ],
                ['rank'     =>  6,      'name'    =>       'القصص',        'juz'   =>      20,     'start' =>      10,     'end'   =>  13,     ],
            )->create();
    }
}
