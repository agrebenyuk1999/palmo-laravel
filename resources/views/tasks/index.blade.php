@extends('layouts.main')

@section('title', 'Список задач')

@section('content')
    <h1 class="title">Список задач</h1>
    <div class="container">
        <div class="row row-cols-3">
            @foreach($tasks as $task)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $task->category->name }}</h6>
                            <p class="card-text">{{ $task->description }}</p>
                            <a href="{{ route("tasks.edit", ['task' => $task->id]) }}"
                               class="card-link">Редактировать</a>
                            <a href="{{ route("tasks.show", ['task' => $task->id]) }}" class="card-link">Перейти</a>

                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection