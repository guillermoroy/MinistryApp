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
                            <i data-feather="activity"></i> Days ({{ now()->format('F') }})</a>
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
							  <th><input type="checkbox" class="group1" id="checkAll"/> Day </th>
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
					   
          @php
          if($dayrpt->final_entry==0){
          @endphp
            <td><input type='checkbox'  name='chb[]' id='{{ $dayrpt->id }}' value='{{ $dayrpt->id }}'> {{ \Carbon\Carbon::parse($dayrpt->entrydate)->format('D')}} {{  \Carbon\Carbon::parse($dayrpt->entrydate)->format('d') }} </td>  
            @php
              } else {
            @endphp 
                   
            <td> {{ \Carbon\Carbon::parse($dayrpt->entrydate)->format('D')}} {{  \Carbon\Carbon::parse($dayrpt->entrydate)->format('d') }} </td>  
           
            @php
              }
          @endphp

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
   

    @include('layouts.footer') 

    <!-- BEGIN: Page JS-->
    <!--script src="{{ asset('app-assets/js/scripts/tables/table-datatables-monthly-entry.js') }}"></script-->
    <!-- END: Page JS-->

    <script>
   function disableFld(fldname) { if ( document.getElementById(fldname).disabled == false ){ document.getElementById(fldname).disabled = true; } }
   function enableFld(fldname)  { if ( document.getElementById(fldname).disabled == true ){ document.getElementById(fldname).disabled = false; } }
  

    $("#checkAll").change(function () {
		$("input:checkbox").prop('checked', this.checked);
    var frm_element = document.getElementById('myForm');

    var selchb = getSelectedChbox(frm_element);  
    $("#hfinalIDs").val(selchb);
       
    alert(selchb); 
	  });





   
    //
    

    function getSelectedChbox(frm) {
		  var selchbox = [];        // array that will store the value of selected checkboxes

		  // gets all the input tags in frm, and their number
		  var inpfields = frm.getElementsByTagName('input');
		  var nr_inpfields = inpfields.length;

		  // traverse the inpfields elements, and adds the value of selected (checked) checkbox in selchbox
		  for(var i=0; i<nr_inpfields; i++) {
			if(inpfields[i].type == 'checkbox' && inpfields[i].checked == true){
        selchbox.push(inpfields[i].value);


       }
      }

		  return selchbox;
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
            var dt_basic_table = $('.datatables-basic1');

            if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({

      dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
            }, 50);
          }
        }
        /*,
        {
          text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Generate Month',
          className: 'create-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }*/
      ]
    
      //------------------------------------------
 

    });
          
    $('div.head-label').html('<h6 class="mb-0">Monthly Service Hour(s) </h6>');

     }
            
 
        });
    </script>
</body>
<!-- END: Body-->

</html>