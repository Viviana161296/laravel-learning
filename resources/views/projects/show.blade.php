@extends('layout')

@section('content')
    <h1 class="title">{{$project->Title}}</h1>
    <h1 class="description">{{$project->Description}}</h1>

    <p>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </p>

@endsection
