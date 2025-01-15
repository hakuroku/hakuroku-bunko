<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicSeeser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comics')->insert([
            'comic_title' => '1話:畳は美味しい。',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'わい'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '2話:まさかの胃腸炎',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'わい'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '3話:天井のシミを数える',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'わい'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '1話:ぶっちゃけ肉が食いたい',
            'series_id' => '2',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'わい'
        ]);

    }
}
