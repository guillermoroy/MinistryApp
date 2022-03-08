<!-- Edit User Modal -->
<div class="modal fade" id="createActiviy" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
              
            <h4 class="mb-1">Activity : {{ $contacts->profile_name }} </h4>
                
                <form id="createActivityForm" class="row gy-1 pt-75"  action="{{ route('auth.create_activity', $contacts->id.'|'.$contacts->publisher_id.'|'.$contacts->group_id) }}" method="POST">
                @csrf
                    <div class="col-12">
                        <label class="form-label">Activiy Topic</label>
                        <input type="text" name="topic" class="form-control" />
                    </div>

                    <div class="col-12">
                        <label class="form-label">About/Remarks</label>
                       
                        <input type="text" name="about" class="form-control" />
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