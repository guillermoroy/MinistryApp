<div class="modal modal-slide-in fade" id="viewReport_modals-slide-in">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="" method="GET" >
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" >View Records  </h5>
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
               
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
