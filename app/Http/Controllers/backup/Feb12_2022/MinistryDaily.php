<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dayrpt;
use App\Models\User;

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
               'title' =>  'Hours: '.$dayrpt->total_hours, 
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
    //  dd($userID);
    
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
     // dd($request->hEditID);
    
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




   function delete_dayservice(Request $request, $id){
    $dayrpt = Dayrpt::find($id);
    //dd($id);
    if($dayrpt){
    $dayrpt->delete();
    }

 }



}
