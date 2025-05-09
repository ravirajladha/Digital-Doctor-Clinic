<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Dependent;
use App\Models\Digitaldrclininc_center;
use App\Models\Doctor;
use App\Models\Invoices;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Patients extends Controller
{
    public function login()
    {
        return view('/patients/login');
    }

    public function dashboard()
    {
        return view('/patients/dashboard');
    }

    public function show_invoice($id)
    {

        $invoice = Invoices::where('id', $id)->first();
        $digital = Digitaldrclininc_center::where('id', $invoice->clinic_id)->first();
        $detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

        $data = [
            'invoice' => $invoice,
            'digital' => $digital,
            'detailsof' => $detailsof
        ];

        return view('patients/show_invoice', $data);
    }

    public function show_prescription_details($id)
    {

        $invoice = Prescription::with('medicines')->where('id', $id)->first();
        $constation = Consultation::where('id', $invoice->consultation_id)->first();
        $assistance = Assistant::where('auth_id', $constation->assistant_id)->first();
        $digital = Digitaldrclininc_center::where('id', $assistance->digitaldrclininc_center_id)->first();
        $detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();
        $doctorname = Doctor::where('auth_id', $invoice->to_doctor)->first();

        $data = [
            'invoice' => $invoice,
            'digital' => $digital,
            'detailsof' => $detailsof,
            'doctorname' => $doctorname
        ];

        return view('patients/show_prescription_details', $data);
    }
    public function admin_patients_login(Request $request)
    {

        // if (!$request->has('username') || !$request->has('password')) {
        //     return view('Patients.login');
        // }

        $username = $request->input('username');
        $password = $request->input('password');
        $detailsoff = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->get();
        $data = [
            'detailsoff' => $detailsoff
        ];

        $user = Auth::where('phone', $username)->where('type', 'patient')->first();

        if ($user && $user->password === $password && $user->type === "patient") {
            Session::put('rexkod_digitaldrclinic_patient_id', $user->id);
            Session::put('rexkod_digitaldrclinic_patients_name', $user->name);
            Session::put('rexkod_digitaldrclinic_patients_email', $user->email);
            Session::put('rexkod_digitaldrclinic_patients_phone', $user->phone);
            Session::put('rexkod_digitaldrclinic_login_type', $user->type);


            return view('patients.dashboard', $data);
        } else {
            Session::flash('error', 'Invalid credentials or you do not have access!');
            return view('patients.login');
        }
    }

    public function dependent()
    {

        $dep = Dependent::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->get();

        $data = [
            'dep' => $dep
        ];
        return view('/patients/dependent', $data);
    }

    public function all_referrals()
    {
        $PatientDetails = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

        $referalby = Referral::where('patient_id', $PatientDetails->id)->get();
        if (!$referalby) {
            return redirect()->back()->with('success', 'Referral Data is not available');
        }


        $data = [
            'referalby' => $referalby,
            'PatientDetails' => $PatientDetails
        ];

        return view('patients/all_referrals', $data);
    }

    public function profile_settings()
    {
        $get_patient_detail = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->get();
        $detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

        $data = [

            'get_patient_detail' => $get_patient_detail,
            'detailsof' => $detailsof
        ];
        return view('/patients/profile_settings', $data);
    }


    public function updatePatientsbyadmin($id, Request $req)
    {
        $savePatient = Patient::find($id);
        $auth = Auth::find(session('rexkod_digitaldrclinic_patient_id'));

        $auth->name = $req->fname;
        $auth->email = $req->email;
        $auth->phone = $req->mobile;
        $auth->save();

        if ($req->hasFile('image')) {
            $image = $req->file('image')->move('uploads/patients', $req->file('image')->getClientOriginalName());
        } else {
            // Handle the case when no file is uploaded
            $image = $savePatient->image;
        }
        $savePatient->image = $image;
        $savePatient->fname = $req->fname;
        $savePatient->mobile = $req->mobile;
        $savePatient->lname = $req->lname;
        $savePatient->age = $req->age;
        $savePatient->alt_mobile = $req->alt_mobile;
        $savePatient->blood_group = $req->blood_group;
        $savePatient->email = $req->email;
        $savePatient->gender = $req->gender;
        $savePatient->address = $req->address;
        $savePatient->city = $req->city;
        $savePatient->state = $req->state;
        $savePatient->zipcode = $req->zipcode;
        $savePatient->country = $req->country;
        $savePatient->save();
        Session::flash('success', 'Profile Updated Successfully, Please Login Again');

        if ($savePatient) {

            return redirect('/patients/login')->with('success', 'Profile Updated Successfully, Please Login Again');
        } else {
            return redirect()->with('error', 'Error');
        }
    }
}
