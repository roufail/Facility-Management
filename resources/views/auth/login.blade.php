@extends('admin.layouts.plain-master')
@section('page_title','Admin Panel - Login')
@section('page_content')
<!-- <div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card card box box-info">
               <div class="card-header box-header with-border"><h3 class="box-title">{{ __('Login') }}</h3></div>


               <div class="card-body box-body">
                   <form method="POST" action="{{ route('login') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right control-label">{{ __('E-Mail Address') }}</label>



                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                               @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>



                       <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right control-label">{{ __('Password') }}</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                               @if ($errors->has('password'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('password') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group row">
                           <div class="col-md-6 offset-md-4">
                               <div class="form-check">
                                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <label class="form-check-label" for="remember">
                                       {{ __('Remember Me') }}
                                   </label>
                               </div>
                           </div>
                       </div>

                       <div class="form-group row mb-0">
                           <div class="col-md-8 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   {{ __('Login') }}
                               </button>

                               @if (Route::has('password.request'))
                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                       {{ __('Forgot Your Password?') }}
                                   </a>
                               @endif
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   </div> -->
<nav class="navbar navbar-transparent navbar-absolute">
   <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Facility Management</a>
      </div>
   </div>
</nav>
<div class="wrapper wrapper-full-page">
   <div class="full-page login-page" style="background-image: url('{{ asset('admin_assets/img/background/background.jpg') }}'" data-image="{{ asset('admin_assets/img/background/background.jpg') }}">
      <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
      <div class="content">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="card" data-background="color" data-color="blue">
                        <div class="card-header">
                           <h3 class="card-title">{{ __('Login') }}</h3>
                        </div>
                        <div class="card-content">
                           <div class="form-group">
                              <label>{{ __('E-Mail Address') }}</label>
                              <input id="email" type="email" placeholder="Enter email" class="input-no-border form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>{{ __('Password') }}</label>
                              <input id="password" type="password" placeholder="Password" class="input-no-border form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                              </label>
                           </div>
                        </div>
                        <div class="card-footer text-center">
                           <button type="submit" class="btn btn-fill btn-wd ">{{ __('Login') }}</button>
                           @if (Route::has('password.request'))
                           <div class="forgot" style="margin-top: 12px;">
                              <a  href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <footer class="footer footer-transparent">
         <div class="container">
            <div class="copyright">
               &copy; Facility Management
            </div>
         </div>
      </footer>
   </div>
</div>
@endsection
