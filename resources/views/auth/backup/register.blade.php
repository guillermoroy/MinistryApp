@extends('layouts.header')
<!-- END: Head-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                       
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100" src="{{ asset('app-assets/images/illustration/create-account.svg') }}" alt="multi-steps" />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-2 pt-3">
                            <div class="width-700 mx-auto">
                                <div class="register-multi-steps-wizard shadow-none">
                                    
                                    <div class="bs-stepper-content px-0 mt-4">
                                        <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                
                                                
                                              <p style="color:green">
                                                @if(Session::get('success'))
                                                     {{ 'Status : '.Session::get('success').'' }}

                                                @endif
                                              </p>
                                                <p style="color:red">
                                                
                                                @if(Session::get('fail'))
                                                    {{ 'Status : '.Session::get('fail') }}
                                                    
                                                @endif
                                               
                                                @error('email')   {{ 'Status : '.$message }}
                                                    
                                                @enderror
                                                </p>
                                                <h2 class="fw-bolder mb-75">Account Information</h2>
                                            </div>
                                            <form action="{{ route('auth.save') }}" method="post" autocomplete="off">
                                                @csrf
											    <div class="row">
													<div class="mb-1 col-md-6">
                                                        <label class="form-label" for="country">Select Group</label>
                                                        <select class="select2 w-100" name="groupid" id="groupid">
                                                            <option value="" label="blank"></option>
                                                            <option value="1">Group 1</option>
                                                            <option value="2">Group 2</option>
                                                            <option value="3">Group 3</option>
                                                            <option value="4">Group 4</option>
                                                            <option value="5">Group 5</option>
                                                            <option value="6">Group 6</option>
															<option value="7">Group 7</option>
															<option value="8">Group 8</option>
                                                        </select>
                                                    </div>
													
													 <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="buenmar@yahoo.com"  />
                                                    </div>
													
											       
													
													
												</div>	
                                                <div class="row">
                                                     
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="first-name">First Name</label>
                                                        <input type="text" name="first_name" id="first_name"  value="{{ old('first_name') }}" class="form-control" placeholder="Roy" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="last-name">Last Name</label>
                                                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"  class="form-control" placeholder="Guillermo" />
                                                    </div>
                                                   
                                                </div>
												
												 <div class="row">
                                                     
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="middle-name">Middle Name</label>
                                                        <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" class="form-control" placeholder="MiddleName" />
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="mobile-number">Mobile number</label>
                                                        <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}"  class="form-control mobile-number-mask"  />
                                                    </div>
                                                   
                                                </div>
												  <div class="col-12 mb-1">
                                                        <label class="form-label" for="home-address">Home Address</label>
                                                        <input type="text" name="home_address" id="home_address" value="{{ old('home_address') }}"  class="form-control" placeholder="Address" />
                                                    </div>
													
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="password">Password</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="password"  id="password" value="{{ old('password') }}" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="confirm_password" id="confirm_password"  value="{{ old('confirm_password') }}" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                    </div>

                                                   

                                                   
                                                </div>
                                         
                                       
                                           

                                            <div class="d-flex justify-content-between mt-1">
                                                
                                                <button class="btn btn-success btn-submit">
                                                    <i class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block">Submit</span>
                                                </button>

                                                <p>
                                                     <a href="{{ route('auth.login') }}">
                                                        <span>I already have an account, Login</span>
                                                    </a>
                                                </p>
                                               
                                            </div>
                                            

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/auth-register.js') }}"></script>
    <!-- END: Page JS-->

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