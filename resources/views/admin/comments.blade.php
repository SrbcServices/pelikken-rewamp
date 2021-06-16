@extends('layouts.admin_layout')
@section('content')

    <div class="pt-4"></div>
    


    <div class="card" style="width: 100%">
        <div class="card-header">
            <h3 class="card-title">Comments</h3>
        </div>
      
        <div class="card-body tg
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Approvel</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($comments)>0)
                                @foreach ($comments as $comment)
                                    
                               

                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->name}}</td>
                                    <<td>{{$comment->email}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>
                                        <label class="switch">

                                        <input type="checkbox" {{$comment->status ? 'checked' : ''}} name="approvel" class="switch_for_approvel" onChange="change_event(event,{{$comment->id}})">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                </tr>

                                @endforeach
                                    
                                @endif
                               
                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>
        </div>
       
    </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#unit_table').DataTable();
});
</script>
<script>

function change_event(e,id){
    e.preventDefault();
            if (e.target.checked == true) {
                var status = '1'
            }
            else {
                var status = '0'
            }
            $.ajax({
                type: "get",
                url: "/admin/comment/"+id+ '/'+status,                
                success: function(response) {
                    if(response.status == 'success'){
                    $.simplyToast(response.message, 'success')
                 }
                }
            });
       
        }

      

</script>
    
@endsection
