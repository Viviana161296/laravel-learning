<!doctype html>
<html>
  <head>
    <meta charset="uft-8"/>
    <title>Create Projects</title>
  </head>
  <body>
      <h1>Create a new project</h1>

     <form method="POST" action="/projects">
        {{csrf_field()}}
         <div class="field">
             <label class="label" for="title">Project Title</label>
             <div class="control">
             <input type="text" class="input {{ $errors->has('title') ? 'is-danger': ''}}" name="title"  value="{{ old('title')}}" placeholder="Project title">
             </div>
            </div>
         <div>
             <textarea name="description"  class="input {{ $errors->has('title') ? 'is-danger': ''}}"  placeholder="Project description">{{ old('description')}}</textarea>
         </div>
         <div>
             <button type="submit">Create project</button>
         </div>

         @if($errors->any())
         <div class="notification is-danger">
             <ul>
                 @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
             </ul>
         </div>
         @endif
     </form>
  </body>
</html>
