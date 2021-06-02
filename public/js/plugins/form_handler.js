

//fetching Subcategory

$(`select[name="category"]`).on('change',function(){
    
var selected = $(`select[name="category"]`).find(":selected").val();
    $.ajax({
        method:'get',
        url:'fetch_sub_category/'+selected,
        success:function(response){
            
           if(response.status == 'success'){
            content = '<option value=""></option>';
            
               if(response.sub_categories.length>0){
                  content+= response.sub_categories.map((ele)=>{
                       return`<option value="${ele.id}">${ele.sub_category_name}</option>`
                   })
                  $(`select[name="sub_category"]`).html(content)
               }else{
                $(`select[name="sub_category"]`).html('no sub category found')
               }
           
           }
        }
    })
})
//fetch countries frome condinents        
$(`select[name="condinent"]`).on('change',function(){
var selected_country = $(`select[name="condinent"]`).find(":selected").val();
console.log(selected_country);
    $.ajax({
        method:'get',
        url:'fetch_country/'+selected_country,
        success:function(response){
            
           if(response.status == 'success'){
            content = '<option value=""></option> ';
               if(response.countries.length>0){
                  content+= response.countries.map((ele)=>{
                       return`<option value="${ele.id}">${ele.country_name}</option>`
                   })
                  $(`select[name="country"]`).html(content)
               }else{
                $(`select[name="country"]`).html('no country found')
               }
           
           }
        }
    })})