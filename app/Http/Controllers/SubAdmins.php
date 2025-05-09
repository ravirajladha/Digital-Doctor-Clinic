<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Camp_request;
use App\Models\Clinics;
use App\Models\Consultation;
use App\Models\Contact_us;
use App\Models\Digitaldrclininc_center;
use App\Models\Doctor;
use App\Models\Invoices;
use App\Models\Medicine;
use App\Models\New_clinic_reg;
use App\Models\Newsroom;
use App\Models\Ngo_data;
use App\Models\Patient;
use App\Models\Pincode;
use App\Models\Prescription;
use App\Models\Social_media;
use App\Models\Specialities;
use App\Models\Specialitieses;
use App\Models\Stock;
use App\Models\Sub_admin;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Symfony\Component\HttpKernel\Profiler\Profile;

class SubAdmins extends Controller
{
    public function login()
    {
        return view('/sub_admins/login');
    }


    public function index()
    {
        $doctorCount = Doctor::count();
    $doctors = Doctor::latest()->take(5)->get();

    $patientCount = Patient::count();
    $patients = Patient::latest()->take(5)->get();

    $consultationCount = Consultation::count();
    $consultations = Consultation::with(['patient:id,name', 'assistant:id,name', 'doctor:id,name'])
    ->latest()
    ->take(5)
    ->get();

    $assistantCount = Assistant::count();

    return view('/sub_admins/index', [
        'doctorCount' => $doctorCount,
        'doctors' => $doctors,
        'patientCount' => $patientCount,
        'patients' => $patients,
        'consultationCount' => $consultationCount,
        'consultations' => $consultations,
        'assistantCount'=>$assistantCount,
    ]);
    }
    public function patients()
    {
        $get_patient = Patient::all();

        $data = [
            'get_patient' => $get_patient,
        ];

        return view('/sub_admins/patients', $data);
    }
    public function consultations()
    {
        $get_consultations_data = Consultation::all();
        $data = [
            'get_consultations_data' => $get_consultations_data,
        ];
        // print_r($data);

        return view('/sub_admins/consultations', $data);
    }

    public function representatives()
    {
        $get_ngo_data = New_clinic_reg::all();
        $data = [
            'get_ngo_data' => $get_ngo_data
        ];

        return view('/sub_admins/representatives', $data);
    }

    public function contact_request()
    {
        $get_contact_us = Contact_us::orderBy('id', 'desc')->get();


        $data = [
            'get_contact_us' => $get_contact_us,
        ];
        return view('/sub_admins/contact_request', $data);
    }

    public function specialities()
    {
        $get_speciality = Specialities::all();
        $data = [
            'get_speciality' => $get_speciality,
        ];

        return view('sub_admins/specialities', $data);
    }

    public function sub_admin_login(Request $request)
    {
        // Validation
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Attempt Authentication
        $user = null;

        if (is_numeric($username)) {
            $user = Auth::where('phone', $username)->first();
        } else {
            $user = Auth::where('email', $username)->first();
        }

         // Check credentials
    if (!$user || !password_verify($password, $user->password)) {
        Session::flash('failed', 'Invalid credentials!');
        return redirect('/sub_admins/login')->with('error', 'Invalid credentials!');
    }

    if ($user->status != 1) {
        Session::flash('failed', 'Your account is inactive. Please contact the admin.');
        return redirect('/sub_admins/login');
    }
        $sub_admin= Sub_admin::where('auth_id', $user->id)->first();
        // Check user type
        if ($user->type === "sub_admins") {
            session([
                'rexkod_digitaldrclinic_sub_admin_id' => $user->id,
                'rexkod_digitaldrclinic_sub_admin_name' => $user->name,
                'rexkod_digitaldrclinic_sub_admin_email' => $user->email,
                'rexkod_digitaldrclinic_sub_phone' => $user->phone,
                'rexkod_digitaldrclinic_sub_login_type' => $user->type,
                'rexkod_digitaldrclinic_sub_login_img'=>$sub_admin->profile_img,
            ]);

            return redirect('/sub_admins/index');
        } else {
            throw ValidationException::withMessages([
                'username' => ['You do not have access!'],
            ])->redirectTo('sub_admins/login');
        }
    }
    public function logout()
    {
        Session::flash('success', 'Logout');
        return redirect('/sub_admins/login');
    }

    public function ngo_request()
    {
        // $get_ngo_data = Ngo_data::all();
        $get_ngo_data = Ngo_data::orderBy('id', 'desc')->get();

        $data = [
            'get_ngo_data' => $get_ngo_data,
        ];

        return view('sub_admins/ngo_request', $data);
    }

    public function ngo_data_view($id)
    {
        $get_ngo_data = Ngo_data::where('id', $id)->get();
        // dd($rootPath = app()->basePath());

        $data = [
            'get_ngo_data' => $get_ngo_data,
        ];

        return view('sub_admins/ngo_data_view', $data);
    }




    public function ngoApproval($id, $status)
    {
        $ngoData = Ngo_data::find($id);

        if ($ngoData) {
            $ngoData->status = $status;
            $ngoData->save();

            if ($status == 1) {
                $auth = Auth::where('phone', $ngoData->mobile)
                    ->orWhere('email', $ngoData->email)
                    ->first();

                if ($auth) {
                    $auth->status = $status;
                    $auth->save();
                } else {
                    $auth = new Auth();
                    $auth->name = $ngoData->name;
                    $auth->phone = $ngoData->mobile;
                    $auth->type = "ngo";
                    $auth->email = $ngoData->email;
                    if (!password_verify($ngoData->ngo_password, $auth->password)) {
                        $hashedPassword = password_hash($ngoData->ngo_password, PASSWORD_BCRYPT);
                        $auth->password = $hashedPassword;
                    } else {
                        $auth->password = $ngoData->ngo_password;
                    }

                    $auth->status = $status;
                    $auth->save();

                    $save_auth_id = Auth::where('email', $ngoData->email)->first();
                    if ($save_auth_id) {
                        $update_auth_id = Ngo_data::where('email', $save_auth_id->email)->first();
                        if ($update_auth_id) {
                            $update_auth_id->auth_id = $save_auth_id->id;
                            $update_auth_id->save();
                        } else {
                        }
                    } else {
                    }
                }

                session()->flash('success', 'NGO activated successfully');
            } else {
                // Deactivate NGO
                $auth = Auth::where('email', $ngoData->email)->first();

                if ($auth) {
                    $auth->status = 0;
                    $auth->save();
                    session()->flash('success', 'NGO deactivated successfully');
                } else {
                    session()->flash('failed', 'Error occurred while deactivating');
                }
            }

            return redirect('/sub_admins/ngo_request');
        } else {
            session()->flash('failed', 'NGO not found!');
            return redirect('/sub_admins/ngo_request');
        }
    }
    public function create_speciality(Request $req)
    {

        $result = new Specialities();


        $result->department = $req->input('department');
        $result->speciality = $req->input('speciality');


        if ($req->hasFile('image')) {
            $file = $req->file('image');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/speciality', $f_newfile);
            $result->image = $store;
        } else {
            $result->image = null;
        }



        $result->save();

        if ($result) {
            return redirect()->back()->with('success', 'Speciality Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed To Add Speciality. Please Try Again');
        }

        return redirect('sub_admins/specialities');
    }

