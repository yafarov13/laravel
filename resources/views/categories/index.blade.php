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
        <?php foreach ($categories as $category => $categoryRus) : ?>
            <li><a href="<?= route('category.showNews', ['category' => $category]) ?>"><?= $categoryRus ?></a></li><br>
        <?php endforeach; ?>
    </ul>
</div>
@endsection
