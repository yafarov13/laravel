<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function store(CreateRequest $request)
    {
        $news = News::create($request->validated());

        if($news) {
            return redirect()->route('admin.news.index')
            ->with('success', __('messages.admin.news.create.success'));
        } else {
            return back()->with('error', __('messages.admin.news.create.fail'));
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
                ->with('success', trans('messages.admin.news.update.success'));
        } else {
            return back()->with('error', __('messages.admin.news.update.fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news): JsonResponse
    {
        try{
			 $news->delete();

			 return response()->json(['status' => 'ok']);
		}catch (Exception $e) {
			Log::error("News wasn't delete");
			return response()->json(['status' => 'error'], 400);
		}
    }
}
