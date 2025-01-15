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
            'series_title' => '畳寿司',
            'series_caption' => '美味しいお寿司で畳を食べませんか？'
        ]);

        DB::table('series')->insert([
            'series_title' => 'サラダ独立記念日',
            'series_caption' => 'サラダが主食で何が悪い。米が主菜で何の問題があるのか。'
        ]);

        DB::table('series')->insert([
            'series_title' => '順当裁判',
            'series_caption' => 'その裁判は特に何も起こらず、無事終えました。'
        ]);
    }
}
