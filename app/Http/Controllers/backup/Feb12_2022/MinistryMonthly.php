<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Monthrpt;

use Illuminate\Support\Facades\DB;

class MinistryMonthly extends Controller
{
    function index_month(){
        $title = "Monthly Entry"; 
        $userID = session('LoggedUserID');   
        $groupNumber = session('LoggedGroupID');  
       
        $monthrpt = Monthrpt::where('publisher_id','=', $userID)
        ->where('fyear','=', date('Y'))
        ->where('groupnumber','=', $groupNumber)
        ->get();
       // dd($monthrpt);
         $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
       // dd($userID.'|'.$groupID);
        
        return view('auth.dataentrymonthly', $data, compact('title','monthrpt'));
        
    }



    function create_monthly(Request $request, $id){
        $userID = session('LoggedUserID');   
        $groupID = session('LoggedGroupID');  
      //  dd($userID);
      
        $user = User::where('userID','=', $userID)->first();
        $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
        $final = 0;
        if($request->has('finalSwitch')){
            $final = 1;
        } else {
            $final = 0;
        }

        $monthrpt = new Monthrpt;
        $monthrpt->fyear = $request->SYear;
        $monthrpt->fmonth = $request->SMonth;
        $monthrpt->placement = $request->placement;
        $monthrpt->video = $request->video;
        $monthrpt->rv = $request->rv;
        $monthrpt->bs = $request->bs;
        $monthrpt->total_hours = $request->hour;
        $monthrpt->groupnumber = $groupID;
        $monthrpt->publisher_id = $userID;
        $monthrpt->fullname = $name;
        $monthrpt->final_entry = $final;
        $monthrpt = $monthrpt->save();
        return redirect()->back();
        
     }


      
     function update_monthly(Request $request, $id){
      // dd($request);
        $userID = session('LoggedUserID');   
        $user = User::where('userID','=', $userID)->first();
        $name = $user->last_name.', '.$user->first_name.' '.$user->middle_name; 
        $final = 0;
        if($request->has('efinalSwitch')){
            $final = 1;
        } else {
            $final = 0;
        }
        
        $monthrpt = Monthrpt::find($request->eID);
           if($monthrpt){
        $monthrpt->placement = $request->eplacement;
        $monthrpt->video = $request->evideo;
        $monthrpt->rv = $request->erv;
        $monthrpt->bs = $request->ebs;
        $monthrpt->total_hours = $request->ehour;
        $monthrpt->fullname = $name;
        $monthrpt->final_entry = $final;
        $monthrpt = $monthrpt->update();
        return redirect()->back();
           }
        
     }

     //-- Officer Monthly ----------
     function officer_report(Request $request){
        


        $title = "Group Monthly Report"; 
        $userID = session('LoggedUserID');   
        $groupNumber = session('LoggedGroupID');    

        $monthrpt = Monthrpt::where('fyear','=', date('Y'))
        ->where('groupnumber','=', $groupNumber)
        ->where('final_entry','=', 1) //1-Means final submission
        ->get();

        $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];

    
       return view('auth.officermonthlyreport', $data, compact('title','monthrpt'));

     }
    

}
