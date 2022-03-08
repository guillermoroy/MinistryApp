<!-- Edit User Modal -->
<div class="modal fade" id="EditActiviy{{ $activitytxn->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              
            <h5 class="mb-1">Update Activity  </h5>
                 <form id="editActivityForm" class="row gy-1 pt-75"  action="{{ route('auth.update_activity', $activitytxn->id) }}" method="POST">
                @csrf
                    <div class="col-12">
                        <label class="form-label">Topic</label>
                        <input type="text" name="edit_topic"  value="{{ $activitytxn->topic }}" class="form-control" />
                    </div>

                    <div class="col-12">
                        <label class="form-label">About/Remarks</label>
                       
                        <input type="text" name="edit_about" value="{{ $activitytxn->about }}" class="form-control" />
                    </div>


                   
                    

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal">Update</button>
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