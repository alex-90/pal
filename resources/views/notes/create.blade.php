@extends('default')


@section('content')

<nav class="py-2 bg-body-tertiary border-bottom bg-dark" data-bs-theme="dark">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Sign up</a></li>
        </ul>
    </div>
</nav>
  
  
<div class="container text-center">
  <div class="row">
    <div class="col-3">
      @include('left-menu')
    </div>
    <div class="col-9">
      @include('notes._form-create')
    </div>
  </div>
</div>

@endsection