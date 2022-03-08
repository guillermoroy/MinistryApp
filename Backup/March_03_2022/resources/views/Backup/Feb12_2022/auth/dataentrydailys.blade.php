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
                                        <div id="calendar"></div>
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
                        <h5 class="modal-title">Add Event</h5>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <!--form class="event-form needs-validation" data-ajax="false" novalidate-->
                    <form class="add-new-record modal-content pt-0" action="{{ route('auth.create_daily', session()->get('LoggedUserID')) }}" method="GET" >
                    @csrf
                    <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-icon">Selected Date </label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control"  id="dteNow" name="dteNow" readonly>
                                    </div>            
                            </div>               
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Remarks</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control"  id="remarks" name="remarks" value="Field Service"  />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Number Of Placement</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="number"  class="form-control"  id="placement" name="placement" value="0"  maxlength="3"  />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Number Of Video</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="airplay"></i></span>
                                        <input type="number"  class="form-control"  id="video" name="video"  value="0"  maxlength="3"  />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Number Of Return Visit</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="rv" name="rv"  value="0"  maxlength="3"  />
                                    </div>
                                </div>
                                
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Number Of Bible Study</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="bs" name="bs"  value="0"  maxlength="3"  />
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon">Total Number of Hour(s)</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="hour" name="hour"  value="0"  maxlength="3"  />
                                    </div>
                                </div>
                                <div class="mb-1">
                                <div class="d-flex flex-column">
                                        <label class="form-check-label mb-50">Final Submistion Switch</label>
                                        <div class="form-check form-switch form-check-success">
                                            <input type="checkbox" class="form-check-input" id="customSwitch111" name="finalSwitch" />
                                            <label class="form-check-label" for="customSwitch111">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                            </label>
                                        </div>
                                </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-1" id="btnMothly" data-bs-dismiss="modal">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                                
                    </form>
                 </div>
               </div>
        </div>
    </div>
<!--/ Calendar Add/Update/Delete event modal-->
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

    <!-- BEGIN: Page JS-->
    <!--script src="{{ asset('app-assets/js/scripts/pages/app-calendar-events.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-calendar.js') }}"></script-->
    <!-- END: Page JS-->

    <script>

 
        //------------------------------------------------------       

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
           }
        //------------------------------------------------
        var SITEURL = "{{ url('/') }}";
           
           $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           var calendar = $('#calendar').fullCalendar({
                             editable: true,
                             events: SITEURL + "/fullcalender",
                             displayEventTime: false,
                             editable: true,
                             eventRender: function (event, element, view) {
                                 if (event.allDay === 'true') {
                                         event.allDay = true;
                                 } else {
                                         event.allDay = false;
                                 }
                             },
                             selectable: true,
                             selectHelper: true,
                             select: function (start, end, allDay) {
                                 var title = prompt('Event Title:');
                                 if (title) {
                                     var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                     var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                     $.ajax({
                                         url: SITEURL + "/fullcalenderAjax",
                                         data: {
                                             title: title,
                                             start: start,
                                             end: end,
                                             type: 'add'
                                         },
                                         type: "POST",
                                         success: function (data) {
                                             displayMessage("Event Created Successfully");
           
                                             calendar.fullCalendar('renderEvent',
                                                 {
                                                     id: data.id,
                                                     title: title,
                                                     start: start,
                                                     end: end,
                                                     allDay: allDay
                                                 },true);
           
                                             calendar.fullCalendar('unselect');
                                         }
                                     });
                                 }
                             },
                             eventDrop: function (event, delta) {
                                 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
           
                                 $.ajax({
                                     url: SITEURL + '/fullcalenderAjax',
                                     data: {
                                         title: event.title,
                                         start: start,
                                         end: end,
                                         id: event.id,
                                         type: 'update'
                                     },
                                     type: "POST",
                                     success: function (response) {
                                         displayMessage("Event Updated Successfully");
                                     }
                                 });
                             },
                             eventClick: function (event) {
                                 var deleteMsg = confirm("Do you really want to delete?");
                                 if (deleteMsg) {
                                     $.ajax({
                                         type: "POST",
                                         url: SITEURL + '/fullcalenderAjax',
                                         data: {
                                                 id: event.id,
                                                 type: 'delete'
                                         },
                                         success: function (response) {
                                             calendar.fullCalendar('removeEvents', event.id);
                                             displayMessage("Event Deleted Successfully");
                                         }
                                     });
                                 }
                             }
          
                         }); 
        //------------------------------------------------
          		
        }) //end onload
		
		
    </script>
</body>
<!-- END: Body-->

</html>