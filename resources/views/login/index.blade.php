<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TMS SILOG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/ionicons/css/ionicons.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <font color="#FFFFFF">
        <b>TMS SILOG</b>
        </font>
      </div>

      <!-- START LOCK SCREEN ITEM -->
      <form class="form-auth-small" autocomplete="off" method="post" action="{{url('/postlogin')}}">
      @csrf
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="{{ asset('assets/dist/img/userLogin.jpg') }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">
          <div class="input-group">
              <input type="text" name="username" id="username" class="form-control" required placeholder="Username">
          </div>
        </div><!-- /.lockscreen credentials -->

      </div>
      <br />
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="{{ asset('assets/dist/img/images.png') }}" alt="Password Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" required placeholder="password">
          </div>
        </div><!-- /.lockscreen credentials -->
      </div>
      <div class="col-xs-12">
            <div class="col-xs-7"></div>
            <div class="col-xs-4">
                    <button type="submit" class="btn btn-warning btn-block btn-flat" name="login-button">Sign in</button>		
            </div>
            <div class="col-xs-1"></div>
      </div>
      </form>
      </div><!-- /.lockscreen-item -->
      <br /><br /><br />
      <font color="#FFFFFF">
      <div class="text-center">
            Silakan login terlebih dahulu, Untuk Menggunakan Sistem ini.
      </div>
      <div class="lockscreen-footer text-center">
            Copyright &copy; 20121 PT. Semen Indonesia Logistik<br>
            All rights reserved
      </div>
      </font>
      <br /><br /><br />
      <div class="lockscreen-footer text-center">
            @if (session('pesan'))
            <div class="alert alert-warning">
                    {{ session('pesan') }}
            </div>
            @endif
    </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
