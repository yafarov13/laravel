@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список новостей категории: {{$category->title }}</h1>
    </div>
</div>
@endsection
@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <!-- @include('inc.data', ['name' => 'Ildar']) -->
    @forelse ($newsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            <img src=" {{$news->image}} ">
            <div class="card-body">
                <strong><a href="{{ route('category.showNewsId', ['category' => str_replace(" ", "", $category->title), 'id' => $news->id]) }}">
                        {{$news->title}}
                    </a></strong>
                <p class="card-text">{!! $news->description !!}</p>
                <p>Категория новости: {{$category->title }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted"><em>{{ $news->status }}</em></small>
                    <small class="text-muted"><em>{{ $news->author }}</em></small>
                    <small class="text-muted"><em>{{ $loop->index + 1 }}</em></small>                    
                 
                </div>
            </div>
        </div>
    </div>

    @empty
    <h2>Новостей нет</h2>
    @endforelse
</div>
@endsection