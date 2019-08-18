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
         <div class="sidebar" data-background-color="brown" data-active-color="danger">
            <!--
               Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
               Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
               -->
            <div class="logo">

               <a href="#" class="simple-text logo-normal text-center">
               Facility Management
               </a>
            </div>
            <div class="sidebar-wrapper">
               <div class="user">
                  <div class="photo">
                     <img src="{{ asset('admin_assets/img/faces/user.png') }}" />
                  </div>
                  <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                     <span>
                        {{ auth()->user()->name }}
                        <br />
                        @if(auth()->user()->role()->count() > 0)
                          {{ auth()->user()->role->role }}
                        @endif                     {{-- {{ auth()->user()->role }}
                     Event Requester --}}
                     <b class="caret"></b>
                     </span>
                     </a>
                     <div class="clearfix"></div>
                     <div class="collapse" id="collapseExample">
                        <ul class="nav">
                           <li>
                              <a href="#profile">
                              <span class="sidebar-mini"><i class="fa fa-user style"></i></span>
                              <span class="sidebar-normal">My Profile</span>
                              </a>
                           </li>
                           <li>
                              <a href="#edit">
                              <span class="sidebar-mini"><i class="fa fa-pencil style"></i></span>
                              <span class="sidebar-normal">Edit Profile</span>
                              </a>
                           </li>
                           <li>
                                <a href="{{ route("admin.logout") }}">
                                    <span class="sidebar-mini"><i class="fa fa-lock style" ></i></span>
                                    <span class="sidebar-normal">Logout</span>
                                </a>
                            </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <ul class="nav">

               @if(auth()->user()->role->id !=  7 && auth()->user()->role->id != 6)
               <li class="{{ Request::routeIs('events.approve') || Request::routeIs('events.approve') ? 'active' : '' }}">
                  <a href="{{ route("events.approve") }}">
                     <span class="sidebar-mini"><i class="fa fa-calendar-check-o style" ></i></span>
                     <span class="sidebar-normal">Events</span>
                  </a>
               </li>
               @elseif(auth()->user()->role->id == 6)

               <li>
                 <a data-toggle="collapse" href="#manage_events">
                  <i class="fa fa-calendar-check-o"></i>
                     <p style="text-transform: capitalize">Manage Events
                        <b class="caret"></b>
                     </p>
	               </a>
                  <div class="collapse" id="manage_events">
                     <ul class="nav">
                        <li class="{{ Request::routeIs('events.approve') || Request::routeIs('events.approve') ? 'active' : '' }}">
                           <a href="{{ route("events.approve") }}">
                              <span class="sidebar-mini"><i class="fa fa-calendar-check-o style" ></i></span>
                              <span class="sidebar-normal">Events</span>
                           </a>
                        </li>
                        <li class="{{ Request::routeIs('contorl.edit') || Request::routeIs('contorl.edit') ? 'active' : '' }}">
                           <a href="{{ route('contorl.edit') }}">
                              <span class="sidebar-mini"><i class="ti-mobile"></i></span>
                              <span class="sidebar-normal">Roles</span>
                           </a>
                        </li>
                     </ul> 
                 </div>
               </li>
               @endif

               @if(auth()->user()->role->id == 7)
                  <li class="{{ Request::routeIs('events.index')  ? 'active' : '' }}">
                     <a href="{{ route("events.index") }}">
                     <span class="sidebar-mini"><i class="fa fa-calendar-check-o style" ></i></span>
                     <span class="sidebar-normal">My Events</span>
                     </a>
                  </li>
                  <li class="{{ Request::routeIs('events.create') || Request::routeIs('event.edit') ? 'active' : '' }}">
                  <a href="{{ route("events.create") }}">
                     <span class="sidebar-mini"><i class="fa fa-calendar-plus-o style"></i></span>
                     <span class="sidebar-normal">Request An Event</span>
                     </a>
                  </li>
               @endif




                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-settings"></i></span>
                     <span class="sidebar-normal">Maintenance</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-ruler-alt style" aria-hidden="true"></i></span>
                     <span class="sidebar-normal">Space Management</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="fa fa-building-o style" aria-hidden="true"></i></i></span>
                     <span class="sidebar-normal">Asset Management</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-briefcase"></i></span>
                     <span class="sidebar-normal">Catering Request</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-email"></i></span>
                     <span class="sidebar-normal">Mail Services</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-car"></i></span>
                     <span class="sidebar-normal">Vehicle Request</span>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="sidebar-mini"><i class="ti-mobile"></i></span>
                     <span class="sidebar-normal">Telecom</span>
                     </a>
                  </li>
                 

               </ul>
            </div>
            </li>

         </div>
         <div class="main-panel">
            <nav class="navbar navbar-default">
               <div class="container-fluid">
                  <div class="navbar-minimize">
                     <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
                  </div>
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar bar1"></span>
                     <span class="icon-bar bar2"></span>
                     <span class="icon-bar bar3"></span>
                     </button>
                     <a class="navbar-brand" href="#charts">@yield('page_heading')</a>
                  </div>
                  <div class="collapse navbar-collapse">
                     <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-search"></i></span>
                           <input type="text" value="" class="form-control" placeholder="Search...">
                        </div>
                     </form>
                     <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                           <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                              <i class="ti-settings"></i>
                           </a>
                           <ul class="dropdown-menu">

                           <li>
                                <a href="{{ route("admin.logout") }}">
                                    <span class="sidebar-mini"><i class="fa fa-lock style" ></i></span>
                                    <span class="sidebar-normal">Logout</span>
                                </a>
                            </li>

                           </ul>
                        </li>

                     </ul>
                  </div>
               </div>
            </nav>
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                    @section('page_content')
                         <!-- your content here -->
                    @show
                  </div>
               </div>
            </div>

         </div>
      </div>
   </body>
   <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
   <script src="{{ asset('admin_assets/js/dist/jquery.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('admin_assets/js/dist/jquery-ui.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('admin_assets/js/dist/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('admin_assets/js/dist/bootstrap.min.js') }}" type="text/javascript"></script>
   <!--  Forms Validations Plugin -->
   <script src="{{ asset('admin_assets/js/dist/jquery.validate.min.js') }}"></script>
   <!-- Promise Library for SweetAlert2 working on IE -->
   <script src="{{ asset('admin_assets/js/dist/es6-promise-auto.min.js') }}"></script>
   <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
   <script src="{{ asset('admin_assets/js/dist/moment.min.js') }}"></script>
   <!--  Date Time Picker Plugin is included in this js file -->
   <script src="{{ asset('admin_assets/js/dist/bootstrap-datetimepicker.js') }}"></script>
   <!--  Select Picker Plugin -->
   <script src="{{ asset('admin_assets/js/dist/bootstrap-selectpicker.js') }}"></script>
   <!--  Switch and Tags Input Plugins -->
   <script src="{{ asset('admin_assets/js/dist/bootstrap-switch-tags.js') }}"></script>
   <!-- Circle Percentage-chart -->
   <script src="{{ asset('admin_assets/js/dist/jquery.easypiechart.min.js') }}"></script>
   <!--  Charts Plugin -->
   <script src="{{ asset('admin_assets/js/dist/chartist.min.js') }}"></script>
   <!--  Notifications Plugin    -->
   <script src="{{ asset('admin_assets/js/dist/bootstrap-notify.js') }}"></script>
   <!-- Sweet Alert 2 plugin -->
   <script src="{{ asset('admin_assets/js/dist/sweetalert2.js') }}"></script>
   <!-- Vector Map plugin -->
   <script src="{{ asset('admin_assets/js/dist/jquery-jvectormap.js') }}"></script>
   <!-- Wizard Plugin    -->
   <script src="{{ asset('admin_assets/js/dist/jquery.bootstrap.wizard.min.js') }}"></script>
   <!--  Bootstrap Table Plugin    -->
   <script src="{{ asset('admin_assets/js/dist/bootstrap-table.js') }}"></script>
   <!--  Plugin for DataTables.net  -->
   <script src="{{ asset('admin_assets/js/dist/jquery.datatables.js') }}"></script>
   <!--  Full Calendar Plugin    -->
   <script src="{{ asset('admin_assets/js/dist/fullcalendar.min.js') }}"></script>
   <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
   <script src="{{ asset('admin_assets/js/dist/paper-dashboard.js') }}"></script>
   <!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
   <script src="{{ asset('admin_assets/js/dist/demo.js') }}"></script>
      <script type="text/javascript">
      $().ready(function(){
      // Init Sliders

          // Init DatetimePicker
          demo.initFormExtendedDatetimepickers();
      });
   </script>

   @section('extra_js')

   @show

</html>
