@extends('layouts.app')
@section('title', 'Create Task')

@section('styles')

    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>


@endsection

@section('content')
    {{ $errors }}
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class='error-message'>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" row="5">{{ $task->description }}</textarea>
            @error('description')
                <p class='error-message'>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" row="5">{{ $task->long_description }}</textarea>

            @error('long_description')
                <p class='error-message'>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection
