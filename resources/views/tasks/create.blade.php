@extends('layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="name">
        <input type="text" name="description">
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Send</button>
    </form>
@endsection