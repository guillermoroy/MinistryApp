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
                        <div class="content-header row"></div>
                        <div class="content-body">

                           <!-- Profile Card -->
                  <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-profile">

                        @if ($contacts->gender == 1) 
                        <img src="{{ asset('app-assets/images/banner/banner_avatar.jpg') }}" class="img-fluid card-img-top" alt="Profile Cover Photo" />
                                            @endif
                                            @if ($contacts->gender == 0) 
                                            <img src="{{ asset('app-assets/images/banner/banner_avatar_g.jpg') }}" class="img-fluid card-img-top" alt="Profile Cover Photo" />
                                            @endif

                           
                            <div class="card-body">
                                <div class="profile-image-wrapper">
                                    <div class="profile-image">
                                        <div class="avatar">

                                            @if ($contacts->gender == 1) 
                                            <img src=" {{ asset('images/avatars/boy.png')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                            @if ($contacts->gender == 0) 
                                            <img src=" {{ asset('images/avatars/girl.png')  }}" alt="Avatar" width="50" height="50" />
                                            @endif
                                        
                                        </div>
                                    </div>
                                </div>
                                <h3>{{  $contacts->profile_name  }}</h3>
                                <input type="hidden" id="hInvite" value="{{ $contacts->profile_name.'^'.$contacts->id.'^'.$contacts->publisher_id   }}">
                                <hr class="mb-2" />
                                <div class="d-flex justify-content-between align-items-center">
                                 
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#createActiviy" >
                                            <i data-feather="activity" class="me-25"></i>
                                            <span>Create</span>
                                </button>
                                <button type="button" class="btn btn-outline-primary" onclick="history.go(-1);" >
                                            <i data-feather="refresh-cw" class="me-25"></i>
                                    <span>Back</span>
                                </button>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Profile Card -->
                    <!-- contact Timeline Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-user-timeline">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <i data-feather="activity" class="user-timeline-title-icon"></i>
                                    <h4 class="card-title">Activity Timeline</h4>
                                </div>
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                            </div>
                                  

                            @foreach ($activitytxns as $activitytxn) 
                                    <div class="card-body">
                                      <ul class="timeline ms-50">
                                        <li class="timeline-item">

                                        @if($activitytxn->id % 2 == 0)
                                            <span class="timeline-point timeline-point-indicator"></span>
                                            @else
                                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                        @endif    

                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>{{ $activitytxn->topic }}</h6>
                                                   <span class="timeline-event-time me-1" style="color:#000">
                                                    @php
                                                     echo date("F j, Y", strtotime($activitytxn->entrydate));
                                                    @endphp
                                                   </span>
                                                </div>
                                                <p>{{ $activitytxn->about }}</p>
                                                
                                            </div>
                                        </li>

                                        <div class="d-flex align-items-center">
                                                    <i class="material-icons">event_note</i>
                                                        <span class="text-body fw-bold">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#EditActiviy{{ $activitytxn->id }}">
                                                                Edit</span></a>&nbsp;&nbsp;
                                                    
                                        <i class="material-icons">delete</i>
                                        <span class="text-body fw-bold">
                                        <a href="#"  data-bs-toggle="modal" onclick="deleteModal('activitytxn')">Delete</span></a>
                                        </div>           
                                        <hr>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="hEditID" name="hEditID" value="{{ $activitytxn->id }}">
                                    @include('modal.editactivity')

                            @endforeach

                            
                        </div>
                    </div>
                    <!--/ User Timeline Card -->







                        </div>
                        <div class="sidenav-overlay"></div>
                        <div class="drag-target"></div>
                    </div>
    </div>

    @include('modal.createactivity')

    @include('modal.delete')
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

        
 function deleteModal(tableName){
       var task = "Delete Activity";
       var id =  $('#hEditID').val();
       $("#delName").html(task);
       $('#htxnID').val(id);  
       $('#hTableName').val(tableName);  
       $("#deleteModal").modal('show');
   }



    $(document).on('click', '.delete_activity', function(e){
      var id =  $('#htxnID').val(); 
  
      $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            //----------------------
    $.ajax({ type: "GET",
        url:  '/auth/delete_activity/'+ id,
        dataType: 'json',
            success: function(response){
           // console.log(response);
                
            }
            
        
        }); 
            
        location.reload();

    });
    
    


    </script>
</body>
<!-- END: Body-->

</html>            