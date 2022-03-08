<div class="d-inline-block">
              <!-- Modal -->
        <form action="{{ route('auth.update_tag') }}" method="GET">  
          @csrf     
          <div class="modal fade text-start modal-success"
            id="sentTagModal"
            tabindex="-1"
            aria-labelledby="myModalLabel110"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <input type="hidden" id="hContactID" name="hContactID">     
                    <input type="hidden" id="hTask" name="hTask">      
                    <h5 class="modal-title"><span id="tagName"> </span> Tag :</h5> &nbsp; <span id="msgdata"> </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to proceed?
                    </div>
                    <div class="modal-footer">
                   
                      <button type="submit" class="btn btn-success update_tag" data-bs-dismiss="modal"> &nbsp; Yes &nbsp; </button>
                   
                    </div>
                </div>
            </div>
          </div>
        </form>
</div>