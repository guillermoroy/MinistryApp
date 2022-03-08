<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dayrpt;
use App\Models\User;
use App\Models\Monthrpt;

class MinistryDaily extends Controller
{
  function index_day(){

    $title = "Daily Entry"; 
        $userID = session('LoggedUserID');   
        $groupNumber = session('LoggedGroupID');  

        $dayrpts = Dayrpt::where('publisher_id','=', $userID)
        ->where('groupnumber','=', $groupNumber)
        ->get();


        $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
        $events = array();
        foreach($dayrpts as $dayrpt) {
            $events[] = [
               'id' =>  $dayrpt->id.'^'.$dayrpt->remarks.'^'.$dayrpt->entrydate.'^'.$dayrpt->placement.'^'.$dayrpt->video.'^'.$dayrpt->rv.'^'.$dayrpt->bs.'^'.$dayrpt->total_hours.'^'.$dayrpt->final_entry, 
               'title' =>  $dayrpt->total_hours.' Hours', 
               'start' =>  $dayrpt->entrydate,
               'end' =>  $dayrpt->entrydate

             ];
        }
     //dd($events);
       return view('auth.dataentrydaily', $data, compact('title','events'));
       // return response()->json($event, status: 200);
  
  }

  public function store(Request $request)
  {
      $userID = session('LoggedUserID');   
      $groupNumber = session('LoggedGroupID'); 
      $m =  date("m", strtotime($request->dteNow));  

     // dd($m);
    
      $user = User::where('userID','=', $userID)->first();
      $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
      $final = 0;
      if($request->has('finalSwitch')){
          $final = 1;
      } else {
          $final = 0;
      }
      $dayrpt = new Dayrpt;
      $dayrpt->entrydate = $request->dteNow;
      $dayrpt->remarks = $request->remarks;
      $dayrpt->placement = $request->placement;
      $dayrpt->video = $request->video;
      $dayrpt->rv = $request->rv;
      $dayrpt->bs = $request->bs;
      $dayrpt->total_hours = $request->hour;
      $dayrpt->groupnumber = $groupNumber;
      $dayrpt->publisher_id = $userID;
      $dayrpt->fullname = $name;
      $dayrpt->final_entry = $final;
      $dayrpt = $dayrpt->save();
      return redirect()->back();
  }
  
  public function update_daily(Request $request)
  {
      $userID = session('LoggedUserID');   
      $groupNumber = session('LoggedGroupID'); 
      $m =  date("m", strtotime($request->edteNow));


      //dd(intval($m));
    
      $user = User::where('userID','=', $userID)->first();
      $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
      $final = 0;
      if($request->has('efinalSwitch')){
          $final = 1;
         
      } else {
          $final = 0;
      }
      $dayrpt = Dayrpt::find($request->hEditID);
           if($dayrpt){
      $dayrpt->entrydate = $request->edteNow;
      $dayrpt->remarks = $request->eremarks;
      $dayrpt->placement = $request->eplacement;
      $dayrpt->video = $request->evideo;
      $dayrpt->rv = $request->erv;
      $dayrpt->bs = $request->ebs;
      $dayrpt->total_hours = $request->ehour;
      $dayrpt->groupnumber = $groupNumber;
      $dayrpt->publisher_id = $userID;
      $dayrpt->fullname = $name;
      $dayrpt->final_entry = $final;
      $dayrpt = $dayrpt->update();
       }   
     return redirect()->back();     
  }

  //----------------------------------------------------
  function final_month(Request $request){
  //  dd($request->finalMonth);
    $m = sprintf("%02d", $request->finalMonth);
    $title = "Service Monthly Report"; 
    $userID = session('LoggedUserID');   
    $groupNumber = session('LoggedGroupID'); 
    
    $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->whereMonth('entrydate','=', $m)
    ->whereYear('entrydate','=', date('Y'))
    ->where('publisher_id','=', $userID)
    ->get();
   
    foreach($dayrpts as $dayrpt) {
     // dd($dayrpt->id);
      $dayrpt = Dayrpt::find($dayrpt->id);
       if($dayrpt){
      $dayrpt->final_entry = 1;
      $dayrpt = $dayrpt->update();
       }
    }

  
    //--- delete record exist in month ----------------------------

    $monthID =  0;
    $monthrpts = Monthrpt::where('publisher_id','=', $userID)
    ->where('fyear','=', date('Y'))
    ->where('fmonth','=', intval($m))->get();
    foreach($monthrpts as $monthrpt) {
      $monthID = $monthrpt->id;
      $monthrpt = Monthrpt::find($monthID);
      if($monthrpt){ $monthrpt->delete(); } 

    } 

    //---- create month record ------------------------------
    $this->genRecordMonth($m);
    return redirect()->back(); 
 
   }
   

