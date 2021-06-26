<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pelikken | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('img/title_logo/favicon.jpg')}}">

  <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/all.css') }}">



  <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css') }}">


  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/">Pelikken</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      @if ($errors->any())

        
      @foreach ($errors->all() as $error)
          <p class="alert-own">{{ $error }}</p>
      @endforeach
 

@endif
      <form action="/reset-password" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="hidden" value="{{$token}}" name="token"/> 
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="/login">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/js/frontent/jquery.2.1.0.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/bootstrap.min.js') }}"></script>

</body>
</html>
