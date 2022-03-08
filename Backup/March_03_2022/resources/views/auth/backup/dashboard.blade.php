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
            <div class="content-header row">
            </div>
            <div class="content-body">



           <!-- users list start -->
           <section class="app-user-list">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">

                           <a class="text-body" href="{{ route('auth.onlinecom') }}">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('FBCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0">Online Community</p>
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
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('LWCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0">Letter Writing</p>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">border_color</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('TWCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0">Telephone Witnessing</p>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">phone_in_talk</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('RVCount') }}</h3>
                                         <p class="card-text font-small-3 mb-0">Return Visit (RV)</p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">record_voice_over</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">{{ session()->get('BSCount') }}</h3>
                                        <p class="card-text font-small-3 mb-0">Bible Study</p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                        <i class="material-icons">group</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                </section>
                <!-- users list ends -->
                
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    

                     
                   
                    <div class="row match-height">
                       
                        
                        <!-- Transaction Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-header">
                                <h4 class="card-title">Statistics</h4>
                                 </div>
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="avatar bg-light-primary rounded float-start">
                                                <div class="avatar-content">
                                                  <i class="material-icons">forum</i>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                               <h4 class="fw-bolder mb-0">1.423k</h4>
                                                <p class="card-text font-small-3 mb-0">Online Community</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="avatar bg-light-success rounded float-start">
                                                <div class="avatar-content">
                                                    <i class="material-icons">border_color</i>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                               <h4 class="fw-bolder mb-0">1.423k</h4>
                                                <p class="card-text font-small-3 mb-0">Letter Writing</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="avatar bg-light-danger rounded float-start">
                                                <div class="avatar-content">
                                                <i class="material-icons">phone_in_talk</i>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                            <h4 class="fw-bolder mb-0">1.423k</h4>
                                                <small>Telephone Witnessing</small>
                                            </div>
                                        </div>
                                     </div>

                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="avatar bg-light-warning rounded float-start">
                                                <div class="avatar-content">
                                                  <i class="material-icons">record_voice_over</i>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                            <h4 class="fw-bolder mb-0">1.423k</h4>
                                                <small>Return Visit (RV) </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="avatar bg-light-info rounded float-start">
                                                <div class="avatar-content">
                                                   <i class="material-icons">group</i>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                            <h4 class="fw-bolder mb-0">1.423k</h4>
                                                <small>Bible Study</small>
                                            </div>
                                        </div>
                                     </div>

                                </div>
                            </div>
                        </div>
                        <!--/ Transaction Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

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