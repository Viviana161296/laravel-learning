@extends('layout')

@section('content')
    <h3 class="title"><strong>{{$project->Title}}</strong></h3>
    <div class="content">{{$project->Description}}</div>
    <p>
        <a href="/projects/{{$project->id}}/edit" role="button">Edit</a>
    </p>
    <br>

    @if ($project->tasks->count())
    <div class="box">
        @foreach ($project->tasks as $task)
            <div>
            <form method="POST" action="/completed-tasks/{{$task->id}}">
                @if ($task->completed)
                    @method('Delete')
                @endif
                @csrf

                <label class="checkbox {{$task->completed ? 'is-complete': ''}}" for="completed">
                        <input class="checkbox" type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed? 'checked': ''}}>
                        {{$task->description}}
                    </label>
                </form>
            </div>
        @endforeach
    </div>
    @endif

    {{--add a new task form--}}
<form method="POST" action="/projects/{{$project->id}}/tasks" class="box">
    @csrf
        <div class="field">
            <label class="label" for="description">New Task</label>
            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include('errors')
    </form>

@endsection
