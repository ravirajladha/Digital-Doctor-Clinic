<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Clinics;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Notification;
use App\Models\Online_doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Referral;
use App\Models\Schedule_timing;
use App\Models\Test;
use App\Models\Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class Doctors extends Controller
{
    // public function dashboard()
    // {
    //     $referby = Referral::where('referral_by_doctor_id', session('rexkod_digitaldrclinic_doctor_id'))->get();
    //     $consl = Consultation::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))->get();

    //     $data = [
    //         'referby' => $referby,
    //         'consl' => $consl,
    //     ];

    //     return view('doctors.dashboard', $data);
    // }


    public function login()
    {
        return view('/doctors/login');
    }

    public function admin_doctors_login(Request $request)
    {
        // if (!$request->has('username') || !$request->has('password')) {
        //     return view('doctors.login');
        // }

        $username = $request->input('username');
        $password = $request->input('password');

        // dd($password === $password);

        // Use where() and first() separately for clarity
        // Use where() and first() separately for clarity
        $user = Auth::where('email', $username)->where('type', 'doctor')->first();
        $doctor = Doctor::where('email', $username)->first();

        if ($user && Hash::check($password, $user->password) && $user->type === "doctor" && $user->status == 1) {
            Session::put('rexkod_digitaldrclinic_doctor_id', $user->id);
            Session::put('rexkod_digitaldrclinic_doctor_name', $user->name);
            Session::put('rexkod_digitaldrclinic_doctor_email', $user->email);
            Session::put('rexkod_digitaldrclinic_doctor_phone', $user->phone);
            Session::put('rexkod_digitaldrclinic_login_type', $user->type);
            Session::put('rexkod_digitaldrclinic_profile_photo', $doctor->photo);

            //Online presence addition
            $onlineDoc = Online_doctor::where('doctor_id', $user->id)->first();
            // dd($onlineDoc);


            if (!empty($onlineDoc)) {
                $onlineDoc->update(['login_time' => Carbon::now(), 'online' => 1]);
            } else {
                $newDoc = new Online_doctor([
                    'doctor_id' => $user->id,
                    'login_time' => Carbon::now(),
                    'online' => 1,
                ]);
                $newDoc->save();
            }
            Session::flash('success', 'Logged in');

            return view('doctors.dashboard');
        } elseif ($user && $user->type === 'doctor' && $user->status == 0) {
            Session::flash('failed', 'Access denied');
            return view('doctors.login');;
        } else {
            Session::flash('failed', 'Invalid credentials');
            return view('doctors.login');
        }
    }
    public function my_patients()
    {
        $consultation = Consultation::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))->get();

           $data=[

            'consultation'=>$consultation,
        ];
        return view('/doctors/my_patients',$data);


    }



    public function all_referrals()
    {

        return view('doctors/all_referrals');
    }

    public function test()
    {
        $get_tests = Test::join('auths', 'tests.created_by', '=', 'auths.id')
        ->select('tests.*', 'auths.name as auth_name')
        ->get();
        $data = [
            'get_tests' => $get_tests,
        ];

        return view('doctors.test', $data);
    }


    public function add_test()
    {
        return view('/doctors/add_test ');
    }

    public function create_test(Request $request)
    {

        $saveTest = new Test();
        $saveTest->name = $request->name;
        $saveTest->description = $request->description;
        $saveTest->created_by = session('rexkod_digitaldrclinic_doctor_id');
        $saveTest->status = 0;

        $saveTest->save();
        if ($saveTest) {

           return redirect('doctors/test')->with('success', 'Test added Successfully');
        } else {
          return  redirect('doctors/add_test')->with('success', 'Failed To Add Test Try Again');
        }
    }

    public function medicines()
    {
        // $get_medicines = Medicine::where('status', 1)->get();
        $get_medicines = Medicine::join('auths', 'medicines.created_by', '=', 'auths.id')
        ->select('medicines.*', 'auths.name as auth_name')
        ->get();
        $data = [
            'get_medicines' => $get_medicines,
        ];
        return view('/doctors/medicines', $data);
    }
    public function add_medicine()
    {

        return view('doctors/add_medicine');
    }
    public function create_medicine(Request $request)
    {
        $medicines = new Medicine();
        $medicines->name = $request->name;
        $medicines->description = $request->description;
        $medicines->created_by = $request->created_by;
        $medicines->created_by = session('rexkod_digitaldrclinic_doctor_id');
        $medicines->status = "0";
        $medicines->stock = "0";

        $medicines->save();

        if ($medicines) {
            return redirect('doctors/medicines')->with('success','Medicine added Successfully');
        } else {
            $_SESSION['success'] = "Failed To Add Medicine Try Again";
            return redirect('doctors/add_medicine');
        }
    }

    //------------------------------------SP Code update by max ----------------------------------------------

    //Notifications
    public function notificationReject(Request $req)
{
    $checkIfNotificationPresent = Notification::find($req->notification);

    if ($checkIfNotificationPresent) {
        // Get the existing rejected doctor IDs (if any)
        $rejectedDoctorIds = $checkIfNotificationPresent->reject_doctor_id;

        // Add the current rejecting doctor ID to the list
        $currentDoctorId = session('rexkod_digitaldrclinic_doctor_id');
        $rejectedDoctorIds = $rejectedDoctorIds ? $rejectedDoctorIds . ',' . $currentDoctorId : $currentDoctorId;

        // Update the notification with the new list of rejected doctor IDs
        $checkIfNotificationPresent->reject_doctor_id = $rejectedDoctorIds;
        // $checkIfNotificationPresent->status = '0';
        $checkIfNotificationPresent->save();
    }
}
    public function notificationRejectAll(Request $req)
    {
        // Get the notification IDs from the request
        $notificationIds = $req->input('notifications');

        // Iterate over each notification ID
        foreach ($notificationIds as $notificationId) {
            // Find the notification by its ID
            $notification = Notification::find($notificationId);

            // If the notification exists
            if ($notification) {
                // Get the existing rejected doctor IDs (if any)
                $rejectedDoctorIds = $notification->reject_doctor_id;

                // Add the current rejecting doctor ID to the list
                $currentDoctorId = session('rexkod_digitaldrclinic_doctor_id');
                $rejectedDoctorIds = $rejectedDoctorIds ? $rejectedDoctorIds . ',' . $currentDoctorId : $currentDoctorId;

                // Update the notification with the new list of rejected doctor IDs
                $notification->reject_doctor_id = $rejectedDoctorIds;
                // $notification->status = '0'; // Optionally, update status if needed
                $notification->save();
            }
        }
    }


    //Video Consultation Panel
    public function videoConsultation($assistantId, $patientId, Request $req)
    {
        $checkIfstatus = Notification::where('from_auth_id_patient', $patientId)
            ->where('from_auth_id_assistant', $assistantId)
            ->where('status', 1)
            ->first();

        if ($checkIfstatus) {
            return redirect()->back()->with('success', 'Already Doctor Accepted Assistant Request');
        }

        if ($req->accept === '1' && $req->reject === null) {
            $checkIfNotificationPresent = Notification::where('from_auth_id_patient', $patientId)
                ->where('from_auth_id_assistant', $assistantId)
                ->first();

            if ($checkIfNotificationPresent) {
                $checkIfNotificationPresent->delete();

                $previousConsultation = Consultation::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))
                    ->where('patient_id', $patientId)
                    ->where('assistant_id', $assistantId)
                    ->first();

                if ($previousConsultation) {
                    $previousConsultation->update(['status' => '1']);
                } else {
                    Consultation::create([
                        'patient_id' => $patientId,
                        'assistant_id' => $assistantId,
                        'doctor_id' => session('rexkod_digitaldrclinic_doctor_id'),
                        'status' => '1'
                    ]);
                }
            }

            return view('doctors.dashboard')->with('success', 'Video Consultation Accepted');
        } elseif ($req->accept === null && $req->reject === '0') {
            return view('doctors.dashboard')->with('success', 'Video Consultation Rejected');
        } else {
            return view('doctors.dashboard')->with('error', 'Something went wrong');
        }
    }



    //Change Password
    public function change_password()
    {
        return view('/doctors/change_password');
    }

    public function changepassword(Request $req)
    {
        $doctor = Doctor::where('email', session('rexkod_digitaldrclinic_doctor_email'))->first();

        if ($doctor) {
            $oldPassword = $doctor->password;
            $oldPassword1 = $req->old_password;


            if (Hash::check($oldPassword1, $oldPassword)) {
                if ($req->new_password === $req->confirm_password) {
                    $newPassword = bcrypt($req->new_password);
                    $doctor->update(['password' => $newPassword]);
                    $authDoc = Auth::where('phone', $doctor->phone)->where('type', 'doctor')->first();
                    $authDoc->update(['password' => $newPassword]);

                    Session::flash('success', 'Password updated');
                    return view('/doctors/change_password');
                } else {
                    Session::flash('failed', 'New passwords entered are not matching');
                    return view('/doctors/change_password');
                }
            } else {
                Session::flash('failed', 'Incorrect Old Password');
                return view('/doctors/change_password');
            }
        } else {
            Session::flash('failed', 'Doctor not registered');
            return view("/doctors/change_password");
        }
        return view("/doctors/change_password");
    }



    //Logout
    public function logout()
    {
        $onlineDoc = Online_doctor::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'));
        if ($onlineDoc) {
            $onlineDoc->update(['online' => 0]);
        }
        Session::flush();
        return redirect('/doctors/login')->with('success', 'Logged out');
    }

    public function video_call($id)
    {
        $medicines = Medicine::get();
        $test = Test::all();
        $notifications = Notification::where('id', $id)->first();

        // Assuming you have a model instance, fetch it using first()
        $consultation = Consultation::where('assistant_id', $notifications->from_auth_id_assistant)
            ->where('patient_id', $notifications->from_auth_id_patient)
            ->latest()
            ->first();

        if ($consultation) {
            $consultation->doctor_id = session('rexkod_digitaldrclinic_doctor_id');
            $consultation->status = 1;
            $consultation->update();
        }
        $data = [
            'consultation_id' =>$consultation->id,
            '$consultation_info'=> $consultation->id,
            'notifications' => $notifications,
            'medicines' => $medicines,
            'test' => $test
        ];

        $notifications->status = '1';
        $notifications->update();
        return view('/doctors/video_call', $data);
    }



    // public function voice_call()
    // {
    //     $this->view('doctors/voice_call');
    // }
    public function invoice_view()
    {
        return view('doctors/invoice_view');
    }

    public function savePrescription(Request $req)
    {

        $consultation_id = Consultation::where('doctor_id', $req->to_doctor)
            ->where('patient_id', $req->userid)
            ->where('assistant_id', $req->created_by)
            ->latest()
            ->first();

        $savemedicines = $req->medicines ?? [];
        $savequantity = $req->quantity ?? [];
        $savetest_name = $req->test_name ?? [];
        $savefood = $req->food ?? [];
        $savetime = $req->time ?? [];
        $savedays = $req->days ?? [];
        $savetestDiscription=$req->test_description ??[];
        // $savemedicines_id = $req->medicines_id ?? [];

        // $result1 = implode(', ', $savemedicines);
        $ids = array();
        foreach ($savemedicines as $medicine) {
            // Assuming each $medicine object has 'id' and 'name' properties
            $id = explode('.', $medicine);
            $ids[] = $id[0];
        }
        $result1 = implode(', ', $ids);
        $result2 = implode(', ', $savequantity);


        //     $medicinesArray = explode(', ', $result1);
        //     $quantityArray = explode(', ', $result2);

        // // Iterate over the arrays simultaneously
        // foreach ($medicinesArray as $index => $medicine) {
        //     // Access the corresponding quantity if available
        //     $quantity = isset($quantityArray[$index]) ? $quantityArray[$index] : '';


        //     $check= Medicine::where('name',$medicine)->first();
        //     $fd=Medicine::find($check->id);
        //     $fd->med_avb =$check->med_avb+$quantity;
        //     $fd->save();
        // }

        $result3 = implode(', ', $savetest_name);
        $result4 = implode(', ', $savefood);
        $result5 = implode(', ', $savetime);
        $request6 = implode(',', $savedays);
        $result7=implode(',',$savetestDiscription);
        // $request7 = implode(',', $req->medicines_id);

        $prescriptions_data = new Prescription();
        $prescriptions_data->medicines = $result1;
        $prescriptions_data->quantity = $result2;
        $prescriptions_data->test_name = $result3;
        $prescriptions_data->food = $result4;
        $prescriptions_data->days = $request6;
        $prescriptions_data->timing = $result5;
        $prescriptions_data->test_description = $result7;
        $prescriptions_data->to_doctor = $req->to_doctor;
        $prescriptions_data->created_by = $req->created_by;
        $prescriptions_data->name = $req->userid;
        $prescriptions_data->consultation_id = $consultation_id->id;
        $prescriptions_data->remark=$req->remark;
        // dd($consultation_id);
        // $prescriptions_data->medicines_id = $request7;

        $prescriptions_data->save();
        return redirect()->back()->with('success', 'Prescription saved successfully');
    }


    public function referrals($patient, $doctor_id, $assistant,$consultation_id)
    {
        $patients = Patient::where('patient_id', $patient)->get();
        $doctor = Auth::where('id', $doctor_id)->first();
        $doctor_details = Doctor::where('email', $doctor->email)->get();
        $doctor_all = Auth::where('type', 'doctor')->get();
        $clinics = Clinics::where('status',1)->get();
        $assistant_id=$assistant;
        $data = [
            'consultation_id'=>$consultation_id,
            'patients' => $patients,
            'doctor_details' => $doctor_details,
            'doctor_all' => $doctor_all,
            'clinics' => $clinics,
            'assistant_id'=>$assistant_id
        ];

        return view('doctors/referrals', $data);
    }

    public function referralsave(Request $req)
    {
        $saveReferral = new Referral();
      $id= $req->consultation_id;
        $saveReferral->assistance_id=$req->assistance_id;
        $saveReferral->referral_by_doctor_id = $req->referral_by_doctor_id;
        $saveReferral->patient_id = $req->patient_id;
        $saveReferral->referral_to_doctor_id = $req->referral_to_doctor_id;
        $saveReferral->hosipital_id = $req->hosipital_id;
        $saveReferral->Rreferrals_reason = $req->Rreferrals_reason;
        $saveReferral->Instructions = $req->Instructions;
        $saveReferral->referrals_date = $req->referrals_date;
        $saveReferral->save();
        return redirect('/doctors/video_call/'.$id)->with('success', 'referral saved successfully.');
    }

    public function patient_profile($id)
    {
        $get_patients = Patient::where('id', $id)->first();
        $get_consultations_data = Consultation::where('id', $id)->first();
        $data = [
            'consultations_id' => $id,
            'get_consultations_data' => $get_consultations_data,
            'get_patients' => $get_patients
        ];
        // print_r($data);
        return view('doctors/patient_profile', $data);
    }

    public function voice_call()
    {
        return view('/doctors/voice_call');
    }
    public function invoices()
    {
        return view('doctors/invoices');
    }

    public function show_prescription($consultation_id){
        $notaccept = Consultation::where('id',$consultation_id)->where('doctor_id', 0)->where('status',0)->first();

        if ($notaccept) {

            return redirect()->back()->with('error', 'Please try after some time');
        }

        $data = [
            'consultation_id' => $consultation_id,
        ];
        return view('/doctors/show_prescription',$data);
    }

    public function schedule_timings(){
        return view('/doctors/schedule_timings');
    }

    public function saveTiming(Request $req){
       $chkdoctor= Schedule_timing::where('doctor_id',session('rexkod_digitaldrclinic_doctor_id'))->first();
       if(!$chkdoctor){
        $sundaysave=new Schedule_timing();

        if($req->sunday=='sunday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->sunday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Sunday Timeing updated');
        }else if($req->monday=='monday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->monday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Monday Timeing updated');
        }else if($req->tuesday=='tuesday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->tuesday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Tuesday Timeing updated');
        }else if($req->wednesday=='wednesday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->wednesday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Wednesday Timeing updated');
        }else if($req->thursday=='thursday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->thursday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Thursday Timeing updated');

        }else if($req->friday=='friday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->friday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Friday Timeing updated');

        }else if($req->saturday=='saturday'){
            $sundaydata=implode(',',$req->time1);
            $sundaysave->saturday= $sundaydata;
            $sundaysave->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
            $sundaysave->max_time=$req->max_time;
            $sundaysave->save();
            return redirect()->back()->with('success','Saturday Timeing updated');

        }

        }else{
            if($req->sunday=='sunday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->sunday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Sunday Timeing updated');
            }else if($req->monday=='monday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->monday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Monday Timeing updated');
            }else if($req->tuesday=='tuesday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->tuesday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Tuesday Timeing updated');
            }else if($req->wednesday=='wednesday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->wednesday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Wednesday Timeing updated');
            }else if($req->thursday=='thursday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->thursday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Thursday Timeing updated');

            }else if($req->friday=='friday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->friday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Friday Timeing updated');

            }else if($req->saturday=='saturday'){
                $sundaydata=implode(',',$req->time1);
                $chkdoctor->saturday= $sundaydata;
                $chkdoctor->doctor_id=session('rexkod_digitaldrclinic_doctor_id');
                $chkdoctor->max_time=$req->max_time;
                $chkdoctor->save();
                return redirect()->back()->with('success','Saturday Timeing updated');

            }
        }

    }

    public function doctor_profile_settings()
    {
        $user = session('rexkod_digitaldrclinic_doctor_email');

        // Assuming the email field is unique, you can directly use where() and first()
        $doctor = Doctor::where('email', $user)->first();
        // dd($doctor);
        $data = [
            'doctor' => $doctor
        ];
        return view('doctors.doctor_profile_settings', $data);
    }
    public function update_doctor_register($id, Request $req)
    {
        $doctor = Doctor::find($id);
         $authid=Doctor::where('id',$id)->first();
         $find=Auth::find($authid->auth_id);
        // Define the storage path

        $find->name=$req->fname;
        $find->email=$req->email;
        $find->phone=$req->phone;
        $find->save();

        $storagePath = 'uploads/doctor';

        // Handle photo file upload
        if ($req->hasFile('photo')) {
            $photo = $req->file('photo')->move($storagePath, 'photo.' . $req->file('photo')->getClientOriginalExtension());
            $doctor->photo = $photo->getPathName();
        }

        // Handle GST file upload
        if ($req->hasFile('gst')) {
            $gst = $req->file('gst')->move($storagePath, 'gst.' . $req->file('gst')->getClientOriginalExtension());
            $doctor->gst = $gst->getPathName();
        }

        // Handle Aadhar Card file upload
        if ($req->hasFile('aadhar_card')) {
            $aadharCard = $req->file('aadhar_card')->move($storagePath, 'aadhar_card.' . $req->file('aadhar_card')->getClientOriginalExtension());
            $doctor->aadhar_card = $aadharCard->getPathName();
        }

        // Handle MCI Certificate file upload
        if ($req->hasFile('mci_certificate')) {
            $mciCertificate = $req->file('mci_certificate')->move($storagePath, 'mci_certificate.' . $req->file('mci_certificate')->getClientOriginalExtension());
            $doctor->mci_certificate = $mciCertificate->getPathName();
        }

        // Handle SMC Certificate file upload
        if ($req->hasFile('smc_certificate')) {
            $smcCertificate = $req->file('smc_certificate')->move($storagePath, 'smc_certificate.' . $req->file('smc_certificate')->getClientOriginalExtension());
            $doctor->smc_certificate = $smcCertificate->getPathName();
        }

        // Handle Bachelor Document file upload
        if ($req->hasFile('bachelor_document')) {
            $bachelorDocument = $req->file('bachelor_document')->move($storagePath, 'bachelor_document.' . $req->file('bachelor_document')->getClientOriginalExtension());
            $doctor->bachelor_document = $bachelorDocument->getPathName();
        }

        // Handle Master Document file upload
        if ($req->hasFile('master_document')) {
            $masterDocument = $req->file('master_document')->move($storagePath, 'master_document.' . $req->file('master_document')->getClientOriginalExtension());
            $doctor->master_document = $masterDocument->getPathName();
        }

        // Handle Experience Letter file upload
        if ($req->hasFile('experience_letter')) {
            $experienceLetter = $req->file('experience_letter')->move($storagePath, 'experience_letter.' . $req->file('experience_letter')->getClientOriginalExtension());
            $doctor->experience_letter = $experienceLetter->getPathName();
        }


        // Set other fields in the Doctor model
        $doctor->fname = $req->fname;
        $doctor->lname = $req->lname;
        $doctor->email = $req->email;
        $doctor->phone = $req->phone;
        $doctor->gender = $req->gender;
        $doctor->dob = $req->dob;
        $doctor->schedule_date='null';
        $doctor->mci_number = $req->mci_number;
        $doctor->smc_state = $req->smc_state;
        $doctor->smc_reg_no = $req->smc_reg_no;
        $doctor->about = $req->about;
        $doctor->clinic_name = $req->clinic_name;
        $doctor->clinic_address = $req->clinic_address;
        $doctor->address_line1 = $req->address_line1;
        $doctor->address_line2 = $req->address_line2;
        $doctor->city = $req->city;
        $doctor->state = $req->state;
        $doctor->country = $req->country;
        $doctor->postal_code = $req->postal_code;
        // $doctor->pricing = $req->pricing;
        $doctor->department = $req->department;
        $doctor->specialization = $req->specialization;
        $doctor->bachelor_degree = $req->bachelor_degree;
        $doctor->bachelor_college = $req->bachelor_college;
        $doctor->bachelor_completion_year = $req->bachelor_completion_year;
        $doctor->master_degree = $req->master_degree;
        $doctor->master_college = $req->master_college;
        $doctor->master_completion_year = $req->master_completion_year;
        $doctor->experience_hospital_name = $req->experience_hospital_name;
        $doctor->experience_from = $req->experience_from;
        $doctor->experience_to = $req->experience_to;
        $doctor->designation = $req->designation;
        // $doctor->password = $req->password;

        $doctor->save();
        // Session::flush();
        return redirect()->route('doctorProfileSettings')->with('success', 'Profile Updated Successfully');
    }
    public function viewMedicine($id){
        $medicine = Medicine::find($id);
        return view('doctors.view_medicine', ['medicine' => $medicine]);
    }
    public function viewTest($id){
        $test = Test::find($id);
        return view('doctors.view_test', ['test' => $test]);
    }


    public function viewAssistantById($assistant_id){
        $get_assistant = Assistant::where('auth_id', $assistant_id)->first();

        $data = [
            'get_assistant' => $get_assistant,
        ];

        return view('doctors/view_assistant', $data);
    }
}
