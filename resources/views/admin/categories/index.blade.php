@extends('layouts.admin')
@section('title')
Список категорий @parent
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
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>

        </div>

    </div>
</div>

<div class="table-responsive">
    @include('inc.messages')
    <table class="table table-boardered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Количество новостей</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->news_count }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>
                    &nbsp;
                    <a href="javascript:;" class="delete" id="{{ $category->id }}" style="color:red;">Удл.</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Записей нет
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $categories->links() }}
</div>

<!-- <x-alert type="danger" message="Сообщение об ошибке" />
<x-alert type="success" message="Сообщение об успехе" />
<x-alert type="info" message="Информационное сообщение" /> -->
@endsection


@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const item = document.querySelectorAll(".delete");
            item.forEach(function (el, index) {
                el.addEventListener("click", function () {
                    const id = this.getAttribute("id");
                    if (confirm(`Подтвердите удаление категории с #ID ${id} ?`)) {
                        //send id on backend
                        send(`/admin/categories/${id}`).then(() => {
                            alert("Категория была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush