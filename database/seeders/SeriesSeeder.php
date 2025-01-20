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
            'top_main_img' => null,
            'top_link_img' => null,
             
        ]);

        DB::table('series')->insert([
            'series_title' => '妖精のいる街',
            'series_caption' => 'かつて妖精が棲むと言われた緑豊かなその町で、今日も誰かの願いが消える。'
        ]);

        DB::table('series')->insert([
            'series_title' => 'さいのまほろば',
            'series_caption' => '誰もが皆、己の理想を追求する権利を持っている。それは、超能力者達も同様に…。'
        ]);
    }
}
