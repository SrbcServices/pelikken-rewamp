@extends('layouts.admin_layout')
@section('content')




<div class="row">
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body np">
            <p><b>Subject:&nbsp;&nbsp;</b></p>
            <p><b>Message:&nbsp;&nbsp;</b></p>
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <div class="col-md-12 pt-5 p-2">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                            href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                            aria-selected="true">View Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                            href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected="false">Viewed Table</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">

                     {{-- View Table Start --}}




                        <table id="unit_table" class="table table-bordered table-striped" role="grid"
                        aria-describedby="example1_info">

                        <thead>

                            <tr>
                              <th>Id</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Message</th>
                           

                            </tr>
                        </thead>

                        <tbody> 

                        @foreach ($message as $index=> $mess)
                        @if ($mess->Status == 0)
                        <tr>
                          <td>{{$mess->id}}</td>
                          <td>{{$mess->FullName}}</td>
                          <td>{{$mess->Email}}</td>
                          <td>{{$mess->PhoneNumber}}</td>
                          <td class="{{$mess->Status == 1 ? 'verified' : 'not_verified'}}">
                            <p>{{$mess->Status == 1 ? 'verified' : 'not verified'}}</p></td>

                          <td>
                            <div class="btncustom">
                         
                              <button id="view" type="button" data-val="{{$mess->id}}" 
                                 data-message = "{{$mess->Message}}" data-subject = "{{$mess->Subject}}">
                                <i class="fas fa-eye"></i>
                              </button>
                            </div>
  
  
                            </td>
  

                      </tr>
                        @endif
                        @endforeach

                        </tbody>
                    

                        
                    </table>





                    {{-- View table end --}}


                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">

                       {{-- viewed table start --}}

                    <table id="unit_table" class="table table-bordered table-striped" role="grid"
                        aria-describedby="example1_info">

                        <thead>

                            <tr>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                              

                            </tr>
                        </thead>
                     
                      
                        <tbody> 

                          @foreach ($message as $index=> $mess)
                          @if ($mess->Status == 1)
                          <tr>
                            <td>{{$mess->id}}</td>
                            <td>{{$mess->FullName}}</td>
                            <td>{{$mess->Email}}</td>
                            <td>{{$mess->PhoneNumber}}</td>
                            <td class="{{$mess->Status == 1 ? 'verified' : 'not_verified'}}"><p>{{$mess->Status == 1 ? 'verified' : 'not verified'}}</p></td>
  
  
                           <td>
                            <div class="btncustom">
                         
                              <button id="view" type="button" data-val="{{$mess->id}}" data-message = "{{$mess->Message}}" data-subject = "{{$mess->Subject}}">
                                <i class="fas fa-eye"></i>
                              </button>
                            </div>
  
  
                            </td>
  
                      
                        </tr>
                          @endif
                          @endforeach
  
                          </tbody>

                       
                        
                    </table>





                       {{-- viewed table end --}}





                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>

$(document).on('click','#view', function(ev) {
    ev.preventDefault();

$('#modal').modal('show')

    let id =  $(this).attr('data-val');
    let message = $(this).attr('data-message');
    let subject = $(this).attr('data-subject');

   $('.np p').html('<b>subject:</b>'+subject)
   $('.np p').html('<b>mdessage:</b>'+message)

let current = $(this).closest('tr').children("td:nth(4)").children('p').html();

if(current !='verified'){
  $.ajax({
        type: "get",
        url: "/admin/message/"+id,


        success: function (response) {
            console.log(response)
            if (response.status == 'error') {
                console.log('error')

            } else{

                console.log('Success')
            }
        }



    })



}

   

})



</script>

@endsection