@extends('layouts.admin')
@section('title')
Добавить запись @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
</div>

<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === old('category->id')) selected @endif>
                    {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status')==='DRAFT' ) selected @endif>DRAFT</option>
                <option @if(old('status')==='ACTIVE' ) selected @endif>ACTIVE</option>
                <option @if(old('status')==='BLOCKED' ) selected @endif>BLOCKED</option>
            </select>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection
<!-- @push('js')
    <script>alert("Welcome")</script>
@endpush -->