@extends('layouts.guest')

@section('content')
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Logout</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
