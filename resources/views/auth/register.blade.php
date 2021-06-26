<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelikken Register</title>
    <link rel="icon" href="{{asset('img/title_logo/favicon.jpg')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--::::: ALL CSS FILES :::::::-->
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}">



    <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">

</head>

<body class="hold-transition register-page">
    <div class="register-box">

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register as a new membership</p>
                

                <form action="/register" method="post" id="register-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="full_name" id="full_name">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" />


                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                    </div>
                    <span class="email_error"></span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            id="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password"
                            name="confirm_password" id="confirm_password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"
                                id="register">Register</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->

    <script src="{{ asset('/js/frontent/jquery.2.1.0.min.js') }}"></script>
    <script src="{{ asset('/js/frontent/bootstrap.min.js') }}"></script>




    <script>
        $(function() {

            var error_fname;
            var error_email;
            var error_password;
            var error_retype_password;



            $("#full_name").focusout(function() {
                check_fname();
            });

            $("#email").focusout(function() {
                check_email();
            });
            $("#password").focusout(function() {
                check_password();
            });
            $("#confirm_password").focusout(function() {
                check_retype_password();
            });

            function check_fname() {

                var pattern = /^[a-zA-Z]*$/;
                var fname = $("#full_name").val();
                if (pattern.test(fname) && fname !== '') {

                    $("#full_name").css("border-bottom", "2px solid #34F458");
                } else {


                    $("#full_name").css("border-bottom", "2px solid #F90A0A");
                    error_fname = true;
                }
            }



            function check_password() {

                var password_length = $("#password").val().length;
                if (password_length < 8) {


                    $("#password").css("border-bottom", "2px solid #F90A0A");
                    error_password = true;
                } else {

                    $("#password").css("border-bottom", "2px solid #34F458");
                }
            }

            function check_retype_password() {
                var password = $("#password").val();
                var retype_password = $("#confirm_password").val();
                if (password !== retype_password) {


                    $("#confirm_password").css("border-bottom", "2px solid #F90A0A");
                    error_retype_password = true;
                } else {

                    $("#confirm_password").css("border-bottom", "2px solid #34F458");
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

            $("#register").on('click', function(e) {
                e.preventDefault();
                error_fname = false;

                error_email = false;
                error_password = false;
                error_retype_password = false;

                check_fname();

                check_email();
                check_password();
                check_retype_password();

                if (error_fname === false && error_email === false && error_password === false &&
                    error_retype_password === false) {

                    $.ajax({

                        method: 'post',
                        url: '/register',
                        data: $('#register-form').serialize(),
                        beforeSend:function(){
                            $('#register').html('<i class="fa fa-spinner" aria-hidden="true"></i>'); 
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#register').html('Register'); 
                                window.location.href ='email/verify'
                                
                            } else if (response.status == 'already') {
                                $('.email_error').html(response.message)
                                $("#email").css("border-bottom", "2px solid red");
                                $('#register').html('Register'); 
                            }

                        }




                    })



                    return true;
                } else {

                    return false;
                }


            });
        });

    </script>

</body>


</html>
