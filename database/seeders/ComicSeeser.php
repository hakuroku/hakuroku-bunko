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
            'comic_title' => '1話:覚醒の時',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'ねこたいが'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '2話:装備盗られた',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'ねこたいが'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '3話:起死回生の不法侵入！',
            'series_id' => '1',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'ねこたいが'
        ]);

        DB::table('comics')->insert([
            'comic_title' => '1話:帝国作っちゃしました',
            'series_id' => '2',
            'comic_content' => 'Storage/app/private',
            'author_name' => 'ねこたいが'
        ]);

    }
}
