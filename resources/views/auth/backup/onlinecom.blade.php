@include('layouts.header') 
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
     @include('layouts.profilenav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
       @include('panels.navbar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">

        

               <!----- contact list start ------------------------------------------------------------------------->
               @foreach ($contacts as $contact)
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">{{ $contact->profile_name.' | '.$contact->gender.' | '.$contact->id  }}   </h4>
                                              
                                       <div class="d-flex">
                                            <div class="avatar me-50">

                                            @if ($contact->gender == 1 && $contact->disturb_tag==0 ) 
                                            <img src=" {{ asset('images/avatars/boy.png')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                            @if ($contact->disturb_tag==1 ) 
                                            <img src=" {{ asset('images/avatars/dontdist.jpg')  }}" alt="Avatar" width="50" height="50" />
                                            @endif

                                           
                                            
                                            </div>
                                                    <div class="author-info">
                                                    <small><a href="#" class="text-body"></a></small>
                                                    <span class="text-muted ms-50 me-25">|</span>
                                                    <span>@if ($contact->date_sent > 0) {{ \Carbon\Carbon::parse($contact->date_sent)->format('F j, Y') }}  @endif</span>
                                                    </div>
                                        </div>
                                    <div class="my-1 py-25">
                                        <!--a href="#">
                                        <span class="badge rounded-pill badge-light-info me-80"> Share</span>
                                        </a>
                                        <a href="#">
                                        <span class="badge rounded-pill badge-light-primary">Fashion</span>
                                        </a-->
                                    </div>
                                    <p class="card-text blog-content-truncate">
                                        Donut fruitcake soufflé apple pie candy canes jujubes croissant chocolate bar ice cream.
                                    </p>
                                    <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                <div class="d-flex align-items-center">
                                                <i class="material-icons">person_pin</i>
                                                    <span class="text-body fw-bold"><a href="#" data-bs-toggle="modal" data-bs-target="#editContact{{ $contact->id }}">Profile</span></a>&nbsp;&nbsp;
                                                
                                                    <i class="material-icons">event_note</i>
                                                    <span class="text-body fw-bold"><a href="{{ route('auth.activity', $contact->id) }}">Activity</span></a></span>&nbsp;&nbsp;

                                                    @if ($contact->disturb_tag!=1 )              
                                                    <i class="material-icons">comment</i>
                                                    <span class="text-body fw-bold"><a href="{{ $contact->profile_link }}" target="_blank">Share</span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        
                                                <div class="form-check form-check-success">
                                                    <input type="checkbox"  id="{{ $contact->id }}" 
                                                    @if ($contact->date_sent == date("Y-m-d")) checked disabled  @endif
                                                    class="form-check-input" onchange="chkbx('{{ 'Sent^'.$contact->id }}')"  data-bs-toggle="modal">
                                                <label class="form-check-label">Sent Done</label>
                                                    
                                                    
                                                    </div>
                                                    @endif
                                                </div>

                                            
                                            
                                                @if ($contact->disturb_tag!=1 )  
                                                <a href="#" class="fw-bold" onclick="chkbx('{{ 'Reset^'.$contact->id }}')">Reset</a>
                                                @endif

                                               
                                               
          
                                            </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                          
              <!------------------------------------->
              @include('modal.contactprofile')  
              <!------------------------------------->
           

            @endforeach


               <!---------- contact list ends -------------------------------------------------------------------->
                
               {!! $contacts->onEachSide(1)->links() !!}

           

            </div> 

            
        </div>
    </div>
      
 <!--------------------------------------------->
@include('modal.updatetag') 

<!--------------------------------------------->

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer') 

    <script>

   $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
   })


  $(document).on('click', '.update_tag', function(e){
  var myRand = parseInt( Math.random() * 999999999999999 );   
   e.preventDefault();
   var contactID = $('#hContactID').val();   
   var task = $('#hTask').val();  
   var data = {
       'ContactID' : contactID,
       'task' : task,
       'SentDone'  : 'Yes'
    }
   // alert(contactID);
    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    //----------------------
    $.ajax({ type: "GET",
        url:  'update_tag/'+ contactID,
        data: data,
        dataType: 'json',
            success: function(response){
             // console.log(response);
              if(response.status == 400){
                $('#msgdata').html(response.errors);
              }else if(response.status == 404){
                $('#msgdata').html(response.message);
              }else {
                 $("#sentTagModal").modal('hide');

                 var page = "";
                 var url = "";
                     page = location.search.split('page=')[1];
                     if (page === undefined) {
                        url = "onlinecom";  // alert('nothing');
                     } else {
                        //alert(page);    
                      url = "onlinecom?page=" + page + "&rand=" + myRand;
                     }
                 $(location).attr('href',url);
                 
              }
            }
        });    
    //-----------------------
  });  



function chkbx(task){
  var rec = task.split('^');
  var contactID = rec[1];
  var task =  rec[0];    
  $('#hTask').val(task);  
  //alert(task);
  var myRand = parseInt( Math.random() * 999999999999999 );
  var obj = document.getElementById(contactID);
  //var contactID = obj.id;
  
  $('#tagName').html(task);
  $("#hContactID").val(contactID);
  $("#sentTagModal").modal('show');
 
  obj.checked = false; 
    //-------------------------------
    $.ajax({ type: "GET",
        url:  'get_contact/'+ contactID,
        data: 'data',
        dataType: 'json',
            success: function(response){

                if(response.status == 404){
                    $('#msgdata').html(response.message);
                }else {
                    $('#msgdata').html( response.contact.profile_name); 
                }
             //  console.log(response);
      
            }
        });
    //------------------------------

  /* if(obj.checked==true){ } */ 
  
 
}



    </script>
</body>
<!-- END: Body-->

</html>