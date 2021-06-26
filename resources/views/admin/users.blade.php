@extends('layouts.admin_layout')
@section('content')

<div class="pt-4"></div>
<div class="jumbotron bg-white p-3" style="margin-bottom: 3%">
    <h3 class="text-gray">Users</h3>
</div>

{{-- Modal Button --}}

<div class="container-fluid">

    <!--button-->
    <div class="btncustom">
        <button type="button" id="add_new_category" data-toggle="modal" data-target="#exampleModal"
            style="float: right">
            Add New User</button>
    </div>
    <!--button End-->
    <!--popup-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Controll</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form-->
                    
                    <div class="modal-body">

                        {{-- REGISTER FORM START --}}
                        <div class="append-area"></div>
                        <form method="post" id="users-add">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name">
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
                        
                                <!-- /.col -->
                                <div class="btncustom">
                                    <button type="submit-reg" class="btn btn-secondary" id="register">Register</button>
                                </div>
                                <!-- /.col -->
                          
                        </form>

                        {{-- REGISTER FORM END --}}

                        <div class="error" style="color: red"></div>
                    </div>
                
                <!--form end-->
            </div>
        </div>
    </div>
</div>





<table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                
                                <tr>
                                    <th>Email</th>
                                    <th>Register Date</th>
                                    <th>Role</th>
                                    <th>Verified</th>
                                </tr>
                            </thead>
                            <tbody>

                    @if (count($user)>0)  
                    @foreach ($user as $users)
                        
                   


                                <tr>
                                    <td>{{$users->email}}</td>
                                    <td>{{date('d-m-Y', strtotime($users->created_at))}}</td>
                                    <td>@if($users->is_Admin == 1)<a style="background: red;color:white;padding:3px 10px;border-radius:20px">Admin</a> @else<a style="background: green;color:white;padding:3px 16px;border-radius:20px;">User</s>@endif</td>
                                    <td>@if($users->email_verified_at == null)<a style="background: red;color:white;padding:3px 10px;border-radius:20px">Not Verified</a> @else<a style="background: green;color:white;padding:3px 16px;border-radius:20px;">Verified</s>@endif</td>
                                </tr>
                    @endforeach
                    @endif
                               
                            </tbody>
                        </table>

    
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#unit_table').DataTable();
    });

//creating new admin user
$('#register').on('click',function(e){
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "/admin/create_admin_user",
        data: $('#users-add').serialize(),
        beforeSend:function(){
            $('#register').html('<i class="fas fa-spinner"></i>')
        },
      
        success: function (response) {
            var error_append = ''
            if(response.status == 'error'){
                $('#register').html('Register')
                Object.keys(response.error).forEach((index,value,array) => {
                console.log(response.error[index][0]);
                error_append+=`<div class="alert alert-own" role="alert">
                               ${response.error[index][0]}
                               </div>`   
                });

                $('.append-area').html(error_append)
            }else if(response.status == 'fail'){
                $('#register').html('Register')
                $('.append-area').html(`<div class="alert alert-own" role="alert">
                               ${response.message}
                               </div>` )
            }else if(response.status == 'already'){
                $('#register').html('Register')
                $('.append-area').html(`<div class="alert alert-own" role="alert">
                               ${response.message}
                               </div>` )
            }else if(response.status=='success'){
                window.location.reload();
            }
        }
    });
})













</script>

@endsection