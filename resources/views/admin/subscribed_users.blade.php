@extends('layouts.admin_layout')
@section('content')

    
    <div class="container-fluid">

        
        <!--popup-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- form-->
                    <form id="addform">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="category_name" id="category" class="form-control"
                                    placeholder="Enter New Category">
                                <input type="hidden" name="id" placeholder="id" class="form-control">
                            </div>
                            <div class="error" style="color: red"></div>
                        </div>
                    </form>
                    <!--form end-->
                    <div class="modal-footer">
                        <div class="btncustom">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit" class="btn btn-secondary" data-sub="submit">add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Popup End-->

    <div class="card" style="width: 100%">
        <div class="card-header">
            <h3 class="card-title">Subscribed Email</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body tg
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">



                        <table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                
                                <tr>
                                    <th>Id</th>
                                    <th>Subsribed Email</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            @foreach($suscribers as $users)
                                <tr>
                                    <td>{{$users->id}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->status}}</td>
                                    <td>
                                    <label class="switch">

                                <input type="checkbox" name="status" id="status" {{ $users->status != 0 ? 'checked' : '' }} onChange="change_status(event,{{$users->id}});">
                                <span class="slider round"></span>
                                </label>
                                    </td>
                                </tr>
                              @endforeach 
                               
                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#unit_table').DataTable();
} );
//change status of suscribed users

function change_status(e,id){
    e.preventDefault()   
   
if (e.target.checked == true){
    var status = '1'
} else {
    var status = '0'
}
        $.ajax({
        type:"get",
        url:"/admin/subsciber_update/"+id+'/'+status,      
        success:function(response){
           if(response.status=='success'){
           console.log('success');
           $.simplyToast(response.message, 'success')
        }else{
            $.simplyToast('Something went wrong', 'danger')
        }
    } 
 }) 
}
         


</script>

<script src="{{asset('js/plugins/categoryhandler.js')}}"></script>
    
@endsection
