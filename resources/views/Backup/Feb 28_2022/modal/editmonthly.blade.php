<div class="modal modal-slide-in fade" id="edit_modals-slide-in">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="{{ route('auth.update_monthly', session()->get('LoggedUserID')) }}" method="GET" >
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" > Update Record   </h5>
            </div>

            @csrf
            <div class="modal-body flex-grow-1">
            
            <div class="mb-1">
            <label class="form-label">Month</label>  
            <input type="text"  class="form-control"  id="eSMonth" name="eSMonth"  maxlength="3" disabled />   
            </div>               

                <div class="mb-1">
                    <label class="form-label" for="contact-info-icon">Number Of Placement</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="share"></i></span>
                        <input type="number"  class="form-control"  id="eplacement" name="eplacement" maxlength="3"  />
                    </div>
                </div>

                <div class="mb-1">
                    <label class="form-label" for="contact-info-icon">Number Of Video</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="airplay"></i></span>
                        <input type="number"  class="form-control"  id="evideo"  name="evideo"  maxlength="3"  />
                    </div>
                </div>

                <div class="mb-1">
                    <label class="form-label" for="contact-info-icon">Number Of Return Visit</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                        <input type="number"  class="form-control numeral-mask" id="erv" name="erv"  maxlength="3"  />
                    </div>
                </div>
                
                <div class="mb-1">
                    <label class="form-label" for="contact-info-icon">Number Of Bible Study</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                        <input type="number"  class="form-control numeral-mask"  id="ebs"  name="ebs"  maxlength="3"  />
                    </div>
                </div>

                <div class="mb-1">
                    <label class="form-label" for="contact-info-icon">Total Number of Hour(s)</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                        <input type="number"  class="form-control numeral-mask"  id="ehour"  name="ehour"  maxlength="3"  />
                    </div>
                </div>
                <div class="mb-1">
                <div class="d-flex flex-column">
                        <label class="form-check-label mb-50">Final Submistion Switch</label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" id="customSwitch111" name="efinalSwitch"/>
                            <label class="form-check-label" for="customSwitch111">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                </div>
                </div>
                <input type="hidden"  id="eID"  name="eID">
                <button type="submit" class="btn btn-primary me-1" id="btnMothlyUpdate" data-bs-dismiss="modal">Update</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
