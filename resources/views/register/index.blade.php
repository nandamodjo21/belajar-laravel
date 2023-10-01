@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <h1 class="h3 mb-3 font-weight-normal text-center">Please Register</h1>
        <form class="form-registration" action="/register" method="post">
            @csrf
            <div>
                <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" required autofocus value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div>
                <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required autofocus value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
            </div>
            <div>
                <label for="email" class="sr-only">Email address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
           <div>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required autofocus>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
           </div>
           
            <button class="btn btn-lg btn-danger btn-block mt-3" type="submit">Register</button>
          </form> 
          <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
    </div>
</div>

@endsection