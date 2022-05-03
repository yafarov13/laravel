<?php

namespace App\Services;

use App\Models\News;
use App\Contracts\Parser as Contract;
use App\Models\Category;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

use function PHPUnit\Framework\isNull;

class ParserService implements Contract
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function saveNews(): void
    {
        $xml = XmlParser::load($this->url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

        $newsList = $data['news'];

        $categoryList = Category::All()->toArray();        

        $category_id = null;

         foreach ($categoryList as $category) {

            if ($category['title'] == $data['title']) {
                $category_id = $category['id'];
            }
        }

        if (isNull($category_id)) {
            $category_id = Category::insertGetId([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);
            $categoryList[] = ['title' => $data['title'], 'category_id' => $category_id];
        } 

        //dd($category_id, $categoryList);

        foreach ($newsList as $news) {
            News::insert([
                'title' => $news['title'],
                'category_id' => $category_id,
                'description' => $news['description'],
                'image' => $data['image'],
                'author' => $news['link'],
                'status' => 'ACTIVE',
            ]);
        }
    }

    /* $json = json_encode($data);
        $e = explode("/", $this->url);
        $fileName = end($e);
        
        Storage::append('news/' . $fileName, $json); */
}

