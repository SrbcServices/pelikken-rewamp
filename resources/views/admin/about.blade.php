@extends('layouts.admin_layout')
@section('content')

<div class="pt-4"></div>
<div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
    <h3 class="text-gray">About Page</h3>
</div>

<form>
@csrf
<div style="padding-top: 2%; margin: 0 2%">
    <div class="form-group">
        <label>
            <h4 class="text-gray" style="font-size: 18px">Heading</h4>
        </label>

        <input type="text" name="heading" placeholder=" Enter the Heading" class="form-control" value="{{$about? $about->heading ? $about->heading:'':''}}">
    </div>
    <div class="form-group">
        <label>
            <h4 class="text-gray" style="font-size: 18px">Slogen</h4>
        </label>

        <input type="text" name="slogen" placeholder=" Enter the Slogen" class="form-control" value="{{$about? $about->slogan ? $about->slogan:'':''}}">
    </div>
    <div class="form-group">
        <label>
            <h4 class="text-gray" style="font-size: 18px">Discription</h4>
        </label>
    
    <textarea  name="about_discription" id="editor" rows="5" cols="33" required>{{$about? $about->AboutDiscription ? $about->AboutDiscription:'':''}}</textarea>

    </div>
   
   
    
    <button type="submit" id="submit-about" class="btn btn-secondary mt-5" data-sub="submit"
                            style="float: right;margin-bottom:20px;">submit</button>

</div>

</form>


    





@endsection

@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    

    CKEDITOR.replace('about_discription');
    //$('#editor').ckeditor();

</script>

<Script>

$(document).on("click", "#submit-about", function(e){
        e.preventDefault();

        CKEDITOR.instances.editor.updateElement();

       let about_discription =$(`textarea[name="about_discription"]`).val();


       var form = new FormData();

       form.append("_token", "{{csrf_token()}}");

       form.append('about_discription',about_discription)
       form.append('heading',$(`input[name="heading"]`).val())
       form.append('slogen',$(`input[name="slogen"]`).val())

       $.ajax({

        url: "/admin/about",
        type: "post",
        contentType: false,
        processData: false,

        data: form,

        success: function (response) {
            console.log(response)
            if (response.status == 'error') {

                $.simplyToast(response.message, 'danger')
                console.log('error')

            } else{
                // $('#addform').load(document.URL + ' #addform');
                $.simplyToast(response.message, 'success')
                console.log('Success')
            }
        },

});


        
    })

</script>

    
@endsection