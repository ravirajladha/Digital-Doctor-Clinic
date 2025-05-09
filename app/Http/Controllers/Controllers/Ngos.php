<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\New_clinic_reg;
use App\Models\Ngo_data;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Ngos extends Controller
{

    public function login()
{

   return view('ngo/login');

}
public function index()
{

   return view('ngo/index');

}
public function dashboard(){

    return view('/ngo/dashboard');
}

public function change_password(){
    return view('/ngo/change_password');
}
public function admin_ngo_login(Request $request)
{
    if (!$request->has('username') || !$request->has('password')) {
        return view('ngo.login')->with('failed','Enter your username and password');
    }

    $username = $request->input('username');
    $password = $request->input('password');

    // Use where() and first() separately for clarity
    $user = Auth::where('email', $username)->where('type', 'ngo')->first();

    if ($user && Hash::check($password,$user->password) && $user->type === "ngo" && $user->status == 1) {
       $profilepic= Ngo_data::where('email',$user->email)->first();
        Session::put('rexkod_digitaldrclinic_ngo_id', $user->id);
        Session::put('rexkod_digitaldrclinic_ngo_name', $user->name);
        Session::put('rexkod_digitaldrclinic_ngo_email', $user->email);
        Session::put('rexkod_digitaldrclinic_ngo_phone', $user->phone);
        Session::put('rexkod_digitaldrclinic_login_type', $user->type);
        Session::put('rexkod_digitaldrclinic_profilepc', $profilepic->direactor_photo);
        return view('ngo.dashboard',['userphone' => $user->phone, 'success' => 'Logged in' ]);
    } elseif ($user && $user->type === 'ngo' && $user->status == 0 && $user->status === null) {
        Session::flash('failed', 'Access denied');
        return view('ngo.login');
    } else {
        Session::flash('failed', 'Invalid credentials');
        return view('ngo.login');
    }
}

public function ngo_data_update($id, Request $req)
{
    $savengo = Ngo_data::find($id);

    // Function to handle file uploads
    function handleFileUpload($request, $fieldName, $modelField, $model)
    {
        if ($request->hasFile($fieldName)) {
            return $request->file($fieldName)->move('uploads/ngo', $request->file($fieldName)->getClientOriginalName());
        } else {

            return $model->$modelField; // Return the existing value if no file is uploaded
        }
    }

    $savengo->ngo_certificate = handleFileUpload($req, 'ngo_certificate', 'ngo_certificate', $savengo);
    $savengo->fact_certificate = handleFileUpload($req, 'fact_certificate', 'fact_certificate', $savengo);
    $savengo->ngo_registor_certificate = handleFileUpload($req, 'ngo_registor_certificate', 'ngo_registor_certificate', $savengo);
    $savengo->g_reg80 = handleFileUpload($req, 'g_reg80', 'g_reg80', $savengo);
    $savengo->relationship_certificate = handleFileUpload($req, 'relationship_certificate', 'relationship_certificate', $savengo);
    $savengo->fcra = handleFileUpload($req, 'fcra', 'fcra', $savengo);
    $savengo->ngo_achievement = handleFileUpload($req, 'ngo_achievement', 'ngo_achievement', $savengo);
    $savengo->direactor_aadhar = handleFileUpload($req, 'direactor_aadhar', 'direactor_aadhar', $savengo);
    $savengo->direactor_pan = handleFileUpload($req, 'direactor_pan', 'direactor_pan', $savengo);
    $savengo->direactor_photo = handleFileUpload($req, 'direactor_photo', 'direactor_photo', $savengo);
    if($req->ngo_type){
        $savengo->ngo_type = $req->ngo_type;
    }else{
        return redirect()->back()->with('success','Missing Ngo Type');
    }

        $auth = Auth::find($savengo->auth_id);
        $auth->name = $req->name;
        $auth->phone = $req->mobile;
        $auth->email = $req->email;
        $auth->save();

        // ------------------------
    $savengo->type = $req->types;
    $savengo->name = $req->name;
    $savengo->email = $req->email;
    $savengo->place = $req->place;
    $savengo->mobile = $req->mobile;
    $savengo->comment = $req->comment;
    $savengo->village_ngo = $req->village_ngo;
    $savengo->city = $req->city;
    $savengo->state = $req->state;
    $savengo->pincode = $req->pincode;
    $savengo->full_address = $req->full_address;
    $savengo->cpy_city = $req->cpy_city;
    $savengo->cpy_state = $req->cpy_state;
    $savengo->cpy_pincode = $req->cpy_pincode;
    $savengo->company_address = $req->company_address;
    $savengo->ngo_member = $req->ngo_member;
    $savengo->ngo_director_name = $req->ngo_director_name;
    $savengo->director_phone = $req->director_phone;
    $savengo->director_mail = $req->director_mail;
    $savengo->ngo_exp = $req->ngo_exp;
    $savengo->declearation_about_ngo = $req->declearation_about_ngo;
    $savengo->nogtypework = $req->nogtypework;
    $savengo->block_name = $req->block_name;

    // Save changes
    $savengo->save();

    return redirect('admins/ngo_data_view/' . $id)->with('success', 'Updated successfully');
}

public function ngo_data_update_profile($id, Request $req)
{

    $savengo = Ngo_data::find($id);

    // Function to handle file uploads
    function handleFileUploadprfile($request, $fieldName, $modelField, $model)
    {
        if ($request->hasFile($fieldName)) {
            return $request->file($fieldName)->move('uploads/ngo', $request->file($fieldName)->getClientOriginalName());
        } else {

            return $model->$modelField; // Return the existing value if no file is uploaded
        }
    }

    $savengo->ngo_certificate = handleFileUploadprfile($req, 'ngo_certificate', 'ngo_certificate', $savengo);
    $savengo->fact_certificate = handleFileUploadprfile($req, 'fact_certificate', 'fact_certificate', $savengo);
    $savengo->ngo_registor_certificate = handleFileUploadprfile($req, 'ngo_registor_certificate', 'ngo_registor_certificate', $savengo);
    $savengo->g_reg80 = handleFileUploadprfile($req, 'g_reg80', 'g_reg80', $savengo);
    $savengo->relationship_certificate = handleFileUploadprfile($req, 'relationship_certificate', 'relationship_certificate', $savengo);
    $savengo->fcra = handleFileUploadprfile($req, 'fcra', 'fcra', $savengo);
    $savengo->ngo_achievement = handleFileUploadprfile($req, 'ngo_achievement', 'ngo_achievement', $savengo);
    $savengo->direactor_aadhar = handleFileUploadprfile($req, 'direactor_aadhar', 'direactor_aadhar', $savengo);
    $savengo->direactor_pan = handleFileUploadprfile($req, 'direactor_pan', 'direactor_pan', $savengo);
    $savengo->direactor_photo = handleFileUploadprfile($req, 'direactor_photo', 'direactor_photo', $savengo);
    if($req->ngo_type){
        $savengo->ngo_type = $req->ngo_type;
    }else{
        return redirect()->back()->with('success','Missing Ngo Type');
    }

        $auth = Auth::find($savengo->auth_id);
        $auth->name = $req->name;
        $auth->phone = $req->mobile;
        $auth->email = $req->email;
        $auth->save();

        // ------------------------
    $savengo->type = $req->types;
    $savengo->name = $req->name;
    $savengo->email = $req->email;
    $savengo->place = $req->place;
    $savengo->mobile = $req->mobile;
    $savengo->comment = $req->comment;
    $savengo->village_ngo = $req->village_ngo;
    $savengo->city = $req->city;
    $savengo->state = $req->state;
    $savengo->pincode = $req->pincode;
    $savengo->full_address = $req->full_address;
    $savengo->cpy_city = $req->cpy_city;
    $savengo->cpy_state = $req->cpy_state;
    $savengo->cpy_pincode = $req->cpy_pincode;
    $savengo->company_address = $req->company_address;
    $savengo->ngo_member = $req->ngo_member;
    $savengo->ngo_director_name = $req->ngo_director_name;
    $savengo->director_phone = $req->director_phone;
    $savengo->director_mail = $req->director_mail;
    $savengo->ngo_exp = $req->ngo_exp;
    $savengo->declearation_about_ngo = $req->declearation_about_ngo;
    $savengo->nogtypework = $req->nogtypework;
    $savengo->block_name = $req->block_name;
    // Save changes
    $savengo->save();

    return redirect('ngo/dashboard/')->with('success', 'Updated successfully');
}






    public function ngo_register(){
        $new_regs = New_clinic_reg::where('ngo_mobile',session('rexkod_digitaldrclinic_ngo_phone'))->get();
        return view('/ngo/ngo_register')->with('representative_data',$new_regs);
    }

    public function apply_new_reg_clinc(Request $req)
    {
        $reper = new New_clinic_reg();
        // Handle file uploads
        $storagePath = ('uploads/representative');

        // Handle the 'income' file upload
        if ($req->hasFile('income')) {
            $hashedFileName = hash('md5', $req->income) . '.' . $req->file('income')->getClientOriginalExtension();
            $reper->income = $req->file('income')->move($storagePath, $hashedFileName);
        } else {
            $reper->income = $reper->income;
        }

        // Handle the 'year_amount' file upload
        if ($req->hasFile('year_amount')) {
            $hashedFileName = hash('md5', $req->year_amount) . '.' . $req->file('year_amount')->getClientOriginalExtension();
            $reper->year_amount = $req->file('year_amount')->move($storagePath, $hashedFileName);}
            else {
            $reper->year_amount= $reper->year_amount;
        }

        // Handle the 'place_img' and 'adhar_card' file uploads
        if ($req->hasFile('place_img') && $req->hasFile('adhar_card')) {
            $hashedFileName = hash('md5', $req->adhar_card) . '.' . $req->file('adhar_card')->getClientOriginalExtension();
            $reper->adhar_card = $req->file('adhar_card')->move($storagePath, $hashedFileName);

            $hashedFileName = hash('md5', $req->place_img) . '.' . $req->file('place_img')->getClientOriginalExtension();
            $reper->place_img = $req->file('place_img')->move($storagePath, $hashedFileName);

        }
         else {
            $reper->adhar_card= $reper->adhar_card;
            $reper->place_img= $reper->	place_img;
        }

        // Handle the 'pradhan_verification' file upload
        if ($req->hasFile('pradhan_verification')) {
            $hashedFileName = hash('md5', $req->pradhan_verification) . '.' . $req->file('pradhan_verification')->getClientOriginalExtension();
            $reper->pradhan_verification = $req->file('pradhan_verification')->move($storagePath, $hashedFileName);} else {
            $reper->pradhan_verification = $reper->pradhan_verification;
        }
        // Create a new NewClinicReg instance

        // Assign values to model attributes
        $reper->name = $req->name;
        $ngo = Ngo_data::where('mobile', session('rexkod_digitaldrclinic_ngo_phone'))->first();
        $reper->place_map = $req->place_map;
        $reper->block = $req->block;
        $reper->post = $req->post;
        $reper->district = $req->district;
        $reper->pincode = $req->pincode;
        $reper->email = $req->email;
        $reper->mobile_number = $req->mobile_number;
        $reper->user_type = session('rexkod_digitaldrclinic_ngo_id') ?? null;
        $reper->ngo_mobile = (int) $ngo->mobile ? $ngo->mobile : null;
        $reper->ngo_name = $ngo->name ? $ngo->name : null;
        $reper->type = 'representative';
        $reper->status=0;


        // Save the model
        $reper->save();

        $auth = new Auth();
        $auth->name = $req->name;
        $auth->type = 'representative';
        $auth->email = $req->email;
        $auth->phone = $req->mobile_number;
        $auth->password = null;
        $auth->lat = null;
        $auth->lon = null;
        $auth->status = null;
        $auth->save();

        $_SESSION['success'] = "Submitted successfully";
        return redirect('/ngo/dashboard')->with('success', 'Added Successfully');
    }
    public function ngo_panel_add_representative(){
        return view('ngo/ngo_panel_add_representative');
    }

    public function images($id,$type){
        $ngo = New_clinic_reg::where('mobile_number', $id)->first();
        return view('ngo/images/ngo_income_certificate_imageview')->with(['ngo' => $ngo, 'type' => $type]);
    }



    public function logout(){
        Session::flush();
        return redirect('/ngo/login')->with('success','Logged out successfully');
    }



    public function ngo_show_certificate()
    {
        return view('/ngo/includes/show_certificate');
    }

    public function ngo_profile(){

        $get_ngo_data=Ngo_data::where('email',session('rexkod_digitaldrclinic_ngo_email'))->get();
        $data=[
            'get_ngo_data'=>$get_ngo_data
        ];
        return view('ngo/ngo_profile',$data);
    }

    public function changePasswordNgo(Request $req){
        $ngo = Auth::where('id', session('rexkod_digitaldrclinic_ngo_id'))->first();

        if ( $ngo) {
            $oldPassword =  $ngo->password;
            $oldPassword1 = $req->old_password;


            if (Hash::check($oldPassword1, $oldPassword)) {
                if ($req->new_password === $req->confirm_password) {
                    $newPassword = bcrypt($req->new_password);
                    $ngo->update(['password' => $newPassword]);
                    $authDoc = Auth::where('id', $ngo->id)->where('type', 'ngo')->first();
                    $authDoc->update(['password' => $newPassword]);

                    Session::flash('success', 'Password updated');
                    return view('/ngo/change_password');
                } else {
                    Session::flash('failed', 'New passwords entered are not matching');
                    return view('/ngo/change_password');
                }
            } else {
                Session::flash('failed', 'Incorrect Old Password');
                return view('/ngo/change_password');
            }
        } else {
            Session::flash('failed', 'Doctor not registered');
            return view("/ngo/change_password");
        }
        return view("/ngo/change_password");
    }


}
