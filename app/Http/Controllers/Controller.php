<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getCategory($category = null): array
    {
        //     $categoryList = ["all" => "Все новости", "sport" => "Спорт", "culture" => "Культура", "tech" => "Техника" , "world" => "В мире"];
        $categories = app(Category::class)->getCategories();
        //dd($categories);
        $categoryList = [];
        foreach ($categories as $oneCategory) {
            $categoryList[str_replace(" ", "", $oneCategory->title)] = $oneCategory->title;
        }

        if ($category) {
            //dd($categoryList, $categoryOne);
            if (array_key_exists($category, $categoryList)) {
                //  dd($categoryList[$category]);
                $category = app(Category::class)->getCategoryByTitle($categoryList[$category]);

                //dd($category[0]);  
                return $category;
            }
        }


        /*   if ($category) {
           if (array_key_exists($category, $categoryList)) {
                return ['category' => $category];
            } else {
               return ['category' => 'all'];
            }
        }  */
        return $categoryList;
    }

    public function getNews(int $id = null): array
    {
        $news = app(News::class)->getNews();

        if ($id) {
            $newsId = app(News::class)->getNewsById($id);
            return $newsId;
        }
  
        return $news;    
    }
}
