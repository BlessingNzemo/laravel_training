@extends('layouts.app')
 @section('title', 'The List of Tasks')

 @section('content')


 <nav class="mb-4">
    <a href="{{route('tasks.create')}}" class="font-mrdium text-gray-700 underline decoration-pink-500">Add Task</a>
    </nav>
@isset($name)
    {{ $name }}
@endisset

<h1>List of tasks</h1>
{{-- @if (count($tasks)) --}}
@forelse ($tasks as $task)
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
           @class(['font-bold', 'line-through' => $task->completed])>
            {{ $task->title }}
        </a>
    </div>

@empty
    <div>There are no tasks</div>

@endforelse
@if ($tasks->count())
    <nav class="mb-4">
        {{ $tasks->links() }}
    </nav>
@endif
