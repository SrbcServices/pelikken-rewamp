$(document).ready(function () {

    $(document).on("click", "#add_new_category", function(e){
        e.preventDefault();
    
          
        $('#exampleModal').modal('show');
        $('input[name="category_name"]').attr(
            "value",
       ' '
        );
        $('button[data-sub = "submit"]').attr("id","submit");
        $('button[data-sub = "submit"]').html( "ADD");
    
     })

   
 $(document).on("click", "#submit", function(){
    
    $.ajax({

        type: "post",
        url: "/sub_category",
        data:$('#addform').serialize(),

        success: function (response){
        
            console.log(response)

            if (response.status == 'error'){
               $('.error').html('Error Occured')
            } else if (response.status == 'Success') {
                $('#exampleModal').modal('hide')
                $('#unit_table').load(document.URL + ' #unit_table');
           } else {
               $('.error').html('Something went wrong')
           }

       },

    })

 })

 //edit

 $(document).on("click", "#edit_category", function () {
    var id = $(this).attr('data-id');
    $(`input[name='id']`).attr('value',id)
    
        $('#exampleModal').modal('show');
        
        $('button[data-sub = "submit"]').attr("id","update");
          $('button[data-sub = "submit"]').html( "update");
    
         $('input[name="sub_category_name"]').attr(
             "value",
             $(this).closest("tr").children("td:nth(1)").html() 
        );



        
    });

    //update

    $(document).on("click","#update", function (e) {
        e.preventDefault();
        var data = $('#addform').serialize()
        let id = $(`input[name='id']`).val()
        
        $.ajax({
            type: "post",
            url: "/sub_categoryupdate/"+id,
 
            data: data,

            success: function (response) {
                console.log(response)
               if (response.status == 'success') {
                    $('#exampleModal').modal('hide')
                    $('#unit_table').load(document.URL + ' #unit_table');
                }
            },

    });
});

$(document).on("click", "#delete_category", function () {

    var id = $(this).attr('data-id');

    $.ajax({
        type: "get",
        url: "/sub_categorydelete/"+id,
        
        success: function(response){
            console.log(response)
            if(response.status=='success'){
                $('#unit_table').load(document.URL + ' #unit_table');
            }
        },
    });

});

 });


