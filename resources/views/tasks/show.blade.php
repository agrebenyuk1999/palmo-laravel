@extends('layouts.main')

@section('title', 'Список задач')

@section('content')
    <h1 class="title">Задача - {{ $task->name }}</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $task->category->name }}</h6>
                        <p class="card-text">{{ $task->description }}</p>
                        <a href="#" class="card-link">Редактировать</a>
                        <a href="#" class="card-link">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection