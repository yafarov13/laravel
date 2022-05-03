<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParser;
use App\Models\Source;
use Illuminate\Http\Request;



class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = Source::get();
        
        foreach ($urls as $url) {
            $link = $url->url;
            dispatch(new NewsParser($link));
        }

        return response("Парсинг стартовал");
    }
}
