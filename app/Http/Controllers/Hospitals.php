<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Clinics;
use App\Models\Consultation;
use App\Models\Digitaldrclininc_center;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Hospitals extends Controller
{

public function login()
    {
        return view('/hospitals/login');
    }

    public function hospital_login(Request $request)
{
    if (!$request->has('username') || !$request->has('password')) {
        return view('hospitals.login')->with('failed','Enter your username and password');
    }

    $username = $request->input('username');
    $password = $request->input('password');

    // Use where() and first() separately for clarity
    $user = Auth::where('email', $username)->where('type', 'hospital')->first();
    

    if ($user && Hash::check($password,$user->password) && $user->type === "hospital" && $user->status == 1) {
        $hospital = Clinics::where('email', $user->email)->first();  
        Session::put('rexkod_digitaldrclinic_hospital_id', $user->id);
            Session::put('rexkod_digitaldrclinic_hospital_name', $user->name);
            Session::put('rexkod_digitaldrclinic_hospital_email', $user->email);
            Session::put('rexkod_digitaldrclinic_hospital_phone', $user->phone);
            Session::put('rexkod_digitaldrclinic_login_type', $user->type);
            Session::put('rexkod_digitaldrclinic_login_image', $hospital->img1);
        return view('hospitals.dashboard',['userphone' => $user->phone, 'success' => 'Logged in' ]);
    } elseif ($user && $user->type === 'hospital' && $user->status == 0 && $user->status === null) {
        Session::flash('failed', 'Access denied');
        return view('hospitals.login');
    } else {
        Session::flash('failed', 'Invalid credentials');
        return view('hospitals.login');
    }
    // $request->validate([
    //     'username' => 'required',
    //     'password' => 'required',
    // ]);

    // $username = $request->input('username');
    // $password = $request->input('password');

    // $user = Auth::where('email', $username)->where('type', 'hospital')->first();

    // if ($user && Hash::check($password, $user->password) && $user->type === "hospital") {
    //     $hospital = Clinics::where('email', $user->email)->first();

    //     if ($hospital) {
    //         Session::put('rexkod_digitaldrclinic_hospital_id', $user->id);
    //         Session::put('rexkod_digitaldrclinic_hospital_name', $user->name);
    //         Session::put('rexkod_digitaldrclinic_hospital_email', $user->email);
    //         Session::put('rexkod_digitaldrclinic_hospital_phone', $user->phone);
    //         Session::put('rexkod_digitaldrclinic_login_type', $user->type);
    //         Session::put('rexkod_digitaldrclinic_login_image', $hospital->img1);

    //         return view('hospitals.dashboard')->with('success','Login Successfully');
    //     } else {
    //         Session::flash('error', 'Hospital not found for the given email.');
    //         return view('/hospitals/login')->with('success','Invalid credentials or you do not have access.');

    //     }
    // } else {
    //     Session::flash('error', 'Invalid credentials or you do not have access.');
    // }

    // return view('/hospitals/login')->with('success','Invalid credentials or you do not have access.');
}


    public function dashboard(){
        $prescriptions_data = Prescription::all();
      
        $data = [
            'prescriptions_data' => $prescriptions_data,
        ];
  
        return view('hospitals/dashboard',$data);
    }

    public function hospital_profile()
    {  
         $get_hospitals_details = Clinics::where( 'email',session('rexkod_digitaldrclinic_hospital_email'))->first();
        $data = [
            'get_hospital_details' => $get_hospitals_details,
        ];

       return view('hospitals/hospital_profile',$data);
    }
    public function change_password(){
        return view('hospitals/change_password');
    }
    
public function logout()
{
    FacadesAuth::logout();
    return redirect('hospitals/login'); // Redirect to the login page after logout
}

public function changePasswordHospitals(Request $req){
    $hodpital = Auth::where('id', session('rexkod_digitaldrclinic_hospital_id'))->first();

    if ($hodpital) {
        $oldPassword = $hodpital->password;
        $oldPassword1 = $req->old_password;


        if (Hash::check($oldPassword1, $oldPassword)) {
            if ($req->new_password === $req->confirm_password) {
                $newPassword = bcrypt($req->new_password);
                $hodpital->update(['password' => $newPassword]);
                $authDoc = Auth::where('id', $hodpital->id)->where('type', 'hospital')->first();
                $authDoc->update(['password' => $newPassword]);

                Session::flash('success', 'Password updated');
                return view('/hospitals/change_password');
            } else {
                Session::flash('failed', 'New passwords entered are not matching');
                return view('/hospitals/change_password');
            }
        } else {
            Session::flash('failed', 'Incorrect Old Password');
            return view('/hospitals/change_password');
        }
    } else {
        Session::flash('failed', 'Doctor not registered');
        return view("/hospitals/change_password");
    }
    return view("/hospitals/change_password");
}

public function referral(){
    return view('/hospitals/referral');
}

public function doctorprofileto($id){
    $doctor = Doctor::where('auth_id',$id)->first();

    return view('hospitals/doctorprofileto')->with('doctor', $doctor);
}

public function doctorprofilefrom($id){
    $doctor = Doctor::where('auth_id',$id)->first();

    return view('hospitals/doctorprofilefrom')->with('doctor', $doctor);
}

public function profileDetails($id){
  
    $get_patient_detail = Patient::where('id', $id)->get();

    $get_patient_detail_from_auth = Auth::where('id', $id)->first(); // Change Auth to User

    $data = [
        'get_patient_detail_from_auth' => $get_patient_detail_from_auth,
        'get_patient_detail' => $get_patient_detail,
        'patient_id' => $id,
    ];

    return view('hospitals/profileDetails', $data);  // Adjust the view path accordingly
}
public function show_prescription($id ,$patient_id){
    $invoice = Prescription::where('id',$id)->first();
    $constation=Consultation::where('id',$invoice->consultation_id)->first();
    $assistance=Assistant::where('auth_id',$constation->assistant_id)->first();
    $digital=Digitaldrclininc_center::where('id',$assistance->digitaldrclininc_center_id)->first();
    $detailsof= Patient::where('id',$patient_id)->first();
  

        $data=[
        'invoice'=>$invoice,
        'digital' =>$digital,
        'detailsof'=> $detailsof
    ];
    return view('/hospitals/show_prescription',$data);
   }
}
