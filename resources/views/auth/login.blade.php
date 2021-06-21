<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelikken Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}">




    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">



</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Pelikken</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
               <div class="login-error"></div>

               @if (session()->has('status'))
               <p class="succ-own">{{session('status')}}</p>
           
              @endif
                <form action="/login" method="post" id="login-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" id="login">Sign In</button>
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
    <script src="{{ asset('/js/frontent/jquery.2.1.0.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/bootstrap.min.js') }}"></script>

    <script>
        $(function() {


            var error_email;
            var error_password;





            $("#email").focusout(function() {
                check_email();
            });
            $("#password").focusout(function() {
                check_password();
            });




            function check_password() {

                var password_length = $("#password").val().length;
                if (password_length < 8) {


                    $("#password").css("border-bottom", "2px solid #F90A0A");
                    error_password = true;
                } else {

                    $("#password").css("border-bottom", "2px solid #34F458");
                }
            }


            function check_email() {
                console.log('else case');
                var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $("#email").val();
                if (pattern.test(email) && email !== '') {

                    $("#email").css("border-bottom", "2px solid #34F458");
                } else {

                    $("#email").css("border-bottom", "2px solid #F90A0A");
                    error_email = true;
                }
            }

            $("#login").on('click', function(e) {
                e.preventDefault();


                error_email = false;
                error_password = false;




                check_email();
                check_password();


                if (error_email === false && error_password === false) {

                    $.ajax({

                        method: 'post',
                        url: '/login',
                        data: $('#login-form').serialize(),
                        beforeSend: function() {
                            $('#login').html(
                                '<i class="fa fa-spinner" aria-hidden="true"></i>');
                        },
                        success: function(response) {
                           if(response.status=='success'){
                             window.location.href = '/admin'
                           }else if(response.status = 'error'){
                             $('#login').html('Login');
                             $("#password").css("border-bottom", "2px solid #F90A0A");
                             $("#email").css("border-bottom", "2px solid #F90A0A");
                              $('.login-error').html(`<div class="alert alert-own" role="alert">
                                                    Email Or password Donot match
                                                  </div>`)
                           }

                        }




                    })



                   
                } else {
                    return false;
                }


            });
        });

    </script>







</body>

</html>
