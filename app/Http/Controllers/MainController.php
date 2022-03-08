<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Cookie;

use App\Models\User;
use App\Models\Invite;
use App\Models\Activitytxn;


use Dotenv\Validator;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }


    function save(Request $request){
        
        $password = hash('sha256', $request->password);
       //insert data into database
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->group_id = $request->groupid;
        $user->group_number = $request->groupid;
        $user->email = $request->email;
        //$user->userPasswd = Hash::make($request->password);
        $user->userPasswd = $password;
        $save = $user->save();
        if($save){
        return back()->with('success','New User has been successfuly added, Please wait for Admin advice to login.');
        }else {
            return back()->with('fail','Something went wrong, try agai later');
        }
      //  dd($password);
    }

    function check(Request $request){
       // return $request->input();
       $password = hash('sha256', $request->login_password);
       $userInfo = User::where('email','=', $request->login_email)
       ->where('userPasswd','=', $password)
       ->first();
       if($userInfo){
     
       // $request->session()->put('LoggedUser', $userInfo->userID);
        $request->session()->put('LoggedUserID', $userInfo->userID);
        $request->session()->put('LoggedGroupID', $userInfo->group_id);
        $request->session()->put('Ulevel', $userInfo->userLevel);
       
       // dd($password.' || '.$userInfo->userPasswd);


        if($request->has('remember_me')){
           Cookie::queue('email',$request->login_email,1440);  //1440 means 24 Hrs
           Cookie::queue('userPasswd',$request->login_password,1440);  

          // dd($password.' || '.$userInfo->userPasswd);
        } else {
           Cookie::queue('email',$request->login_email,-1440);  //using minus will elimate cookie on next login
           Cookie::queue('userPasswd',$request->login_password,-1440);  
        }
         //-----------------------------------
         $vCount0 = DB::table('invite')->where('profile_type', '=', 0)
         ->where('publisher_id','=', $userInfo->userID)->where('group_id','=', $userInfo->group_id)->count(); //FB
         $vCount1 = DB::table('invite')->where('profile_type', '=', 1)
         ->where('publisher_id','=', $userInfo->userID)->where('group_id','=', $userInfo->group_id)->count(); //Letter Writing
         $vCount3 = DB::table('invite')->where('profile_type', '=', 2)
         ->where('publisher_id','=', $userInfo->userID)->where('group_id','=', $userInfo->group_id)->count(); //Telephone Withnessing
         $vCount4 = DB::table('invite')->where('profile_type', '=', 3)
         ->where('publisher_id','=', $userInfo->userID)->where('group_id','=', $userInfo->group_id)->count(); //RV

         $vCount5 = DB::table('invite')->where('profile_type', '=', 4)
         ->where('publisher_id','=', $userInfo->userID)->where('group_id','=', $userInfo->group_id)->count(); //BS 

         session(['FBCount' => $vCount0]); 
         session(['LWCount' => $vCount1]);  
         session(['TWCount' => $vCount3]); 
         session(['RVCount' => $vCount4]); 
         session(['BSCount' => $vCount5]); 

         return redirect('auth/dashboard');
         //-----------------------------------
 
       }else{
        return back()->with('fail','Incorrect password');
    }
      
    }

    function logout(){
        if(session()->has('LoggedUserID')){
            session()->pull('LoggedUserID');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>User::where('userID','=', session('LoggedUserID'))->first()];
        return view('auth.dashboard', $data);
    }

    function onlinecom($ptypeid,$filterid){
        $title = "";
        //  dd($userID);
         $contacts = '';
        //0 means online community | 1 means letter writing | 2 means telephone witnessing 
        $profileType = $ptypeid;
        
        switch ($profileType) {
            case 0: //
                $title = "Online Community"; 
            break;

            case 1: //
                $title = "Letter Writing"; 
            break;

            case 2: //
                $title = "Phone Whitnissing"; 
            break;

            case 3: //
                $title = "Return Visit"; 
            break;

            case 4: //
                $title = "Bible Study"; 
            break;
        }    

        $data = ['LoggedUserInfo'=>User::where('userID','=', session('LoggedUserID'))->first()];
        $userID = session('LoggedUserID');   
        $groupID = session('LoggedGroupID');  
        
        //for filter contact account 
        //1 means for sending : 2 means sent done
        
         if($filterid==1){
            $contacts =  Invite::where('publisher_id',$userID)
            ->where('profile_type', '=', $profileType)
            ->where('publisher_id',$userID)
            ->where('group_id', '=', $groupID)
            ->where('date_sent', '=', '0000-00-00') //
            ->orderBy('profile_name', 'ASC')
            ->paginate(5);    
         }else if ($filterid==2){
            $contacts =  Invite::where('publisher_id',$userID)
            ->where('profile_type', '=', $profileType)
            ->where('publisher_id',$userID)
            ->where('group_id', '=', $groupID)
            ->where('date_sent', '!=', '0000-00-00') //for sending
            ->orderBy('profile_name', 'ASC')
            ->paginate(5);
         }else if ($filterid==3){
            $contacts =  Invite::where('publisher_id',$userID)
            ->where('profile_type', '=', $profileType)
            ->where('publisher_id',$userID)
            ->where('group_id', '=', $groupID)
            ->orderBy('profile_name', 'ASC')
            ->paginate(5);
         }  
        


        // dd($contacts);

       /* $contacts = Invite::leftJoin('activitytxn','invite.id', '=', 'activitytxn.contact_id')
        ->select('Invite.*' ,'activitytxn.topic')->distinct()
        ->where('Invite.publisher_id',$userID)
        ->where('Invite.profile_type', '=', $profileType)
        ->where('Invite.group_id', '=', $groupID)
        ->orderBy('activitytxn.entrydate', 'DESC')
        ->paginate(5);*/

       // dd($contacts);
         
        return view('auth.onlinecom', $data, compact('title','contacts','profileType'))->with('i', (request()->input('page', 1) - 1) * 5);
    
       
    }

   



    function update_myprofile(Request $request,$id){
         $user = User::find($id);
            //  dd($user);
        if($user){
            $user->profile_type = $request->profileType;
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->middle_name = $request->middleName;
            $user->contact_num = $request->contact;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->update();

        }
     
        return redirect()->back(); //return on previous page
   
   
     
    }


    function sent_contact($id){
        $contact = Invite::find($id);
        if($contact){
            return response()->json(['status'=>200,'contact'=>$contact]);
        } else{
            return response()->json(['status'=>404,'message'=>'Contact Not Found']);
        }

     }


     function get_contact($id){
        $contact = Invite::find($id);
        if($contact){
            return response()->json(['status'=>200,'contact'=>$contact]);
        } else{
            return response()->json(['status'=>404,'message'=>'Contact Not Found']);
        }

     }
    
     function update_tag(Request $request){
        $task = $request->input('hTask');
        $contactID = $request->input('hContactID');
        //dd($request);
        $dDate = '';
        if ($task =='Sent') {
        $dDate = date("ymd");  
        } else if($task =='Reset'){
        $dDate =  date("ymd") - 1;
        } 
          $invite = Invite::find($contactID);
           if($invite){
                $invite->date_sent = $dDate;
                $invite->update();
             } 
             return redirect()->back(); //return on previous page
         
        }  
      

    function update_contactprofile(Request $request, Invite $invite){
      //  dd($request);
     $invite = Invite::find($request['hID']);
     $userID = $invite->publisher_id;
     $groupID = $invite->group_id;
   
       if($invite){
            $invite->gender = $request['gender'];
            $invite->address = $request['profile_Address'];
            $invite->contact_no = $request['profile_contact'];
            $invite->profile_type = $request['profile_type'];
            $invite->disturb_tag = $request['disturb_tag'];
            $invite->update();

         $vCount0 = DB::table('invite')->where('profile_type', '=', 0)
         ->where('publisher_id','=', $userID)->where('group_id','=', $groupID)->count(); //FB
         $vCount1 = DB::table('invite')->where('profile_type', '=', 1)
         ->where('publisher_id','=', $userID)->where('group_id','=', $groupID)->count(); //Letter Writing
         $vCount3 = DB::table('invite')->where('profile_type', '=', 2)
         ->where('publisher_id','=', $userID)->where('group_id','=', $groupID)->count(); //Telephone Withnessing
         $vCount4 = DB::table('invite')->where('profile_type', '=', 3)
         ->where('publisher_id','=', $userID)->where('group_id','=', $groupID)->count(); //RV
         $vCount5 = DB::table('invite')->where('profile_type', '=', 4)
         ->where('publisher_id','=', $userID)->where('group_id','=', $groupID)->count(); //BS 
         session(['FBCount' => $vCount0]); 
         session(['LWCount' => $vCount1]);  
         session(['TWCount' => $vCount3]); 
         session(['RVCount' => $vCount4]); 
         session(['BSCount' => $vCount5]); 
          
        }
   
        return redirect()->back(); //return on previous page
    }

    

    function get_activity(Request $request,$id){
        $title = "Contact Activity"; 
       // $ID = explode("|",$id);

        $contacts =  Invite::find($id);
        $activitytxns = Activitytxn::where('contact_id','=', $id)
        ->orderBy("entrydate", "desc")
        //->orderByDesc("entrydate")
        ->get();
        $data = ['LoggedUserInfo'=>User::where('userID','=', session('LoggedUserID'))->first()];
       // dd($activitytxns);
        
        return view('auth.activity', $data, compact('title','activitytxns','contacts'));

     }

     function create_activity(Request $request,$id){
         $data = explode("|",$id);
         //dd($data[0]);
         $activitytxn= new Activitytxn();
         $activitytxn->topic= $request['topic'];
         $activitytxn->about= $request['about'];
         $activitytxn->contact_id= $data[0];
         $activitytxn->publisher_id= $data[1];
         $activitytxn->group_id= $data[2];
         $activitytxn->save();
          
         //
         $invite = Invite::find($data[0]);
         $invite->remarks = $request['topic'];
         $invite->update();



         return redirect()->back(); //return on previous page

     }


     
     function update_activity(Request $request, $id){

        $activitytxn = Activitytxn::find($id);
        if($activitytxn){
        $activitytxn->topic= $request['edit_topic'];
        $activitytxn->about= $request['edit_about'];
        $activitytxn->update();
        }
        return redirect()->back(); //return on previous page
  
     }


     
     


}
