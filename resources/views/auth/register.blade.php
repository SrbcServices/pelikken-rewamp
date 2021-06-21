<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelikken Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--::::: ALL CSS FILES :::::::-->
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">

 

    <link rel="stylesheet" href="{{asset('/css/icheck-bootstrap.min.css')}}">


    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">
    
</head>

<body class="hold-transition register-page">
    <div class="register-box">

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register as a new membership</p>

                <form action="/register" method="post" id="register-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="full_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
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
                        <input type="password" class="form-control" placeholder="Retype password" name="confirm_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                    
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" id="register">Register</button>
                        </div>
                   
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->

    <script src="{{asset('/js/frontent/jquery.2.1.0.min.js')}}"></script>
	<script src="{{asset('/js/frontent/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/simply-toast.min.js') }}"></script>
	


    <script>
        $(document).ready(function(){
            $('#register').on('click',function(e){
                e.preventDefault();
                $.ajax({
                   
                    method:'post',
                    url:'/register',
                    data:$('#register-form').serialize(),
                    success:function(response){
                        if(response.status == 'error'){
                            Object.keys(response.message).forEach((index,value,array) => {
                          console.log(response.message[index][0]);
                          $.simplyToast(response.message[index][0], 'danger')
                        });
                    }
                else if(response.status == 'password'){
                        
                          $.simplyToast(response.message, 'danger')
                }

                        
                        
                    }
                })
            })
        })
    </script>

</body>


</html>