@extends('layouts.login-layout')
@section('content')
<section>
  <div class="container">
    <div class="user signupBx">
      <div class="formBx">
        <form method="POST" action="{{ route('register') }}">
          <h2>Create an account</h2>
          @csrf
          <input type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" class="@error('password') is-invalid @enderror" name="password" required placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" name="password_confirmation" required placeholder="Confirm Password">
            <input type="submit" value="{{ __('Register') }}"/>
          <p class="signup">
            Already have an account ?
            <a href="{{ route('login') }}">Sign in.</a>
          </p>
        </form>
      </div>
      <div class="imgBx">
        <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
    </div>
  </div>
</section>
@endsection
