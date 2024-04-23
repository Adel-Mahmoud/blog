@extends('layouts.login-layout')
@section('content')
<div class="register">
  <div class="container">
  	<!-- Sign Up -->
  	<div class="container__form container--signup">
  		<form action="#" class="form" id="form1">
  			<h2 class="form__title">Sign Up</h2>
  			<input type="text" placeholder="User" class="input" />
  			<input type="email" placeholder="Email" class="input" />
  			<input type="password" placeholder="Password" class="input" />
  			<button class="btn">Sign Up</button>
  		</form>
  	</div>
  
  	<!-- Sign In -->
  	<div class="container__form container--signin">
  		<form method="POST" action="{{ route('login') }}" class="form" >
  			<h2 class="form__title">Sign In</h2>
  			@csrf
  			<input type="email" placeholder="Email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
  			@error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  			<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
  			@error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  			<a href="#" class="link">Forgot your password?</a>
  			<input class="btn" type="submit" value="Sign In">
  		</form>
  	</div>
  
  	<!-- Overlay -->
  	<div class="container__overlay">
  		<div class="overlay">
  			<div class="overlay__panel overlay--left">
  				<button class="btn" id="signIn">Sign In</button>
  			</div>
  			<div class="overlay__panel overlay--right">
  				<a href="{{ route('register') }}" class="btn" id="signUp-2">Sign Up</a>
  			</div>
  		</div>
  	</div>
  </div>
</div>
@endsection
