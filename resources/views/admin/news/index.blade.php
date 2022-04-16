@extends('layouts.admin')
@section('title')
Список новостей @parent
@endsection
@section('content')

<div class="chartjs-size-monitor">
    <div class="chartjs-size-monitor-expand">
        <div class=""></div>
    </div>
    <div class="chartjs-size-monitor-shrink">
        <div class=""></div>
    </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>

        </div>

    </div>
</div>


<div class="table-responsive">
    <table width="100%" class="table table-boardered">
        <thead>
            <tr>
                <th >ID категории</th>
                <th>Название категории</th>
                <th>ID новости</th>
                <th>Название новости</th>
                <th>Автор новости</th>
               <!--  <th>Изображение</th>
                <th>Описание</th> -->
                <th>Статус</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newsList as $news)
            <tr>
                <td>{{ $news->category_id }}</td>
                <td>{{ $news->categoryTitle }}</td>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->author }}</td>
               <!--<td>{{ $news->image }}</td>
                <td>{{ $news->description }}</td> -->
                <td>{{ $news->status }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a>
                    <a href="javascript:;" style="color:red;">Удл.</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Записей нет
            </tr>
            @endforelse 
        </tbody>
    </table>
</div>
@endsection