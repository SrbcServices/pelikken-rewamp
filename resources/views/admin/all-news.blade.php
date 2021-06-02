@extends('layouts.admin_layout')
@section('content')

    <div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Master</h3>
        <p class="text-gray">Master / News</p>
    </div>
    <div class="container-fluid">

        <!--button-->
        <div class="btncustom">
            <button type="button" id="add_new_category" style="float: right">
                Add News</button>
        </div>
        <!--button End-->
        <!--popup-->
    </div>

    <!--Popup End-->

    <div class="card" style="width: 100%">
        <div class="card-header">
            <h3 class="card-title">Add News</h3>
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
                                    <th>News Heading</th>
                                    <th>Thumbnail</th>
                                    <th>Featured</th>
                                    <th>Highlight</th>
                                    <th>Trending</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($news as $new)
                                <tr>
                                    <td>{{$new->id}}</td>
                                    <td>{{$new->NewsHeading}}</td>
                                    <td><img src={{asset('uploads/news/'.$new->ThumbImage.'')}} style="width:100px"></td>
                                    <td><label class="switch">
                                        @if($new->Featured !=null)
                                        <input type="checkbox" name="featured"id="featured" checked>
                                        @else
                                        <input type="checkbox" name="featured"id="featured" >
                                        @endif
                                        <span class="slider round"></span>
                                    </label></td>
                                    <td><label class="switch">
                                        @if($new->Highlight !=null)
                                        <input type="checkbox" name="featured"id="featured" checked>
                                        @else
                                        <input type="checkbox" name="featured"id="featured" >
                                        @endif
                                        <span class="slider round"></span>
                                    </label></td>
                                    <td><label class="switch">
                                        @if($new->Trending !=null)
                                        <input type="checkbox" name="featured"id="featured" checked>
                                        @else
                                        <input type="checkbox" name="featured"id="featured" >
                                        @endif
                                        <span class="slider round"></span>
                                    </label></td>
                                    <td>
                                        <button type="edit" id="edit_category" class="btn btn-secondary"><i class="fas fa-edit"></i></button>
                                        <button type="delete" id="delete_category" class="btn btn-secondary">
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
@endsection
