<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsTrue;

class CategoryController extends Controller
{
    public function index()
    {

        return view('categories.index', ['categories' => $this->getCategory()]);
    }

    public function showNews($category)
    {
        $news = $this->getNewsByCategory($category);
        $category = $this->getCategory($category);
        //dd($category);

        if ($category) {

            return view('categories.showNews', [
                'newsList' => $news,
                'category' => $category[0]
            ]);
        } else {
            return view('start');
        }
    }

    public function showNewsId($category, int $id)
    {
        $category = $this->getCategory($category);
        $news = $this->getNewsByCategory($category, $id);
        //dd($news[0]);
        return view('categories.showNewsId', [
            'news' => $news[0],
            'category' => $category[0]
        ]);
    }
}