  //----------------------------------------------------
  public function genRecordMonth($m){
    $userID = session('LoggedUserID');   
    $groupNumber = session('LoggedGroupID'); 
    $user = User::where('userID','=', $userID)->first();
    $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
    $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->whereMonth('entrydate','=', $m)
    ->whereYear('entrydate','=', date('Y'))
    ->where('publisher_id','=', $userID)
    //->where('final_entry','=', 1)
    ->get();

    $Trv = 0;
    $Tbs = 0;
    $Tplacement = 0;
    $Tvideo = 0;
    $Ttotal_hours = 0;
    
    foreach($dayrpts as $dayrpt) {
        $Trv += $dayrpt->rv;
        $Tbs += $dayrpt->bs;
        $Tvideo += $dayrpt->video;
        $Tplacement += $dayrpt->placement;
        $Ttotal_hours += $dayrpt->total_hours;
    }

    $monthrpt = new Monthrpt;
    $monthrpt->fyear = date('Y');
    $monthrpt->fmonth = intval($m);
    $monthrpt->placement = $Tplacement;
    $monthrpt->video = $Tvideo;
    $monthrpt->rv = $Trv;
    $monthrpt->bs = $Tbs;
    $monthrpt->total_hours = $Ttotal_hours;
    $monthrpt->groupnumber =  $groupNumber;
    $monthrpt->publisher_id = $userID;
    $monthrpt->fullname = $name;
    $monthrpt->final_entry = 1;
    $monthrpt = $monthrpt->save();
  }
  //-----------------------------------------------------
  public function genUpdateMonth($m , $monthID){
     //dd($monthID.'|RBG');
      $userID = session('LoggedUserID');   
      $user = User::where('userID','=', $userID)->first();
      $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 

    $monthrpt = Monthrpt::find($monthID);
    if($monthrpt){
    //-----------------------------------
    //dd(date('Y').'|'.date('m'));
    $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->whereMonth('entrydate','=', $m)
    ->whereYear('entrydate','=', date('Y'))
    ->where('publisher_id','=', $userID)
    ->where('final_entry','=', 1)
    ->get();

    $Trv = 0;
    $Tbs = 0;
    $Tplacement = 0;
    $Tvideo = 0;
    $Ttotal_hours = 0;
    
    foreach($dayrpts as $dayrpt) {
        $Trv += $dayrpt->rv;
        $Tbs += $dayrpt->bs;
        $Tvideo += $dayrpt->video;
        $Tplacement += $dayrpt->placement;
        $Ttotal_hours += $dayrpt->total_hours;
    }
  //--------------------------------------------------------
        $monthrpt->placement = $Tplacement;
        $monthrpt->video = $Tvideo;
        $monthrpt->rv = $Trv;
        $monthrpt->bs = $Tbs;
        $monthrpt->total_hours = $Ttotal_hours;
        $monthrpt->publisher_id = $userID;
        $monthrpt->fullname = $name;
        $monthrpt->update();
     
         }
   }



  //-----------------------------------------------------
  function service_month_report(Request $request){
    $title = "Service Report"; 
    $userID = session('LoggedUserID');   
    $groupNumber = session('LoggedGroupID'); 
    

    $monthrpt = Monthrpt::where('publisher_id','=', $userID)
      ->where('fyear','=', date('Y'))
      ->where('groupnumber','=', $groupNumber)
      ->get();

      $m = date('F', mktime(0, 0, 0, $request->SMonth));
      $mw =  $request->SMonth;
      
 
    $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->where('groupnumber','=', $groupNumber)
    ->whereMonth('entrydate','=', $request->SMonth)
    //->where('final_entry','=', 1)
    ->orderBy('entrydate', 'DESC')
    ->get();



    $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
        $events = array();
        foreach($dayrpts as $dayrpt) {
            $events[] = [
               'id' =>  $dayrpt->id.'^'.$dayrpt->remarks.'^'.$dayrpt->entrydate.'^'.$dayrpt->placement.'^'.$dayrpt->video.'^'.$dayrpt->rv.'^'.$dayrpt->bs.'^'.$dayrpt->total_hours.'^'.$dayrpt->final_entry, 
               'title' =>  'Hours: '.$dayrpt->total_hours, 
               'start' =>  $dayrpt->entrydate,
               'end' =>  $dayrpt->entrydate

             ];
        }

        return view('auth.servicereport', $data, compact('title','events','monthrpt','dayrpts','m','mw'));

  }

