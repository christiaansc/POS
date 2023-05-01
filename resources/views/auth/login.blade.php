@extends('layouts.login')
@section('title' , 'Login')


@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Waffles</b>BIKE</a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
        <input id="email" type="email" name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" id="email" placeholder="Username" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
     
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="password" placeholder="Password" required>   
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
       
        </div>
        <div class="row">
          <div class="col-8">
          <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
          Mantenerme registrado
        </label>
      </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection