<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategory($category = null): array {
        $categoryList = ["all", "sport", "culture", "tech", "world"];

        if ($category) {
            if (in_array($category, $categoryList)) {
                return ['category' => $category];
            } else {
                return ['category' => 'all'];
            }
        }
        return $categoryList;
    }

    public function getNews(?int $id = null): array
    {
        $faker = Factory::create();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
        
        if ($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 150),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => "<strong>" . $faker->text(100) . "</strong>"
            ];
        }

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 150),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => "<strong>" . $faker->text(100) . "</strong>"
            ];
        }

        return $data;
    }
}
