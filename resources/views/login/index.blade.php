@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if (session()->has('loginErorr'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginErorr') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        <h1 class="h3 mb-3 font-weight-normal text-center">Please Login</h1>
        <form class="form-signin" action="/login" method="post">
          @csrf
            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="email" id="email" class="form-control @error('email')
            @enderror" placeholder="Email address" required autofocus value="{{ old('email') }}">
            @error('record')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>

            @enderror
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password')
            @enderror" placeholder="Password" required>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>

        @enderror
            <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
          </form> 
          <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
    </div>
</div>

@endsection