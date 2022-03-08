@include('layouts.header')  

<!-- Calendar CSS ------------------------------->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/calendars/fullcalendar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-calendar.css') }}">
<!--------------------------------->

 <!-- BEGIN: Header-->
     @include('layouts.profilenav')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
       @include('panels.navbar')
    <!-- END: Main Menu-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            <!--button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="btnMReport">Generate Monthly Report</button>&nbsp;-->
            </div>
            <div class="content-body">
                <!-- Full calendar start -->
                <section>
                    <div class="app-calendar overflow-hidden border">
                        <div class="row g-0">
                       
                            <!-- Calendar -->
                            <div class="col position-relative">
                                <div class="card shadow-none border-0 mb-0 rounded-0">
                                    <div class="card-body pb-0">
                                        <div id="calendar"></div><br>
                                    </div>
                                </div>
                            </div>
                            <!-- /Calendar -->
                            <div class="body-content-overlay"></div>
                        </div>
                    </div>

                   

    <!-- Calendar Add/Update/Delete event modal-->
    <div class="modal modal-slide-in event-sidebar fade" id="add-new-sidebar">
            <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">Add Field Service</h5>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <!--form class="event-form needs-validation" data-ajax="false" novalidate-->
                    <form class="add-new-record modal-content pt-0" action="{{ route('auth.create_daily', session()->get('LoggedUserID')) }}" method="GET" >
                    @csrf
                    <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-icon"><b>Date Selected </b> </label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="text"  class="form-control"  id="dteNow" name="dteNow" readonly>
                                    </div>            
                            </div>     
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Placements</b> </label>
                                    <label>(Magazines,Books,Brochures, Tracts & Articles)</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="number"  class="form-control"  id="placement" name="placement" value="0"  maxlength="3"  />
                                    </div>
                            </div>
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Video Showing</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="airplay"></i></span>
                                        <input type="number"  class="form-control"  id="video" name="video"  value="0"  maxlength="3"  />
                                    </div>
                            </div>

                            
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Total Number of Hour(s)</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="hour" name="hour"  value="0"  maxlength="3"  />
                                    </div>
                            </div>

                            
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Return Visits</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="rv" name="rv"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
                            
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Bible Studies</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="bs" name="bs"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
                                
          
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Remarks</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control"  id="remarks" name="remarks" value="Field Service"  />
                                    </div>
                            </div>

                                <div class="mb-1">
                                <div class="d-flex flex-column">
                                        <label class="form-check-label mb-50"><b>Final Submistion</b></label>
                                        <div class="form-check form-switch form-check-success">
                                            <input type="checkbox" class="form-check-input" id="customSwitch111" name="finalSwitch" />
                                            <label class="form-check-label" for="customSwitch111">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                            </label>
                                        </div>
                                </div>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="btnDaily">Save</button>&nbsp;
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>  
                                </div>
             
                            </div>
                                
                    </form>
                 </div>
               </div>
        </div>
    </div>
<!--/ Calendar Add/Update/Delete event modal-->

@include('modal.editdayservice')
@include('modal.delete')


                </section>
                <!-- Full calendar end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('layouts.footer') 
   
    <!--- Calendar JS -------------------->
    <script src="{{ asset('app-assets/vendors/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>

    <script>

function disableFld(fldname) { if ( document.getElementById(fldname).disabled == false ){ document.getElementById(fldname).disabled = true; } }
function enableFld(fldname)  { if ( document.getElementById(fldname).disabled == true ){ document.getElementById(fldname).disabled = false; } }
 //------------------------------------------------------       

 function deleteModal(tableName){
       var task = "Delete Field Service";
       var id =  $('#hEditID').val();
       $("#delName").html(task);
       $('#htxnID').val(id);  
       $('#hTableName').val(tableName);  
       $("#deleteModal").modal('show');
       
   }


//-----------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
   // Calendar plugins
    var events = @json($events);
    //console.log(events);
    var calendarEl = document.getElementById('calendar'),
    sidebar = $('.event-sidebar'),
    calendarsColor = {
      Business: 'primary',
      Holiday: 'success',
      Personal: 'danger',
      Family: 'warning',
      ETC: 'info'
    },
    hID = $('#hEditID'),
    dteNow = $('#edteNow'),
    remarks = $('#eremarks'),
    placement = $('#eplacement'),
    video = $('#evideo'),
    rv = $('#erv'),
    bs = $('#ebs'),
    hour = $('#ehour');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    events: events,
    editable: true,
    dragScroll: false,
    dayMaxEvents: 1,
    eventResizableFromStart: true,
    customButtons: {
      sidebarToggle: {
        text: 'Sidebar'
      },
      myCustomButton: {
      text: 'Generate Report',
      click: function() {
       // alert('clicked the custom button!');
        
        //alert();
       }
      }
    },
    headerToolbar: {
      start: 'sidebarToggle, prev,next, title',
      end: 'dayGridMonth,listMonth'
    },
      footerToolbar: {
        left: 'myCustomButton'
      }
    ,

    direction: 'ltr',
    initialDate: new Date(),
    navLinks: false, // can click day/week names to navigate views
    eventClassNames: function ({ event: calendarEvent }) {
     // const colorName = calendarsColor[calendarEvent._def.extendedProps.calendar];
      return [
        // Background Color
        'bg-light-' + 'success' //colorName
      ];
    },

    dateClick: function (info) {
      var date = moment(info.date).format('YYYY-MM-DD');
      var dg = new Date();
      var sw = 0;  
      //resetValues();
      var dateEve = date, i, match;
           for (i=0, l=events.length; i<l; i++){
            //alert(events[i].start + '|' + date);
            if(events[i].start === dateEve){
                //alert('Please Click events')
                //match = events[i];
                //eventClick(info);
                sw = 1;
                break; //break after finding the match
            } 
        }

        if(sw != 1){
            $('#add-new-sidebar').modal('show'); 
            document.getElementById('dteNow').value = date;

        } 
      
    },
    eventClick: function (info) {
       // alert('1');
      eventClick(info);
    },
    datesSet: function () {
       // alert('2');
      //modifyToggler();

    },
    viewDidMount: function () {
     //   alert('3');
      modifyToggler();
    }

  });

  // Render calendar
  calendar.render();

  // Event click function
  function eventClick(info) {
   // alert();
   // alert(info.event.id);
    info.jsEvent.preventDefault(); // don't let the browser navigate
     //rbg note: only standard name can fetch values   
    //console.log(info);
    var j = info.event.id.split('^');
    //console.log(eventToUpdate);
    //sidebar.modal('show');
    $('#edit-new-sidebar').modal('show');    
    hID.val(j[0]);
    remarks.val(j[1]);
    dteNow.val(j[2]);
    placement.val(j[3]);
    video.val(j[4]);
    rv.val(j[5]);
    bs.val(j[6]);
    hour.val(j[7]);
    //alert(j[8]);
    if(j[8]==1){
        document.getElementById("customSwitch112").checked = true;
        disableFld('customSwitch112');
        disableFld('ebtnDaily');
       } else {
        document.getElementById("customSwitch112").checked = false;   
        enableFld('ebtnDaily');
        enableFld('customSwitch112');
       }  
  }
//-----------------------------------------
   // Modify sidebar toggler
   function modifyToggler() {
      // alert('4');
    $('.fc-sidebarToggle-button')
      .empty()
      .append(feather.icons['menu'].toSvg({ class: 'ficon' }));
  }


//----------------------------------------
    });
 //-----------------------------------------

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }

       //---------------------------------------------
        })
    </script>
</body>
<!-- END: Body-->

</html>