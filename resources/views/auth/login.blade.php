@extends('layouts.app')

@section('title')
    Login Page
@endsection

@section('content')
    <div class="limiter">
		<div class="container-login100" style="background-image: url('img/img-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-30">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf

					<div class="login100-form-avatar">
						<img src="img/logo.png" alt="logo_hr">
					</div>

					<span class="login100-form-title p-t-15 p-b-30">
						Human Resource <br> Information System
					</span>
					
                    <div class="input-group m-b-10">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required autofocus>
					</div>

					<div class="input-group m-b-10">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" autocomplete="off" required >
                    </div>

                    @if ($errors->has('email'))
                    <div class="col-sm-12 p-r-0 p-l-0">
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $errors->first('email')}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    @if ($errors->has('password'))
                    <div class="col-sm-12 p-r-0 p-l-0">
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $errors->first('password')}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    
                    <div class="wrap-input100 validate-input p-t-10 m-b-10 text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-white" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit">
                            {{ __('Login') }}
                        </button>
                        
					</div>

					<div class="text-center w-full p-t-25 p-b-0">
                        @if (Route::has('password.request'))
                            <a class="text-white txt-1" href="{{ route('password.request') }}">
                                {{ __('Lupa Username / Password?') }}
                            </a>
                        @endif
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection
