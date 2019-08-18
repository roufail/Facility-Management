@extends('layouts.app')

@section('content')

<div class="wrapper">



    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" style="    color: #FFFFFF;
    opacity: 0.9;
    font-weight: 600;
    margin: 12px 0px;
    padding: 15px 15px;
    font-size: 20px;
    float: left;
    height: 120px;
    line-height: 20px;" href="#">Facility Management</a>
            </div>
        </div>
    </nav>



    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page">
            <div class="content">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">{{ __('Reset Password') }}</div>

                                <div class="card-body card-content">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-group">



                                            <label>{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" placeholder="Enter email" class="input-no-border form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif

                                        </div>

                                        <div class="card-footer text-center">

                                                <button type="submit" class="btn btn-primary" style="color: #FFFFFF;
    background-color: #1a4aa5;
    opacity: 1;
    border-radius: 20px;
    box-sizing: border-box;
    border-width: 2px;
    font-size: 14px;
    font-weight: 600;
    padding: 7px 18px;
    border-color: #1a4aa5;
    -webkit-transition: all 150ms linear;
    -moz-transition: all 150ms linear;
    -o-transition: all 150ms linear;
    -ms-transition: all 150ms linear;
    transition: all 150ms linear;">
                                                    {{ __('Send Password Reset Link') }}
                                                </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
