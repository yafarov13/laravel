@extends('layouts.main')
@section('title')
Страница озывов @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Оставьте отзыв</h1>
</div>

<div class="raw">
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
    @endif
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" name="userName" id="userName" value="{{ old('userName') }}">
        </div>
        <div class="form-group">
            <label for="feedback">Отзыв</label>
            <textarea class="form-control" name="feedback" id="feedback">{!! old('feedback') !!}</textarea>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>

@endsection