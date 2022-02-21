@extends('layouts.main')

@section('title', "Редактировать задачу $task->name")

@section('content')
    <div class="container create-task-block">
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="create-task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название"
                       value="{{ $task->name }}">
            </div>
            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-select" id="category" name="categories[]" multiple
                        aria-label="multiple select example">
                    @foreach($categories as $category)
                        <option
                                {{ $task->categories->contains($category->id) ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="3"
                          name="description">{{ $task->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection