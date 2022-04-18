@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Категории новостей</h1>
    </div>
</div>
@endsection
@section('content')
<div class="category">
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a class="navbar-brand new-edited-text" href="{{ route('category.showNews', ['category' => $category]) }}">{{ $category->title }}</a></li><br>
        <?php endforeach; ?>
    </ul>
</div>
@endsection
