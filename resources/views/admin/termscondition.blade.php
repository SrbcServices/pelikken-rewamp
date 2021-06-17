@extends('layouts.admin_layout')
@section('content')
<div class="pt-4"></div>
<div class="jumbotron bg-white p-3" style="margin-bottom: 10px">
    <h3 class="text-gray">Terms and Condition</h3>
</div>  

<form>
    @csrf
    <div style="padding-top: 2%; margin: 0 2%">
        <h5 style="color: grey margin-bottom: 1%;">Terms and Condition of  Pelikken</h5>
        <textarea  name="terms_condition" id="editor" rows="5" cols="33" required>{{$terms? $terms->TermsCondition ? $terms->TermsCondition:'':''}}</textarea>
    
        <button type="submit" id="submit-terms" class="btn btn-secondary mt-5" data-sub="submit"
                                style="float: right;margin-bottom:20px;">submit</button>
    
    </div>
    

</form>
    



@endsection
@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    

    CKEDITOR.replace('terms_condition');
    //$('#editor').ckeditor();

</script>
<script>

$(document).on("click", "#submit-terms", function(e){
        e.preventDefault();

        CKEDITOR.instances.editor.updateElement();

       let terms_condition =$(`textarea[name="terms_condition"]`).val();


       var form = new FormData();

       form.append("_token", "{{csrf_token()}}");

       form.append('terms_condition',terms_condition)

       $.ajax({

        url: "/admin/terms",
        type: "post",
        contentType: false,
        processData: false,

        data: form,

        success: function (response) {
            console.log(response)
            if (response.status == 'error') {

                console.log('Error Occured')

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