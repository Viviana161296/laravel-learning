@extends('layout')

@section('content')
    <h3 class="title"><strong>{{$project->Title}}</strong></h3>
    <h5 class="description">{{$project->Description}}</h5>

    <p>
        <a class="btn btn-primary" href="/projects/{{$project->id}}/edit" role="button">Edit</a>
    </p>

@endsection
