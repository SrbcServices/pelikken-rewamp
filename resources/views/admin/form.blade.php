@extends('layouts.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection
@section('content')

 
    <div class="container">
        <div id="error-show" style="padding-top:20px;">

        </div>
        <form action='add-news' method="POST" id="news-form" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6" style="margin-top: 2%">
                    <div class="form-group">
                        <label>
                            <h6>News Heading</h6>
                        </label>
                        <input type="text" name="News_Heading" class="form-control">
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 2%">
                    <div class="form-group">
                        <label>
                            <h6>Sub Heading</h6>
                        </label>
                        <input type="text" name="Sub_Heading" class="form-control">
                    </div>
                </div>




                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <h6>Select Sources</h6>
                        </label>
                        <select class="form-control" name="source" style="width: 100%;">
                            <option></option>
                            @foreach ($sources as $source)

                                <option value="{{ $source->id }}">{{ $source->source_name }}</option>

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
                            <option></option>
                            @foreach ($quantinents as $quantinet)

                                <option value="{{ $quantinet->id }}">{{ $quantinet->Condinent_Name }}</option>

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
                            @foreach ($category as $category)

                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

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

                        </select>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            <h6>Select Tags</h6>
                        </label>
                        {{-- <select class="form-control" name="tags" style="width: 100%;"> --}}
                        <select class="select2 select2bs4" multiple="multiple" name="tags[]" data-placeholder="Select a Tag"
                            style="width: 100%;" id="tags">

                            @foreach ($tags as $tags)
                                <option></option>
                                <option value="{{ $tags->id }}">{{ $tags->tag_name }}</option>

                            @endforeach

                        </select>

                    </div>
                </div>
                

            </div>


            {{-- flip Switch --}}

            <section id="featured">

                <div class="container">

                    <div class="row">
                        {{-- featured --}}
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 style="color: grey">Featured</h6>
                                </div>

                                <div class="col-md-3">
                                    <label class="switch">
                                        <input type="checkbox" name="featured" id="featured">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        {{-- Latest --}}

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 style="color: grey">Trending</h6>
                                </div>

                                <div class="col-md-3">
                                    <label class="switch">
                                        <input type="checkbox" name="trending">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">

                                <div class="col-md-3">
                                    <h6 style="color: grey">Highlight</h6>
                                </div>

                                <div class="col-md-3">
                                    <label class="switch">
                                        <input type="checkbox" name="highlight">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            {{-- wysiwig --}}

            <div class="container">
                <h5 style="color: grey">News Discription</h5>
                <textarea name="discription" id="editor" rows="5" cols="33" required></textarea>
            </div>

            {{-- wysiwig end --}}

            {{-- thumbnail Image --}}

            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-top: 2%">
                        <label for="image-for-th" class="btn btn-secondary" style="font-weight: normal">Select Thumbnile
                            Image</label>
                        <input type="file" id="image-for-th" style="display: none" />

                    </div>

                    <div class="col-md-6" style="margin-top: 2%">
                        <div id="upload-demo"></div>
                    </div>
                </div>
                <input type="hidden" name="thumb_img" id="thumb">
                {{-- thumbnail Image End --}}
                <div class="row">


                    <div class="col-md-6">
                    
                        <div class="col-md-3">
                            <label for="bannerImage"><img src="https://asvs.in/wp-content/uploads/2017/08/dummy.png" alt=""
                                    style="width: 400px" id="preview"></label>
                        </div>
                        <input type="file" name="news_banner" id="bannerImage" style="display: none"
                            onchange="preview_image(event)">
    
                    </div>
                    <div class="col-md-6" style="margin-top: 30px">
                        <label for="video" style="font-weight: normal"><img
                                src="https://asvs.in/wp-content/uploads/2017/08/dummy.png"></label>
                        <input type="file" id="video" name="news_video" style="display: none" />
                    </div>

                    <div class="col-md-6">
                        <button type="submit" id="submit-news" class="btn btn-secondary mt-5" data-sub="submit"
                            style="float: right;margin-bottom:20px;">submit</button>
                    </div>
                </div>
            </div>




        </form>


    </div>






@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        CKEDITOR.replace('discription');
        //$('#editor').ckeditor();

    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

    </script>
    <script>
        function preview_image(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('preview');
                        output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
    </script>

    <script>
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' } 
                width: 400,
                height: 225,
                type: 'square' //square
            },
            boundary: {
                width: 400,
                height: 225
            }
        });
        $('#image-for-th').on('change', function() {
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
        $('#submit-news').on('click', function(ev) {
            ev.preventDefault();
            

            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                $('#thumb').val(img)
                CKEDITOR.instances.editor.updateElement();
               
               let news_heding = $(`input[name="News_Heading"]`).val();
               let news_sub_heading = $(`input[name="Sub_Heading"]`).val();
               let source = $(`select[name="source"]`).val();
               let Condinent = $(`select[name="condinent"]`).val();
               let Country =$(`select[name="country"]`).val();
               let Category=$(`select[name="category"]`).val();
               let SubCategory=$(`select[name="sub_category"]`).val();
               let featured = $(`input[name="featured"]:checked`).val();
               let trending =$(`input[name="trending"]:checked`).val();
               let highlight =$(`input[name="highlight"]:checked`).val();
               let NewsDiscription =$(`textarea[name="discription"]`).val();
               let banner_image = $(`input[name="news_banner"]`)[0].files;
               let news_video = $(`input[name="news_video"]`)[0].files;
               let tags = $(`#tags`).val();
              
              

               var form = new FormData();

               form.append("_token", "{{csrf_token()}}");
               form.append("news_heading",news_heding)
               form.append('news_sub_heading',news_sub_heading)
               form.append('source',source)
               form.append('Condinent',Condinent)
               form.append('Country',Country)
               form.append('Category',Category)
               form.append('SubCategory',SubCategory)
               form.append('Featured',featured)
               form.append('trending',trending)
               form.append('highlight',highlight)
               form.append('NewsDiscription',NewsDiscription)
               form.append('banner_image',banner_image[0])
               form.append('news_video',news_video[0])
               form.append('tags',tags)
               form.append('thumb_image',img)


                $.ajax({
                    url: "/add-news",
                    type: "POST",
                    contentType: false,
                    processData: false,

                    data: form,
                    beforeSend: function() {
                        $('#submit-news').html(
                            '<i class="fa fa-spinner" aria-hidden="true"></i>')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                           window.location.href = '/all-news'
                        }else if(response.status == 'fail'){
                            $('#error-show').html('<li class="error">something went wrong, Please try again</li>')
                            $('#submit-news').html('submit')
                        } else {
                            $('#submit-news').html('submit')
                            let keyf = Object.keys(response.errors);

                            let err = response.errors;


                            errors = ''
                            for (let i = 0; i < keyf.length; i++) {
                                errors += `<li class="error">${err[keyf[i]]}</li>`
                            }
                            $('#error-show').html(errors)
                        }
                    }
                });
            });
        });

    </script>


    <script src="{{ asset('js/plugins/form_handler.js') }}"></script>

    {{-- <script src="{{ asset('js/plugins/dropzone-amd-module.js') }}"></script> --}}
    <script src="{{ asset('js/plugins/bootstrap-switch.min.js') }}"></script>


@endsection