    public function update_speciality(Request $req)
    {
        $department_id = $req->input('department_id');
        $result = Specialities::find($department_id);


        $result->department = $req->input('department');
        $result->speciality = $req->input('speciality');


        if ($req->hasFile('image')) {
            $file = $req->file('image');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/speciality', $f_newfile);
            $result->image = $store;
        } else {
            $result->image = null;
        }


        $result->save();

        if ($result) {
            return redirect()->back()->with('success', 'Speciality Update Successfully');
        } else {

            return redirect()->back()->with('success', 'Failed To Add Speciality. Please Try Again');
        }

        return redirect('sub_admins/specialities');
    }

    public function deleteSpecialities($id)
    {
        $delete = Specialities::where('id', $id);
        $delete->delete();
        return redirect()->back()->with('success', "Delete Successfuly");
    }
    public function test()
    {
        $get_tests = Test::all();

        $data = [
            'get_tests' => $get_tests,
        ];

        return view('sub_admins/test', $data);
    }
    public function change_tests_status($id, $status)
    {
        $change_test_status = Test::find($id);

        if ($change_test_status) {
            $change_test_status->status = $status;
            $change_test_status->save();

            $_SESSION['success'] = "Test status updated successfully.";
        } else {
            $_SESSION['error'] = "Test not found.";
        }

        return redirect('sub_admins/test');
    }

    public function medicines()
    {

        $get_medicines = Medicine::all();

        $data = [
            'get_medicines' => $get_medicines,
        ];
        return view('sub_admins/medicines', $data);
    }

    public function add_medicine()
    {

        return view('/sub_admins/add_medicine');
    }
    public function create_medicine_admin(Request $req)
    {
        $check_medicini = Medicine::where('name', $req->name);
        // if($check_medicini){
        //    return redirect()->back()->with('success','Medicine name already Persent') ;
        // }
        $result = new Medicine();
        $status = '0';
        $stock = '0';
        $result->name = $req->input('name');
        $result->description = $req->input('description');
        $result->created_by = session('rexkod_digitaldrclinic_sub_admin_id');

        $result->status = $status;
        $result->stock = $stock;

        $result->save();
        if ($result) {
            return redirect('sub_admins/medicines')->with('success', "Medicine added Successfully");
        } else {
            return redirect('sub_admins/add_medicine')->with('success', "Failed To Add Medicine Try Again");;
        }
    }
    public function medicine_status($id, $status)
    {

        $change_test_status = Medicine::find($id);

        if ($change_test_status) {
            $change_test_status->status = $status;
            $change_test_status->save();

            return redirect('sub_admins/medicines')->with('success', 'Test status updated successfully');
        } else {
            $_SESSION['error'] = "Test not found.";
            return redirect('sub_admins/medicines');
        }
    }

    public function clinic_hospital()
    {

        $get_clinic = Clinics::all();
        $data = [
            'get_clinic' =>   $get_clinic,
        ];

        return view('sub_admins/clinic_hospital', $data);
    }

    public function change_clinic_status($id, $status)
    {
        $clinic = Clinics::find($id);

        if ($clinic) {
            $clinic->status = $status;
            $clinic->save();

            $auth = Auth::where('email', $clinic->email)->first();

            if ($auth) {
                $auth->status = $status;
                $auth->update();
            }

            return redirect('sub_admins/clinic_hospital')->with('success',"Clinic status updated successfully.") ;
        } else {
            return redirect('sub_admins/clinic_hospital')->with('success',"Error") ;

        }

        return redirect('sub_admins/clinic_hospital');
    }

    public function add_clinic()
    {

        return view('/sub_admins/add_clinic');
    }





