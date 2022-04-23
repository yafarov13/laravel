<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd($news->getNews());
        return view('admin.news.index', ['newsList' => News::with('category')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create($request->only(['category_id', 'title', 'status', 'author', 'image', 'description']));

        if($news) {
            return redirect()->route('admin.news.index')
            ->with('success', 'Новость успешно добавлена');
        } else {
            return back()->with('error', 'Не удалось добавить новость');
        }

        /* return response()->json(
            $request->only('title', 'author', 'description'),
            201
        ); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::select("id", "title")->get()
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        //dd($request->validated());

        $status = $news->fill($request->validated())->save();

        if ($status) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись обновлена');
        } else {
            return back()->with('error', 'Не удалось обновить запись');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $id)
    {
        //
    }
}
