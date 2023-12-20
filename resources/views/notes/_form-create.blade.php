<main class="form">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form method="post" action="{{route('note.store')}}">

    @csrf()

    <h1 class="h3 mb-3 fw-normal">Create or edit Note</h1>


    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="title" name="title" autocomplete="off" value="{{old('title')}}" />
      <label for="title">Title</label>
    </div>

    <div class="form-floating mb-1">
      <textarea class="form-control" name="content" id="content">{{old('content')}}</textarea>
      <label for="content">Content</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit">Submit</button>
  </form>
</main>

<style>
body{
  background-color: #ccc;
}
.form {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
#content{
  height: 100px;
}
</style>