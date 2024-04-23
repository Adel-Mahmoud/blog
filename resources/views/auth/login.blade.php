@extends('layouts.login-layout')
@section('content')
<section>
  <div class="container">
    <div class="user signinBx">
      <div class="imgBx">
        <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        <div class="formBx">
          <form method="POST" action="{{ route('login') }}">
            <h2>Sign In</h2>
            @csrf
            <input type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
      			@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      			<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
      			@error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" value="Sign In">
            <p class="signup">
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
            </p>
            <p class="signup">
              Don't have an account ?
              <a href="{{ route('register') }}">Sign Up</a>
            </p>
          </form>
        </div>
      </div>
  </div>
</section>    
@endsection
