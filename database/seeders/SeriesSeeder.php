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
            'series_title' => 'オカムラクエスト',
            'series_caption' => 'オカムラは旅に出た。人類の大敵、"魔王"を倒すために…。'
        ]);

        DB::table('series')->insert([
            'series_title' => 'オカムラファンタジー',
            'series_caption' => 'あまたの種族が反映、それぞれの文明を築き対立する混沌とした世界に、岡村は…皇帝の地位についた。'
        ]);

        DB::table('series')->insert([
            'series_title' => '走れ加藤',
            'series_caption' => '加藤は激怒した。'
        ]);
    }
}
