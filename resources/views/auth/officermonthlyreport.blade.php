@include('layouts.header')  
    <!-- BEGIN: Vendor CSS-->
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
               
                <!-- Basic table -->

                 
                <section id="basic-datatable">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                               
                                <div class="col position-relative">
                                <div class="card shadow-none border-0 mb-0 rounded-0">
                                   
                                
                                    <div class="card-body pb-0">
                                       Color Legend:
                                        <button type="button" class="btn btn-flat-warning">Pioner</button>
                                        <button type="button" class="btn btn-flat-success">Auxiliary</button>
                                    </div>
                                  </div>
                                </div>      
                                
                                <table class="datatables-basic1 table">
                                    <thead>
                                        <tr>
                                            <th>Year|Month</th>
                                            <th>Fullname</th>
                                            <th>Placement</th>
                                            <th>Video</th>
                                            <th>Hours</th>
                                            <th>RV</th>
                                            <th>BS</th>
                                           
                                        </tr>
                                    </thead>


                                    @foreach ($monthrpt as $service)

                                    @php 
                                    $vMonth = date('F', mktime(0, 0, 0, $service->fmonth));
                                    $ptype = '';
                                    $fc = '';
                                    @endphp

                                    @foreach($users as $user)
                                        @if($user->userID == $service->publisher_id) 
                                            @php   
                                              $ptype = $user->profile_type;

                                              switch ($ptype) {
                                                case 2:
                                                  $fc = 'color: orange';
                                                break;
                                                case 3:
                                                  $fc = 'color: green';
                                                break;
                                                case 1:
                                                  $fc = 'color: black';
                                                break;

                                              }

                                            @endphp 
                                        @endif
                                    @endforeach


                                    <tr>
                                    <td> {{ $service->fyear.' | '.date('F', mktime(0, 0, 0, $service->fmonth))  }} </td>
                                    <td> <p style="{{ $fc }}"> {{ $service->fullname }}  </p></td>
                                    <td> {{ $service->placement }} </td>
                                    <td> {{ $service->video }} </td>
                                    <td> {{ $service->total_hours }} </td> 
                                    <td> {{ $service->rv }} </td>
                                    <td> {{ $service->bs }} </td>
                                   
                                    
                                    </tr>    
                                    
                                    
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                   
                     
                </section>
                <!--/ Basic table -->



                



            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('modal.mofficer') 
    @include('layouts.footer') 

   
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


    <!-- BEGIN: Page JS-->
    <!--script src="{{ asset('app-assets/js/scripts/tables/table-datatables-monthly-entry.js') }}"></script-->
    <!-- END: Page JS-->

    <script>
   function disableFld(fldname) { if ( document.getElementById(fldname).disabled == false ){ document.getElementById(fldname).disabled = true; } }
   function enableFld(fldname)  { if ( document.getElementById(fldname).disabled == true ){ document.getElementById(fldname).disabled = false; } }
     //------------------------------------
     function editMonthly(data){
        var j = data.split('^');
        //alert(j[7]);
        
        $('#eID').val(j[0]);
        $('#eSMonth').val(j[1]);
        $('#eplacement').val(j[2]);
        $('#evideo').val(j[3]);
        $('#erv').val(j[4]);
        $('#ebs').val(j[5]);
        $('#ehour').val(j[6]);
        
       if(j[7]==1){
        document.getElementById("customSwitch111").checked = true;
        disableFld('customSwitch111');
        disableFld('btnMothlyUpdate');
       } else {
        enableFld('customSwitch111');
        enableFld('btnMothlyUpdate');
       }  
        


       

       
        //alert(data);
        //$service->id.'^'.$service->fyear.'^'.$service->fmonth.'^'.$service->placement.'^'.$service->video.'^'.$service->rv.'^'.$service->bs.'^'.$service->total_hours.'^'.$service->final_entry

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
      displayLength: 15,
      lengthMenu: [15, 25, 50, 75, 100],
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
        },
        
        {
          text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'View Previous Month',
          className: 'create-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#selectMonthReport'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ]
    
      //------------------------------------------
 

    });
          
    $('div.head-label').html('<h6 class="mb-0">Ministry Hour Monthly</h6>');
   }
            
       //   $('#SMonth').append(new Option('Select group1', '1'));
        });

     
   

    </script>
</body>
<!-- END: Body-->

</html>