  //-----------------------------------------------------
  
  function service_report(Request $request){
    $title = "Service Report"; 
    $userID = session('LoggedUserID');   
    $groupNumber = session('LoggedGroupID'); 
    

    $m = date('F', mktime(0, 0, 0, date('m')));
    $mw = date('m');
    $monthrpt = Monthrpt::where('publisher_id','=', $userID)
      ->where('fyear','=', date('Y'))
      ->where('groupnumber','=', $groupNumber)
      ->get();

    $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->where('groupnumber','=', $groupNumber)
    ->whereMonth('entrydate','=', date('m'))
    //->where('final_entry','=', 1)
    ->orderBy('entrydate', 'DESC')
    ->get();

    $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
        $events = array();
        foreach($dayrpts as $dayrpt) {
            $events[] = [
               'id' =>  $dayrpt->id.'^'.$dayrpt->remarks.'^'.$dayrpt->entrydate.'^'.$dayrpt->placement.'^'.$dayrpt->video.'^'.$dayrpt->rv.'^'.$dayrpt->bs.'^'.$dayrpt->total_hours.'^'.$dayrpt->final_entry, 
               'title' =>  'Hours: '.$dayrpt->total_hours, 
               'start' =>  $dayrpt->entrydate,
               'end' =>  $dayrpt->entrydate

             ];
        }

        return view('auth.servicereport', $data, compact('title','events','monthrpt','dayrpts','m','mw'));

  }

 
  

  function compute_service(Request $request){
    $title = "Service Monthly Report"; 
    $userID = session('LoggedUserID');   
    $groupNumber = session('LoggedGroupID'); 
   
    //----------------------------------
    $M = sprintf("%02d", $request->SMonth);
    $user = User::where('userID','=', $userID)->first();
    $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
    //$data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
      //dd(date('Y').'|'.date('m'));
    //-- get all record for the month ---------------------------------
     $dayrpts = Dayrpt::where('publisher_id','=', $userID)
    ->whereMonth('entrydate','=', $M)
    ->whereYear('entrydate','=', date('Y'))
    ->where('groupnumber','=', $groupNumber)
    ->where('publisher_id','=', $userID)
    ->where('final_entry','=', 1)
    ->get();
     
    // sum all records
    $Trv = 0;
    $Tbs = 0;
    $Tplacement = 0;
    $Tvideo = 0;
    $Ttotal_hours = 0;
    foreach($dayrpts as $dayrpt) {
        $Trv += $dayrpt->rv;
        $Tbs += $dayrpt->bs;
        $Tvideo += $dayrpt->video;
        $Tplacement += $dayrpt->placement;
        $Ttotal_hours += $dayrpt->total_hours;
    }
    
  //--------------------------------------------------------
    if(Monthrpt::where('publisher_id','=', $userID)
      ->where('fyear','=', date('Y'))
      ->where('fmonth','=', $request->SMonth)->exists()
            
      ) {
      dd('exist');
  //--------------------------------------
    } else {

     // dd('not exist');
      $monthrpt = new Monthrpt;
      $monthrpt->fyear = date('Y');
      $monthrpt->fmonth = $M;
      $monthrpt->placement = $Tplacement;
      $monthrpt->video = $Tvideo;
      $monthrpt->rv = $Trv;
      $monthrpt->bs = $Tbs;
      $monthrpt->total_hours = $Ttotal_hours;
      $monthrpt->groupnumber =  $groupNumber;
      $monthrpt->publisher_id = $userID;
      $monthrpt->fullname = $name;
      $monthrpt = $monthrpt->save();
    }
    
   return redirect()->back();

    
    //return view('auth.servicereport', $data, compact('title','monthrpt'));

    //dd($Trv.'|'.$Tbs.'|'.$Tvideo.'|'.$Tplacement.'|'.$Ttotal_hours);


  }





}
