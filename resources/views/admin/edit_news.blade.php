@extends('layouts.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <link rel="stylesheet" href="{{ asset('css/simply-toast.min.css') }}">
@endsection
@section('content')


    <div class="row">

        <div class="col-md-12 pt-5 p-2">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">Basic Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Options</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                                aria-selected="false">Thumb Nail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                                aria-selected="false">News Uploads</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            {{-- EDIT News --}}


                            <div class="container">
                                <div id="error-show" style="padding-top:20px;">

                                </div>
                                <form action='add-news' method="POST" id="basic-form">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6" style="margin-top: 2%">
                                            <div class="form-group">
                                                <label>
                                                    <h6>News Heading</h6>
                                                </label>
                                                <input type="text" name="News_Heading" class="form-control"
                                                    value="{{ $news_details->NewsHeading }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 2%">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Sub Heading</h6>
                                                </label>
                                                <input type="text" name="Sub_Heading" class="form-control"
                                                    value="{{ $news_details->SubHeading }}">
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Sources</h6>
                                                </label>
                                                <select class="form-control" name="source" style="width: 100%;">
                                                    @foreach (App\Models\source::all() as $source)
                                                        @if ($source->id == $news_details->Source)
                                                            <option value="{{ $source->id }}" selected>
                                                                {{ $source->source_name }}</option>
                                                        @else
                                                            <option value="{{ $source->id }}">{{ $source->source_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach


                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Quantinent</h6>
                                                </label>
                                                <select class="form-control" name="condinent" style="width: 100%;">
                                                    @foreach (App\Models\condinent::all() as $source)
                                                        @if ($source->id == $news_details->Condinent)
                                                            <option value="{{ $source->id }}" selected>
                                                                {{ $source->Condinent_Name }}</option>
                                                        @else
                                                            <option value="{{ $source->id }}">
                                                                {{ $source->Condinent_Name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Country</h6>
                                                </label>
                                                <select class="form-control" name="country" style="width: 100%;">
                                                    @foreach (App\Models\country::all() as $source)
                                                        @if ($source->id == $news_details->Country)
                                                            <option value="{{ $source->id }}" selected>
                                                                {{ $source->country_name }}</option>
                                                        @else
                                                            <option value="{{ $source->id }}">
                                                                {{ $source->contry_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Category</h6>
                                                </label>
                                                <select class="form-control" name="category" style="width: 100%;">
                                                    <option></option>
                                                    @foreach (App\Models\category::all() as $source)
                                                        @if ($source->id == $news_details->Category)
                                                            <option value="{{ $source->id }}" selected>
                                                                {{ $source->category_name }}</option>
                                                        @else
                                                            <option value="{{ $source->id }}">
                                                                {{ $source->category_name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Sub Category</h6>
                                                </label>
                                                <select class="form-control" name="sub_category" style="width: 100%;">
                                                    <option></option>
                                                    @foreach (App\Models\subCategory::all() as $source)
                                                        @if ($source->id == $news_details->SubCategory)
                                                            <option value="{{ $source->id }}" selected>
                                                                {{ $source->sub_category_name }}</option>
                                                        @else
                                                            <option value="{{ $source->id }}">
                                                                {{ $source->sub_category_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <h6>Select Tags</h6>
                                                </label>

                                                <select class="select2 select2bs4" multiple="multiple" name="tags[]"
                                                    data-placeholder="Select tags" style="width: 100%;" id="tags">

                                                    @foreach (App\Models\tags::all() as $source)
                                                        ///tags section
                                                        <option value="{{ $source->id }}">{{ $source->tag_name }}
                                                        </option>

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="container">
                                        <h5 style="color: grey">News Discription</h5>
                                        <textarea name="discription" id="editor" rows="5" cols="33" required>
                                                {!! $news_details->NewsDiscription !!}

                                              </textarea>
                                    </div>

                                    <button class="btn btn-secondary mt-3 mb-3 ml-2" id="basic_update">Update</button>

                            </div>

                            </form>


                        </div>
                        {{-- Edit News End --}}
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            {{-- Featured buttons Start --}}
                            <div class="container">
                                <div class="row">
                                    {{-- featured --}}
                                    <div class="col-md-12" style="margin-top: 2%">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 style="color: grey">Featured</h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="switch">
                                                    <input type="checkbox" name="featured" id="featured"
                                                        class="switch_for_change" @if ($news_details->Featured != null) checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- Latest --}}

                                    <div class="col-md-12" style="margin-top: 2%">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 style="color: grey">Trending</h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="switch">
                                                    <input type="checkbox" name="trending" class="switch_for_change" @if ($news_details->Trending != null) checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="margin-top: 2%">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 style="color: grey">Highlight</h6>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="switch">
                                                    <input type="checkbox" name="highlight" class="switch_for_change" @if ($news_details->Highlight != null) checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>










                            {{-- featured Buttons End --}}
                        </div>


                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            {{-- Edit News Image Start --}}
                            <div class="row p-3">
                                <div class="col-md-4" style="margin-top: 2%">
                                    <img src="{{ asset('uploads/news/' . $news_details->ThumbImage . '') }}" alt=""
                                        id="show_current_updated">
                                </div>

                                <div class="col-md-4" style="margin-top: 2%">
                                    <label for="change" class="btn btn-secondary" style="font-weight: normal">Change
                                        Thumbnile
                                        Image</label>
                                    <input type="file" id="change" style="display: none" />

                                </div>

                                <div class="col-md-4" style="margin-top: 2%">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
                            <form action="" id="thumb_data">
                                @csrf
                                <input type="hidden" name="thumb_img" id="thumb">
                                <input type="hidden" value="{{ $news_details->id }}" name="id">
                            </form>



                            {{-- Edit News Images End --}}
                            <button class="btn btn-secondary ml-3 mb-3" id="update_thumb">Update</button>
                        </div>


                        <div class="tab-pane fade  " id="custom-tabs-four-settings" role="tabpanel"
                            aria-labelledby="custom-tabs-four-settings-tab">

                            {{-- News Uploads Start --}}
                            <div class="conatiner bk-s">
                             
                                <form method="post" id="multimedia" enctype="multipart/form-data">
                                  
                                    <div class="row m-5 ">


                                        <div class="col-md-6" style="margin-top:30px">
                                            @if ($news_details->newsImages != null)
                                                <img src="{{ asset('uploads/news_banners/' . $news_details->newsImages->ImageName . '') }}"
                                                    alt="" style="width: 300px"><br>
                                            @else
                                                <label for="bannerImage">Select Banner image</label><br>
                                            @endif
                                            <input type="file" id="bannerImage" name="news_banner" image* class="mt-3" />

                                        </div>
                                        
                                        <div class="col-md-6" style="margin-top: 30px">
                                
                                      
                                            @if ($news_details->newsVideo)
                                        
                                            <video width="320" height="240" controls>
                                                <source src="{{asset('uploads/news_video/'.$news_details->newsVideo->VideoName.'')}}" type="video/mp4">
                                                
                                               
                                              </video><br>
                                             
                                            @else
                                                <label for="bannerImage">Select Banner image</label><br>
                                            @endif
                                            <input type="file" id="video" name="news_video" class="mt-3" />
                                        </div>

                                        <button class="btn btn-secondary mt-5 ml-2 " id="multimedia_update">Update</button>
                                    </div>
                                </form>
                            </div>

                            {{-- News Uploads End --}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>


    <?php if (count($news_details->tags) > 0) {
    $selected = [];
    foreach ($news_details->tags as $item) {
    array_push($selected, $item->id);
    }
    } else {
    $selected = [''];
    } 
    
    
    
    ?>

@endsection
@section('scripts')
    <script src="{{ asset('js/simply-toast.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('discription');

    </script>
    <script>
        $(function() {

            let selected = <?php echo json_encode($selected); ?>;
console.log(selected);
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4',

            })
            $('.select2bs4').val(selected);
            $('.select2bs4').trigger('change');
        })

    </script>
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

        $('#change').on('change', function() {
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
        //change thumbnail image ajax occure here
        $('#update_thumb').on('click', function(ev) {
            ev.preventDefault();

            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                $('#thumb').val(img);
                $.ajax({
                    type: "post",
                    url: "/news/update/thumbnail",
                    data: $('#thumb_data').serialize(),

                    success: function(response) {
                        if (response.status == 'success') {
                            $('#show_current_updated').attr('src', img)
                            $.simplyToast(response.message, {
                                ele: "body",
                                type: "info",
                                offset: {
                                    from: "top",
                                    amount: 20
                                },
                                align: "right",

                                width: 250,

                                delay: 40000,

                                allow_dismiss: true,

                                stackup_spacing: 10

                            });

                        }
                    }
                });
            })
        })

        //update the basic news details

        $('#basic_update').on('click', function(e) {
            e.preventDefault();
            console.log('cliked');
            let update_data = $('#basic-form').serialize();
            $.ajax({
                type: "post",
                url: "/edit-news/{{ $news_details->id }}",
                data: update_data,

                success: function(response) {
                    if (response.status == 'error') {

                        let keyf = Object.keys(response.errors);

                        let err = response.errors;


                        errors = ''
                        for (let i = 0; i < keyf.length; i++) {
                            errors += `<li class="error">${err[keyf[i]]}</li>`
                        }
                        $('#error-show').html(errors)
                    } else if (response.status == 'success') {
                        $('#error-show').html(response.message).css('color', 'green');
                    } else {
                        $('#error-show').html('something went wrong <b>try again</b>');
                    }
                }
            });
        })
        //update the features and trending status
        
        $(document).on('change', '.switch_for_change', function(e) {
            if ($(this).is(':checked')) {
                var status = 'on'
            }
            $.ajax({
                type: "get",
                url: "/news/change_status/{{ $news_details->id }}/" + e.target.name + '/' +
                    status,
                success: function(response) {

                }
            });


        })

        //update banner image and video
        $('#multimedia_update').on('click', function(e) {
            e.preventDefault();
            let banner_image = $(`input[name="news_banner"]`)[0].files;
            let news_video = $(`input[name="news_video"]`)[0].files;
            let id = $(`input[name=id]`).val();
            let token = "{{ csrf_token() }}"

            let multimedia_form = new FormData();
            multimedia_form.append('banner_image', banner_image[0])
            multimedia_form.append('news_video', news_video[0])
            multimedia_form.append('_token', token)
            multimedia_form.append('id', id)
            $.ajax({
                type: "post",
                url: "/news/update/multimedia",
                data: multimedia_form,
                contentType: false,
                processData: false,
                success: function(response) {
                   if(response.status == 'error'){
                    

                    $.simplyToast(response.message,'danger')
                   }else if(response.status=='success'){
                    $.simplyToast(response.message,'success')
                    //set image an video in dom
                   window.location.reload();
                   }
                }
            });

        })

    </script>
@endsection
