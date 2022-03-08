<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="{{ route('auth.compute_service', session()->get('LoggedUserID')) }}" method="GET" >
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Generate Monthly Report   </h5>
            </div>

            @csrf
            <div class="modal-body flex-grow-1">
            <div class="mb-1">
            <label class="form-label">Year</label>    
            <select class="form-control"  id="SYear" name="SYear" disabled>
            <option value="{{ date('Y') }}" >{{ date('Y') }}  </option>
            <option value="{{ date('Y')-1 }}" >{{ date('Y')-1 }}</option>
                </select>
            </div>      
            
            <div class="mb-1">
            <select class="form-control"  id="SMonth" name="SMonth">
            @php
                
            $currentMonth = date('n');
                setlocale(LC_ALL,"en_US.UTF8");
                for($m=1; $m<=$currentMonth; ++$m){
                     $months[$m] = strftime('%B', mktime(0, 0, 0, $m, 1));
                     echo "<option value=".$m.">".$months[$m]."</option>"; 
                }
            @endphp
            
             </select>
                
             </div>               

                
               


                <button type="submit" class="btn btn-primary me-1" id="btnMothly" data-bs-dismiss="modal">Generate</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>


