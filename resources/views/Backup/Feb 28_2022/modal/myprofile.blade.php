<!-- Calendar Add/Update/Delete event modal-->
<div class="modal modal-slide-in event-sidebar fade" id="myprofile-sidebar">
            <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">My Profile</h5>
                    </div>
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <!--form class="event-form needs-validation" data-ajax="false" novalidate-->
                    <form class="add-new-record modal-content pt-0" action="{{ route('auth.update_myprofile', session()->get('LoggedUserID')) }}" method="GET" >
                    @csrf
                    <div class="modal-body flex-grow-1">



                    <div class="mb-1">
                           <label class="form-label" for="contact-info-icon"><b>Profile Type</b> </label>
                         <div class="input-group input-group-merge">
                             <select name="profileType" id="profileType" class="form-select">
                                 <option value="0"> Unbaptized Publisher</option>
                                 <option value="1"> Publisher</option>
                                 <option value="2"> Pioner</option>
                                 <option value="3"> Auxiliary</option>
                             </select>
                        </div>  </div>
                             <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Email Add</b> </label>
                                     <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control"  id="email" name="email">
                                    </div>
                            </div>

                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Last Name</b> </label>
                                     <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="share"></i></span>
                                        <input type="text"  class="form-control" style="text-transform:uppercase"  id="lastName" name="lastName"   />
                                    </div>
                            </div>
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-icon"><b>First Name</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="airplay"></i></span>
                                        <input type="text"  class="form-control"  style="text-transform:uppercase" id="firstName" name="firstName"    />
                                    </div>
                            </div>
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Middle Name</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="calendar"></i></span>
                                        <input type="text"  class="form-control" style="text-transform:uppercase"  id="middleName" name="middleName"    />
                                    </div>
                            </div>
                            <div class="mb-1">
                                    <label class="form-label" for="contact-info-icon"><b>Contact Number</b></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="user-check"></i></span>
                                        <input type="number"  class="form-control"  id="contact" name="contact"  />
                                    </div>
                            </div>
                                
                            <div class="mb-1">
                                  <label class="form-label" for="contact-info-icon"><b>Address</b></label>
                                    <div class="input-group input-group-merge">
                                    
                                        <textarea class="form-control" id="address" name="address"></textarea>
                                       
                                    </div>
                            </div>
              
                         
                            
                                 <input type="hidden" id="hMyID" name="hMyID">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="btnUpdate"> <i data-feather="edit"></i></button>&nbsp;
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i data-feather="repeat"></i></button>  
                                </div>

                              
                            </div>




<script>
function  ViewMyprofile(m){
  
     var j = m.split('^'); 
     document.getElementById("hMyID").value = j[7];
     document.getElementById("email").value = j[6];
     document.getElementById("firstName").value = j[0];
     document.getElementById("lastName").value = j[1];
     document.getElementById("middleName").value = j[2];
     document.getElementById("contact").value = j[3];
     document.getElementById("address").value = j[4];
     document.getElementById("email").value = j[6];

    if(j[5] == 1){
    $('#profileType').empty();    
    $('#profileType').append(new Option('Publisher', '1'));
    $('#profileType').append(new Option('Pioner', '2'));
    $('#profileType').append(new Option('Auxiliary', '3'));
    } else if(j[5] == 2){
        $('#profileType').empty();  
        $('#profileType').append(new Option('Pioner', '2'));
        $('#profileType').append(new Option('Publisher', '1'));
        $('#profileType').append(new Option('Auxiliary', '3'));
    } else if(j[5] == 3){
        $('#profileType').empty();  
        $('#profileType').append(new Option('Auxiliary', '3'));
        $('#profileType').append(new Option('Pioner', '2'));
        $('#profileType').append(new Option('Publisher', '1'));
    }
   

}
</script> 
                                
                    </form>
                 </div>
               </div>
        </div>
    </div>


<!--/ Calendar Add/Update/Delete event modal-->