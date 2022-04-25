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
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        

    </div>
</div>


<div class="table-responsive">
    @include('inc.messages')
    <table width="100%" class="table table-boardered">
        <thead>
            <tr>
                <th>ID пользователя</th>
                <th>Имя пользователя</th>
                <th>Пароль</th>
                <th>Email</th>
                <th>Статус администратора</th>
                <th>Дата редактирования</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>@if($user->updated_at) {{ $user->updated_at->format('d-m-Y H:i') }} @endif</td>
                <td>
                    <a href="{{ route('admin.users.edit', ['user' => $user ]) }}">Ред.</a>
                    <a href="javascript:;" class="delete" id="{{ $user->id }}" style="color:red;">Удл.</a>
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

@push('js')
<script>
    'use strict';
    document.addEventListener("DOMContentLoaded", () => {
        const item = document.querySelectorAll(".delete");
        item.forEach(function(el, index) {
            el.addEventListener("click", function() {
                const id = this.getAttribute("id");
                if (confirm(`Подтвердите удаление Пользователя с #ID ${id} ?`)) {

                    send(`/admin/users/${id}`).then(() => {
                        alert("Пользователь удален");
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