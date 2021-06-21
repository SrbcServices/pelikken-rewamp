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
                                    <td>45</td>
                                    <td>50</td>
                                </tr>
                    @endforeach
                    @endif
                               
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