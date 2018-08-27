@extends('auth.layout')

@section('content')
    <div class="page-header-image" style="background-image:url('img/cover-01.jpg')"></div>

    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('frontend.auth.register.post') }}">
                    {{ csrf_field() }}

                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="img/login-logo.png" alt="">
                        </div>
                        <h5>
                            Create an Account
                        </h5>
                    </div>
                    <div class="content">

                        <div class="input-group form-group-no-border input-lg">
                        <span class="input-group-addon">
                            <i class="fas fa-user"></i>
                        </span>
                            <input id="name" type="text" class="form-control" placeholder="Full Name" name="name"
                                   value="{{ old('name') }}" required>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                        <span class="input-group-addon">
                            <i class="fas fa-at"></i>
                        </span>
                            <input id="email" type="email" class="form-control" placeholder="Email Address" name="email"
                                   value="{{ old('email') }}" required>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                        <span class="input-group-addon">
                            <i class="fas fa-key"></i>
                        </span>
                            <input id="password" type="password" class="form-control" placeholder="Password"
                                   name="password" required>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                        <span class="input-group-addon">
                            <i class="fas fa-key"></i>
                        </span>
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm Password" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-block">Create Account</button>
                    </div>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('frontend.auth.login') }}" class="link">Login to Account</a>
                        </h6>
                    </div>
                    <div class="float-right">
                        <h6>
                            <a href="{{route('frontend.auth.password.email')}}" class="link">Need Help?</a>
                        </h6>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection
