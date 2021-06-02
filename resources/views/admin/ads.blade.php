@extends('layouts.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection
@section('content')
    <div class="pt-4"></div>
    <div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
        <h3 class="text-gray">Ads</h3>
        <p class="text-gray" style="font-size: 18px">Admin / Ads </P>
    </div>
    <div class="container-fluid">

        <!--button-->
        <div class="btncustom">
            <button type="button" data-toggle="modal" data-target="#exampleModal" style="float: right">
                Add New Ads</button>
        </div>
        <!--button End-->
        <!--popup-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ads</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- form-->
                    <div class="modal-body">

                        <div class="form-group">
                            <label>
                                <h4 class="text-gray" style="font-size: 18px">Heading</h4>
                            </label>
                            <input type="text" name="heading" class="form-control" placeholder="Enter heading">
                        </div>

                        <div class="form-group">
                            <label>
                                <h4 class="text-gray" style="font-size: 18px">Discription</h4>
                            </label>
                            <input type="text" name="discription" class="form-control" placeholder="Enter Discription">
                        </div>

                        <div class="container">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row p-3">
                                        <div class="col-md-6">
                                            <label for="image" class="btn btn-secondary" style="font-weight: normal">Select
                                                a file</label>
                                            <input type="file" id="image" style="display: none" image* />

                                        </div>

                                        <div class="col-md-6">
                                            <div id="upload-demo"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- //cropperend --}}
                        <div class="modal-footer">
                            <div class="btncustom">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-secondary" id="add-ad">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Popup End-->

        <div class="card" style="width: 100%">
            <div class="card-header">
                <h3 class="card-title">Ads</h3>
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
                                        <th>Headings</th>
                                        <th>Discription</th>
                                        <th>Image</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $ad)
                                        
                                    
                                    <tr>
                                        <td>{{$ad->id}}</td>
                                        <td>{{$ad->adHeading}}</td>
                                        <td>{{$ad->adDiscription}}</td>
                                        <td><img src="{{asset('uploads/ads/'.$ad->adImage)}}" style="width: 100px" height="auto"/></td>
                                  <td>
                                      <button type="button" class="btn btn-secondary" id="delete-ad"data-id="{{$ad->id}}"><i class="fas fa-trash-alt"></i></button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script>
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' } 
                width: 300,
                height: 200,
                type: 'square' //square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#add-ad').on('click', function(ev) {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                $.ajax({
                    url: "/ads",
                    type: "POST",
                    data: {
                        "image": img,
                        heading: $(`input[name='heading']`).val(),
                        discription: $(`input[name='discription']`).val(),
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if(response.status == 'success'){
                            $('#exampleModal').modal('hide')
                            $('#unit_table').load(document.URL + ' #unit_table');
                        }
                    }
                });
            });
        });

        //delete

$(document).on("click", "#delete-ad", function (e) {
console.log('clicked');
var id = $(this).attr('data-id');



$.ajax({
    method:'get',
    url:'adsdelete/'+id,
    success:function(response){
        if(response.status=='success'){
           $('#unit_table').load(document.URL + ' #unit_table');
       }
    }
})

});

    </script>
@endsection
