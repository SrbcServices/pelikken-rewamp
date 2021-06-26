<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pelikken | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="{{asset('img/title_logo/favicon.jpg')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      @if ($errors->any())

        
              @foreach ($errors->all() as $error)
                  <p class="alert-own">{{ $error }}</p>
              @endforeach
         
    
       @endif

      @if (session()->has('status'))
        <p class="succ-own">{{session('status')}}</p>
    
       @endif
      <form action="/forgot-password" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="/login">Login</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="{{ asset('/js/frontent/jquery.2.1.0.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/bootstrap.min.js') }}"></script>

</body>
</html>