    public function create_sub_admins(Request $req)
    {



        if (!$req->phone || !$req->email) {
            return redirect()->back()->with('success', 'Email or phone cannot be null');
        }
        $status = '0';

        $createHospitalLogin = new Auth();
        $createHospitalLogin->type = 'sub_admins';
        $createHospitalLogin->name = $req->name;
        $createHospitalLogin->email = $req->email;
        $createHospitalLogin->phone = $req->phone;
        $createHospitalLogin->password = bcrypt($req->input('password')); // Hash the password for security
        $createHospitalLogin->status = $status;
        $createHospitalLogin->save();
        $findid = Auth::where('email', $req->email)->first();

        $clinic = new Clinics();
        $clinic->status = $req->$status;
        $clinic->auth_id = $findid->id;
        $clinic->name = $req->name;
        $clinic->email = $req->email;
        $clinic->phone = $req->phone;
        $clinic->address = $req->address;
        $clinic->city = $req->city;
        $clinic->zipcode = $req->zipcode;
        $clinic->state = $req->state;
        $clinic->country = $req->country;
        $clinic->registrations = $req->registrations;
        $clinic->registration_year = $req->registration_year;
        $clinic->hospital_name = $req->hospital_name;
        $clinic->website = $req->website;
        $clinic->person_name = $req->person_name;
        $clinic->person_phone_number = $req->person_phone_number;
        $clinic->operating_hours_date = $req->operating_hours_date;
        $clinic->operating_hours_time = $req->operating_hours_time;

        if ($req->hasFile('gst')) {
            $file = $req->file('gst');

            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/clinic', $f_newfile);
            $clinic->gst = $store;
        } else {
            $clinic->gst = null;
        }

        if ($req->hasFile('aadhaar_card')) {
            $file1 = $req->file('aadhaar_card');

            $originalFileName = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file1->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store1 = $file1->move('uploads/clinic', $f_newfile);
            $clinic->aadhar_card = $store1;
        } else {
            $clinic->aadhar_card = null;
        }

        if ($req->hasFile('gov_license')) {
            $file2 = $req->file('gov_license');

            $originalFileName = pathinfo($file2->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file2->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store2 = $file2->move('uploads/clinic', $f_newfile);
            $clinic->gov_license = $store2;
        } else {
            $clinic->gov_license = null;
        }

        if ($req->hasFile('img1')) {
            $file3 = $req->file('img1');

            $originalFileName = pathinfo($file3->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file3->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store3 = $file3->move('uploads/clinic', $f_newfile);
            $clinic->img1 = $store3;
        } else {
            $clinic->img1 = 'assets/img/hospital.png';
        }

        if ($req->hasFile('img2')) {
            $file4 = $req->file('img2');

            $originalFileName = pathinfo($file4->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file4->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store4 = $file4->move('uploads/clinic', $f_newfile);
            $clinic->img2 = $store4;
        } else {
            $clinic->img2 = 'assets/img/hospital.png';
        }

        $clinic->save();

        if ($clinic) {

            return redirect('/sub_admins/add_clinic')->with('success', "Clinic Register Successfully");
        } else {

            return redirect('/sub_admins/add_clinic')->with('error', "Failed To Register Try Again");
        }
    }

    public function Digitaldrclininc_center()
    {
        $get_digitaldrclininc_center = Digitaldrclininc_center::all();
        $data = [
            'get_digitaldrclininc_center' =>   $get_digitaldrclininc_center,
        ];
        return view('/sub_admins/digitaldrclininc_center', $data);
    }

    public function add_Digitaldrclininc_center()

    {
        $reper = New_clinic_reg::where('status', 1)->get();
        $assistant= Assistant::where('status',1)->get();

        $data =
            [
                'reper' => $reper,
                'assistant'=>$assistant
            ];
        return view('/sub_admins/add_digitaldrclininc_center', $data);
    }


    public function create_Digitaldrclininc_center(Request $req)
    {
        $result = new Digitaldrclininc_center();

        if ($req->hasFile('gov_license')) {
            $file = $req->file('gov_license');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/ddc_center', $f_newfile);
            $result->gov_license = $store;
        } else {
            $result->gov_license = null;
        }

        if ($req->hasFile('img1')) {
            $file = $req->file('img1');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/ddc_center', $f_newfile);
            $result->img1 = $store;
        } else {
            $result->img1 = 'assets/img/clinik.png';
        }
        $result->assistance_id=$req->assistance_id;
        $result->assistance_name = $req->assistance_name;
        $result->assistance_phone = $req->assistance_phone;
        $result->assistance_email = $req->assistance_email;
        $result->assistance_profile_pic = $req->assistance_profile_val;


        $result->representatives_name = $req->representatives_name;
        $result->representatives_id = $req->representatives_id;
        $result->representatives_email = $req->representatives_email;
        $result->representatives_phone = $req->representatives_phone;


        $result->name = $req->name;
        $result->email = $req->email;
        $result->phone = $req->phone;
        $result->address = $req->address;
        $result->city = $req->city;
        $result->zipcode = $req->zipcode;
        $result->state = $req->state;
        $result->country = $req->country;
        $result->save();

        if ($result) {
            return  redirect('/sub_admins/add_Digitaldrclininc_center')->with('success', 'Clinic/Hospital Added Successfully');
        } else {
            return redirect('/sub_admins/add_Digitaldrclininc_center')->with('success', 'Failed To Register Try Again');;
        }
    }
    public function stock(Request $request)
    {
        $get_stock = Stock::all();
        $assistant = Assistant::all();
        $get_digitaldrclininc_center = Digitaldrclininc_center::all();
        if($request->input('ddc_center_id')){
            $centerId = $request->input('ddc_center_id');
            if  ($centerId == 0) {
                $get_stock = Stock::all();
            }else {
                $get_stock = Stock::where('digitaldrclininc_center_id', $centerId)->get();
            }
        }else{
            $get_stock = Stock::all();
        }
        $data = [
            'get_stock' => $get_stock,
            'get_digitaldrclininc_center' => $get_digitaldrclininc_center,
            'assistant' => $assistant,
            'centerId' => isset($centerId) ? $centerId : 0,
        ];

        return view('sub_admins/stock', $data);
    }

    public function search_center()
    {


        if (isset($_GET['option'])) {
            $digitaldrclininc_center_data = stock::where('id', $_GET['option'])->get();
            foreach ($digitaldrclininc_center_data as $center) {
                echo '<tr>';
                echo '<td>';
                echo  '<h2 class=table-avatar>';
                echo   '<a href="#" class="avatar avatar-sm me-2">';
                if (empty($center->medicine_photo)) {
                    echo     '<img class="avatar-img rounded-circle" src="'  . '/assets/img/patients/patient.jpg" alt="User Image">';
                } else {
                    echo     '<img class="avatar-img rounded-circle" src=" ' . '/uploads/' . $center->medicine_photo . '" alt="User Image">';
                }
                echo    ' </a>';
                echo    '<a href="#">' . $center->medicine_name . '</a>';
                echo     '</h2>';
                echo     '</td>';
                echo ' <td>' . $center->quantity . '</td>';
                echo ' <td>' . $center->batch_number . '</td>';
                echo ' <td>' . $center->expiry_date . '</td>';
                echo ' <td>' . $center->assistants_digitaldrclininc_center . '</td>';
                echo  '</tr>';
            }
        }
    }

    public function doctors()
    {
        $get_doctor = Doctor::all();

        $data = [
            'get_doctor' => $get_doctor,
        ];

        return view('sub_admins/doctors', $data);
    }

    public function add_doctor()
    {
        return view('/sub_admins/add_doctor');
    }


    public function doctorRegisterByAdmin(Request $req)
    {
        $validatormail = Validator::make($req->all(), [
            'email' => 'required|email|unique:auths|unique:doctors',

            // other validation rules...
        ]);
        $validatorphone = Validator::make($req->all(), [
            'phone' => 'required|unique:auths|unique:doctors',

            // other validation rules...
        ]);
        if ($validatorphone->fails()) {
            return redirect()->back()->with('success', 'Phone  Already Persent');
        }
        if ($validatormail->fails()) {
            return redirect()->back()->with('success', 'Email  Already Persent');
        }
        // $checkEmail = Doctor::where('email', $req->email)->first();
        // $AuthcheckEmail = Auth::where('email', $req->email)->first();
        // $checkMobile=Doctor::where('phone',$req->phone)->first();
        // $checkAuth=Auth::where('phone',$req->phone)->first();


        // if ($checkMobile &&  $checkAuth) {
        //     return redirect()->back()->with('success','Phone Number Already Persent');
        // }

        // if ($checkEmail &&  $AuthcheckEmail) {
        //     return redirect()->back()->with('success','Email Number Already Persent');

        // }

        $saveAuth = new Auth();
        $saveAuth->name = $req->fname;
        $saveAuth->type = 'doctor';
        $saveAuth->phone = $req->phone;
        $saveAuth->email = $req->email;
        $saveAuth->password = bcrypt($req->password);
        $saveAuth->status = 0;
        $saveAuth->save();
        // Save the Doctor model to the database

        $findid = Auth::where('email', $req->email)->first();
        $doctor = new Doctor;


        $targetDirectory = 'uploads/doctor';

        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->photo = $req->file('photo')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->photo = 'assets/img/doctorimg.png';
        }

        if ($req->hasFile('gst')) {
            $extension = $req->file('gst')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->gst = $req->file('gst')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->gst = null;
        }

        // Handle Aadhar Card file upload
        if ($req->hasFile('aadhar_card')) {
            $extension = $req->file('aadhar_card')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->aadhar_card = $req->file('aadhar_card')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->aadhar_card = null;
        }
        // Handle MCI Certificate file upload
        if ($req->hasFile('mci_certificate')) {
            $extension = $req->file('mci_certificate')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->mci_certificate = $req->file('mci_certificate')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->mci_certificate = null;
        }
        // Handle SMC Certificate file upload
        if ($req->hasFile('smc_certificate')) {
            $extension = $req->file('smc_certificate')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->smc_certificate = $req->file('smc_certificate')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->smc_certificate = null;
        }
        // Handle Bachelor Document file upload
        if ($req->hasFile('bachelor_document')) {
            $extension = $req->file('bachelor_document')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->bachelor_document = $req->file('bachelor_document')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->bachelor_document = null;
        }
        // Handle Master Document file upload
        if ($req->hasFile('master_document')) {
            $extension = $req->file('master_document')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->master_document = $req->file('master_document')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->master_document = null;
        }
        // Handle Experience Letter file upload
        if ($req->hasFile('experience_letter')) {
            $extension = $req->file('experience_letter')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->experience_letter = $req->file('experience_letter')->move(('uploads/doctor'), $filename);
        } else {
            $doctor->experience_letter = null;
        }
        
        // Set other fields in the Doctor model
        $doctor->fname = $req->fname;
        $doctor->lname = $req->lname;
        $doctor->email = $req->email;
        $doctor->phone = $req->phone;
        $doctor->gender = $req->gender;
        $doctor->dob = $req->dob;
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
        $doctor->pricing = $req->pricing;
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
        $doctor->password = bcrypt($req->password);
        $doctor->status = $req->status;
        $doctor->auth_id = $findid->id;

        $doctor->save();

        if ($doctor) {

            return redirect('/sub_admins/doctors')->with('success', 'Added Successfully');
        } else {
            return redirect('/sub_admins/add_doctor')->with('success', 'Error occurred!');
        }
    }

    public function assistants()
    {
        $get_assistant = Assistant::all();
        $data = [
            'get_assistant' => $get_assistant,
        ];

        return view('sub_admins/assistants', $data);
    }

    public function change_assistant_status($id, $status)
    {


        $auth = Auth::where('phone', $id)->first();

        if ($auth) {
            $auth->update(['status' => $status]);
        }

        $assistant = Assistant::where('mobile', $id)->first();

        if ($assistant) {
            $assistant->status = $status;
            $assistant->save();

            return redirect('sub_admins/assistants')->with('success', 'Assistant status updated successfully.');
        } else {
            return redirect('sub_admins/assistants')->with('failed', 'Assistant not found.');
        }
    }

    public function add_assistant()
    {
        $get_digitaldrclininc_center = Digitaldrclininc_center::all();
        $data = [
            'get_digitaldrclininc_center' => $get_digitaldrclininc_center,
        ];
        return view('sub_admins/add_assistant', $data);
    }


    public function create_assistant(Request $request)
    {
        $validatormail = Validator::make($request->all(), [
            'email' => 'required|email|unique:auths|unique:assistants',
        ]);
        $validatorphone = Validator::make(['phone' => $request->mobile], [
            'phone' => 'required|unique:auths',
        ]);

        $validatorphoneass = Validator::make(['mobile' => $request->mobile], [
            'mobile' => 'required|unique:assistants',
        ]);

        if ($validatorphoneass->fails()) {
            return redirect()->back()->with('success', 'Phone Already Present for assistants');
        }

        if ($validatorphone->fails()) {
            return redirect()->back()->with('success', 'Phone Already Present for auths');
        }
        if ($validatormail->fails()) {
            return redirect()->back()->with('success', 'Email  Already Persent');
        }

        // Define type and status
        $type = 'assistant';
        $status = 0;
        $checkauth = Auth::where([
            'email' => $request->email,
            'phone' => $request->mobile,
        ])->first();

        if (!$checkauth) {
            $auth = new Auth();
            $auth->name = $request->fname;
            $auth->email = $request->email;
            $auth->phone = $request->input('mobile');
            $auth->password = bcrypt($request->password);
            $auth->type = $type;
            $auth->status = $status;
            $auth->save();
        } else {
            return redirect('/sub_admins/add_assistant')->with('success', 'Already Persent');
        }

        $assistant = new Assistant();
        $findid = Auth::where('email', $request->email)->first();

        // Set Assistant attributes
        $assistant->auth_id = $findid->id;
        $assistant->fname = $request->input('fname');
        $assistant->lname = $request->input('lname');
        $assistant->email = $request->input('email');
        $assistant->mobile = $request->input('mobile');
        $assistant->password = bcrypt($request->input('password')); // Hash the password for security

        // Set additional attributes for the Assistant model
        $assistant->dob = $request->input('dob');
        $assistant->digitaldrclininc_center_id = $request->input('digitaldrclininc_center_id');
        $assistant->blood_group = $request->input('blood_group');
        $assistant->street = $request->input('street');
        $assistant->city = $request->input('city');
        $assistant->state = $request->input('state');
        $assistant->zip_code = $request->input('zip_code');
        $assistant->country = $request->input('country');

        // Handle file uploads
        $fileNames = [];

        $fileInputNames = ['pan_card', 'aadhar_card', 'photo', 'cancelled_cheque'];

        foreach ($fileInputNames as $inputName) {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $extension = $file->getClientOriginalExtension();
                $newFilename = now()->format('YmdHis') . '_' . $inputName . '.' . strtolower($extension);

                $file->move(('uploads/assistant'), $newFilename);

                // Store the generated file name
                $fileNames[$inputName] = $newFilename;
            }
        }

        // Assign the generated file names to the model attributes
        $assistant->cancelled_cheque = $fileNames['cancelled_cheque'] ?? null;
        $assistant->photo = $fileNames['photo'] ?? 'assets/img/assistant.png';
        $assistant->aadhar_card = $fileNames['aadhar_card'] ?? null;
        $assistant->pan_card = $fileNames['pan_card'] ?? null;

        // Save the Assistant model
        $assistant->save();

        // Create a new Assistant instance




        // Redirect to the appropriate page with success message
        if ($assistant->save()) {
            return redirect('/sub_admins/add_assistant')->with('success', 'Assistant Registration Successful');
        } else {
            return redirect('/sub_admins/add_assistant')->with('error', 'Failed To Register. Try Again');
        }
    }
    public function transactions()
    {
        $invoices = Invoices::all();
        // foreach( $invoices as $inv){
        //     $assistant =Assistant::where('id',$inv->id)->first();
        //     $patient= Patient::where('id',$inv->patient_id)->first();

        //     $auth = Auth::where('phone',$patient->mobile)->first();


        // }

        $data = [
            'invoices' => $invoices,

        ];
        return view('sub_admins/transactions', $data);
    }


    public function admin_profile()
    {
        $admin = Auth::where('id', session('rexkod_digitaldrclinic_sub_admin_id'))->first();
        $data = [
            'admin' => $admin
        ];
        return view('sub_admins/admin_profile', $data);
    }

    public function invoice_report()
    {
        return view('/sub_admins/invoice_report');
    }
    public function newsroom()
    {
        return view('sub_admins/newsroom');
    }

    public function create_news(Request $request)
    {
        $newData = new Newsroom();

        // if ($request->hasFile('newphoto')) {
        //     $file = $request->file('newphoto');
        //     $f_extension = $file->getClientOriginalExtension();
        //     $f_newfile = uniqid() . '.' . $f_extension;
        //     $storePath = 'uploads/newsroom/' . $f_newfile; // Corrected the path

        //     $file->move(('uploads/newsroom'), $f_newfile);

        //     $newData->newphoto = $f_newfile;
        // } else {
        //     $newData->newphoto = null;
        // }
        //----------------------
        if ($request->hasFile('newphoto')) {
            $validExtensions = ['png', 'jpeg', 'jpg', 'webp'];
            $file = $request->file('newphoto');

            if ($file->isValid() && in_array($file->extension(), $validExtensions)) {
                $filename = Str::random(4) . time() . '.' . $file->extension();
                $file->move(('uploads/newsroom'), $filename);
                $newData->newphoto = $filename;
            } else {
                // Handle invalid file
                return redirect()->back()->with('error', 'Invalid file. Please upload an image in PNG, JPEG, JPG, or WEBP format.');
            }
        } else {
            $newData->newphoto = null;
        }
        //---------------------------------------------------------------------
        if ($request->hasFile('newslogo')) {
            $file = $request->file('newslogo');
            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = uniqid() . '.' . $f_extension;
            $storePath = 'uploads/newslogo/' . $f_newfile; // Corrected the path

            // Move the file to the new location
            $file->move(('uploads/newslogo'), $f_newfile);

            $newData->newslogo = $f_newfile;
        } else {
            $newData->newslogo = 'profile.png';
        }


        $newData->title = $request->title;
        $newData->discription = $request->discription;
        $newData->link = $request->link;

        $newData->save();

        if ($newData) {
            session()->flash('success', 'News Data Created');
            return redirect('/sub_admins/newsroom'); // Assuming you have a route named 'newsroom.index' for the newsroom listing.
        }
    }

    public function newsroomdetails()
    {
        $displaydata = Newsroom::all();
        $data = [
            'displynewdata' => $displaydata
        ];
        return view('/sub_admins/newsroomdetails', $data);
    }
    public function edit_newsdetails($id)
    {
        $displaydata = Newsroom::where('id', $id)->get();

        $data = [
            'displynewdata' => $displaydata
        ];
        return view('sub_admins/edit_newsdetails', $data);
    }


    public function socialmedia()
    {
        $socialmedia = Social_media::all();

        $data = [
            'media' => $socialmedia
        ];

        return view('sub_admins/socialmedia', $data);
    }

    public function updateSocialmedia(Request $req)
    {
        $socialmedia = Social_media::find($req->id);

        $socialmedia->facebook = $req->facebook;
        $socialmedia->Instagram = $req->Instagram;
        $socialmedia->twitter = $req->twitter;
        $socialmedia->linkedin = $req->linkedin;
        $socialmedia->save();
        if ($socialmedia) {

            $_SESSION['success'] = " Social Media Link Update Successfully ";
            return redirect('/sub_admins/socialmedia');
        }
    }

    public function toUpdateStatus(Request $request)
    {
        $selectedItems = $request->input('selectedItems', []);

        if (!empty($selectedItems)) {
            $placeholders = implode(', ', array_fill(0, count($selectedItems), '?'));
            $sql = "UPDATE newsrooms SET status = CASE WHEN id IN ($placeholders) THEN 1 ELSE 0 END";
            DB::update($sql, $selectedItems);
            return redirect('/sub_admins/newsroomdetails');
        } else {
            return redirect()->back()->with('success', 'Please select option');
        }
    }

    // ---------------------------------- SP ----------------------------------------
    public function view_doctor_register($id)
    {
        $doctor = Doctor::find($id);
        return view('sub_admins/view_doctor_register')->with('doctor', $doctor);
    }

    public function edit_doctor_register($id)
    {
        $doctor = Doctor::find($id);
        return view('sub_admins/edit_doctor_register')->with('doctor', $doctor);
    }

    public function ngo_data_edit($id)
    {
        $get_ngo_data = Ngo_data::where('id', $id)->get();


        $data = [
            'get_ngo_data' => $get_ngo_data,
        ];

        return view('sub_admins/ngo_data_edit', $data);
    }

    public function view_ngo_certificate_data($id)
    {
        $ngo_data = Ngo_data::find($id);
        // dd($ngo_data->ngo_certificate);
        return view('sub_admins/view_ngo_certificate_data')->with('ngo_data', $ngo_data);
    }

    public function doctor_approval($id, $status)
    {
        $ddc = Doctor::where('phone', $id);
        $ddc->update(['status' => $status]);
        $doctor = Auth::where('phone', $id);

        $doctor->update(['status' => $status]);
        if ($status) {
            return redirect('/sub_admins/doctors')->with('success', 'Account Activated');
        } else {
            return redirect('/sub_admins/doctors')->with('failed', 'Account Deactivated');
        }
    }


    public function representative_approval($id, $status)
    {
        $finddata = New_clinic_reg::find($id);
        $finddata->status = $status;
        // $finddata = New_clinic_reg::where('id', $id)->first();
        $name = $finddata->name;
        $email = $finddata->email;
        $phone = $finddata->mobile_number;
        $Repr = "Representative";


        $representative = Auth::where('id', $id);
        $representative->update(['status' => $status]);

        $finddata->save();
        return redirect()->back()->with('success', 'Documents Verified Done');
    }

    public function get_clinic_by_id($id)
    {
        $get_clinic = Clinics::where('id', $id)->get();

        $data = [
            'get_clinic' => $get_clinic,
        ];

        return view('sub_admins/clinic_details', $data);
    }

    public function get_assistant_by_id($id)
    {
        $get_doctor = Assistant::where('id', $id)->first();

        $data = [
            'get_doctor' => $get_doctor,
        ];

        return view('sub_admins/assistant_profile', $data);
    }

    public function add_test()
    {
        return view('/sub_admins/add_test');
    }


    public function create_test_admin(Request $req)
    {
        $check_test = Test::where('name', $req->name);
        // if($check_test){
        //  return redirect()->back()->with('success','Test Name already Persent');
        // }

        $saveTest = new Test();
        $saveTest->name = $req->name;
        $saveTest->description = $req->description;
        $saveTest->created_by = session('rexkod_digitaldrclinic_sub_admin_id');
        $saveTest->status = 0;

        $saveTest->save();
        if ($saveTest) {
            return redirect('sub_admins/test')->with('success', "Test Added Successfuly");
        } else {
            return redirect('sub_admins/add_test')->with('success', 'Failed To Add Test Try Again');
        }
    }

    public function patient_profile($id)
    {

        $get_patient_detail = Patient::where('id', $id)->get();

        $get_patient_detail_from_auth = Auth::where('id', $id)->first(); // Change Auth to User

        $data = [
            'get_patient_detail_from_auth' => $get_patient_detail_from_auth,
            'get_patient_detail' => $get_patient_detail,
            'patient_id' => $id,
        ];

        return view('sub_admins.patient_profile', $data);  // Adjust the view path accordingly
    }

    function pincodes(Request $req)
    {
        $pincode = Pincode::where('Pincode', $req->input('pincode'))->get();
        return $pincode[0];
    }

    public function unique_mobile_number(Request $request)
    {
        $unique_number = Auth::where('phone', $request->mobile_number)->first();
        if ($unique_number) {
            return 'exists';
        } else {
            return null;
        }
    }
    public function unique_mobile_number_patient(Request $request)
    {
        $unique_number = Auth::where('phone', $request->mobile_number)->first();
        if ($unique_number) {
            return 'exists';
        } else {
            return null;
        }
    }
    public function unique_mobile_number_assistance(Request $request)
    {
        $unique_number = Auth::where('phone', $request->mobile_number)->first();
        $unique_assistance = Assistant::where('mobile', $request->mobile_number)->first();
        if ($unique_number && $unique_assistance) {
            return 'exists';
        } else {
            return null;
        }
    }
    public function unique_email(Request $request)
    {
        $unique_email = Auth::where('email', $request->email)->first();
        if ($unique_email) {
            return 'exists';
        } else {
            return null;
        }
    }


    public function invoice($id)
    {
        $invoices = Invoices::where('id', $id)->first();

        $assistant = Auth::where('id', $invoices->assistant_id)->first();
        $pasents = Patient::where('id', $invoices->patient_id)->first();
        $digitaldrclininc_centers = Digitaldrclininc_center::where('id', $invoices->clinic_id)->first();

        $data = [
            'invoices' => $invoices,
            'assistant' => $assistant,
            'pasents' => $pasents,
            'digitaldrclininc_centers' => $digitaldrclininc_centers,

        ];

        return view('sub_admins/invoice', $data);
    }

    public function update_doctor_register($id, Request $req)
    {
        $doctor = Doctor::find($id);
        $authid = Doctor::where('id', $id)->first();
        $find = Auth::find($authid->auth_id);
        if ($find) {
            $find->name = $req->fname;
            $find->email = $req->email;
            $find->phone = $req->phone;
            $find->save();
        }
        $storagePath = 'uploads/doctor';

        // Handle photo file upload
        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->photo = $req->file('photo')->move(('uploads/doctor'), $filename);
        }

        // Handle GST file upload
        if ($req->hasFile('gst')) {
            $extension = $req->file('gst')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->gst = $req->file('gst')->move(('uploads/doctor'), $filename);
        }

        // Handle Aadhar Card file upload
        if ($req->hasFile('aadhar_card')) {
            $extension = $req->file('aadhar_card')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->aadhar_card = $req->file('aadhar_card')->move(('uploads/doctor'), $filename);
        }

        // Handle MCI Certificate file upload
        if ($req->hasFile('mci_certificate')) {
            $extension = $req->file('mci_certificate')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->mci_certificate = $req->file('mci_certificate')->move(('uploads/doctor'), $filename);
        }

        // Handle SMC Certificate file upload
        if ($req->hasFile('smc_certificate')) {
            $extension = $req->file('smc_certificate')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->smc_certificate = $req->file('smc_certificate')->move(('uploads/doctor'), $filename);
        }

        // Handle Bachelor Document file upload
        if ($req->hasFile('bachelor_document')) {
            $extension = $req->file('bachelor_document')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->bachelor_document = $req->file('bachelor_document')->move(('uploads/doctor'), $filename);
        }

        // Handle Master Document file upload
        if ($req->hasFile('master_document')) {
            $extension = $req->file('master_document')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->master_document = $req->file('master_document')->move(('uploads/doctor'), $filename);
        }

        // Handle Experience Letter file upload
        if ($req->hasFile('experience_letter')) {
            $extension = $req->file('experience_letter')->extension();
            $filename = Str::random(4) . time() . '.' . $extension;
            $doctor->experience_letter = $req->file('experience_letter')->move(('uploads/doctor'), $filename);
        }


        // Set other fields in the Doctor model
        $doctor->fname = $req->fname;
        $doctor->lname = $req->lname;
        $doctor->email = $req->email;
        $doctor->phone = $req->phone;
        $doctor->gender = $req->gender;
        $doctor->dob = $req->dob;
        $doctor->schedule_date = 'null';
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
        $doctor->edit_by=session('rexkod_digitaldrclinic_sub_admin_id');

        $doctor->save();

        return redirect()->back()->with('success', 'Data Update Successfilly');
    }

