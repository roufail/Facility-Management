<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin_assets/css/dist/bootstrap.min.css') }}">
      <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin_assets/img/favicon.png') }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>@yield('page_title')</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <!-- Bootstrap core CSS     -->
      <link href="{{ asset('admin_assets/css/dist/bootstrap.min.css') }}" rel="stylesheet" />
      <!--  Paper Dashboard core CSS    -->
      <link href="{{ asset('admin_assets/css/dist/paper-dashboard.css') }}" rel="stylesheet"/>
      <!--  Fonts and icons     -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
      <link href="{{ asset('admin_assets/css/dist/themify-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_assets/css/dist/custom.css') }}" rel="stylesheet">

      @section('extra_css')

      @endsection


   </head>
   <body>
      <div class="wrapper">
        
        @section('page_content')
             
        @show
        
      </section>
      </div>
   </body>
   <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->


   @section('extra_js')

   @show

</html>
