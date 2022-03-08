<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Dayrpt;
use App\Models\Activitytxn;
use App\Models\Monthrpt;


class DeleteController extends Controller
{
    function delete_from_table(Request $request, $id){
        $tableName = $request->hTableName;
        $tblID = $request->htxnID;
        //  dd($request->hTableName.'|'.$tblID);
       switch ($tableName) {
        case 'Dayrpt': 
             $dayrpt = Dayrpt::find($tblID);
             if($dayrpt){ $dayrpt->delete(); }
        break;
       
        case 'activitytxn': 
            $activitytxn = Activitytxn::find($tblID);
            if($activitytxn){ $activitytxn->delete(); }
        break;

        case 'monthrpt': 
            $monthrpt = Monthrpt::find($tblID);
            if($monthrpt){ $monthrpt->delete(); }
        break;
    

       
      }

       
      return redirect()->back(); //return on previous page
    
    }
}
