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
                            <a href="{{ route('admin.news.create') }}"  class="btn btn-sm btn-outline-secondary">Добавить новость</a>
                            
                        </div>
                       
                    </div>
                </div>

@endsection