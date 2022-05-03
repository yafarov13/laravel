<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData(): array 
    {
        $urls = [
            'https://news.yandex.ru/auto.rss', 
            'https://news.yandex.ru/auto_racing.rss', 
            'https://news.yandex.ru/army.rss', 
            'https://news.yandex.ru/gadgets.rss', 
            'https://news.yandex.ru/index.rss', 
            'https://news.yandex.ru/martial_arts.rss', 
            'https://news.yandex.ru/communal.rss', 
            'https://news.yandex.ru/health.rss', 
            'https://news.yandex.ru/games.rss', 
            'https://news.yandex.ru/internet.rss', 
            'https://news.yandex.ru/cyber_sport.rss', 
            'https://news.yandex.ru/movies.rss', 
            'https://news.yandex.ru/cosmos.rss', 
            'https://news.yandex.ru/culture.rss',  
            'https://news.yandex.ru/championsleague.rss', 'https://news.yandex.ru/music.rss', 
            'https://news.yandex.ru/nhl.rss', 
        ];
        $data = [];
        foreach($urls as $url) {
            $data[] = [
                
                'url' => $url,
            ];
        }

        return $data;
    }
}
