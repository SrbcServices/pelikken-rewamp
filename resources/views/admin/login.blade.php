<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pelikken Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('/css/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">
    
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Pelikken</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div><br><br><br>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/js/frontent/jquery.2.1.0.min.js')}}"></script>
<script src="{{asset('/js/frontent/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/frontent/jquery.nav.js')}}"></script>
<script src="{{asset('/js/frontent/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/js/frontent/jquery-modal-video.min.js')}}"></script>
<script src="{{asset('/js/frontent/owl.carousel.js')}}"></script>
<script src="{{asset('/js/frontent/popper.min.js')}}"></script>
<script src="{{asset('/js/frontent/circle-progress.js')}}"></script>
<script src="{{asset('/js/frontent/slick.min.js')}}"></script>
<script src="{{asset('/js/frontent/stellarnav.js')}}"></script>
<script src="{{asset('/js/frontent/wow.min.js')}}"></script>
<script src="{{asset('/js/frontent/main.js')}}"></script>

</body>
</html>