<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body>


  <div class="container text-center">
  <div class="row">
    <div class="col-3">
      @include('notes._form-create')
    </div>
    <div class="col-9">
      @include('notes-list')
    </div>
  </div>
</div>


  </body>
</html>