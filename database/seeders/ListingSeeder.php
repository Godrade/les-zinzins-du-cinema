<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        Listing::truncate();

        $lists = [
            [
                'title' => 'À voir',
                'description' => "Nous n'avons pas encore regardé ce film",
                'color' => '#009688',
            ],
            [
                'title' => 'Regardé(s)',
                'description' => "Nous avons regardé ce film",
                'color' => '#7d9c11',
                'isSelectable' => false,
            ],
            [
                "title" => "Blacklisté(s)",
                "description" => "Nous ne voulons pas regarder ce film",
                "color" => "#cc2a36"
            ]
        ];

        foreach ($lists as $list) {
            Listing::create($list);
        }
    }
}
