<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsTrue;

class CategoryController extends Controller
{
    public function index()
    {

        return view('categories.index', ['categories' => Category::all()]);
    }

    public function showNews(Category $category)
    {
      //dd(News::where('category_id', '=', $category->id)->get());
            return view('categories.showNews', [
                'category' => $category,
                'newsList' => News::where([
                    ['category_id', '=', $category->id],
                    ['status', '=', 'ACTIVE']
                ])->get()
            ]);
    }

    public function showNewsId(Category $category, News $news)
    {
        //dd($news);
        return view('categories.showNewsId', [
            'news' => $news,
            'category' => $category
        ]);
    }
}
