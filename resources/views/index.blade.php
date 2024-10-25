<i>Hello, I'm Blessing the name is</i>

@isset($name)
 {{$name}}
@endisset

<h1>List of tasks</h1>
{{--@if (count($tasks))--}}
    @forelse ($tasks as $task)
    <div>
        <a href ="{{route('tasks.show', ['task'=>$task->id])}}">{{$task->title}}</a>
    </div>

    @empty
    <div>There are no tasks</div>
    @endforelse
