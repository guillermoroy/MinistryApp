@include('layouts.header')  

 <!-- BEGIN: Header-->
     @include('layouts.profilenav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
       @include('panels.navbar')
    <!-- END: Main Menu-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

 
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">



           <!-- users list start -->
           <section class="app-user-list">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">

                           <a class="text-body" href="{{ route('auth.onlinecom',['ptypeid'=>0,'filterid'=>2]) }}">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('FBCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0"><b>Online Community</b></p>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                           <i class="material-icons">forum</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <a class="text-body" href="{{ route('auth.onlinecom',['ptypeid'=>1,'filterid'=>2]) }}">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('LWCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0"><b>Letter Writing</b></p>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">border_color</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <a class="text-body" href="{{ route('auth.onlinecom',['ptypeid'=>2,'filterid'=>2]) }}">  
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('TWCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0"><b>Phone Witnessing</b></p>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">phone_in_talk</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                           </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                        <a class="text-body" href="{{ route('auth.onlinecom',['ptypeid'=>3,'filterid'=>2]) }}">  
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('RVCount') }}</h3>
                                         <p class="card-text font-small-3 mb-0"><b>Return Visit (RV)</b></p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">record_voice_over</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </a>  
                        </div>

                        <div class="col-lg-3 col-sm-6">
                        <a class="text-body" href="{{ route('auth.onlinecom',['ptypeid'=>4,'filterid'=>2]) }}">   
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('BSCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0"><b>Bible Study</b></p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">group</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </a>   
                        </div>

                    </div>
                   
                </section>
                <!-- users list ends -->
                
                
            </div>
        </div>
    </div>
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
    </script>
</body>
<!-- END: Body-->

</html>