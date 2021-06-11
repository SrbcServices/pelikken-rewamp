 @extends('layouts.admin_layout')
@section('content')

    <div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Master</h3>
        <p class="text-gray">Master / Sub-category</p>
    </div>
    <div class="container-fluid">

        <!--button-->
        <div class="btncustom">
            <button type="button" id="add_new_cate
            gory" data-toggle="modal" data-target="#exampleModal" style="float: right">
                Add New Sub-Category</button>
        </div>
        <!--button End-->
        <!--popup-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sub-Category</h5>
                        <button type="button" class="close" data-dismiss="modal" id="add_sub_category" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- form-->
                    <form id="addform">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">

                                <input type="text" name="sub_category_name" class="form-control"
                                    placeholder="Enter New Sub-category">
                                    <input type="hidden" name="id" placeholder="id" class="form-control">
                            </div>

                            <!--Select-box-->
                            <div class="form-group">
                                <label>
                                    <h4 class="text-gray" style="font-size: 18px">Select Category</h4>
                                </label>
                                <select class="form-control" name="select_category"
                                    data-placeholder="Select a State" style="width: 100%;">


                                    @foreach (get_category() as $sub_category)

                                        <option value={{ $sub_category->id }}>{{ $sub_category->category_name }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="error" style="color: red"></div>

                        </div>
                    </form>
                    <!--form-End-->

                    <div class="modal-footer">
                        <div class="btncustom">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submit" class="btn btn-secondary" data-sub="submit">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Popup End-->

    <div class="card" style="width: 100%">
        <div class="card-header">
            <h3 class="card-title">Sub-Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body tg">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row ">
                    <div class="col-sm-12">
                        <table id="unit_table" class="table table-bordered table-striped" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Sub-Category-Name</th>
                                    <th>slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($sub_categories as $sub_category)

                                <tr>
                                    <td>{{$sub_category->id}}</td>
                                    <td>{{$sub_category->category->category_name}}</td>
                                    <td>{{$sub_category->sub_category_name}}</td>
                                    <td>{{$sub_category->slug}}</td>
                                    <td>
                                    <button type="button" id="edit_category" class="btn btn-secondary" data-id="{{$sub_category->id}}"><i class="fas fa-edit"></i></button>
                                    <button type="button" id="delete_category" class="btn btn-secondary" data-id="{{$sub_category->id}}"><i class="fas fa-trash-alt"></i></button>
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

    <script src="{{ asset('js/plugins/sub_category_handler.js') }}"></script>




@endsection
