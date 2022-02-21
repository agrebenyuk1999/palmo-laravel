@extends('layouts.main')

@section('title', 'Список задач')

@section('content')
    <h1 class="title">Задача - {{ $task->name }}</h1>
    <img src="{{ asset("storage/$task->image") }}" alt="blabla">
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                        @foreach($task->categories as $taskCategory)
                            <h6 class="card-subtitle mb-2 text-muted">{{$taskCategory->name }}</h6>
                        @endforeach
                        <p class="card-text">{{ $task->description }}</p>
                        <a href="{{ route("tasks.edit", ['task' => $task->id]) }}"
                           class="card-link">Редактировать</a>
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection