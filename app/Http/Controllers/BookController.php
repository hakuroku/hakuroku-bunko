<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            [
                "title" => "吾輩は猫である",
                "author" => "夏目漱石",
                "publisher" => "岩波書店",
                "year" => 1905,
                "genre" => "小説"
            ],
            [
                "title" => "雪国",
                "author" => "川端康成",
                "publisher" => "新潮社",
                "year" => 1947,
                "genre" => "小説"
            ],
            [
                "title" => "ノルウェイの森",
                "author" => "村上春樹",
                "publisher" => "講談社",
                "year" => 1987,
                "genre" => "小説"
            ],
            [
                "title" => "こころ",
                "author" => "夏目漱石",
                "publisher" => "岩波書店",
                "year" => 1914,
                "genre" => "小説"
            ],
            [
                "title" => "人間失格",
                "author" => "太宰治",
                "publisher" => "新潮社",
                "year" => 1948,
                "genre" => "小説"
            ]
        ];

        // 単に配列をreturnする
        return $books;
    }
}
