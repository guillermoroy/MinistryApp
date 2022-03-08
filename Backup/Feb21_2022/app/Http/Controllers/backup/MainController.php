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
        
      //  return $request->input();

        $request->validate([
            'groupid'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'middle_name'=>'required',
            'password'=>'required',
            'email' => [
            'required',
            'email',
            'unique:users,email',
            ],
        ]);
       
        //insert data into database
        $user = new User;
        $user->firstName = $request->first_name;
        $user->lastName = $request->last_name;
        $user->middleName = $request->middle_name;
        $user->groupid = $request->groupid;
        $user->groupNumber = $request->groupid;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        if($save){
        return back()->with('success','New User has been successfuly added to database');
        }else {
            return back()->with('fail','Something went wrong, try agai later');
        }
         
    }

    function check(Request $request){
       // return $request->input();
       $userInfo = User::where('email','=', $request->login_email)->first();
        
        ///dd($userInfo);
  
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
             if(Hash::check($request->login_password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);

             if($request->has('remember_me')){
                Cookie::queue('email',$request->login_email,1440);  //1440 means 24 Hrs
                Cookie::queue('password',$request->login_password,1440);  
             } else {
                Cookie::queue('email',$request->login_email,-1440);  //using minus will elimate cookie on next login
                Cookie::queue('password',$request->login_password,-1440);  
             }


            //-----------------------------------
        $vCount0 = DB::table('invite')->where('profile_type', '=', 0)->where('rv_tag', '=', 0)->where('bible_tag', '=', 0)
        ->where('publisher_id','=', $userInfo->id)->where('group_id','=', $userInfo->groupid)->count(); //FB
        $vCount1 = DB::table('invite')->where('profile_type', '=', 1)->where('rv_tag', '=', 0)->where('bible_tag', '=', 0)
        ->where('publisher_id','=', $userInfo->id)->where('group_id','=', $userInfo->groupid)->count(); //Letter Writing
        $vCount3 = DB::table('invite')->where('profile_type', '=', 2)->where('rv_tag', '=', 0)->where('bible_tag', '=', 0)
        ->where('publisher_id','=', $userInfo->id)->where('group_id','=', $userInfo->groupid)->count(); //Telephone Withnessing
        $vCount4 = DB::table('invite')->where('rv_tag', '=', 1)->where('publisher_id','=', $userInfo->id)->where('group_id','=', $userInfo->groupid)->count(); //Telephone Withnessing
        $vCount5 = DB::table('invite')->where('bible_tag', '=', 1)->where('publisher_id','=', $userInfo->id)->where('group_id','=', $userInfo->groupid)->count(); //Telephone Withnessing
        session(['UserID' => $userInfo->id]);
        session(['FBCount' => $vCount0]); 
        session(['LWCount' => $vCount1]);  
        session(['TWCount' => $vCount3]); 
        session(['RVCount' => $vCount4]); 
        session(['BSCount' => $vCount5]); 

            //-----------------------------------



                return redirect('auth/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
      
    }

    function logout(){

       // return "Just logme out";
      
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('auth.dashboard', $data);
    }

    function onlinecom(){
        $title = "Online Community"; 
        $profileType = 0; //0 means online community
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $userID = session('LoggedUser');   
        $contacts =  Invite::where('publisher_id',$userID)->where('profile_type', '=', $profileType)->where('rv_tag', '=', 0)->where('bible_tag', '=', 0)->paginate(3);
        
        
       // dd($contacts);
        return view('auth.onlinecom', $data, compact('title','contacts'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
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
    
     function update_tag(Request $request, $id){
        $task = $request->input('task');
        $dDate = '';

        if ($task =='Sent') {
        $dDate = date("ymd");  
        } else if($task =='Reset'){
        $dDate =  date("ymd") - 1;
        } 
         
       /* return response()->json([
            'status'=>200,
            'message'=> $task
        ]);*/

          $invite = Invite::find($id);
           if($invite){
                $invite->date_sent = $dDate;
                $invite->update();
                return response()->json([
                    'status'=>200,
                    'message'=> 'Update done!'
                ]);
          
           } else {
            return response()->json([
                'status'=>404,
                'message'=>'Contact not Found!',
             ]);

           }
        }  
      

    function update_contactprofile(Request $request, $id, Invite $invite){
     $invite = Invite::find($id);
  //dd($invite);
       if($invite){
            $invite->gender = $request['gender'.$id];
            $invite->address = $request['profile_Address'.$id];
            $invite->contact_no = $request['profile_contact'.$id];
            $invite->bible_tag = $request['bible_tag'.$id];
            $invite->disturb_tag = $request['disturb_tag'.$id];
            $invite->rv_tag = $request['rv_tag'.$id];
            $invite->update();
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
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
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


     function delete_activity(Request $request, $id){
        $activitytxn = Activitytxn::find($id);
        //dd($id);
        if($activitytxn){
        $activitytxn->delete();
        }
       // return redirect()->back(); //return on previous page
        
     }


}
