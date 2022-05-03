@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$news['title']}}</h1>
    </div>
</div>
@endsection
@section('content')
<div class="news">
    <img src="@if (str_starts_with($news->image, 'http')) {{ $news->image }} @else {{ Storage::url($news->image) }} @endif" style="width: 700px">
    <br>
    <p>Статус: <em>{{$news['status']}}</em></p>
    <p>Автор: <em>{{$news['author']}}</em></p>
    <p>{!! $news['description'] !!}</p>
</div>
@endsection