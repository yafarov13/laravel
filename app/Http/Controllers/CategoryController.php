<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return view('categories.index', ['categories' => $this->getCategory()]);
    }

    public function showNews($category)
    {
        $news = $this->getNews();
        $category = $this->getCategory($category);
       // dd($category[0]);

        return view('categories.showNews', [
            'newsList' => $news,
            'category' => $category[0]
        ]);
    }

     public function showNewsId($category, int $id)
    {
        $category = $this->getCategory($category);
        $news = $this->getNews($id);
        //dd($news[0]);
        return view('categories.showNewsId', [
            'news' => $news[0],
            'category' => $category[0]
        ]);
    } 
}
