@extends('layouts.admin_layout')
@section('content')

    <div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Master</h3>
        <p class="text-gray">Master / News / Arrange News</p>
    </div>
    <div class="container-fluid">

        <!--button-->
        <div class="btncustom">
            <button type="button" id="add_new_category" data-toggle="modal" data-target="#exampleModal" style="float: right">
                Add a new category section</button>
        </div>
        <!--button End-->
        <!--popup-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add a new  section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- form-->
                    <form id="sectionform">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>
                                    <h4 class="text-gray" style="font-size: 18px">Section Name</h4>
                                </label>
                                <input type="text" name="section_name" class="form-control"
                                    placeholder="Enter New Section Name">
                             
                            </div>
                            <div class="form-group">
                                <label>
                                    <h4 class="text-gray" style="font-size: 18px">Section order</h4>
                                </label>
                                <input type="text" name="section_order"  class="form-control"
                                    placeholder="Enter section order">
                             
                            </div>
                            <div class="form-group">
                                <label>
                                    <h4 class="text-gray" style="font-size: 18px">Select Category</h4>
                                </label>
                                <select class="form-control" name="select_category"
                                    data-placeholder="Select Category" style="width: 100%;">


                                    @foreach (get_category() as $sub_category)

                                        <option value={{ $sub_category->id }}>{{ $sub_category->category_name }}</option>

                                    @endforeach

                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>
                                    <h4 class="text-gray" style="font-size: 18px">Select Type</h4>
                                </label>
                                <select class="form-control" name="select_type"
                                    data-placeholder="Select type" style="width: 100%;">


                                

                                        <option value="1">Main section</option>
                                        <option value="2">Side panel</option>

                     

                                </select>
                            </div>
                           
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
            <h3 class="card-title">Category</h3>
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
                                    <th>id</th>
                                    <th>Section Name</th>
                                    <th>Order</th>
                                    <th>Type</th>
                                    <th>category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sections as $sec)

                                <tr>
                                    <td>{{$sec->id}}</td>
                                    <td>{{$sec->section_name}}</td>
                                    <td>{{$sec->order}}</td>
                                    <td>{{$sec->type}}</td>
                                    <td>{{$sec->get_category->category_name}}</td>
                                    <td>
                                       
                                        <button type="delete" id="delete_section" class="btn btn-secondary" data-id="{{$sec->id}}">
                                            <i class="fas fa-trash-alt"></i></button>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#unit_table').DataTable();
} );

//ajax form submit

$(document).on('click','#submit',function(e){
e.preventDefault();
let data = $('#sectionform').serialize();
$.ajax({
    type: "post",
    url: "/arrange-news",
    data: data,
    beforeSend:function(){
        $('#submit').html('<i class="fa fa-spinner" aria-hidden="true"></i>')
    },
    success: function (response) {
        if(response.status == 'success'){
            $.simplyToast(response.message, response.status)
            $('#submit').html('add')
            $('#exampleModal').modal('hide')
           $('#unit_table').load(document.URL+ " #unit_table")
        }else if(response.status == 'error'){
            $.simplyToast(response.message, 'danger')
            $('#submit').html('add')
           
        }
    }
});
})

//delete a section from db
$(document).on('click','#delete_section',function(){
    let id  = $(this).attr('data-id');
    $.ajax({
        type: "post",
        url: "/delete-section",
        data:{
            'sec_id':id,
            '_token':"{{csrf_token()}}"
        },
       
        beforeSend:function(){
            $('#delete_section').html('<i class="fa fa-spinner" aria-hidden="true"></i>')
        },
        success: function (response) {
          
          if(response.status=='success'){
            $.simplyToast(response.message, 'success');
            $('#unit_table').load(document.URL+ " #unit_table");
          }else{
            $.simplyToast('Error while deleting section , Please try again', 'danger')
            $('#delete_section').html('<i class="fas fa-trash-alt"></i>')
          }
        }
    });
})

</script>


    
@endsection
