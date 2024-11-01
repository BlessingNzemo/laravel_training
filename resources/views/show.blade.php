@extends('layouts.app')
@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">Back to the list</a>
    </div>

    <p class='mb-4 text-slate-700'>{{ $task->description }}</p>
    @if ($task->long_description)
        <p class='mb-4 text-slate-700'>{{ $task->long_description }}</p>
    @endif

    <p class ="mb-4 text-slate-500">Created {{ $task->created_at->diffForHumans() }} . Updated
        {{ $task->updated_at->diffForHumans() }}</p>
    <p>{{ $task->updated_at }}</p>

    <div class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif

        <div class="flex gap-2">

                

                <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>


            <div>
                <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method='POST'>

                    @csrf
                    @method('PUT')
                    <button class="btn" type='submit'>Mark as
                        {{ $task->completed ? 'Incompleted' : 'Completed' }}</button>

                </form>
            </div>
            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method='POST'>
                @csrf
                @method('DELETE')
                <button class="btn" type='submit'>Delete</button>

            </form>
        </div>
    </div>
@endsection