    public function update_news(Request $req, $id)
    {

        $newsUpdate = Newsroom::find($id);

        if ($req->hasFile('newsphoto')) {
            $file = $req->file('newsphoto');
            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = uniqid() . '.' . $f_extension;
            $storePath = 'uploads/newsroom/' . $f_newfile;

            $file->move(('uploads/newsroom'), $f_newfile);

            $newsUpdate->newphoto = $f_newfile;
        } else {
            $newsUpdate->newphoto = $newsUpdate->newphoto;
        }

        if ($req->hasFile('newslogo')) {

            $file = $req->file('newslogo');
            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = uniqid() . '.' . $f_extension;
            $storePath = 'uploads/newslogo/' . $f_newfile;

            $file->move(('uploads/newslogo'), $f_newfile);

            $newsUpdate->newslogo = $f_newfile;
        } else {
            $newsUpdate->newslogo = $newsUpdate->newslogo;
        }

        $newsUpdate->title = $req->title;
        $newsUpdate->discription = $req->discription;
        $newsUpdate->link = $req->link;

        $newsUpdate->save();
        return redirect('sub_admins/newsroomdetails')->with('success', 'News Data Updated');
    }
    public function deleteNewroom($id)
    {
        $delete = Newsroom::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'News Delete Successfully');
    }

    public function update_test(Request $req)
    {

        $id = $req->test_id;
        $updateTest = Test::find($id);
        $updateTest->name = $req->name;
        $updateTest->description = $req->description;
        $updateTest->save();
        return redirect()->back()->with('success', 'Test Update Successfully');
    }
    public function deleteTest($id)
    {
        $deleteTest = Test::find($id);
        $deleteTest->delete();
        return redirect()->back()->with('success', 'Test Delete Successfully');
    }
    public function update_medicine(Request $req)
    {

        $id = $req->test_id;
        $updateTest = Medicine::find($id);
        $updateTest->name = $req->name;
        $updateTest->description = $req->description;
        $updateTest->save();
        return redirect()->back()->with('success', 'Medicine Update Successfully');
    }
    public function deleteMedicine($id)
    {
        $deleteTest = Medicine::find($id);
        $deleteTest->delete();
        return redirect()->back()->with('success', 'Medicine Delete Successfully');
    }

    public function edit_clinic($id)
    {
        $clinic = Clinics::where('id', $id)->get();

        $data = [
            'clinic' => $clinic
        ];
        return view('/sub_admins/edit_clinic', $data);
    }


    public function update_clinic(Request $req)
    {
        $clinic = Clinics::find($req->id);
        $authupdate = Auth::find($clinic->auth_id);

        $authupdate->name = $req->name;
        $authupdate->email = $req->email;
        $authupdate->phone = $req->phone;
        $authupdate->save();

        $clinic->name = $req->name;
        $clinic->email = $req->email;
        $clinic->phone = $req->phone;
        $clinic->address = $req->address;
        $clinic->city = $req->city;
        $clinic->zipcode = $req->zipcode;
        $clinic->state = $req->state;
        $clinic->country = $req->country;
        $clinic->registrations = $req->registrations;
        $clinic->registration_year = $req->registration_year;
        $clinic->hospital_name = $req->hospital_name;
        $clinic->website = $req->website;
        $clinic->person_name = $req->person_name;
        $clinic->person_phone_number = $req->person_phone_number;
        $clinic->operating_hours_date = $req->operating_hours_date;
        $clinic->operating_hours_time = $req->operating_hours_time;


        if ($req->hasFile('gst')) {
            $file = $req->file('gst');

            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/clinic', $f_newfile);
            $clinic->gst = $store;
        } else {
            $clinic->gst =  $clinic->gst;
        }

        if ($req->hasFile('aadhaar_card')) {
            $file1 = $req->file('aadhaar_card');

            $originalFileName = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file1->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store1 = $file1->move('uploads/clinic', $f_newfile);
            $clinic->aadhar_card = $store1;
        } else {
            $clinic->aadhar_card = $clinic->aadhar_card;
        }

        if ($req->hasFile('gov_license')) {
            $file2 = $req->file('gov_license');

            $originalFileName = pathinfo($file2->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file2->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store2 = $file2->move('uploads/clinic', $f_newfile);
            $clinic->gov_license = $store2;
        } else {
            $clinic->gov_license =  $clinic->gov_license;
        }

        if ($req->hasFile('img1')) {
            $file3 = $req->file('img1');

            $originalFileName = pathinfo($file3->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file3->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store3 = $file3->move('uploads/clinic', $f_newfile);
            $clinic->img1 = $store3;
        } else {
            $clinic->img1 =  $clinic->img1;
        }

        if ($req->hasFile('img2')) {
            $file4 = $req->file('img2');

            $originalFileName = pathinfo($file4->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file4->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store4 = $file4->move('uploads/clinic', $f_newfile);
            $clinic->img2 = $store4;
        } else {
            $clinic->img2 = $clinic->img2;
        }





        $clinic->save();

        if ($clinic) {

            return redirect('/sub_admins/clinic_hospital')->with('success', "Clinic update Successfully");
        } else {

            return redirect('/sub_admins/clinic_hospital')->with('error', "Failed To update Try Again");
        }
    }
    public function delete_clinic($id)
    {
        $delete =  Clinics::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Clinic Delete Successfuly');
    }


    public function get_assistant_edit($id)
    {
        $assistant = Assistant::where('id', $id)->get();

        $data = [
            'assistant' => $assistant
        ];

        return view('/sub_admins/get_assistant_edit', $data);
    }

    public function  updateAssistant(Request $request, $id)
    {

        $assistant = Assistant::find($id);
        $findif = Assistant::where('id', $id)->first();
        $authupdate = Auth::find($findif->auth_id);
        $authupdate->name = $request->fname;
        $authupdate->email = $request->email;
        $authupdate->phone = $request->mobile;
        $authupdate->save();

        // Set Assistant attributes
        $assistant->fname = $request->input('fname');
        $assistant->lname = $request->input('lname');
        $assistant->email = $request->input('email');
        $assistant->mobile = $request->input('mobile');
        $assistant->password = bcrypt($request->input('password')); // Hash the password for security

        $assistant->dob = $request->input('dob');
        $assistant->digitaldrclininc_center_id = $request->input('digitaldrclininc_center_id');
        $assistant->blood_group = $request->input('blood_group');
        $assistant->street = $request->input('street');
        $assistant->city = $request->input('city');
        $assistant->state = $request->input('state');
        $assistant->zip_code = $request->input('zip_code');
        $assistant->country = $request->input('country');

        // Handle file uploads
        $fileNames = [];

        $fileInputNames = ['pan_card', 'aadhar_card', 'photo', 'cancelled_cheque'];

        foreach ($fileInputNames as $inputName) {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $extension = $file->getClientOriginalExtension();
                $newFilename = now()->format('YmdHis') . '_' . $inputName . '.' . strtolower($extension);

                $file->move(('uploads/assistant'), $newFilename);

                $fileNames[$inputName] = $newFilename;
            } else {
            }
        }

        // Assign the generated file names to the model attributes
        $assistant->cancelled_cheque = $fileNames['cancelled_cheque'] ?? $assistant->cancelled_cheque;
        $assistant->photo = $fileNames['photo'] ??  $assistant->photo;
        $assistant->aadhar_card = $fileNames['aadhar_card'] ??  $assistant->aadhar_card;
        $assistant->pan_card = $fileNames['pan_card'] ?? $assistant->pan_card;
        $assistant->edit_by=session('rexkod_digitaldrclinic_sub_admin_id');
        $assistant->save();


        if ($assistant->save()) {
            return redirect('/sub_admins/assistants')->with('success', 'Assistant updated Successful');
        } else {
            return redirect()->back()->with('error', 'Failed To Register. Try Again');
        }
    }


    public function updatepatients($id)
    {

        return view('/sub_admins/updatepatients');
    }

    public function delete_Patients($id)
    {
        $find = Patient::find($id);
        $auth=Auth::find($find->patient_id);
        $auth->delete();
        $find->delete();
        return redirect()->back()->with('success', 'Patients Delete');
    }

    public function edit_ddc_center($id)
    {
        $ddccenter = Digitaldrclininc_center::where('id', $id)->first();
        $reper = New_clinic_reg::where('status', 1)->get();
        $assistant=Assistant::where('status',1)->get();

        $data = [
            'ddccenter' => $ddccenter,
            'reper' => $reper,
            'assistant'=> $assistant
        ];
        return view('/sub_admins/edit_ddc_center', $data);
    }
    public function ddccenterview($id)
    {
        $ddccenter = Digitaldrclininc_center::where('id', $id)->first();

        $data = [
            'ddccenter' => $ddccenter
        ];
        return view('/sub_admins/ddccenterview', $data);
    }



    public function update_Digitaldrclininc_center(Request $req, $id)
    {
        $result = Digitaldrclininc_center::find($id);

        if ($req->hasFile('gov_license')) {
            $file = $req->file('gov_license');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/ddc_center', $f_newfile);
            $result->gov_license = $store;
        } else {
            $result->gov_license = $result->gov_license;
        }

        if ($req->hasFile('img1')) {
            $file = $req->file('img1');

            $unqname = now()->format('Ymd') . now()->timestamp;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/ddc_center', $f_newfile);
            $result->img1 = $store;
        } else {
            $result->img1 = $result->img1;
        }
        $result->assistance_id=$req->assistance_id;

        $result->assistance_name = $req->assistance_name;
        $result->assistance_phone = $req->assistance_phone;
        $result->assistance_email = $req->assistance_email;
        $result->assistance_profile_pic = $req->assistance_profile_val;


        $result->representatives_email = $req->representatives_email;
        $result->representatives_name = $req->representatives_name;
        $result->representatives_phone = $req->representatives_phone;
        $result->representatives_id = $req->representatives_id;

        $result->name = $req->name;
        $result->email = $req->email;
        $result->phone = $req->phone;
        $result->address = $req->address;
        $result->city = $req->city;
        $result->zipcode = $req->zipcode;
        $result->state = $req->state;
        $result->country = $req->country;
        $result->save();

        if ($result) {
            return  redirect('/sub_admins/edit_ddc_center/' . $id)->with('success', 'Update Successfully');
        } else {
            return redirect('/sub_admins/edit_ddc_center/' . $id)->with('success', 'Failed To Register Try Again');;
        }
    }

    public function sub_admin_personal_details($id, Request $req)
    {
        $admin = Auth::find($id);
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->phone = $req->phone;
        $admin->save();
       $subadmin=Sub_admin::where('auth_id',$id)->first();
       $subadmin->name = $req->name;
       $subadmin->email = $req->email;
       $subadmin->phone = $req->phone;
       $subadmin->save();
        return redirect()->back()->with('success', 'Admin Data Updated');
    }
    public function patient_profile_edit($id)
    {
        $get_patient_detail = Patient::where('id', $id)->get();

        $get_patient_detail_from_auth = Auth::where('id', $id)->first();

        $data = [
            'get_patient_detail_from_auth' => $get_patient_detail_from_auth,
            'get_patient_detail' => $get_patient_detail,
            'patient_id' => $id,
        ];
        return view('/sub_admins/patient_profile_edit', $data);
    }
    public function updatePatientsbyadmin($id, Request $req)
    {

        //    $chekemail=Auth::where('email',$req->email)->first();
        //     if($chekemail){
        //    return redirect()->back()->with('success','Email is already Persent');
        //     }
        //     $chekmobile=Auth::where('phone',$req->mobile)->first();
        //     if($chekmobile){
        //    return redirect()->back()->with('success','Mobile Number is already Persent');
        //     }
        $savePatient = Patient::find($id);
        $authid = Patient::Where('id', $id)->first();
        $auth = Auth::find($authid->auth_id);

        $auth->name = $req->fname;
        $auth->email = $req->email;
        $auth->phone = $req->mobile;
        $auth->save();

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
        $savePatient->edit_by=session('rexkod_digitaldrclinic_sub_admin_id');
        $savePatient->save();
        if ($savePatient) {
            return redirect()->back()->with('success', 'Update');
        } else {
            return redirect()->back()->with('success', 'Error');
        }
    }
    public function camp_request()
    {
        $get_camp_request = Camp_request::all();
        $data = [
            'get_camp_request' => $get_camp_request
        ];
        return view('sub_admins/camp_request', $data);
    }



    public function getRepresentativePhoneNumber(Request $request)
    {
        $selectedName = $request->input('name');
        $representative = New_clinic_reg::where('name', $selectedName)->first();
        return response()->json(['phone' => $representative->mobile_number, 'id' => $representative->id,'reper_email'=>$representative->email]);
    }

    public function getassistnacePhoneNumber(Request $request)
    {
        $selectedName = $request->input('assistance_name');
        $assistant = Assistant::where('fname', $selectedName)->first();
        return response()->json(['mobile' => $assistant->mobile, 'id' => $assistant->id,'email'=>$assistant->email,'photo'=>$assistant->photo]);
    }


    public function vister_details($id){
        $campreq=Camp_request::where('id',$id)->first();

        $data=[
            'campreq'=> $campreq
        ];
    return view('/sub_admins/vister_details', $data);
    }

    public function show_invoice($id ,$patient_id){

        $invoice = Invoices::where('id',$id)->first();
        $digital=Digitaldrclininc_center::where('id',$invoice->clinic_id)->first();
        $detailsof= Patient::where('id',$patient_id)->first();

            $data=[
            'invoice'=>$invoice,
            'digital' =>$digital,
            'detailsof'=> $detailsof
        ];

        return view('/sub_admins/show_invoice',$data);
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

        return view('/sub_admins/show_prescription',$data);
       }

       public function Representatives_page_edit($id) {
        $dataValue = New_clinic_reg::where('id',$id)->get();

        if ($dataValue) {
            $data = [
                'dataValue' => $dataValue,
            ];
            return view('sub_admins/representativesedit', $data);
        } else {
            echo "No data found for ID: $id";
        }

    }
    public function uploads_registerRepresentative($id ,Request $req){
        $reper =  New_clinic_reg::find($id);
        // $checkmail =  New_clinic_reg::where('email',$req->email);
        // $checkmobile_number=New_clinic_reg::where('mobile_number',$req->mobile_number);
        // if($checkmail){
        //     return redirect()->back()->with('success','Email already Exist');
        // }
        // if($checkmobile_number){
        //     return redirect()->back()->with('success','Phone number already Exist');
        // }

    // Set the storage path
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
            if($req->hasFile('place_img')){

                $hashedFileName = hash('md5', $req->place_img) . '.' . $req->file('place_img')->getClientOriginalExtension();
                $reper->adhar_card = $req->file('place_img')->move($storagePath, $hashedFileName);

            }else{
                $reper->place_img= $reper->	place_img;

            }
            // Handle the 'place_img' and 'adhar_card' file uploads
            if ($req->hasFile('adhar_card')) {

                $hashedFileName = hash('md5', $req->adhar_card) . '.' . $req->file('adhar_card')->getClientOriginalExtension();
                $reper->adhar_card = $req->file('adhar_card')->move($storagePath, $hashedFileName);

            }
            else {
                $reper->adhar_card= $reper->adhar_card;
            }

            // Handle the 'pradhan_verification' file upload
            if ($req->hasFile('pradhan_verification')) {
                $hashedFileName = hash('md5', $req->pradhan_verification) . '.' . $req->file('pradhan_verification')->getClientOriginalExtension();
                $reper->pradhan_verification = $req->file('pradhan_verification')->move($storagePath, $hashedFileName);}
                else {
                $reper->pradhan_verification = $reper->pradhan_verification;
            }

                $reper->name = $req->name;
                $reper->edit_by=session('rexkod_digitaldrclinic_sub_admin_id');
                $reper->place_map = $req->place_map;
                $reper->occupation = $req->occupation;
                $reper->village = $req->village;
                $reper->police_station = $req->police_station;
                $reper->block = $req->block;
                $reper->post = $req->post;
                $reper->district = $req->district;
                $reper->pincode = $req->pincode;
                $reper->email = $req->email;
                $reper->mobile_number = $req->mobile_number;
                $reper->user_type = $req->user_type;

    // Save the model
    $reper->save();
    return redirect()->back()->with('success','Update Successfully');
    }
    // ----------------------- Max ------------------------------------
  public function representatives_page_view($id){
    $dataValue = New_clinic_reg::where('id',$id)->get();

    if($dataValue){
        $data = [
            'dataValue' => $dataValue,
        ];
        return view('/sub_admins/representativesview', $data);
    } else {
        echo "No data found for ID: $id";
    }
  }


  public function create_clinic(Request $req)
    {



        if (!$req->phone || !$req->email) {
            return redirect()->back()->with('success', 'Email or phone cannot be null');
        }
        $status = '0';

        $createHospitalLogin = new Auth();
        $createHospitalLogin->type = 'hospital';
        $createHospitalLogin->name = $req->name;
        $createHospitalLogin->email = $req->email;
        $createHospitalLogin->phone = $req->phone;
        $createHospitalLogin->password = bcrypt($req->input('password')); // Hash the password for security
        $createHospitalLogin->status = $status;
        $createHospitalLogin->save();
        $findid = Auth::where('email', $req->email)->first();

        $clinic = new Clinics();
        $clinic->status = $req->$status;
        $clinic->auth_id = $findid->id;
        $clinic->name = $req->name;
        $clinic->email = $req->email;
        $clinic->phone = $req->phone;
        $clinic->address = $req->address;
        $clinic->city = $req->city;
        $clinic->zipcode = $req->zipcode;
        $clinic->state = $req->state;
        $clinic->country = $req->country;
        $clinic->registrations = $req->registrations;
        $clinic->registration_year = $req->registration_year;
        $clinic->hospital_name = $req->hospital_name;
        $clinic->website = $req->website;
        $clinic->person_name = $req->person_name;
        $clinic->person_phone_number = $req->person_phone_number;
        $clinic->operating_hours_date = $req->operating_hours_date;
        $clinic->operating_hours_time = $req->operating_hours_time;

        if ($req->hasFile('gst')) {
            $file = $req->file('gst');

            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store = $file->move('uploads/clinic', $f_newfile);
            $clinic->gst = $store;
        } else {
            $clinic->gst = null;
        }

        if ($req->hasFile('aadhaar_card')) {
            $file1 = $req->file('aadhaar_card');

            $originalFileName = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file1->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store1 = $file1->move('uploads/clinic', $f_newfile);
            $clinic->aadhar_card = $store1;
        } else {
            $clinic->aadhar_card = null;
        }

        if ($req->hasFile('gov_license')) {
            $file2 = $req->file('gov_license');

            $originalFileName = pathinfo($file2->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file2->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store2 = $file2->move('uploads/clinic', $f_newfile);
            $clinic->gov_license = $store2;
        } else {
            $clinic->gov_license = null;
        }

        if ($req->hasFile('img1')) {
            $file3 = $req->file('img1');

            $originalFileName = pathinfo($file3->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file3->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store3 = $file3->move('uploads/clinic', $f_newfile);
            $clinic->img1 = $store3;
        } else {
            $clinic->img1 = 'assets/img/hospital.png';
        }

        if ($req->hasFile('img2')) {
            $file4 = $req->file('img2');

            $originalFileName = pathinfo($file4->getClientOriginalName(), PATHINFO_FILENAME);
            $randomString = str_shuffle('abcdefghijklmnop0123456789');
            $unqname = $originalFileName . '_' . $randomString;

            $f_extension = $file4->getClientOriginalExtension();
            $f_newfile = '5' . $unqname . '.' . $f_extension;
            $store4 = $file4->move('uploads/clinic', $f_newfile);
            $clinic->img2 = $store4;
        } else {
            $clinic->img2 = 'assets/img/hospital.png';
        }

        $clinic->save();

        if ($clinic) {

            return redirect('/sub_admins/add_clinic')->with('success', "Clinic Register Successfully");
        } else {

            return redirect('/sub_admins/add_clinic')->with('error', "Failed To Register Try Again");
        }
    }

    public function viewContactRequest($id){
        $get_contact_us = Contact_us::find($id);
        return view('sub_admins.view_contact_request', ['get_contact_us' => $get_contact_us]);
    }
    public function viewMedicine($id){
        $medicine = Medicine::find($id);
        return view('sub_admins.view_medicine', ['medicine' => $medicine]);
    }
    public function viewTest($id){
        $test = Test::find($id);
        return view('sub_admins.view_test', ['test' => $test]);
    }

}
