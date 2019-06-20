@extends('layout')
@section('content')
<h1 class="title">Edit project</h1>
<form method="POST" action="/projects/{{$project->id}}" style="margin-bottom:lem;">
    {{method_field('PATCH')}}
    {{csrf_field()}}
    <div class="field">
        <label class="label" for="title">Title</label>

        <div class="control">
        <input type="text" class="input {{ $errors->has('title') ? 'is-danger': ''}}"  name="title" placeholder="Title" value="{{$project->Title}}">
        </div>
    </div>

    <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea {{ $errors->has('title') ? 'is-danger': ''}}" >{{$project->Description}}</textarea>
            </div>
        </div>
    <div class="field">

            <div class="control">
                 <button type="submit" class="button is-link">Update project</button>
             </div>
     </div>
     @if($errors->any())
     <div class="alert alert-danger" role="alert">
         <ul>
             @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
         </ul>
     </div>
     @endif
</form>
<form method="POST" action="/projects/{{$project->id}}">
    @method('DELETE')
    @csrf
        <div class="field">

             <div class="control">
                    <button type="submit"  class="btn btn-primary">Delete project</button>
             </div>
        </div>
</form>
@endsection
