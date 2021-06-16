@extends('layouts.admin_layout')
@section('content')

<div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 3%">
        <h3 class="text-gray" >Users</h3>
    </div>
<table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
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
    $(document).ready( function () {
    $('#unit_table').DataTable();
} );
</script>
    
@endsection