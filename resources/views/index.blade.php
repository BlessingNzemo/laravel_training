<i>Hello
    Mum
    I'm Blessing
    The
    name is</i>

@isset($name)
Mon nom est: {{$name}}
@endisset

<h1>List of tasks</h1>
{{--@if (count($tasks))--}}
    @forelse ($tasks as $task)
    <div>
        <a href ="{{route('tasks.show', ['id'=>$task->id])}}">{{$task->title}}</a>
    </div>

    @empty
    <div>There are no tasks</div>
    @endforelse
