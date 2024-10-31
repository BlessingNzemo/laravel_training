@extends('layouts.app')
 @section('title', 'The List of Tasks')

 @section('content')
 <div>
    <a href="{{route('tasks.create')}}">Add Task</p>
 </div>
@isset($name)
    {{ $name }}
@endisset

<h1>List of tasks</h1>
{{-- @if (count($tasks)) --}}
@forelse ($tasks as $task)
    <div>
        <a href ="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>

@empty
    <div>There are no tasks</div>
@endforelse
@if ($tasks->count())
    <nav>
        {{ $tasks->links() }}
    </nav>
@endif
