<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getList(){
        //создание пагинатора где в условиях написаны ограничения на вывод данных, а в пагинтор передается кол-во записей на странице
        $news_list = \App\Models\News::query()->where([
            ['is_published', '=', 1],
            ['published_at', '<=', 'now']
        ])->orderBy('published_at', 'desc')->orderBy('id', 'desc')->paginate(5);

        return view('news_list', ['News_list' => $news_list]);
    }

    public function getDetails(string $slug){
        $news = \App\Models\News::query()->where([
            ['slug',  $slug],
            ['is_published', '=', 1],
            ['published_at', '<=', 'now']
        ])->first();

        if($news === null)
            abort(404);

        return view('news', ['News'=>$news]);
    }
}
