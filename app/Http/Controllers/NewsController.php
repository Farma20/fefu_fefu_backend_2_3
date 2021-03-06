<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function getList(){
        //создание пагинатора где в условиях написаны ограничения на вывод данных, а в пагинтор передается кол-во записей на странице
        $news_list = News::query()
            ->where([
                ['is_published', true],
                ['published_at', '<=', 'NOW']
            ])
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(5);

        return view('news_list', ['news_list' => $news_list]);
    }

    public function getDetails(string $slug){
        $news = News::query()
            ->where([
                ['slug',  $slug],
                ['is_published', true],
                ['published_at', '<=', 'NOW']
            ])
            ->first();

        if($news === null)
            abort(404);

        return view('news', ['news' => $news]);
    }
}
