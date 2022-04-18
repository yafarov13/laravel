@extends('layouts.admin')
@section('title')
Добавить категорию @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
</div>

<div class="raw">
    @include('inc.messages')
    <form method="post" action = {{ route('admin.categories.store') }}>
    @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection
<!-- @push('js')
    <script>alert("Welcome")</script>
@endpush -->