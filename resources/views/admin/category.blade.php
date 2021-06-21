@extends('layouts.admin_layout')
@section('content')

    <div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Master</h3>
        <p class="text-gray">Master / Category</p>
    </div>
    <div class="container-fluid">

        <!--button-->
        <div class="btncustom">
            <button type="button" id="add_new_category" data-toggle="modal" data-target="#exampleModal" style="float: right">
                Add New Category</button>
        </div>
        <!--button End-->
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
            <h3 class="card-title">Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body tg">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">



                        <table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                
                                <tr>
                                    <th>id</th>
                                    <th>Category-Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)

                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <button type="edit" id="edit_category" class="btn btn-secondary" data-id="{{$category->id}}"><i class="fas fa-edit"></i></button>
                                        <button type="delete" id="delete_category" class="btn btn-secondary" data-id="{{$category->id}}">
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
<script>
    $(document).ready( function () {
    $('#unit_table').DataTable();
} );
</script>

<script src="{{asset('js/plugins/categoryhandler.js')}}"></script>
    
@endsection
