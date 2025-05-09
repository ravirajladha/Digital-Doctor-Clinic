<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Dependent;
use App\Models\Digitaldrclininc_center;
use App\Models\Doctor;
use App\Models\Invoices;
use App\Models\Medicine;
use App\Models\Notification;
use App\Models\Online_doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Stock;
use App\Models\Test;
use App\Models\Specialities;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Const_;

class Assistants extends Controller
{
    public function login()
    {
        return view('assistants/login');
    }

    public function dashboard()
    {
        $getcount_patient = Patient::where('created_by', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $get_consultations = Consultation::where('assistant_id', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $get_assistant = Assistant::Where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();

        $data = [
            'get_consultations' => $get_consultations,
            'get_assistant' => $get_assistant,
            'getcount_patient' => $getcount_patient,

        ];
        // print_r($data);
        return view('assistants/dashboard', $data);
    }

    public function admin_Assistants_login(Request $request)
    {

        if (!$request->has('username') || !$request->has('password')) {

            return view('assistants.login')->with('failed', 'Enter required details');
        }

        $username = $request->input('username');
        $password = $request->input('password');
        // Use where() and first() separately for clarity

        $user = Auth::where('email', $username)->where('type', 'assistant')->first();
        $assistant = Assistant::where('email', $username)->first();



        if ($user && Hash::check($password, $user->password) && $user->type === "assistant" && $user->status == 1) {
            Session::put('rexkod_digitaldrclinic_assistant_id', $user->id);
            Session::put('rexkod_digitaldrclinic_assistant_name', $user->name);
            Session::put('rexkod_digitaldrclinic_assistant_email', $user->email);
            Session::put('rexkod_digitaldrclinic_assistant_phone', $user->phone);
            Session::put('rexkod_digitaldrclinic_login_type', $user->type);
            Session::put('rexkod_digitaldrclinic_profile_image', $assistant->photo);

            return view('assistants/dashboard')->with('success', 'Logged in');
        } elseif ($user && Hash::check($password, $user->password) && $user->type === 'assistant' && $user->status == 0) {
            Session::flash('failed', 'Access denied');
            return view('assistants.login');
        } else {
            Session::flash('failed', 'Invalid credentials');
            return view('assistants.login');
        }
    }

    public function view_patients()
    {
        $get_patients = Patient::where('created_by', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $get_assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->get();;

        $data = [
            'get_patients' => $get_patients,
            'get_assistant' => $get_assistant,
        ];
        return view('assistants/view_patients', $data);
    }

    public function view_doctors()
    {
        $get_assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'));
        $get_doctors_data_1 = Doctor::where('status', 1)->get();


        $data = [
            'get_assistant' => $get_assistant,
            'get_doctors_data_1' => $get_doctors_data_1,

        ];
        // print_r($data);
        return view('assistants/view_doctors', $data);
    }

    public function patient_no()
    {
        return view('assistants/patient_no');
    }

    public function all_referrals()
    {
        $get_assistant = Auth::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
        $prescriptions_data = Prescription::all();
        // print_r($prescriptions_data);
        $data = [
            'prescriptions_data' => $prescriptions_data,
            'get_assistant' => $get_assistant,
        ];
        return view('assistants/all_referrals', $data);
    }

    public function test()
    {
        $get_tests = Test::join('auths', 'tests.created_by', '=', 'auths.id')
            ->select('tests.*', 'auths.name as auth_name')
            ->get();

        $data = [
            'get_tests' => $get_tests,
        ];

        return view('assistants.test', $data);
    }

    public function medicines()
    {
        $get_medicines = Medicine::all();
        $data = [
            'get_medicines' => $get_medicines,
        ];
        return view('assistants/medicines', $data);
    }

    public function stock()
    {
        $get_stock = Stock::where('assistants_id', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $data = [
            'get_stock' => $get_stock,
        ];

        return view('assistants/stock', $data);
    }

    public function add_stock()
    {
        return view('assistants/add_stock');
    }

    public function create_stock(Request $request)
    {
        $medicineName = Stock::where('medicine_id', $request->medicinename)->where('assistants_id', session('rexkod_digitaldrclinic_assistant_id'))->first();

        if ($medicineName) {
            return redirect()->back()->with('success', 'Medicine Already added Please update Medicine');
        }

        $stock = new Stock();

        if ($request->hasFile('medicine_photo')) {
            $temp = $request->file('medicine_photo')->move('uploads/medicine', $request->file('medicine_photo')->getClientOriginalName());
        } else {
            $temp = 'assets/img/medicine.jpg';
        }

        $get_medicines = Medicine::where('id', $request->medicinename)->first();

        // Fetching data
        $get_assistant_data = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();

        $get_digitaldrclininc_center_data = Digitaldrclininc_center::where('id', $get_assistant_data->digitaldrclininc_center_id)->first();

        // Checking if data exists
        if (!$get_digitaldrclininc_center_data) {
            // Handle the case where data is not found
        }

        // Creating Stock instance
        $stock->medicines_price = $request->medicines_price;
        $stock->medicine_id = $request->medicinename;
        $stock->medicine_name = $get_medicines->name;
        $stock->quantity = $request->quantity;
        $stock->stock_available = $request->quantity;
        $stock->stock_used = 0;
        $stock->batch_number = $request->batchnumber;
        $stock->expiry_date = $request->expiry_date;
        $stock->medicine_photo = $temp;
        $stock->assistants_id = session('rexkod_digitaldrclinic_assistant_id');

        // Accessing relationship data
        $stock->digitaldrclininc_center_id = $get_digitaldrclininc_center_data->id;

        // Rest of your code
        $medicines = Medicine::find($request->medicinename);
        $medicines->stock = 1;
        $medicines->id = $request->medicinename;
        $medicines->save();

        $stock->save();

        // Checking if the stock is saved successfully
        if ($stock) {
            return redirect('assistants/stock')->with('success', 'Stocks added Successfully');
        } else {
            return redirect('assistants/add_stock')->with('success', 'Failed To Add Stocks. Try Again');
        }
    }

    public function add_test()
    {
        return view('/assistants/add_test');
    }

    public function create_test(Request $req)
    {
        $tests = new Test();
        $tests->name = $req->name;
        $tests->description = $req->description;
        $tests->created_by = session('rexkod_digitaldrclinic_assistant_id');
        $tests->status = 0;


        $tests->save();
        if ($tests) {
            return redirect('assistants/test')->with('success', 'Test saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Test saved successfully.');
        }
    }

    public function invoices()
    {
        $get_assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
        $get_invoice_data = Invoices::where('assistant_id', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $data = [
            'get_assistant' => $get_assistant,
            'get_invoice_data' => $get_invoice_data,
        ];
        return view('assistants/invoices', $data);
    }

    public function create_invoice()
    {
        // $medicines =Stock::all();
        $consultations = Consultation::with(['patient:id,name', 'assistant:id,name', 'doctor:id,name'])
            ->where('invoice_status', 0)
            ->where('assistant_id', session('rexkod_digitaldrclinic_assistant_id'))
            ->get();

        $data = [
            'consultations' => $consultations
        ];
        return view('/assistants/create_invoice', $data);
    }

    public function profile_settings()
    {
        $get_assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
        $assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->get();
        $data = [
            'get_assistant' => $get_assistant,
            'assistant' => $assistant
        ];
        // print_r($data);
        // die();

        return view('assistants/profile_settings', $data);
    }

    public function change_password()
    {
        $get_assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
        $data = [
            'get_assistant' => $get_assistant,
        ];
        return view('assistants/change_password', $data);
    }

    public function patient_details($id)
    {
        $get_patient_detail = Patient::where('patient_id', $id)->first();
        $get_patient_detail_from_auth = Auth::where('id', $id)->first();
        $get_specialities = Specialities::all();

        $data = [
            'get_patient_detail_from_auth' => $get_patient_detail_from_auth,
            'get_patient_detail' => $get_patient_detail,
            'patient_id' => $id,
            'get_specialities' => $get_specialities,
        ];

        return view('assistants/patient_details')->with('data', $data);
    }

    public function user_otp_registration(Request $request)
    {
        $phone = $request->input('phone');
        $otp = $request->input('otp');
        $doctors_id = $request->input('doctor_id');

        if (session('otp_generated') != $otp) {
            session()->flash('failed', 'Invalid OTP');
            return redirect('assistants/patient_no');
        }

        $checkPatient = Auth::where('phone', $phone)->first();

        if ($doctors_id !== null) {
            $data = [
                'doctors_id' => $doctors_id,
            ];
            session(['patient_data' => $data]);
        } else {
            session()->forget('patient_data');
        }



        if (empty($checkPatient)) {
            $patientId = $this->create_patient($phone);

            // Redirect to the patient details page with patientId
            return redirect('assistants/patient_details2/' . $patientId);
        } else {
            // Redirect to the patient details page with existing patient's id
            return redirect('assistants/patient_details2/' . $checkPatient->id);
        }
    }


    public function create_patient($phone)
    {
        $auth = new Auth();
        $auth->phone = $phone;
        $auth->type = 'patient';
        $auth->password = '5555';
        $auth->email = null;
        $auth->save();

        $curUser = Auth::where('phone', $phone)->orderBy('id', 'desc')->first();

        $patient = new Patient();

        $patient->patient_id = $curUser->id;
        $patient->auth_id = $curUser->id;

        $patient->mobile = $phone;
        $patient->created_by = session('rexkod_digitaldrclinic_assistant_id');
        $patient->save();

        return $curUser->id;
    }



    //---------------- SP Code ----------------

    public function unique_mobile_number_assistant_patient(Request $request)
    {
        $unique_number = Auth::where('phone', $request->mobile_number)->where('type', 'patient')->first();
        $unique_number2 = Auth::where('phone', $request->mobile_number)->where('type', '!=', 'patient')->first();
        if ($unique_number2) {
            return 'numberexists';
        } elseif ($unique_number) {
            return 'exists';
        } else {
            return null;
        }
    }

    public function update_patient(Request $request, $phone)
    {
        $authPatient = Auth::where('phone', $phone)->first();
        $patient = Patient::where('mobile', $phone)->first();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->move('uploads/patients', $request->file('image')->getClientOriginalName());
        } else {
            $image = $patient->image;
        }

        $patient->update([
            'image' =>  $image,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'alt_mobile' => $request->alt_mobile,
        ]);

        $authPatient->update(['email' => $request->email, 'name' => $request->fname]);

        return redirect('assistants/patient_details2/' . $authPatient->id)->with('success', 'Patient profile updated');
    }

    // public function videoCall($mobile){
    //     $onlineDoc = Online_doctor::where('online', 1)->get();
    //     $authPatient = Auth::where('phone',$mobile)->where('type','patient')->first();

    //     foreach($onlineDoc as $doc){
    //         $notification = new Notification([
    //             'auth_type' => 'doctor',
    //             'to_auth_id' => $doc->doctor_id,
    //             'notification_type' => 'Video Consultation',
    //             'notification' => $authPatient->name . ' is waiting for consultation',
    //             'from_auth_id' => null,
    //             'from_auth_id_assistant' => session('rexkod_digitaldrclinic_assistant_id'),
    //             'from_auth_id_patient' => $authPatient->id,
    //         ]);
    //          $notification->save();
    //     }


    //     return redirect('assistants/consultation/startconsultation')->with('waiting', 'Doctor will be connectinng soon...');
    // }



    public function logout()
    {
        Session::flush();
        return redirect('/assistants/login')->with('success', 'Logged out');
    }

    public function start_consultation_for_patient(Request $request, $patient_id)
    {
        // Check if a consultation already exists for the patient
        // $create_consultation = Consultation::where('patient_id', $patient_id)->first();
        $dc = Notification::where('patient_id', $patient_id);

        // commented the condition because if the patient comes for 2nd time it should create a new consultation
        // if (!$create_consultation) {
        // If no consultation exists, create a new one
        $create_consultation = new Consultation();
        $create_consultation->patient_id = $patient_id;
        $create_consultation->doctor_id = "0";
        $create_consultation->status = '0';
        $create_consultation->assistant_id = session('rexkod_digitaldrclinic_assistant_id');
        $create_consultation->health_problem = $request->health_problem;
        $create_consultation->speciality = $request->speciality;
        $create_consultation->save();
        // }

        $data = [
            'create_consultation' => $create_consultation,
            'patient_id' => $patient_id
        ];

        return redirect('assistants/video_call/' . $create_consultation->id)->with('success', "Please wait for the doctor!");

    }


    // public function start_consultation_for_patient2($patient_id, $doctors_id)
    // {
    //     $create_consultation2 = $this->assistantModel->create_consultation2($patient_id, $doctors_id);
    //     $_SESSION['success'] = "Please wait for the doctor! ";

    //     redirect('assistants/video_call/' . $create_consultation2);
    // }
    public function video_call($id)
    {
        $doctor_id = session('patient_data')['doctors_id'] ?? null;


        $create_consultation = Consultation::where('id', $id)->first();
        $onlineDoc = Online_doctor::where('online', 1)->get();
        $authPatient = Auth::where('id', $create_consultation->patient_id)->where('type', 'patient')->first();


        $notification = new Notification([
            'auth_type' => 'doctor',
            // 'to_auth_id' => $doc->doctor_id,
            'notification_type' => 'Video Consultation',
            'notification' => $authPatient->name . ' is waiting for consultation',
            'from_auth_id' => null,
            'from_auth_id_assistant' => session('rexkod_digitaldrclinic_assistant_id'),
            'from_auth_id_patient' => $authPatient->id,
            'status' => null,
            'doctor_id' => $doctor_id
        ]);
        $notification->save();



        $consultation_id = $id;
        $data = [
            'consultation_id' => $consultation_id,
            'authPatient' => $authPatient
        ];
        return view('assistants/video_call', $data);
    }

    public function show_prescription($consultation_id)
    {
        $notaccept = Consultation::where('id', $consultation_id)->where('doctor_id', 0)->where('status', 0)->first();

        if ($notaccept) {

            return redirect()->back()->with('error', 'Are sure want to cut this call...');
        }

        $data = [
            'consultation_id' => $consultation_id,
        ];
        return view('assistants/show_prescription', $data);
    }

    public function dependent($id)
    {

        $data = [
            'id' =>  $id,
        ];
        return view('assistants/dependent', $data);
    }
    public function add_dependent($id)
    {

        $data = [
            'id' => $id,
        ];
        return view('assistants/add_dependent', $data);
    }

    public function dependent_data(Request $req)
    {
        $result = new Dependent();
        $result->f_name = $req->f_name;
        $result->l_name = $req->l_name;
        $result->relative_name = $req->relative_name;
        $result->gender = $req->gender;
        $result->date_of_birth = $req->date_of_birth;
        $result->patient_id = $req->patient_id;
        $result->save();

        if ($result) {

            return redirect('assistants/dependent/' . $req->patient_id)->with('success', "Dependent added Successfully");
        } else {

            return  redirect('assistants/add_dependent/' . $req->patient_id)->with('success', "Failed To Add Dependent Try Again");
        }
    }
    public function getConsultationStatus($consultation_id)
    {

        $consultation = Consultation::find($consultation_id);

        if ($consultation) {
            return response()->json(['status' => $consultation->status]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Consultation not found'], 404);
        }
    }

    public function doctor_profile($id)
    {
        $get_doctors_data = Doctor::where('id', $id)->first();
        $data = [
            'get_doctors_data' => $get_doctors_data
        ];
        return view('assistants/doctor_profile', $data);
    }

    public function create_invoice2($consultation_id)
    {
        // return $consultation_id;
        $medicines = Stock::where('assistants_id', session('rexkod_digitaldrclinic_assistant_id'))->get();
        $tests = Test::where('status', 1)->get();
        $consultation = Consultation::where('id', $consultation_id)->first();
        $findPatient = Auth::where('id', $consultation->patient_id)->first();
        $patients = Patient::where('auth_id', $findPatient->id)->where('created_by', $consultation->assistant_id)->first();
        $prescription = Prescription::where('consultation_id', $consultation->id)->first();
        $doctor = Doctor::join('auths', 'auths.id', '=', 'doctors.auth_id')
            ->where('auths.id', $consultation->doctor_id)
            ->select('doctors.fname', 'doctors.lname', 'doctors.pricing')
            ->first();

        $prescribed_medicine_ids = explode(', ',$prescription->medicines);
        $prescribed_medicines = Medicine::whereIn('id', $prescribed_medicine_ids)->get();
        $prescribed_medicine_quantity = explode(', ',$prescription->quantity);

        // $prescribed_medicines = Stock::join('medicines','medicines.id', '=', 'stocks.medicine_id')
        // ->whereIn('medicines.id',$prescribed_medicine_ids)
        // ->where('assistants_id',session('rexkod_digitaldrclinic_assistant_id'))
        // ->select('medicines.id','medicines.name','stocks.stock_available')
        // ->get();

        $data = [
            'patients' => $patients,
            'medicines' => $medicines,
            'tests' => $tests,
            'prescription' => $prescription,
            'doctor' => $doctor,
            'prescribed_medicines'=>$prescribed_medicines,
            'prescribed_medicine_quantity'=>$prescribed_medicine_quantity,
        ];
        // return $prescription->consultation_id;
        return view('assistants/create_invoice2', $data);
    }

    public function search_patient(Request $req)
    {
        try {
            $findPatient = Auth::where('id', $req->patient_id)
                ->orWhere('phone', $req->patient_phone)
                ->first();

            if (!$findPatient) {
                return redirect('assistants/create_invoice')->with('success', 'Data Not Matched');
            }
            // $findPatient = Auth::findOrFail($req->patient_id);
            $medicines = Stock::where('assistants_id', session('rexkod_digitaldrclinic_assistant_id'))->get();
            $tests = Test::all();

            $patients = Patient::where('mobile', $findPatient->phone)->where('created_by', $req->assistant_id)->get();
            if ($patients->count() > 0) {
                $data = [
                    'patients' => $patients,
                    'medicines' => $medicines,
                    'tests' => $tests
                ];
                return view('assistants.create_invoice2', $data)->with('success', 'Data Matched');
            }

            return redirect('assistants/create_invoice')->with('success', 'Data Not Matched');
        } catch (ModelNotFoundException $e) {
            return redirect('assistants/create_invoice')->with('success', 'Patient Not Found');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect('assistants/create_invoice')->with('error', 'An error occurred');
        }
    }

    public function store_invoice(Request $req)
    {
        $saveInvoice = new Invoices();
        $saveInvoice->patient_id = $req->patient_id;
        $saveInvoice->assistant_id = $req->assistant_id;
        $saveInvoice->clinic_id = $req->clinic_id;
        $saveInvoice->total_amount = $req->total_amount;
        $saveInvoice->create_date = $req->create_date;
        $saveInvoice->consultation_fee = $req->consultation_fee;
        $saveInvoice->consultation_id = $req->consultation_id;

        // Store medicine-related data as arrays
        $medicines_name = $req->medicine;
        $quantity = $req->quantity;

        foreach ($medicines_name as $key => $medicines) {
            $findMedicine = Medicine::where('name', $medicines)->first();

            if ($findMedicine) {
                $updateStock = Stock::where('medicine_id', $findMedicine->id)->first();

                if ($updateStock) {
                    // Use the quantity directly without imploding and exploding
                    $qty = $quantity[$key];
                    $updateStock->stock_used = $updateStock->stock_used + $qty;
                    $updateStock->stock_available = max(0, $updateStock->quantity - $updateStock->stock_used);

                    $updateStock->save();
                }
            }
        }

        // Store other data as needed
        $saveInvoice->medcine_amount = implode(',', $req->medcine_amount);
        $saveInvoice->payment_mode = $req->payment_mode;
        $saveInvoice->test_amont = implode(',', $req->test_amont);
        $saveInvoice->test_description = implode(',', $req->test_description);
        $saveInvoice->medicines_name = implode(',', $req->medicine);
        $saveInvoice->invoice_test = implode(',', $req->test);
        $saveInvoice->quantity = implode(',', $req->quantity);
        $saveInvoice->amount = implode(',', $req->amount);
        $saveInvoice->description = implode(',', $req->description);
        $saveInvoice->save();

        $consultation = Consultation::where('id', $req->consultation_id)->first();
        $consultation->invoice_status = 1;
        $consultation->save();
        return redirect('assistants/invoices')->with('success', 'Invoice created');
    }

    public function fetchAmount(Request $request)
    {
        $medicineName = $request->input('medicine');

        // Fetch the amount from the Stock table based on the selected medicine
        $amount = Stock::where('medicine_name', $medicineName)->value('medicines_price');

        return response()->json(['amount' => $amount]);
    }

    public function invoice_view($id)
    {
        $invoice_id = $id;
        $get_invoice_data_1 = Invoices::where('id', $id)->first();
        $consultation = Consultation::where('id', $get_invoice_data_1->consultation_id)->first();
        $doctor = Auth::where('id', $consultation->doctor_id)->first();

        $data = [
            'get_invoice_data_1' => $get_invoice_data_1,
            'invoice_id' => $invoice_id,
            'doctor' => $doctor,
        ];

        return view('/assistants/invoice_view', $data);
    }

    public function patient_no2($id, Request $req)
    {

        $data = [
            'id' => $id
        ];
        return view('assistants/patient_no2', $data);
    }

    public function videocall($doctor)
    {

        $data = ['doctor' => $doctor];
        return view('assistants/videocall', $data);
    }

    public function start_consultation_for_patient_doctor($patient_id, $doctor_id)
    {
        // Check if a consultation already exists for the patient
        $create_consultation = Consultation::where('patient_id', $patient_id)->first();
        if (!$create_consultation) {
            // If no consultation exists, create a new one
            $create_consultation = new Consultation();
            $create_consultation->patient_id = $patient_id;
            $create_consultation->doctor_id = '0';
            $create_consultation->status = '0';
            $create_consultation->assistant_id = session('rexkod_digitaldrclinic_assistant_id');
            $create_consultation->save();
        }

        $data = [
            'create_consultation' => $create_consultation,
            'patient_id' => $patient_id
        ];

        return redirect('assistants/video_call/' . $create_consultation->id)->with('success', "Please wait for the doctor!");

    }
    public function labreport()
    {
        return view('assistants/labreport');
    }
    public function search_lab_report(Request $req)
    {
        try {
            $findPatient = Auth::where('id', $req->patient_id)
                ->orWhere('phone', $req->patient_phone)
                ->first();

            if (!$findPatient) {
                return redirect('assistants/labreport')->with('success', 'Data Not Matched');
            }



            $patients = Patient::where('mobile', $findPatient->phone)->where('created_by', $req->assistant_id)->get();
            if ($patients->count() > 0) {
                $data = [
                    'patients' => $patients,

                ];
                return view('/assistants/uploadreport', $data)->with('success', 'Data Matched');
            }

            return redirect('assistants/labreport')->with('success', 'Data Not Matched');
        } catch (ModelNotFoundException $e) {
            return redirect('assistants/labreport')->with('success', 'Patient Not Found');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect('assistants/labreport')->with('error', 'An error occurred');
        }
    }

    public function upload_report(Request $request)
    {
        $find = Patient::find($request->patient_id);

        if ($find) {
            if ($request->hasFile('report_file')) {
                $image = $request->file('report_file')->move('uploads/patients', $request->file('report_file')->getClientOriginalName());
                $find->report_file = $image->getPathName();
            } else {
                $find->report_file = null;
            }

            $find->report_discription = $request->report_discription;
            $find->report_date = $request->report_date;
            $find->save();

            return redirect('/assistants/labreport')->with('success', 'Report Updated successfully');
        } else {
            return redirect()->back()->with('failed', 'Report Not updated');
        }
    }


    public function profileofpatient($id)
    {
        $get_patient1 = Patient::where('id', $id)->first();

        if ($get_patient1) {
            $profiled = Auth::where('email', $get_patient1->email)->first();

            if ($profiled) {
                $get_patient = Consultation::where('patient_id', $profiled->id)->first();

                if ($get_patient) {
                    $doctor = Auth::where('id', $get_patient->doctor_id)->first();
                    $assistant = Auth::where('id', $get_patient->assistant_id)->first();
                    $prescriptions = Prescription::where('consultation_id', $get_patient->id)->first();
                    $invoice = Invoices::where('patient_id', $id)->first();

                    $get_patient_detail = Patient::where('id', $id)->get();

                    $data = [
                        'get_patient_detail' => $get_patient_detail,
                        'doctor' => $doctor,
                        'assistant' => $assistant,
                        'get_patient' => $get_patient,
                        'get_patient1' => $get_patient1,
                        'prescriptions' => $prescriptions,
                        'invoice' => $invoice
                    ];

                    return view('/assistants/profileofpatient', $data);
                }
            }
        }
        return  redirect()->back()->with('success', 'Doctor prescriptions is missing '); // or redirect to an error page, or handle it based on your application's logic

    }


    public function search_doctor(Request $req)
    {
        try {
            $name = $req->doctor_name;
            $gender = $req->doctor_gender;
            $doctor_spic = $req->doctor_spic;

            if ($name != null && $gender == 'male' && $doctor_spic != null) {
                $maleDoctors = Doctor::where('fname', $name)
                    ->where('gender', 'male')
                    ->where('specialization', $doctor_spic)
                    ->where('status', 1)
                    ->get();

                $data = ['maleDoctors' => $maleDoctors];
                return view('/assistants/doctor_details', $data);
            }

            if ($name != null && $gender != null && $doctor_spic != null) {
                $doctorFilter = Doctor::where('fname', $name)
                    ->where('gender', $gender)
                    ->where('specialization', $doctor_spic)
                    ->where('status', 1)
                    ->get();
            } else if ($name == null && $gender != null && $doctor_spic != null) {
                $doctorFilter = Doctor::where('gender', $gender)
                    ->where('specialization', $doctor_spic)
                    ->where('status', 1)
                    ->get();
            } else if ($name == null && $gender == null && $doctor_spic != null) {
                $doctorFilter = Doctor::where('specialization', $doctor_spic)
                    ->where('status', 1)
                    ->get();
            } else if ($name != null && $gender == null && $doctor_spic == null) {
                $doctorFilter = Doctor::where('fname', $name)
                    ->where('status', 1)
                    ->get();
            } else if ($name == null && $gender != null && $doctor_spic == null) {
                $doctorFilter = Doctor::where('gender', $gender)
                    ->where('status', 1)
                    ->get();
            } else {

                return redirect()->back()->with('success', 'Data not Found');
            }

            if ($doctorFilter->isEmpty()) {


                return redirect()->back()->with('success', 'Data not Found');
            }

            $data = ['maleDoctors' => $doctorFilter];
            return view('/assistants/doctor_details', $data);
        } catch (\Exception $e) {

            return redirect()->back()->with('success', 'Data not Found');
        }
    }


    // public function show_prescription_details($id){

    //     $invoice = Invoices::where('id',$id)->first();
    //     $digital=Digitaldrclininc_center::where('id',$invoice->clinic_id)->first();
    //     $detailsof= Patient::where('patient_id',session('rexkod_digitaldrclinic_patient_id'))->first();

    //         $data=[
    //         'invoice'=>$invoice,
    //         'digital' =>$digital,
    //         'detailsof'=> $detailsof
    //     ];

    //     return view('patients/show_prescription',$data);
    //    }

    public function show_piscription($id)
    {
        $invoice = Invoices::where('patient_id', $id)->first();


        return view('/assistants/show_piscription');
    }
    public function stock_description($id)
    {

        $data = [
            'id' => $id,
        ];
        return view('assistants/stock_description', $data);
    }

    public function edit_stock($id)
    {
        $findstock = Stock::where('id', $id)->first();
        $data = [
            'findstock' => $findstock
        ];
        return view('/assistants/edit_stock', $data);
    }

    public function edit_stock_assistance($id, Request $request)
    {
        // Find the Stock model
        $stock = Stock::find($id);

        // Handle file upload
        if ($request->hasFile('medicine_photo')) {
            $photoPath = $request->file('medicine_photo')->move('uploads/medicine', $request->file('medicine_photo')->getClientOriginalName());
            $stock->medicine_photo = $photoPath;
        }

        // Retrieve Medicine information
        $get_medicines = Medicine::find($request->medicinename);

        // Update Stock model
        $stock->medicines_price = $request->medicines_price;
        $stock->medicine_id = $request->medicinename;
        $stock->medicine_name = $get_medicines->name;
        $stock->quantity = $request->quantity;
        $stock->batch_number = $request->batchnumber;
        $stock->expiry_date = $request->expiry_date;

        $stock->assistants_id = session('rexkod_digitaldrclinic_assistant_id');

        // Save the Stock model
        $stock->save();

        // Check if the save was successful
        if ($stock) {
            return redirect('assistants/stock')->with('success', 'Stocks updated successfully');
        } else {
            return redirect('assistants/add_stock')->with('error', 'Failed to update stocks. Try again');
        }
    }


    public function changePasswordassistants(Request $req)
    {
        $assistant = Auth::where('id', session('rexkod_digitaldrclinic_assistant_id'))->first();

        if ($assistant) {
            $oldPassword = $assistant->password;
            $oldPassword1 = $req->old_password;


            if (Hash::check($oldPassword1, $oldPassword)) {
                if ($req->new_password === $req->confirm_password) {
                    $newPassword = bcrypt($req->new_password);
                    $assistant->update(['password' => $newPassword]);
                    $authDoc = Auth::where('id', $assistant->id)->where('type', 'assistant')->first();
                    $authDoc->update(['password' => $newPassword]);

                    Session::flash('success', 'Password updated');
                    return view('/assistants/change_password');
                } else {
                    Session::flash('failed', 'New passwords entered are not matching');
                    return view('/assistants/change_password');
                }
            } else {
                Session::flash('failed', 'Incorrect Old Password');
                return view('/assistants/change_password');
            }
        } else {
            Session::flash('failed', 'Doctor not registered');
            return view("/assistants/change_password");
        }
        return view("/assistants/change_password");
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
            } else {
            }
        }

        // Assign the generated file names to the model attributes
        $assistant->cancelled_cheque = $fileNames['cancelled_cheque'] ?? $assistant->cancelled_cheque;
        $assistant->photo = $fileNames['photo'] ??  $assistant->photo;
        $assistant->aadhar_card = $fileNames['aadhar_card'] ??  $assistant->aadhar_card;
        $assistant->pan_card = $fileNames['pan_card'] ?? $assistant->pan_card;

        // Save the Assistant model
        $assistant->save();



        // Redirect to the appropriate page with success message
        Session::flash('success', 'Assistant updated Successful');
        if ($assistant->save()) {
            return redirect('/assistants/login')->with('success', 'Assistant updated Successful');
        } else {
            return redirect()->back()->with('error', 'Failed To Register. Try Again');
        }
    }

    //   public function saveWebProfile($id, Request $req){
    //     if ($req->has('image')) {
    //         $updateProfilePic = Patient::where('patient_id', $id)->first();
    //         $updateProfilePic->image = $req->image;
    //         $updateProfilePic->save();

    //         return response()->json(['message' => 'Image saved successfully']);
    //     } else {
    //         return response()->json(['error' => 'Image data not found in the request'], 400);
    //     }
    // }
    public function saveWebProfile($id, Request $req)
    {
        $updateProfilePic = Patient::where('patient_id', $id)->first();

        try {
            if ($req->has('captured_image_data')) {
                if (preg_match('/^data:image\/(.*?);base64,/', $req->captured_image_data, $matches)) {
                    $imageExtension = $matches[1];
                    $fileName = 'uploads/patients/captured_image_' . time() . '.' . $imageExtension;
                    file_put_contents($fileName, base64_decode(preg_replace('/^data:image\/(.*?);base64,/', '', $req->captured_image_data)));
                    $updateProfilePic->image = $fileName;
                } else {
                    throw new \Exception('Invalid image data format.');
                }
            }
            $updateProfilePic->save();
            return response()->json(['success' => 'Profile Img Update']);
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function viewTest($id)
    {
        $test = Test::find($id);
        return view('assistants.view_test', ['test' => $test]);
    }
}
