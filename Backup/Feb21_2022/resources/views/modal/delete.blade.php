<div class="d-inline-block">
              <!-- Modal -->
        <form class="add-new-record modal-content pt-0" action="{{ route('auth.delete_from_table', session()->get('LoggedUserID')) }}" method="GET" >
           @csrf
          <div class="modal fade text-start modal-danger"
            id="deleteModal"
            tabindex="-1"
           aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <input type="hidden" name="htxnID" id="htxnID">   
                    <input type="hidden" name="hTableName" id="hTableName">
                    <h5 class="modal-title"><span id="delName"> </span>  :</h5> &nbsp; <span id="msgdata"> </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete?
                    </div>
                    <div class="modal-footer">
                     <button type="submit" class="btn btn-danger delete_activity" data-bs-dismiss="modal"> &nbsp; Yes &nbsp; </button>
                     <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> Cancel </button>
                    </div>
                </div>
            </div>
          </div>
        </form>
</div>