<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        //dd(Storage::disk('public')->url($news[0]->image));
        return view('news.index', [
            'newsList' => News::paginate(10)
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}
