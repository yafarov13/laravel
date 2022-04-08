@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Сайт новостей</h1>
    </div>
</div>
@endsection
@section('content')
<h2>Добрый день. Данный ресурс позволяет посмотреть новости по категориям. Перейдите в <a href="<?= route('category') ?>">КАТЕГОРИИ</a>, чтобы найти интересные для себя новости<h2>
@endsection

