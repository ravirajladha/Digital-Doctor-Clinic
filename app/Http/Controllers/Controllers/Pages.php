<?php

namespace App\Http\Controllers;

use App\Models\Contact_us;
use App\Models\Doctor;
use App\Models\Feedback;
use App\Models\Newsroom;
use App\Models\Ngo;
use App\Models\Ngo_data;
use App\Models\Social_media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Auth;
use App\Models\Camp_request;
use App\Models\Specialities;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

class Pages extends Controller
{

    public function info_page()
    {

        return view('pages/info_page');
    }
    public function about_us()
    {
        return view('pages/about_us');
    }
    public function contact_us()
    {
        return view('pages/contact_us');
    }
    public function doctor_register()
    {
        $specilaties = Specialities::all();
        return view('pages/doctor_register')->with('specilaties', $specilaties);
    }



    public function index()
    {
        $get_feedbacks = Feedback::all();
        $newsdata = Newsroom::where('status', 1)->get();
        $socialmedia = Social_media::all();
        $data = [
            'get_feedbacks' => $get_feedbacks,
            'newsdata' => $newsdata,
            'socialmedia' => $socialmedia
        ];
        return view('pages/index', $data);
    }


    public function feedback()
    {
        $get_feedbacks = Feedback::all();

        $data = [
            'get_feedbacks' => $get_feedbacks,
        ];

        return view('pages/feedback', $data);
    }
    public function add_feedback(Request $req)
    {

        $rating = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_academic_' . $i])) {
                $rating = $i;
                break;
            }
        }

        $result = new Feedback();
        $result->name = $req->name;
        $result->rating = $rating;
        $result->comments = $req->comments;
        $result->save();
        $_SESSION['success'] = "Your Feedback Submitted successfully";

        return redirect('pages/feedback')->with('success', 'Your Feedback Submitted successfully');
    }



    public function add_contact(Request $req)
    {
        $result = new Contact_us();
        $result->phone_number = $req->phone_number;
        $result->name = $req->name;
        $result->email = $req->email;
        $result->subject = $req->subject;
        $result->comment = $req->comment;
        $result->save();


        return redirect('pages/contact_us')->with('success', 'Your Details Submitted successfully');
    }

    public function newsroom()
    {
        $newdata = Newsroom::all();

        $data = [
            'newdata' => $newdata
        ];
        return view('pages/newsroom', $data);
    }

    public function ngoregistration()
    {

        return view('/pages/ngoregistration');
    }


    public function add_ngo_data(Request $req)
    {
        $validation = Validator::make($req->all(), [
            "name" => "required",
            "email" => "required",
            "mobile" => "required|integer|digits:10",
            "village_ngo" => "required",
            "city" => "required",
            "state" => "required",
            "pincode" => "required",
            "ngo_certificate_file" => "required",
            "mouRadio1" => "required",
            "darpanRadio" => "required",
            "darpanRadio1" => "required",
            "relationship_certificate" => "required",
            "fcra" => "required",
            "ngo_achievement" => "required",
            "direactor_aadhar" => "required",
            "direactor_pan" => "required",
            "direactor_photo" => "required",
            "nogtypework" => "required",
            "ngo_exp" => "required",
            "declearation_about_ngo" => "required",
            "ngo_password" => "required",
        ],[
            "name.required" => "Please enter your name",
            "email.required" => "Please enter your email address",
            "mobile.required" => "Please enter your mobile number",
            "mobile.digits" => "Please enter 10 digits for mobile number",
            "mobile.integer" => "mobile should only contain numbers",
            "village_ngo.required" => "Please enter your town/village",
            "city.required" => "Please enter your city",
            "state.required" => "Please your state",
            "pincode.required" => "Pincode is required",
            "ngo_certificate_file.required" => "Please upload NGO Certificate",
            "mouRadio1.required" => "Please select an option for Bye-Laws Document",
            "darpanRadio.required" => "Please mention if your Ngo is registered in NGO Darpan",
            "darpanRadio1.required" => "Please mention if you have 80G registration",
            "relationship_certificate.required" => "Please mention if you have health related experience",
            "fcra.required" => "Please mention if you have registered with fcra",
            "ngo_achievement.required" => "Please mention your ngo achievement",
            "direactor_aadhar.required" => "Please upload your aadhar",
            "direactor_pan.required" => "Please upload your pan",
            "direactor_photo.required" => "Please upload your photo",
            "nogtypework.required" => "Please enter in which district you want to work in",
            "ngo_exp.required" => "Please enter years of experience in NGO",
            "declearation_about_ngo.required" => "Please describe your NGO experience",
            "ngo_password.required" => "Please enter a password",
        ]);
        if($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput()->with('failed', $validation->errors()->first());
        }
        try {
            DB::beginTransaction();

            // Check if email or phone
            $checkmail = Auth::where('email', $req->email)->first();
            $checkphone = Auth::where('phone', $req->mobile)->first();

            if ($checkphone) {
                return redirect()->back()->with('error', 'Error: This Phone Number already registered..');
            }

            if ($checkmail) {
                return redirect()->back()->with('error', 'Error: This email is already registered..');
            }

            $auth = new Auth();
            $auth->name = $req->name;
            $auth->type = 'ngo';
            $auth->email = $req->email;
            $auth->phone = $req->mobile;
            $auth->password = bcrypt($req->ngo_password);
            $auth->status = null;
            $auth->save();
            $findid = Auth::where('email', $req->email)->first();
            $savengo = new Ngo_data();
            if ($req->hasFile('ngo_certificate_file')) {
                $ngo_certificate = $req->file('ngo_certificate_file')->move('uploads/ngo', $req->file('ngo_certificate_file')->getClientOriginalName());
            } else {

                $ngo_certificate = null;
            }

            if ($req->hasFile('fact_certificate_file')) {
                $fact_certificate = $req->file('fact_certificate_file')->move('uploads/ngo', $req->file('fact_certificate_file')->getClientOriginalName());
            } else {

                $fact_certificate = null;
            }

            if ($req->hasFile('ngo_registor_certificate_file')) {
                $ngo_registor_certificate = $req->file('ngo_registor_certificate_file')->move('uploads/ngo', $req->file('ngo_registor_certificate_file')->getClientOriginalName());
            } else {

                $ngo_registor_certificate = null;
            }
            if ($req->hasFile('g_reg80_file')) {
                $g_reg80 = $req->file('g_reg80_file')->move('uploads/ngo', $req->file('g_reg80_file')->getClientOriginalName());
            } else {

                $g_reg80 = null;
            }
            if ($req->hasFile('relationship_certificate_file')) {
                $relationship_certificate = $req->file('relationship_certificate_file')->move('uploads/ngo', $req->file('relationship_certificate_file')->getClientOriginalName());
            } else {

                $relationship_certificate = null;
            }
            if ($req->hasFile('fcra_file')) {
                $fcra = $req->file('fcra_file')->move('uploads/ngo', $req->file('fcra_file')->getClientOriginalName());
            } else {

                $fcra = null;
            }
            if ($req->hasFile('ngo_achievement_file')) {
                $ngo_achievement = $req->file('ngo_achievement_file')->move('uploads/ngo', $req->file('ngo_achievement_file')->getClientOriginalName());
            } else {
                $ngo_achievement = null;
            }
            if ($req->hasFile('direactor_aadhar')) {
                $direactor_aadhar = $req->file('direactor_aadhar')->move('uploads/ngo', $req->file('direactor_aadhar')->getClientOriginalName());
            } else {

                $direactor_aadhar = null;
            }
            if ($req->hasFile('direactor_pan')) {
                $direactor_pan = $req->file('direactor_pan')->move('uploads/ngo', $req->file('direactor_pan')->getClientOriginalName());
            } else {

                $direactor_pan = null;
            }
            if ($req->hasFile('direactor_photo')) {
                $direactor_photo = $req->file('direactor_photo')->move('uploads/ngo', $req->file('direactor_photo')->getClientOriginalName());
            } else {

                $direactor_photo = null;
            }
            $savengo->ngo_type = $req->ngo_type;
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
            $savengo->ngo_password = bcrypt($req->ngo_password);
            $savengo->ngo_certificate = $ngo_certificate;
            $savengo->fact_certificate = $fact_certificate;
            $savengo->ngo_registor_certificate = $ngo_registor_certificate;
            $savengo->g_reg80 = $g_reg80;
            $savengo->relationship_certificate = $relationship_certificate;
            $savengo->ngo_exp = $req->ngo_exp;
            $savengo->declearation_about_ngo = $req->declearation_about_ngo;
            $savengo->direactor_aadhar = $direactor_aadhar;
            $savengo->direactor_pan = $direactor_pan;
            $savengo->direactor_photo = $direactor_photo;
            $savengo->nogtypework = $req->nogtypework;
            $savengo->block_name = $req->block_name;
            $savengo->fcra = $fcra;
            $savengo->ngo_achievement = $ngo_achievement;
            $savengo->auth_id = $findid->id;
            $savengo->save();
            DB::commit();
            return redirect('pages/ngoregistration')->with('success', 'Registration Successful');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('success', 'Please check entered data again.');
        }
    }

    public function doctorRegister(Request $req)
    {
        $checkmail = Auth::where('email', $req->email)->first();

        if ($checkmail) {
            return redirect()->back()->with('success', 'Email already exists');
        }

        $checkEmail = Doctor::where('email', $req->email)->first();
        if ($checkEmail) {
            session()->put('failed', 'Email already exists');
            return redirect('/pages/doctor_register');
        }
        $auth = new Auth();
        $auth->name = $req->fname;
        $auth->type = 'doctor';
        $auth->email = $req->email;
        $auth->phone = $req->phone;
        $auth->password = bcrypt($req->password);
        $auth->status = 0;

        $auth->save();
        $findid = Auth::where('email', $req->email)->first();


        $doctor = new Doctor();

        if ($req->hasFile('photo')) {
            $photo = $req->file('photo')->move('uploads/doctor', $req->file('photo')->getClientOriginalName());
            $doctor->photo = $photo;
        } else {

            $photo = 'assets/img/doctorimg.png';
            $doctor->photo = $photo;
        }

        // Handle GST file upload
        if ($req->hasFile('gst')) {
            $gst = $req->file('gst')->move('uploads/doctor', $req->file('gst')->getClientOriginalName());
            $doctor->gst =   $gst;
        } else {
            $doctor->gst = null;
        }


        // Handle Aadhar Card file upload
        if ($req->hasFile('aadhar_card')) {
            $aadharCard = $req->file('aadhar_card')->move('uploads/doctor', $req->file('aadhar_card')->getClientOriginalName());
            $doctor->aadhar_card = $aadharCard;
        } else {
            $doctor->aadhar_card = null;
        }

        // Handle MCI Certificate file upload
        if ($req->hasFile('mci_certificate')) {
            $mciCertificate = $req->file('mci_certificate')->move('uploads/doctor', $req->file('mci_certificate')->getClientOriginalName());
            $doctor->mci_certificate = $mciCertificate;
        } else {
            $doctor->mci_certificate = null;
        }



        // Handle SMC Certificate file upload
        if ($req->hasFile('smc_certificate')) {
            $smcCertificate = $req->file('smc_certificate')->move('uploads/doctor', $req->file('smc_certificate')->getClientOriginalName());
            $doctor->smc_certificate = $smcCertificate;
        } else {
            $doctor->smc_certificate = null;
        }

        // Handle Bachelor Document file upload
        if ($req->hasFile('bachelor_document')) {
            $bachelorDocument = $req->file('bachelor_document')->move('uploads/doctor', $req->file('bachelor_document')->getClientOriginalName());
            $doctor->bachelor_document = $bachelorDocument;
        }

        // Handle Master Document file upload
        if ($req->hasFile('master_document')) {
            $masterDocument = $req->file('master_document')->move('uploads/doctor', $req->file('master_document')->getClientOriginalName());
            $doctor->master_document = $masterDocument;
        }

        // Handle Experience Letter file upload
        if ($req->hasFile('experience_letter')) {
            $experienceLetter = $req->file('experience_letter')->move('uploads/doctor', $req->file('experience_letter')->getClientOriginalName());
            $doctor->experience_letter = $experienceLetter;
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
        $doctor->status = 0;
        $doctor->auth_id = $findid->id;

        // Save the Doctor model to the database
        $doctor->save();



        if ($doctor) {
            session()->flash('success', 'Thank you!');
            return redirect('/pages/doctor_register');
        } else {
            session()->flash('failed', 'Error occurred!');
            return redirect('/pages/doctor_register');
        }
    }
    public function camp_request()
    {
        return view('/pages/camp_request');
    }
    public function add_camp(Request $req)
    {
        $savecamp = new Camp_request();

        $savecamp->name = $req->name;
        $savecamp->last_name = $req->last_name;
        $savecamp->cmp_date = $req->cmp_date;
        $savecamp->cmp_adr = $req->cmp_adr;
        $savecamp->contact_num = $req->contact_num;
        $savecamp->visitors_cnt = $req->visitors_cnt;
        $savecamp->org_name = $req->org_name;
        $savecamp->visitors_list = $req->visitors_list;
        $savecamp->save();
        return redirect()->back()->with('success', 'Camp Request Submit successfully.');
    }
}
