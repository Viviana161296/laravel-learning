@extends('layout')

@section('content')
    <h3 class="title"><strong>{{$project->Title}}</strong></h3>
    <div class="content">{{$project->Description}}</div>
    <p>
        <a href="/projects/{{$project->id}}/edit" role="button">Edit</a>
    </p>
    <br>

    @if ($project->tasks->count())
    <div>
        @foreach ($project->tasks as $task)
            <div>
            <form method="POST" action="/tasks/{{$task->id}}">
                @method('PATCH')
                @csrf

                <label class="checkbox {{$task->completed ? 'is-complete': ''}}" for="completed">
                        <input class="form-check-input" type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed? 'checked': ''}}>
                        {{$task->description}}
                    </label>
                </form>
            </div>
        @endforeach
    </div>
    @endif


@endsection
