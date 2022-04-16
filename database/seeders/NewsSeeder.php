<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array 
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'category_id' =>1,
                'title' => $faker->jobTitle(),
                'status' => 'ACTIVE',
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 150),
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }

}
