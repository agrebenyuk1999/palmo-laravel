@extends('layouts.main')

@section('title', 'Создать задачу')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="test">
        <button type="submit">Send</button>
    </form>
@endsection