<!-- Edit User Modal -->
<div class="modal fade" id="editContact" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              
            <h4 class="mb-1" id="pName">  </h4>
                
                <form id="editContactForm" class="row gy-1 pt-75" action="{{ route('auth.update_contactprofile') }}" method="POST">
                @csrf

                    <input type="hidden" name="hID" id="hID">
                    <div class="col-12">
                        <label class="form-label">Profile Link</label>
                        <input type="text" name="profile_Link" id="profile_Link" class="form-control" disabled />
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address</label>
                       
                        <input type="text" name="profile_Address" id="profile_Address" class="form-control"  />
                    </div>

                    <div class="col-12">
                        <label class="form-label"><b>Gender : </b></label>
                        <div class="form-check form-check-inline">
                        <input type=radio name="gender" id="gender_Male" value="1"></option>
                            <label class="form-check-label" >Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input type=radio name="gender" id="gender_Female" value="0"></option> 
                            <label class="form-check-label" >Female</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label"><b>Contact Number</b></label>
                        <input type="text"  name="profile_contact" id="profile_contact" class="form-control" />
                    </div>
                    

                    <div class="col-12 col-md-6">
                        <label class="form-label"><b>Profile Type</b></label>
                        <select name="profile_type" id="profile_type" class="form-select">
                        </select>
                    </div>

     
                    <div class="col-12 col-md-6">
                        <label class="form-label"><b>Dont Disturb</b></label>
                        <select name="disturb_tag" id="disturb_tag" class="form-select">
                        </select>
                    </div>

                   
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->