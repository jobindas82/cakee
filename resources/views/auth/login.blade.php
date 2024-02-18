@extends('layouts.guest')

@section('content')
    @if(session('forgot-password'))
        <div class="alert alert-success" role="alert">
            You will get the password reset email if you are registered with us.
        </div>
    @endif
    @if(session('password-change'))
        <div class="alert alert-success" role="alert">
            You password is changed. Please sign in to continue.
        </div>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                           name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" class="form-control @error('password') is-invalid @enderror"
                           type="password"
                           name="password"
                           required autocomplete="current-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input name="remember" type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <p class="mb-1">
                Forgot password? <a href="{{ route('password.request') }}">click here</a> to reset.
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
