<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="{{ route('auth.create_monthly', session()->get('LoggedUserID')) }}" method="GET" >
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Record   </h5>
            </div>

            @csrf
            <div class="modal-body flex-grow-1">
            <div class="mb-1">
            <label class="form-label">Year</label>    
            <select class="form-control"  id="SYear" name="SYear">
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
                     echo "<option value=".$m." >".$months[$m]."</option>"; 
                }
            @endphp
            
                
       
                
                @foreach ($monthrpt as $service)
                @endforeach
              
            </select>
                
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


