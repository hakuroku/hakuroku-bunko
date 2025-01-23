<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series')->insert([
            'series_title' => '読み切り',
            'series_caption' => '真道生の読み切り短編集。',
            'top_icon_role' => true,
            'top_main_img' => null,
            'top_link_img' => null,
             
        ]);

        DB::table('series')->insert([
            'series_title' => 'シリーズ1',
            'series_caption' => '廃墟です',
            'top_icon_role' => true,
            'top_main_img' => null,
            'top_link_img' => null,
        ]);

        DB::table('series')->insert([
            'series_title' => 'シリーズ2',
            'series_caption' => '廃墟2です。',
            'top_icon_role' => false,
            'top_main_img' => null,
            'top_link_img' => null,
        ]);

        DB::table('series')->insert([
            'series_title' => 'シリーズ3',
            'series_caption' => '廃墟3です。',
            'top_icon_role' => true,
            'top_main_img' => null,
            'top_link_img' => null,
        ]);

        DB::table('series')->insert([
            'series_title' => 'シリーズ4',
            'series_caption' => '廃墟4です。',
            'top_icon_role' => true,
            'top_main_img' => null,
            'top_link_img' => null,
        ]);

        DB::table('series')->insert([
            'series_title' => 'シリーズ5',
            'series_caption' => '廃墟4です。',
            'top_icon_role' => true,
            'top_main_img' => null,
            'top_link_img' => null,
        ]);
    }
}
