@extends('layouts.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection
@section('content')


<div class="row">
          
          <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Edit</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">featured</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Thumb Nail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">News Uploads</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  {{-- EDIT News --}}


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
                                    <select class="select2 select2bs4" multiple="multiple" name="tags" data-placeholder="Select a State"
                                        style="width: 100%;" id="tags">
          
            
                                    </select>
            
                                </div>
                            </div>
                            
            
                        </div>

                        <div class="container">
                          <h5 style="color: grey">News Discription</h5>
                          <textarea name="discription" id="editor" rows="5" cols="33" required></textarea>
                        </div>

                      </div>


                  {{-- Edit News End --}}
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    {{-- Featured buttons Start  --}}
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
                                      <input type="checkbox" name="featured"id="featured">
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
                                      <input type="checkbox" name="trending">
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
                                      <input type="checkbox" name="highlight">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                     
                      


                      

                      
                          
                  

                    {{-- featured Buttons End --}}
                  </div>


                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    {{-- Edit News Image Start --}}
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

                    {{-- Edit News Images End --}}
                  </div>
                    

                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                   
                    {{-- News Uploads Start --}}
                     <div class="conatiner" >
                       <div class="row">


                          <div class="col-md-6" style="margin-top:30px">
                              <label for="bannerImage" style="font-weight: normal;margin-right:20px"><img
                                      src="https://asvs.in/wp-content/uploads/2017/08/dummy.png"></label>
                              <input type="file" id="bannerImage" name="news_banner" style="display: none; " image* />
      
                          </div>
                          <div class="col-md-6" style="margin-top: 30px">
                              <label for="video" style="font-weight: normal"><img
                                      src="https://asvs.in/wp-content/uploads/2017/08/dummy.png"></label>
                              <input type="file" id="video" name="news_video" style="display: none" />
                          </div>
                        </div>
                   </div>

                    {{-- News Uploads End --}}
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
</script>
@endsection