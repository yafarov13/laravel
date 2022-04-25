@extends('layouts.admin')
@section('title')
Редактировать иформацию о пользователе @parent
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать иформацию о пользователе - {{ $user->id }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
</div>

<div class="raw">
    @include('inc.messages')
    <form method="post" action={{ route('admin.users.update', ['user'=> $user] ) }}>
        @csrf
        @method('put')
        
        <div class="form-group">
            <label for="name">Пользователь</label>
            <input type="name" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{ $user->name }}">
            @error('name') <strong style="color:red;">{{ $message }}</strong>
            @enderror
        </div>  
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" id="email" value="{{ $user->email }}">
            @error('email') <strong style="color:red;">{{ $message }}</strong>
            @enderror
        </div>            
        <div class="form-group">
            <label for="is_admin">Статус администратора</label>
            <select class="form-control" name="is_admin" id="is_admin">
                <option value="1" @if( $user->is_admin === true ) selected @endif>Администратор</option>
                <option value="0" @if( $user->is_admin === false ) selected @endif>Пользователь</option>
            </select>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection
