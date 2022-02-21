@extends('layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <img src="" alt="">
    <div class="container create-task-block">
        <form method="POST" action="{{ route('tasks.store') }}" class="create-task-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       placeholder="Название">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-select" id="category" name="categories[]" multiple aria-label="multiple select example">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Изображение</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection