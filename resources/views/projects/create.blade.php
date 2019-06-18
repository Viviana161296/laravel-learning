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
             <input type="text" name="title" placeholder="Project title" required>
             </div>
            </div>
         <div>
             <textarea name="description" placeholder="Project description" required></textarea>
         </div>
         <div>
             <button type="submit">Create project</button>
         </div>
     </form>

  </body>
</html>
