<!-- Calendar Add/Update/Delete event modal-->
<div class="modal modal-slide-in event-sidebar fade" id="edit-new-sidebar">
            <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">Update Field Service</h5>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <!--form class="event-form needs-validation" data-ajax="false" novalidate-->
                    <form class="add-new-record modal-content pt-0" action="{{ route('auth.update_daily') }}" method="GET" >
                    @csrf
                    <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-icon"><b>Date Selected </b> </label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="text"  class="form-control"  id="edteNow" name="edteNow" readonly>
                                    </div>            
                            </div> 
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Placements</b> </label>
                                    <label>(Magazines,Books,Brochures, Tracts & Articles)</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="number"  class="form-control"  id="eplacement" name="eplacement" value="0"  maxlength="3"  />
                                    </div>
                            </div>
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-icon"><b>Video Showing</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="airplay"></i></span>
                                        <input type="number"  class="form-control"  id="evideo" name="evideo"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Total Number of Hour(s)</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="ehour" name="ehour"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Return Visits</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="erv" name="erv"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
                                
                            <div class="mb-1">
                                  <label class="form-label" for="contact-info-icon"><b>Bible Studies</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control numeral-mask"  id="ebs" name="ebs"  value="0"  maxlength="3"  />
                                    </div>
                            </div>
              
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Remarks</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control"  id="eremarks" name="eremarks" value="Field Service"  />
                                    </div>
                            </div>
 
                                <div class="mb-1">
                                <div class="d-flex flex-column">
                                        <label class="form-check-label mb-50">Final Submistion</label>
                                        <div class="form-check form-switch form-check-success">
                                            <input type="checkbox" class="form-check-input" id="customSwitch112" name="efinalSwitch" />
                                            <label class="form-check-label" for="customSwitch112">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                            </label>
                                        </div>
                                </div>
                                </div>
                                 <input type="hidden" id="hEditID" name="hEditID">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="ebtnDaily"> <i data-feather="edit"></i></button>&nbsp;
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="ebtnDelete" onclick="deleteModal('Dayrpt');"> <i data-feather="trash"></i></button>&nbsp; 
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i data-feather="repeat"></i></button>  
                                </div>

                              
                            </div>
                                
                    </form>
                 </div>
               </div>
        </div>
    </div>
<!--/ Calendar Add/Update/Delete event modal-->