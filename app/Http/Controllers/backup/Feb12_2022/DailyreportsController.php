<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\dailyreports;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class DailyreportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Daily Entry";  
        $userID = session('LoggedUserID');   
        $groupNumber = session('LoggedGroupID'); 
        $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
        if($request->ajax()) {
          
         

            $data = Dailyreports::where('publisher_id','=', $userID)
            ->where('groupnumber','=', $groupNumber)
            ->get();

            return response()->json($data);
       }
       
       return view('auth.dataentrydailys', $data, compact('title'));

      // return view('auth.dataentrydailys');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $dailyreport = new dailyreports;
        $dailyreport->entrydate = $request->dteNow;
        $dailyreport->remarks = $request->remarks;
        $dailyreport->placement = $request->placement;
        $dailyreport->video = $request->video;
        $dailyreport->rv = $request->rv;
        $dailyreport->bs = $request->bs;
        $dailyreport->total_hours = $request->hour;
        $dailyreport->groupnumber = $groupNumber;
        $dailyreport->publisher_id = $userID;
        $dailyreport->fullname = $name;
        $dailyreport->final_entry = $final;
        $dailyreport = $dailyreport->save();
        return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dailyreports  $dailyreports
     * @return \Illuminate\Http\Response
     */
    public function show(dailyreports $dailyreports)
    {
        $title = "Daily Entry"; 
        $userID = session('LoggedUserID');   
        $groupNumber = session('LoggedGroupID');  

        $dailyreports = Dailyreports::where('publisher_id','=', $userID)
        ->where('groupnumber','=', $groupNumber)
        ->get();

        
        $event = Dailyreports::where('publisher_id','=', $userID)
        ->where('groupnumber','=', $groupNumber)
        ->get();


        $data = ['LoggedUserInfo'=>User::where('userID','=', $userID)->first()];
        $events = array();
        foreach($dailyreports as $dailyreport) {
            $events[] = [
               'id' =>  $dailyreport->id, 
               'title' =>  $dailyreport->remarks, 
               'start' =>  $dailyreport->entrydate,
               'end' =>  $dailyreport->entrydate,
               'remarks' =>  $dailyreport->remarks,
               'entrydate' =>  $dailyreport->entrydate,
               'placement' =>  $dailyreport->placement,
               'video' =>  $dailyreport->video,
               'rv' =>  $dailyreport->rv,
               'bs' =>  $dailyreport->bs,
               'hours' =>  $dailyreport->total_hours,
               'stat' =>  $dailyreport->final_entry,
             ];
        }

        
        //return $events;
        //dd($rield_service);
       return view('auth.dataentrydaily', $data, compact('title','events'));
       // return response()->json($event, status: 200);
    }



       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailyreports  $dailyreports
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
               $event = dailyreports::create([
                   'remarks' => $request->title,
                   'entrydate' => $request->start,
               ]);
  
               return response()->json($event);
              break;
   
            case 'update':
               $event = dailyreports::find($request->id)->update([
                   'remarks' => $request->title,
                   'entrydate' => $request->start,
               ]);
  
               return response()->json($event);
              break;
   
            case 'delete':
               $event = dailyreports::find($request->id)->delete();
   
               return response()->json($event);
              break;
              
          
         }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailyreports  $dailyreports
     * @return \Illuminate\Http\Response
     */
    public function edit(dailyreports $dailyreports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dailyreports  $dailyreports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dailyreports $dailyreports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dailyreports  $dailyreports
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailyreports $dailyreports)
    {
        //
    }
}
