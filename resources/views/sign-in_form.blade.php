<main class="form-signin">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form method="post" action="{{route('sign-in')}}">

    @csrf()

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="login" name="login" autocomplete="off" value="{{old('login')}}" />
      <label for="login">Login</label>
    </div>
    <div class="form-floating mb-1">
      <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="{{old('password')}}" />
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
    <label>
        <input type="checkbox" value="remember-me" name="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>

<style>
body{
  background-color: #ccc;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
</style>