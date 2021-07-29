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



                        <table id="unit_table" class="table table-bordered table-striped allnews" role="grid"
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
                                        <td>{{ $new->id }}</td>
                                        <td>{{ $new->NewsHeading }}</td>
                                        <td><img src={{ asset('uploads/news/' . $new->ThumbImage . '') }} style="width:100px">
                                        </td>
                                        <td><label class="switch">

                                                <input type="checkbox" name="featured" id="featured" @if ($new->Featured != null) checked @endif
                                                    onchange="change_status(event,'featured',{{ $new->id }});">


                                                <span class="slider round"></span>
                                            </label></td>
                                        <td><label class="switch">

                                                <input type="checkbox" name="highlight" id="featured" @if ($new->Highlight != null) checked @endif onchange="change_status(event,'highlight',{{ $new->id }});">

                                                <span class="slider round"></span>
                                            </label></td>
                                        <td><label class="switch">

                                                <input type="checkbox" name="trending" id="featured" @if ($new->Trending != null) checked @endif
                                                    onchange="change_status(event,'trending',{{ $new->id }});">

                                                <span class="slider round"></span>
                                            </label></td>
                                        <td>
                                            <a href="/edit-news/{{ $new->id }}" id="edit_category"
                                                class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                            <button type="delete" id="delete_category" class="btn btn-secondary"
                                                onclick="delete_news({{ $new->id }})">
                                                <i class="fas fa-trash-alt"></i></button>
                                            <button  id="copy" class="btn btn-secondary"
                                                onclick="news_copy(event,'{{$new->slug}}')">
                                                <i class="fas fa-copy" ></i></button>


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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#unit_table').DataTable();
        });

        //delete news ajax request

        function delete_news(id) {
            console.log('clicked');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this news",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            url: "/news/delete",
                            data: {
                                'id': id,
                                '_token': "{{ csrf_token() }}"

                            },
                            

                            success: function(response) {
                                if (response.status == 'success') {
                                    $.simplyToast(response.message, 'success')
                                    $('.allnews').load(document.URL + ' .allnews')
                                } else {
                                    $.simplyToast('something went wrong ,please try again', 'danger')
                                }
                            }
                        });
                    }
                });

        }


        //change status using ajax live
        function change_status(e, name, id) {

            if (e.target.checked == true) {
                var status = 'on'
            } else {
                var status = 'null'
            }

            $.ajax({
                type: "post",
                url: "/news/update/options/view",
                data: {
                    'name': name,
                    'news_id': id,
                    'status': status,
                    '_token': "{{ csrf_token() }}"

                },

                success: function(response) {
                 if(response.status == 'success'){
                    $.simplyToast(response.message, 'success')
                 }
                }
            });
        }

        //copy the news link
        function news_copy(e,id){
            navigator.clipboard.writeText(`${window.location.origin}/pelikken/news/${id}`);
            $.simplyToast('Link Copied to clipboard', 'success')
        }

    </script>
@endsection
