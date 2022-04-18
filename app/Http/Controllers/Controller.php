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

   

    public function getNews(int $id = null): array
    {
        if ($id) {
            $newsId = app(News::class)->getNewsById($id);
            return $newsId;
        }

        $news = app(News::class)->getNews();
  
        return $news;    
    }


}
