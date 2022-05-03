@extends('layouts.admin')
@section('title')
Редактировать новость @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость - {{ $news->id }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
</div>

<div class="raw">
    @include('inc.messages')
    <form method="post" enctype="multipart/form-data" action={{ route('admin.news.update', ['news'=> $news] ) }}>
        @csrf
        @method('put')
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $news->category_id)) selected @endif>
                    {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ $news->title }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" name="image" id="image" value="{{ $news->image }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{ $news->author }}">
            @error('author') <strong style="color:red;">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if( $news->status ==='DRAFT' ) selected @endif>DRAFT</option>
                <option @if( $news->status ==='ACTIVE' ) selected @endif>ACTIVE</option>
                <option @if( $news->status ==='BLOCKED' ) selected @endif>BLOCKED</option>
            </select>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection
@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">
     ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush