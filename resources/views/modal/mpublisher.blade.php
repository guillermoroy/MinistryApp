<div class="d-inline-block">
              <!-- Modal -->
        <form class="add-new-record modal-content pt-0" action="{{ route('auth.service_month_report') }}" method="GET" >
           @csrf
          <div class="modal fade text-start modal-danger"
            id="selectMonthReport"
            tabindex="-1"
           aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"><span> View Previous Month Record </span>  :</h5> &nbsp; <span id="msgdata"> </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                    
                    <div class="col-7">
                        <label>Select Month: </label>
                    <select class="form-control"  id="SMonth" name="SMonth">

                                
                                        @php
                                            
                                        $currentMonth = date('n');
                                            setlocale(LC_ALL,"en_US.UTF8");

                                            echo "<option value='".$currentMonth."' >".strftime('%B',mktime(0, 0, 0, $currentMonth, 1))."</option>"; 

                                            for($m=1; $m<=$currentMonth; ++$m){
                                                $months[$m] = strftime('%B', mktime(0, 0, 0, $m, 1));
                                                echo "<option value=".$m." >".$months[$m]."</option>"; 
                                            }
                                        @endphp
                      </select>
                      </div>
                      </div> 

                    <div class="modal-footer">
                     <button type="submit" class="btn btn-info" data-bs-dismiss="modal"> &nbsp; Submit &nbsp; </button>
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close </button>
                    </div>
                </div>
            </div>
          </div>
        </form>
</div>