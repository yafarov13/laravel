@extends('layouts.main')
@section('title')
Получение выгрузки данных из источника @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Получение выгрузки данных из источника. Заполните форму</h1>
</div>

<div class="raw">
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
    @endif
    <form method="post" action="{{ route('agregator.store') }}">
        @csrf
        <div class="form-group">
            <label for="client">Заказчик</label>
            <input type="text" class="form-control" name="client" id="client" value="{{ old('client') }}">
        </div>
        <div class="form-group">
            <label for="phone">Введите номер телефона (формат десять цифр без +7: 1234567890)</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" pattern="[0-9]{10}">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="info">Что хотели бы получить?</label>
            <textarea class="form-control" name="info" id="info">{!! old('info') !!}</textarea>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>

@endsection