@include('layouts.header')  
    <!-- BEGIN: Vendor CSS-->

    <style>


#content-desktop {display: block;}
#content-mobile {display: none;}

@media screen and (max-width: 768px) {

#content-desktop {display: none;}
#content-mobile {display: block;}

}
 </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

   
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

     <!-- BEGIN: Header-->
     @include('layouts.profilenav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
       @include('panels.navbar')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper container-xxl p-0">
              <div class="content-body">
    
                <!-- Striped rows start -->
                <div class="row" id="table-striped">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Service Hour(s)</h4>
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#selectMonthReport" >Previous Month</button>
                            </div>
                          
                             <!--------------------------------------------------------------->
                             <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="homeIcon-tab" data-bs-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true">
                            <i data-feather="calendar"></i> Monthly</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="profileIcon-tab" data-bs-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false">
                            <i data-feather="activity"></i> Days ({{ $m }})</a>
                            </li>

                            </ul>
                            </div>
                             <!--------------------------------------------------------------->
                             <div class="table-responsive"> 

                             <div class="tab-content">
                              <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                              <table class="table table-striped">
                              <thead>
                              <tr>
                              <th>Year|Month</th>
                              <th>Hours</th>
                              <th>Action</th>
                              </tr>
                              </thead>


                              @foreach ($monthrpt as $service)

                              @php 
                              $vMonth = date('F', mktime(0, 0, 0, $service->fmonth));

                              @endphp
                              <tr>
                              <td> {{ $service->fyear.' | '.date('F', mktime(0, 0, 0, $service->fmonth))  }} </td>
                              <td> {{ $service->total_hours }}  <input type="hidden" id="hEditID" name="hEditID" value="{{ $service->id }}"></td> 
                              <td> 
                              <div class="dropdown">
                              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" 
                              onclick="ViewMonthly('{{ $service->id.'^'.$vMonth.'^'.$service->placement.'^'.$service->video.'^'.$service->rv.'^'.$service->bs.'^'.$service->total_hours.'^'.$service->final_entry }}')" 
                              data-bs-toggle="modal" data-bs-target="#viewReport_modals-slide-in">
                              <i data-feather="edit-2" class="me-50"></i>
                              <span>View</span>
                              </a>


                              </div>
                              </div>   
                              </td> 
                              </tr>    
                              @endforeach
                              </table>
                              </div>

            @include('modal.viewdayservice')
           <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">

           <form name="myForm" id="myForm"> 
            <table class="table table-striped">
					  <thead>
						  <tr>
							  <th> Day </th>
							  <th><span id='content-mobile'><i data-feather="book-open"></span></i><span id='content-desktop'> Placement</span></th>
							  <th><span id='content-mobile'><i data-feather="play"></span></i><span id='content-desktop'> video</span></th>
							  <th><span id='content-mobile'><i data-feather="watch"></span></i><span id='content-desktop'> Hours</span></th>
							  <th><span id='content-mobile'><i data-feather="user-check"></span></i><span id='content-desktop'> RV</span></th>
							  <th><span id='content-mobile'><i data-feather="users"></span></i><span id='content-desktop'> BS</span></th>
						  </tr>
					  </thead>
           

					  @php
					  $clr = '';
					  $Trv = 0;
					  $Tbs = 0;
         	  $Tplacement = 0;
					  $Tvideo = 0;
					  $Ttotal_hours = 0;
					   @endphp
			  
					@foreach ($dayrpts as $dayrpt)
					   

			   

					@php 
					$Trv += $dayrpt->rv;
					$Tbs += $dayrpt->bs;
					$Tvideo += $dayrpt->video;
					$Tplacement += $dayrpt->placement;
					$Ttotal_hours += $dayrpt->total_hours; 

					if($dayrpt->final_entry==1){
					  $clr = 'green';
      			} else {
					  $clr = 'red';
        
					}
				  
					@endphp


          

					<tr style="color: {{ $clr }} ">

            <td> {{ \Carbon\Carbon::parse($dayrpt->entrydate)->format('D')}} {{  \Carbon\Carbon::parse($dayrpt->entrydate)->format('d') }} </td>  
             <td> {{  $dayrpt->placement  }} </td>  
					   <td> {{  $dayrpt->video  }} </td>  
					   <td> {{  $dayrpt->total_hours  }} </td>  
					   <td> {{  $dayrpt->rv  }} </td>  
					   <td> {{  $dayrpt->bs  }} </td> 
					 </tr>   
					@endforeach
           
					 <tr>
					   <td><b> Total:</b> </td>  
					   <td><b> {{ $Tplacement }}  </b></td>  
					   <td><b> {{ $Tvideo }}  </b></td>  
					   <td><b> {{ $Ttotal_hours }}  </b></td>  
					   <td><b> {{ $Trv }} </b> </td>  
					   <td><b>{{ $Tbs }}  </b></td> 
					 </tr>   

           <tr>
					   <td colspan="6">Final Submission:</b> 
             
             <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" onclick="getVal('')" data-bs-target="#m-service-report">Submit Report</button></td>  
					 
					 </tr>   
           <tr>
					   <td><b> </td>  
					   <td> </td>  
					   <td><b>  </b></td>  
					   <td><b>   </b></td>  
					   <td><b>  </b> </td>  
					   <td><b> </b></td> 
					 </tr>   

           
          
            @php
					  $Trv = 0;
					  $Tbs = 0;
					  $Tplacement = 0;
					  $Tvideo = 0;
					  $Ttotal_hours = 0;
					   @endphp

					 
                              
             </table>
             <input type="hidden" id="hfinalIDs" name="hfinalIDs">
            </form>


                                 
                              </div>  

                             </div>  
                             </div>    
                             <!--------------------------------------------------------------->
                           

                        </div>
                    </div>
                </div>       
          <!--------------------------------------------------------------->
             </div>  
          </div>  
          <!--------------------------------------------------------------->
      </div>   






    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
	
   
    

   
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
   
    @include('modal.mservicereport') 
    @include('modal.mpublisher') 
    @include('layouts.footer') 

    <!-- BEGIN: Page JS-->
    <!--script src="{{ asset('app-assets/js/scripts/tables/table-datatables-monthly-entry.js') }}"></script-->
    <!-- END: Page JS-->

    <script>
   function disableFld(fldname) { if ( document.getElementById(fldname).disabled == false ){ document.getElementById(fldname).disabled = true; } }
   function enableFld(fldname)  { if ( document.getElementById(fldname).disabled == true ){ document.getElementById(fldname).disabled = false; } }
   function getVal(m){
   task = "Feb";

   $('#tagName').html(task);
   $("#hContactID").val();
  
   }

   function deleteModal(tableName){
       var task = "Delete Monthly Service";
       var id =  $('#hEditID').val();
      // alert(id);
       $("#delName").html(task);
       $('#htxnID').val(id);  
       $('#hTableName').val(tableName);  
       $("#deleteModal").modal('show');
   }



     //------------------------------------
     function ViewMonthly(data){
        var j = data.split('^');
        //alert(j[7]);
        $('#eSMonth').val(j[1]);
        $('#eplacement').val(j[2]);
        $('#evideo').val(j[3]);
        $('#erv').val(j[4]);
        $('#ebs').val(j[5]);
        $('#ehour').val(j[6]);

     }
     //------------------------------------
       
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }  
 
        });
    </script>
</body>
<!-- END: Body-->

</html>