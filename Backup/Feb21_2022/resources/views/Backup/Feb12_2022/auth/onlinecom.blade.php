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
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                        
                                
                           @php
                           switch ($profileType) {
                                case 0: 
                                    echo '<i class="material-icons">forum</i>';
                                break;

                                case 1: //
                                    echo '<i class="material-icons">border_color</i>';
                                break;

                                case 2: //
                                    echo '<i class="material-icons">phone_in_talk</i>';
                                break;

                                case 3: //
                                    echo '<i class="material-icons">record_voice_over</i>';
                                break;

                                case 4: //
                                    echo '<i class="material-icons">group</i>';
                                break;
                            }    

                               
                           @endphp 
                            
                        
                        </i> 
                        </span>
                        
                    </div>
                 {{ $title }}  
                 <hr>
                <div class="row">
                    <div class="col-12">
                       <ul class="nav nav-pills mb-2">
                         <!-- account -->
                           <li class="nav-item">
                                <a class="nav-link {{ (request()->is('auth/onlinecom/'.$profileType.'/2')) ? 'active' : '' }}" href="{{ route('auth.onlinecom',['ptypeid'=>$profileType,'filterid'=>2]) }}">
                                    <i data-feather="user-check" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Done</span>
                                </a>
                            </li>

                          <!-- connection -->
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('auth/onlinecom/'.$profileType.'/1')) ? 'active' : '' }}" href="{{ route('auth.onlinecom',['ptypeid'=>$profileType,'filterid'=>1]) }}">
                                    <i data-feather="user-x" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Not Yet</span>
                                </a>
                            </li>

                                                         <!-- All -->
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('auth/onlinecom/'.$profileType.'/3')) ? 'active' : '' }}" href="{{ route('auth.onlinecom',['ptypeid'=>$profileType,'filterid'=>3]) }}">
                                    <i data-feather="users" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">All</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    </div>
              
              <!------------------------------------------------------------------------------------------->
              @if($contacts->count() <= 0)
                <h4> No records found</h4>
              @endif
               <!----- contact list start ------------------------------------------------------------------------->
               @foreach ($contacts as $contact)
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">{{ $contact->profile_name }}   </h4>
                                              
                                       <div class="d-flex">
                                            <div class="avatar me-50">

                                            @if ($contact->gender == 1 && $contact->disturb_tag==0 ) 
                                            <img src=" {{ asset('images/avatars/boy.png')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                            @if ($contact->gender == 0 && $contact->disturb_tag==0 ) 
                                            <img src=" {{ asset('images/avatars/girl.png')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                            @if ($contact->disturb_tag==1 ) 
                                            <img src=" {{ asset('images/avatars/dontdist.jpg')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                            </div>
                                                    <div class="author-info">
                                                    <small><a href="#" class="text-body"></a></small>
                                                    <span class="text-muted ms-50 me-25">Sent |</span>
                                                    <span> @if ($contact->date_sent > 0) {{ \Carbon\Carbon::parse($contact->date_sent)->format('F j, Y') }}  @endif</span>
                                                    <br>
                                                    <input type="checkbox"  id="{{ $contact->id }}" 
                                                    @if ($contact->date_sent == date("Y-m-d")) checked disabled  @endif
                                                    class="form-check-input" onchange="chkbx('{{ 'Sent^'.$contact->id }}')"  data-bs-toggle="modal">
                                                    <span class="badge rounded-pill badge-light-primary">Sent Done</span> 
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
                                    {{ $contact->Remarks }}
                                    </p>
                                    <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                <div class="d-flex align-items-center">
                                                <i class="material-icons">person_pin</i>
                                                    <span class="text-body fw-bold">
                                                        <a href="#" data-bs-toggle="modal" 
  onclick="editContact('{{ $contact->profile_name.'^'.$contact->id.'^'.$contact->profile_link.'^'.$contact->address.'^'.$contact->gender.'^'.$contact->contact_no.'^'.$contact->profile_type.'^'.$contact->disturb_tag }}')"
                                                        data-bs-target="#editContact">Profile</span></a>&nbsp;&nbsp;
                                                
                                                    <i class="material-icons">event_note</i>
                                                    <span class="text-body fw-bold">
                                                        <a href="{{ route('auth.activity', $contact->id) }}">Activity</span></a></span>&nbsp;&nbsp;

                                                    @if ($contact->disturb_tag!=1 && $contact->profile_type!=2 && $contact->date_sent != date("Y-m-d"))              
                                                    <i class="material-icons">comment</i>
                                                    <span class="text-body fw-bold">
                                                        <a href="{{ $contact->profile_link }}" target="_blank">Share</span></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                </div>

                                            
                                            
                                                @if ($contact->disturb_tag!=1 && $contact->profile_type!=2)  
                                                <a href="#" class="fw-bold" onclick="chkbx('{{ 'Reset^'.$contact->id }}')">Reset</a>
                                                @endif
                                            </div>

                                    </div>
                                </div>
                            </div>
                          
                 @endforeach
               <!---------- contact list ends -------------------------------------------------------------------->               
               {!! $contacts->onEachSide(1)->links() !!}



            </div> 

        </div>
    </div>
      
 <!--------------------------------------------->
@include('modal.contactprofile')   
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

function editContact(data){
    
    var j = data.split('^');
    $("#pName").html(j[0]);
    $("#hID").val(j[1]);
    $("#profile_Link").val(j[2]);
    $("#profile_Address").val(j[3]);
    if(j[4]==1){  $("#gender_Male").prop("checked", true);  }else{ $("#gender_Female").prop("checked", true);   }
    $("#profile_contact").val(j[5]);
    if(j[6]==0){
    $('#profile_type').empty();    
    $('#profile_type').append(new Option('Online Community', '0'));
    $('#profile_type').append(new Option('Return Visit (RV)', '3'));
    $('#profile_type').append(new Option('Bible Study', '4'));
    }else if(j[6]==3){
    $('#profile_type').empty();       
    $('#profile_type').append(new Option('Return Visit (RV)', '3'));    
    $('#profile_type').append(new Option('Online Community', '0'));
    $('#profile_type').append(new Option('Bible Study', '4'));
    }else if(j[6]==4){
    $('#profile_type').empty();       
    $('#profile_type').append(new Option('Bible Study', '4'));    
    $('#profile_type').append(new Option('Return Visit (RV)', '3'));    
    $('#profile_type').append(new Option('Online Community', '0'));
    }
  
    if(j[7]==0){
    $('#disturb_tag').append(new Option('No', '0'));
    $('#disturb_tag').append(new Option('Yes', '1'));
      }else if(j[7]==1){
    $('#disturb_tag').append(new Option('Yes', '1'));      
    $('#disturb_tag').append(new Option('No', '0'));
    }

}
 
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
  if(task=='Sent'){
    obj.checked = false; 
  }
}



    </script>
</body>
<!-- END: Body-->

</html>