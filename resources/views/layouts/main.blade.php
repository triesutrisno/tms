<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TMS SILOG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
    <!-- Font Awesome -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.css') }}" />
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
	<link rel="stylesheet" href="{{ asset('assets/ionicons/css/ionicons.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	@stack('styles')

  </head>
  <body class="hold-transition skin-red sidebar-mini fixed">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>TMS SILOG</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Session::get('infoUser')[0]['namaUser'] }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    <p>
                      {{ Session::get('infoUser')[0]['namaUser'] }}
                      <small>{{ Session::get('infoUser')[0]['email'] }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="col-xs-7">
                      <a href="#" class="btn btn-block btn-default btn-flat">Ubah Password</a>
                    </div>
                    <div class="col-xs-5 text-right">
                      <a href="{{url("/logout")}}" class="btn btn-block btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Session::get('infoUser')[0]['namaUser'] }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
		  <!--
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
            @php
                $path = explode("/",\Request::path());
                $classActive = $path[0]=="home" || $path[0]=="" ? "active" : "";
                $hakAkses = Session::get('hakAkses'); 
                function in_array_r($needle,$array) {
                    foreach ($array as $item) {
                       if ($needle==$item['menu_link']) {
                            $active = "active";
                            break;
                        }else{
                            $active = "";
                        }
                    }
                    return $active;
                }
            @endphp
            <ul class="sidebar-menu">                         
            @foreach ($hakAkses as $key => $val)
                <li class="header">{{strtoupper($val['menu_nama'])}}</li> 
                @if(isset($val['data1']))
                    @foreach ($val['data1'] as $keys => $datae)
                        @if(isset($datae['data2']))
                        <li class="treeview @if($path[0]<>'home' || $path[0]<>'') {{ in_array_r($path[0], $datae['data2']) }} @endif ">
                            <a href="{{url("/$datae[menu_link]")}}">
                              <i class="{{$datae['menu_icon']}}"></i>
                              <span>{{$datae['menu_nama']}}</span>
                              <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                    @foreach ($datae['data2'] as $key3 => $dt3) 
                                        @if($path[0]==$dt3['menu_link'])
                                            <li class="active"><a href="{{url("/$dt3[menu_link]")}}"><i class="{{$dt3['menu_icon']}}"></i>{{$dt3['menu_nama']}}</a></li>
                                        @else
                                            <li><a href="{{url("/$dt3[menu_link]")}}"><i class="{{$dt3['menu_icon']}}"></i>{{$dt3['menu_nama']}}</a></li>
                                        @endif
                                    @endforeach                                
                            </ul>
                        </li>
                        @else
                            <li><a href="{{url("/$datae[menu_link]")}}"><i class="{{$datae['menu_icon']}}"></i> <span>{{$datae['menu_nama']}}</span></a></li>
                        @endif
                    @endforeach
                @endif                    
            @endforeach
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')
            <small>@yield('subTitle')</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            @if(trim($__env->yieldContent('subBreadcrumb')))
            <li class="active">
                    <a href="{{url('/')}}/@yield('link')">@yield('breadcrumb')</a>
            </li>
            <li class="active">
                    @yield('subBreadcrumb')
            </li>
            @else
            <li class="active">@yield('breadcrumb')</li>
            @endif
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            @yield('container')                
            
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1
        </div>
        <strong>Copyright &copy; 2021 <a href="http://silog.co.id" target="_blank()">PT Semen Indonesia Logsitik</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

	@include('layouts.javascript')
	@stack('scripts')
   
  </body>
</html>
