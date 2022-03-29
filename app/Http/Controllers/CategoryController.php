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

        return view('categories.showNews', [
            'newsList' => $news,
            'category' => $category
        ]);
    }

    public function showNewsId($category, int $id)
    {
        $category = $this->getCategory($category);

        return view('categories.showNewsId', [
            'news' => $this->getNews($id),
            'category' => $category
        ]);
    }
}
