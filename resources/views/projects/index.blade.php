@extends('layout')

@section('content')
<h1>Projects</h1>
    <ul>
        @foreach ($projects as $project)

            <li>
                <a href="/projects/{{$project->id}}">
                    {{$project ->Title}}
                </a>
            </li>
        @endforeach
    </ul>

    <p>
            <a class="btn btn-primary" href="/projects/create" role="button">create</a>
   </p>


@endsection
