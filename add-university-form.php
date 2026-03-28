<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Add a University</h1>
      <form action="add-university.php" method="post">
        <div class="mb-3">
          <label for="UniversityName" class="form-label">University name</label>
          <input type="text" class="form-control" id="UniversityName" name="UniversityName">
        </div>
        <div class="mb-3">
          <label for="UniversityDescription" class="form-label">Description</label>
          <textarea class="form-control" id="CarDescription" name="UniversityDescription" rows="5"></textarea>
        </div>
        <div class="mb-3">
          <label for="DateEstablished" class="form-label">Date established</label>
          <input type="date" class="form-control" id="DateEstablished" name="DateEstablished">
        </div>  
        <div class="mb-3">
          <label for="UniversityRating" class="form-label">Rating</label>
          <input type="number" class="form-control" id="UniversityRating" name="UniversityRating">
        </div>         
        <input type="submit" class="btn btn-primary" value="Add University">
      </form>
    </div>
  </body>
</html>	      
