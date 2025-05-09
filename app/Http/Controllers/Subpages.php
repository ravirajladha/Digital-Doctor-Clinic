<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Ngo;
use App\Models\Ngo_data;
use Illuminate\Http\Request;
use App\Models\Pincode;

class Subpages extends Controller
{

    public function kidneyStone(){
        return view('/subpages/KidneyStone');
    }

    public function diabetes(){
        return view('/subpages/Diabetes');
    }
   
    public function thyroid(){
        return view('/subpages/Thyroid');
    }


    public function nutrition(){
        return view('/subpages/Nutrition');
    }

 
    public function fitness(){
        return view('/subpages/Fitness');
    }

 
    public function anxiety(){
        return view('/subpages/Anxiety');
    }

 
    public function vitaminB12(){
        return view('/subpages/VitaminB12');
    }

 
    public function anaemia(){
        return view('/subpages/Anaemia');
    }

 
    public function depression(){
        return view('/subpages/Depression');
    }

  
    public function unique_mobile_number(Request $request){
        $unique_number = Auth::where('phone',$request->mobile_number)->first();
        if($unique_number){
            return 'exists';
        } else{
            return null;
        }
    }

    public function unique_email(Request $request){
        $unique_email = Auth::where('email',$request->email)->first();
        if($unique_email){
            return 'exists';
        } else{
            return null;
        }
    }

    function pincodes(Request $req){
        $pincode = Pincode::where('Pincode', $req->input('pincode'))->get();
        return $pincode[0];
    }


    public function uniqueMobileNumberDis(Request $request)
    {
        $mobileNumber = $request->input('mobile_number');

        $existingNgo = Ngo_data::where('director_phone', $mobileNumber)->first();

        if ($existingNgo) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    public function uniqueEmailDis(Request $request)
    {
        $email = $request->input('email');

        $existingNgo = Ngo_data::where('director_mail', $email)->first();

        if ($existingNgo) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
