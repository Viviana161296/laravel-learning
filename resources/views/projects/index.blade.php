@extends('layout')

@section('content')
    <ul>
        <h1>Projects</h1>
        @foreach ($projects as $project)

            <li>
                <a href="/projects/{{$project->id}}">
                    {{$project ->Title}}
                </a>
            </li>
        @endforeach
    </ul>

    <p>
        <a href="/projects/create">Create</a>
    </p>


@endsection
