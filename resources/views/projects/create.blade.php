@extends('layout')

@section('content')
      <h1>Create a new project</h1>

     <form method="POST" action="/projects" style="margin-bottom:lem;">
        {{csrf_field()}}
         <div class="field">
             <label class="label" for="title">Project Title</label>
             <div class="control">
             <input type="text" class="input {{ $errors->has('title') ? 'is-danger': ''}}" name="title"  value="{{ old('title')}}" placeholder="Project title" required>
             </div>
            </div>
            <label class="label" for="content">Project Description</label>
         <div>
             <textarea name="description"  class="textarea {{ $errors->has('title') ? 'is-danger': ''}}"  placeholder="Project description" required>{{ old('description')}}</textarea>
         </div>
         <div>
             <button type="submit"  class="btn btn-primary" >Create project</button>
         </div>

         @include('errors')

     </form>
     @endsection
