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

                        <form method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
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
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        
                                <!-- /.col -->
                                <div class="btncustom">
                                    <button type="submit-reg" class="btn btn-secondary">Register</button>
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


{{-- modal button ends --}}
<table id="unit_table" class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
    <thead>

        <tr>
            <th>User Name</th>
            <th>Email Id</th>
            <th>Phone</th>
            <th>Reset Password</th>
        </tr>
    </thead>
    <tbody>



        <tr>
            <td>01</td>
            <td>456</td>
            <td>45</td>
            <td>50</td>
        </tr>

    </tbody>
</table>


@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#unit_table').DataTable();
    });
</script>

@endsection