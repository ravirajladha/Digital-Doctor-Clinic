<?php

use App\Http\Controllers\Admins;
use App\Http\Controllers\Assistants;
use App\Http\Controllers\Doctors;
use App\Http\Controllers\Hospitals;
use App\Http\Controllers\Ngos;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Patients;
use App\Http\Controllers\Representatives;
use App\Http\Controllers\SubAdmins;
use App\Http\Controllers\Subpages;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Ngo;
use App\Models\Page;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/pages/index');
});

//admin group route
Route::prefix('admins')->group(function () {
    Route::get('/login', [Admins::class, 'login']);
    Route::get('/index', [Admins::class, 'index'])->name('admins.index');
    Route::get('/ngo_request', [Admins::class, 'ngoRequest'])->name('admins.ngoRequest');
    Route::get('/ngo_data_view/{id}', [Admins::class, 'ngo_data_view'])->name('admins.showNgoDetail');
    Route::post('/ngoApproval/{id}/{status}', [Admins::class, 'ngoApproval'])->name('admins.ngoApproval');
    Route::get('/representatives', [Admins::class, 'representatives']);
    Route::get('/Representatives_page_view/{id}', [Representatives::class, 'Representatives_page_view']);
    Route::get('/contact_request', [Admins::class, 'contact_request']);
    Route::get('/specialities', [Admins::class, 'specialities']);
    Route::get('/test', [Admins::class, 'test']);
    Route::post('/change_tests_status/{id}/{status}', [Admins::class, 'change_tests_status']);
    Route::get('/medicines', [Admins::class, 'medicines']);
    Route::get('/add_medicine', [Admins::class, 'add_medicine']);
    Route::get('/clinic_hospital', [Admins::class, 'clinic_hospital']);
    Route::get('/add_clinic', [Admins::class, 'add_clinic']);
    Route::get('/Digitaldrclininc_center', [Admins::class, 'Digitaldrclininc_center']);
    Route::get('/add_Digitaldrclininc_center', [Admins::class, 'add_Digitaldrclininc_center']);
    Route::post('/create_Digitaldrclininc_center', [Admins::class, 'create_Digitaldrclininc_center']);
    Route::get('/edit_ddc_center/{id}', [Admins::class, 'edit_ddc_center']);
    Route::post('/update_Digitaldrclininc_center/{id}', [Admins::class, 'update_Digitaldrclininc_center']);
    Route::get('/stock', [Admins::class, 'stock']);
    Route::get('/search_center', [Admins::class, 'search_center']);
    Route::get('/doctors', [Admins::class, 'doctors']);
    Route::get('/add_doctor', [Admins::class, 'add_doctor']);
    Route::get('/assistants', [Admins::class, 'assistants']);
    Route::get('/add_assistant', [Admins::class, 'add_assistant']);
    Route::get('/patients', [Admins::class, 'patients']);
    Route::get('/consultations', [Admins::class, 'consultations']);
    Route::get('/transactions', [Admins::class, 'transactions']);
    Route::get('/invoice_report', [Admins::class, 'invoice_report']);
    Route::get('/admin_profile', [Admins::class, 'admin_profile']);
    Route::get('/newsroom', [Admins::class, 'newsroom']);
    Route::get('/newsroomdetails', [Admins::class, 'newsroomdetails']);
    Route::get('/edit_newsdetails/{id}', [Admins::class, 'edit_newsdetails']);
    Route::get('/socialmedia', [Admins::class, 'socialmedia']);
    Route::get('/get_clinic_by_id/{id}', [Admins::class, 'get_clinic_by_id']);
    Route::get('/get_assistant_by_id/{id}', [Admins::class, 'get_assistant_by_id']);
    Route::get('/add_test', [Admins::class, 'add_test']);
    Route::get('/view_doctor_register/{id}', [Admins::class, 'view_doctor_register'])->name('admin.view_doctor_register');
    Route::get('/edit_doctor_register/{id}', [Admins::class, 'edit_doctor_register'])->name('admin.edit_doctor_register');
    Route::get('/patient_profile/{id}', [Admins::class, 'patient_profile']);
    Route::get('/invoice/{id}', [Admins::class, 'invoice']);
    Route::post('/update_news/{id}', [Admins::class, 'update_news']);
    Route::get('/deleteNewroom/{id}', [Admins::class, 'deleteNewroom']);
    Route::post('/update_test', [Admins::class, 'update_test']);
    Route::get('/deleteTest/{id}', [Admins::class, 'deleteTest']);
    Route::post('/update_medicine', [Admins::class, 'update_medicine']);
    Route::get('/deleteMedicine/{id}', [Admins::class, 'deleteMedicine']);
    Route::get('/edit_clinic/{id}', [Admins::class, 'edit_clinic']);
    Route::get('/delte_clinic/{id}', [Admins::class, 'delete_clinic']);
    Route::post('/update_clinic', [Admins::class, 'update_clinic']);
    Route::get('/get_assistant_edit/{id}', [Admins::class, 'get_assistant_edit']);
    Route::get('/delete_Patients/{id}', [Admins::class, 'delete_Patients']);
    Route::get('/updatepatients/{id}', [Admins::class, 'updatepatients']);
    Route::get('/ddccenterview/{id}', [Admins::class, 'ddccenterview']);
    Route::post('/admin_personal_details/{id}', [Admins::class, 'admin_personal_details']);
    Route::post('/updateAssistant/{id}', [Admins::class, 'updateAssistant']);
    Route::get('/patient_profile_edit/{id}', [Admins::class, 'patient_profile_edit']);
    Route::post('/updatePatientsbyadmin/{id}', [Admins::class, 'updatePatientsbyadmin']);
    Route::get('/camp_request', [Admins::class, 'camp_request']);
    Route::get('/vister_details/{id}', [Admins::class, 'vister_details']);
    Route::get('/show_invoice/{id}/{patient_id}', [Admins::class, 'show_invoice']);
    Route::get('/show_prescription/{id}/{patient_id}', [Admins::class, 'show_prescription']);
    Route::get('/sub_admin_reg', [Admins::class, 'sub_admin_reg']);
    Route::post('/create_sub_admins', [Admins::class, 'create_sub_admins']);
    Route::get('/sub_admin_view', [Admins::class, 'sub_admin_view']);
    Route::post('/subAdmin_approval/{id}/{status}', [Admins::class, 'subAdmin_approval'])->name('admins.subAdmin_approval');
    Route::get('/sub_view/{id}', [Admins::class, 'sub_view']);
    Route::get('/sub_admin_edit/{id}', [Admins::class, 'sub_admin_edit']);
    Route::post('/update-sub-admin/{id}', [Admins::class, 'updateSubAdmin']);
    Route::post('/checkEmailExistsddc', [Admins::class, 'checkEmailExistsddc']);
    Route::post('/checkphoneExistsddc', [Admins::class, 'checkphoneExistsddc']);
    Route::get('/view_contact_request/{id}', [Admins::class, 'viewContactRequest']);
    Route::get('/view_medicine/{id}', [Admins::class, 'viewMedicine']);
    Route::get('/view_test/{id}', [Admins::class, 'viewTest']);
    Route::get('/ngo_data_edit/{id}', [Admins::class, 'ngo_data_edit']);
    Route::get('/Representatives_page_edit/{id}', [Representatives::class, 'Representatives_page_edit']);
    Route::post('/uploads_registerRepresentative/{id}', [Representatives::class, 'uploads_registerRepresentative']);
    Route::get('/representative_approval/{id}/{status}', [Admins::class, 'representative_approval']);
});
Route::post('/create_speciality', [Admins::class, 'create_speciality']);
Route::post('/create_medicine_admin', [Admins::class, 'create_medicine_admin']);
Route::post('/medicine_status/{id}/{status}', [Admins::class, 'medicine_status']);
Route::post('/change_clinic_status/{id}/{status}', [Admins::class, 'change_clinic_status']);
Route::post('/create_clinic', [Admins::class, 'create_clinic']);
Route::post('/doctorRegisterByAdmin', [Admins::class, 'doctorRegisterByAdmin']);
Route::post('/change_assistant_status/{id}/{status}', [Admins::class, 'change_assistant_status']);
Route::post('/create_assistant', [Admins::class, 'create_assistant']);
Route::post('/create_news', [Admins::class, 'create_news']);
Route::post('/updateSocialmedia', [Admins::class, 'updateSocialmedia']);
Route::post('/updateStatus', [Admins::class, 'toUpdateStatus']);
Route::post('/create_test_admin', [Admins::class, 'create_test_admin']);
Route::get('/doctors/doctor_approval/{id}/{status}', [Admins::class, 'doctor_approval']);
Route::get('/deleteSpecialities/{id}', [Admins::class, 'deleteSpecialities']);
Route::post('/update_speciality', [Admins::class, 'update_speciality']);
Route::post('/pincode', [Admins::class, 'pincode']);
Route::get('/unique_mobile_number_assistance', [Admins::class, 'unique_mobile_number_assistance']);
Route::get('/unique_mobile_number_patient', [Admins::class, 'unique_mobile_number_patient']);
Route::get('/unique_mobile_number', [Admins::class, 'unique_mobile_number']);
Route::get('/unique_email', [Admins::class, 'unique_email']);
Route::post('/update_doctor_register/{id}', [Admins::class, 'update_doctor_register']);
Route::get('/unique_mobile_number_dis', [Subpages::class, 'uniqueMobileNumberDis']);
Route::get('/unique_email_dis', [Subpages::class, 'uniqueEmailDis']);
Route::get('/representatives_number', [Admins::class, 'getRepresentativePhoneNumber']);
Route::get('/getassistnacePhoneNumber', [Admins::class, 'getassistnacePhoneNumber']);
Route::get('view_ngo_certificate_data/{id}', [Admins::class, 'view_ngo_certificate_data'])->name('view_ngo_certificate_data');



Route::post('/update_doctor_password/{doctor_id}', [Admins::class, 'update_doctor_password']);


//-----------------Pages--------------------------
Route::get('/', [Pages::class, 'index']);
Route::get('/pages/info_page', [Pages::class, 'info_page']);
Route::get('/pages/feedback', [Pages::class, 'feedback']);
Route::post('/add_feedback', [Pages::class, 'add_feedback'])->name('add_feedback');
Route::get('/pages/about_us', [Pages::class, 'about_us'])->name('about_us');
Route::get('/pages/contact_us', [Pages::class, 'contact_us']);
Route::post('/add_contact', [Pages::class, 'add_contact'])->name('add_contact');
Route::get('/pages/newsroom', [Pages::class, 'newsroom'])->name('newsroom');
Route::get('/pages/ngoregistration', [Pages::class, 'ngoregistration']);
Route::post('/add_ngo_data', [Pages::class, 'add_ngo_data'])->name('add_ngo_data');
Route::get('/pages/doctor_register', [Pages::class, 'doctor_register']);
Route::post('/doctorRegister', [Pages::class, 'doctorRegister'])->name('doctorRegister');
Route::view('subpages/Pathology', 'subpages/Pathology');
Route::view('subpages/PharmacyFacility', 'subpages/PharmacyFacility');
Route::view('subpages/HealthCare', 'subpages/HealthCare');
Route::view('subpages/InHouseVirtually', 'subpages/InHouseVirtually');
Route::view('pages/career', 'pages/career');
Route::view('subpages/PLATELETS', 'subpages/PLATELETS');
Route::view('subpages/CBC', 'subpages/CBC');
Route::view('/subpages/DLC', 'subpages/DLC');
Route::view('subpages/DiabetesTest', 'subpages/DiabetesTest');
Route::view('/subpages/Hemoglobin', 'subpages/Hemoglobin');
Route::view('/subpages/WIDAL', 'subpages/WIDAL');
Route::view('/subpages/WIDAL', 'subpages/WIDAL');
Route::view('/subpages/ECG', 'subpages/ECG');
Route::view('/subpages/DENGUE', 'subpages/DENGUE');
Route::view('/subpages/EKG', 'subpages/EKG');
Route::view('/subpages/TLC', 'subpages/TLC');
Route::get('/pages/camp_request', [Pages::class, 'camp_request']);
Route::post('/pages/add_camp', [Pages::class, 'add_camp']);



//-------------------registerPage---------------------------------------------------
Route::get('/representatives/representatives_reg', [Representatives::class, 'representatives_reg']);
Route::post('/registerRepresentative', [Representatives::class, 'registerRepresentative'])->name('registerRepresentative');

//--------------------------Admin-----------------------------------
Route::post('admin_login', [Admins::class, 'admin_login']);
Route::match(['get', 'post'], 'logout', [Admins::class, 'logout']);












//------------------Sub_Admin---------------------------

Route::get('/sub_admins/login', [SubAdmins::class, 'login']);
Route::post('/sub_admins/sub_admin_login', [SubAdmins::class, 'sub_admin_login']);
Route::get('/sub_admins/index', [SubAdmins::class, 'index']);
Route::get('/sub_admins/ngo_request', [SubAdmins::class, 'ngo_request']);
Route::get('/sub_admins/ngo_data_view/{id}', [SubAdmins::class, 'ngo_data_view']);
Route::post('/sub_admins/ngoApproval/{id}/{status}', [SubAdmins::class, 'ngoApproval'])->name('sub_admins.ngoApproval');
Route::get('/sub_admins/representatives', [SubAdmins::class, 'representatives']);
Route::get('/sub_admins/contact_request', [SubAdmins::class, 'contact_request']);
Route::get('/sub_admins/specialities', [SubAdmins::class, 'specialities']);
Route::post('/create_speciality', [SubAdmins::class, 'create_speciality']);
Route::get('/sub_admins/test', [SubAdmins::class, 'test']);
Route::post('/sub_admins/change_tests_status/{id}/{status}', [SubAdmins::class, 'change_tests_status']);
Route::get('/sub_admins/medicines', [SubAdmins::class, 'medicines']);
Route::get('/sub_admins/add_medicine', [SubAdmins::class, 'add_medicine']);
Route::post('sub_admins/create_medicine_admin', [SubAdmins::class, 'create_medicine_admin']);
Route::post('sub_admins/medicine_status/{id}/{status}', [SubAdmins::class, 'medicine_status']);
Route::get('/sub_admins/clinic_hospital', [SubAdmins::class, 'clinic_hospital']);
Route::post('/sub_admins/change_clinic_status/{id}/{status}', [SubAdmins::class, 'change_clinic_status']);
Route::get('/sub_admins/add_clinic', [SubAdmins::class, 'add_clinic']);
Route::post('/sub_admins/create_clinic', [SubAdmins::class, 'create_clinic']);
Route::get('/sub_admins/Digitaldrclininc_center', [SubAdmins::class, 'Digitaldrclininc_center']);
Route::get('/sub_admins/add_Digitaldrclininc_center', [SubAdmins::class, 'add_Digitaldrclininc_center']);
Route::post('/sub_admins/create_Digitaldrclininc_center', [SubAdmins::class, 'create_Digitaldrclininc_center']);
Route::get('/sub_admins/edit_ddc_center/{id}', [SubAdmins::class, 'edit_ddc_center']);
Route::post('/sub_admins/update_Digitaldrclininc_center/{id}', [SubAdmins::class, 'update_Digitaldrclininc_center']);
Route::get('/sub_admins/stock', [SubAdmins::class, 'stock']);
Route::get('/sub_admins/search_center', [SubAdmins::class, 'search_center']);
Route::get('sub_admins/doctors', [SubAdmins::class, 'doctors']);
Route::get('/sub_admins/add_doctor', [SubAdmins::class, 'add_doctor']);
Route::post('/sub_admins/doctorRegisterByAdmin', [SubAdmins::class, 'doctorRegisterByAdmin']);
Route::get('/sub_admins/assistants', [SubAdmins::class, 'assistants']);
Route::post('sub_admins/change_assistant_status/{id}/{status}', [SubAdmins::class, 'change_assistant_status']);
Route::get('/sub_admins/add_assistant', [SubAdmins::class, 'add_assistant']);
Route::post('/sub_admins/create_assistant', [SubAdmins::class, 'create_assistant']);
Route::get('/sub_admins/patients', [SubAdmins::class, 'patients']);
Route::get('sub_admins/consultations', [SubAdmins::class, 'consultations']);
Route::get('/sub_admins/transactions', [SubAdmins::class, 'transactions']);
Route::get('/sub_admins/invoice_report', [SubAdmins::class, 'invoice_report']);
Route::get('/sub_admins/admin_profile', [SubAdmins::class, 'admin_profile']);
Route::get('/sub_admins/newsroom', [SubAdmins::class, 'newsroom']);
Route::post('/sub_admins/create_news', [SubAdmins::class, 'create_news']);
Route::get('/sub_admins/newsroomdetails', [SubAdmins::class, 'newsroomdetails']);
Route::get('/sub_admins/edit_newsdetails/{id}', [SubAdmins::class, 'edit_newsdetails']);
Route::get('/sub_admins/socialmedia', [SubAdmins::class, 'socialmedia']);
Route::post('sub_admins/updateSocialmedia', [SubAdmins::class, 'updateSocialmedia']);
Route::post('/sub_admins/updateStatus', [SubAdmins::class, 'toUpdateStatus']);
Route::get('/sub_admins/get_clinic_by_id/{id}', [SubAdmins::class, 'get_clinic_by_id']);
Route::get('/sub_admins/get_assistant_by_id/{id}', [SubAdmins::class, 'get_assistant_by_id']);
Route::get('/sub_admins/add_test', [SubAdmins::class, 'add_test']);
Route::post('/sub_admins/create_test_admin', [SubAdmins::class, 'create_test_admin']);
Route::get('/sub_admins/view_doctor_register/{id}', [SubAdmins::class, 'view_doctor_register'])->name('view_doctor_register');
Route::get('/sub_admins/edit_doctor_register/{id}', [SubAdmins::class, 'edit_doctor_register'])->name('edit_doctor_register');
Route::get('/sub_admins/doctor_approval/{id}/{status}', [SubAdmins::class, 'doctor_approval']);
Route::get('/sub_admins/patient_profile/{id}', [SubAdmins::class, 'patient_profile']);
Route::get('/sub_admins/deleteSpecialities/{id}', [SubAdmins::class, 'deleteSpecialities']);
Route::post('sub_admins/update_speciality', [SubAdmins::class, 'update_speciality']);
Route::post('/pincode', [SubAdmins::class, 'pincode']);
Route::get('/unique_mobile_number_assistance', [SubAdmins::class, 'unique_mobile_number_assistance']);
Route::get('/unique_mobile_number_patient', [SubAdmins::class, 'unique_mobile_number_patient']);
Route::get('/unique_mobile_number', [SubAdmins::class, 'unique_mobile_number']);

Route::get('/unique_email', [SubAdmins::class, 'unique_email']);
Route::get('/sub_admins/invoice/{id}', [SubAdmins::class, 'invoice']);
Route::post('/sub_admins/update_doctor_register/{id}', [SubAdmins::class, 'update_doctor_register']);
Route::post('/sub_admins/update_news/{id}', [SubAdmins::class, 'update_news']);
Route::get('/sub_admins/deleteNewroom/{id}', [SubAdmins::class, 'deleteNewroom']);
Route::post('/sub_admins/update_test', [SubAdmins::class, 'update_test']);
Route::get('/sub_admins/deleteTest/{id}', [SubAdmins::class, 'deleteTest']);
Route::post('/sub_admins/update_medicine', [SubAdmins::class, 'update_medicine']);
Route::get('/sub_admins/deleteMedicine/{id}', [SubAdmins::class, 'deleteMedicine']);
Route::get('/sub_admins/edit_clinic/{id}', [SubAdmins::class, 'edit_clinic']);
Route::get('/sub_admins/delte_clinic/{id}', [SubAdmins::class, 'delete_clinic']);
Route::post('/update_clinic', [SubAdmins::class, 'update_clinic']);
Route::get('/sub_admins/get_assistant_edit/{id}', [SubAdmins::class, 'get_assistant_edit']);
Route::get('/sub_admins/delete_Patients/{id}', [SubAdmins::class, 'delete_Patients']);
Route::get('/sub_admins/updatepatients/{id}', [SubAdmins::class, 'updatepatients']);
Route::get('/sub_admins/ddccenterview/{id}', [SubAdmins::class, 'ddccenterview']);
Route::post('/sub_admins/admin_personal_details/{id}', [SubAdmins::class, 'admin_personal_details']);
Route::post('/sub_admins/updateAssistant/{id}', [SubAdmins::class, 'updateAssistant']);
Route::get('/unique_mobile_number_dis', [Subpages::class, 'uniqueMobileNumberDis']);
Route::get('/unique_email_dis', [Subpages::class, 'uniqueEmailDis']);
Route::get('/sub_admins/patient_profile_edit/{id}', [SubAdmins::class, 'patient_profile_edit']);
Route::post('/sub_admins/updatePatientsbyadmin/{id}', [SubAdmins::class, 'updatePatientsbyadmin']);
Route::get('/sub_admins/camp_request', [SubAdmins::class, 'camp_request']);
Route::get('/representatives_number', [SubAdmins::class, 'getRepresentativePhoneNumber']);
Route::get('/getassistnacePhoneNumber', [SubAdmins::class, 'getassistnacePhoneNumber']);
Route::get('/sub_admins/vister_details/{id}', [SubAdmins::class, 'vister_details']);
Route::get('/sub_admins/show_invoice/{id}/{patient_id}', [SubAdmins::class, 'show_invoice']);
Route::get('/sub_admins/show_prescription/{id}/{patient_id}', [SubAdmins::class, 'show_prescription']);
Route::get('/sub_admins/sub_admin_reg', [SubAdmins::class, 'sub_admin_reg']);
Route::post('/sub_admins/create_sub_admins', [SubAdmins::class, 'create_sub_admins']);
Route::get('/sub_admins/sub_admin_view', [SubAdmins::class, 'sub_admin_view']);
Route::post('/sub_admins/subAdmin_approval/{id}/{status}', [SubAdmins::class, 'subAdmin_approval'])->name('sub_admins.subAdmin_approval');
Route::get('/sub_admins/sub_view/{id}', [SubAdmins::class, 'sub_view']);
Route::get('/sub_admins/sub_admin_edit/{id}', [SubAdmins::class, 'sub_admin_edit']);
Route::get('/sub_admins/ngo_data_edit/{id}', [SubAdmins::class, 'ngo_data_edit']);
Route::get('view_ngo_certificate_data/{id}', [SubAdmins::class, 'view_ngo_certificate_data'])->name('view_ngo_certificate_data');
Route::post('/sub_admins/sub_admin_personal_details/{id}', [SubAdmins::class, 'sub_admin_personal_details']);
Route::get('/sub_admins/representativesedit/{id}', [SubAdmins::class, 'Representatives_page_edit']);
Route::post('/sub_admins/uploads_registerRepresentative/{id}', [SubAdmins::class, 'uploads_registerRepresentative']);
Route::get('/sub_admins/representativesview/{id}', [SubAdmins::class, 'representatives_page_view']);
Route::get('/sub_admins/representative_approval/{id}/{status}', [SubAdmins::class, 'representative_approval']);

Route::get('/sub_admins/view_contact_request/{id}', [SubAdmins::class, 'viewContactRequest']);
Route::get('/sub_admins/view_medicine/{id}', [SubAdmins::class, 'viewMedicine']);
Route::get('/sub_admins/view_test/{id}', [SubAdmins::class, 'viewTest']);

//--------------End_sub_Admin---------------------------



//-----------------------NGO---------------------------------
Route::post('/ngo_data_update/{id}', [Ngos::class, 'ngo_data_update']);
Route::get('/ngo/login', [Ngos::class, 'login']);
Route::post('/admin_ngo_login', [Ngos::class, 'admin_ngo_login']);
Route::get('/ngo/index', [Ngos::class, 'index']);
Route::get('/ngo/ngo_register', [Ngos::class, 'ngo_register']);
Route::post('/apply_new_reg_clinc', [Ngos::class, 'apply_new_reg_clinc']);
Route::get('/ngo/dashboard', [Ngos::class, 'dashboard']);
Route::get('/ngo/change_password', [Ngos::class, 'change_password']);
Route::post('/ngo/ngo_data_update_profile/{id}', [Ngos::class, 'ngo_data_update_profile']);


//---------------------------Doctor------------------------
Route::get('/doctors/login', [Doctors::class, 'login']);
Route::post('/doctor_login', [Doctors::class, 'admin_doctors_login']);
Route::get('/doctors/my_patients', [Doctors::class, 'my_patients']);
Route::get('/doctors/all_referrals', [Doctors::class, 'all_referrals']);
Route::get('/doctors/test', [Doctors::class, 'test']);
Route::get('/doctors/add_test', [Doctors::class, 'add_test']);
Route::get('/doctors/medicines', [Doctors::class, 'medicines']);
Route::get('/doctors/add_medicine', [Doctors::class, 'add_medicine']);
Route::post('/create_medicine', [Doctors::class, 'create_medicine']);
Route::post('/add_medicine', [Doctors::class, 'add_medicine']);
Route::get('/doctors/doctor_profile_settings', [Doctors::class, 'doctor_profile_settings'])->name('doctorProfileSettings');
Route::post('/doctors/update_doctor_register/{id}', [Doctors::class, 'update_doctor_register']);
Route::get('/doctors/change_password', [Doctors::class, 'change_password']);
Route::get('/doctors/referrals/{patient}/{doctor_id}/{assistant}/{consultation_id}', [Doctors::class, 'referrals']);
Route::post('/doctor/create_test', [Doctors::class, 'create_test']);
Route::get('/doctors/schedule_timings', [Doctors::class, 'schedule_timings']);
// Route::get('/doctors.dashboard',[Doctors::class,'dashboard']);

Route::get('/doctors/view_test/{id}', [Doctors::class, 'viewTest']);
Route::get('/doctors/view_medicine/{id}', [Doctors::class, 'viewMedicine']);

Route::get('/doctors/view_assistant/{id}', [Doctors::class, 'viewAssistantById']);

//-----------------------Hosipital-----------------------
Route::get('/hospitals/login', [Hospitals::class, 'login']);
Route::post('/hospital_login', [Hospitals::class, 'hospital_login']);
Route::get('hospitals/dashboard', [Hospitals::class, 'dashboard']);
Route::get('/hospitals/hospital_profile', [Hospitals::class, 'hospital_profile']);
Route::get('/hospitals/change_password', [Hospitals::class, 'change_password']);
Route::post('//hospitals/changePasswordHospitals', [Hospitals::class, 'changePasswordHospitals']);
Route::get('/hospitals/logout', [Hospitals::class, 'logout'])->name('hospital.logout');
Route::get('/hospitals/referral', [Hospitals::class, 'referral']);
Route::get('/hospitals/doctorprofileto/{id}', [Hospitals::class, 'doctorprofileto']);
Route::get('/hospitals/doctorprofilefrom/{id}', [Hospitals::class, 'doctorprofilefrom']);
Route::get('/hospitals/profileDetails/{id}', [Hospitals::class, 'profileDetails']);
Route::get('/hospitals/show_prescription/{id}/{patient_id}', [Hospitals::class, 'show_prescription']);

//----------------------------Patients------------------
Route::get('/patients/login', [Patients::class, 'login']);
Route::get('/patients/dashboard', [Patients::class, 'dashboard']);
Route::post('/admin_patients_login', [Patients::class, 'admin_patients_login']);
Route::get('/patients/dependent', [Patients::class, 'dependent']);
Route::get('/patients/all_referrals', [Patients::class, 'all_referrals']);
Route::get('/patients/profile_settings', [Patients::class, 'profile_settings']);
Route::get('/patients/show_invoice/{id}', [Patients::class, 'show_invoice']);
Route::get('/patients/show_prescription_details/{id}', [Patients::class, 'show_prescription_details']);
Route::post('/patients/updatePatientsbyadmin/{id}', [Patients::class, 'updatePatientsbyadmin']);

//----------------------------assistants------------------
Route::get('/assistants/login', [Assistants::class, 'login']);
Route::get('/assistants/dashboard', [Assistants::class, 'dashboard']);
Route::post('/admin_Assistants_login', [Assistants::class, 'admin_Assistants_login']);
Route::get('/assistants/view_patients', [Assistants::class, 'view_patients']);
Route::get('/assistants/view_doctors', [Assistants::class, 'view_doctors']);
Route::get('/assistants/patient_no', [Assistants::class, 'patient_no']);
Route::get('/assistants/all_referrals', [Assistants::class, 'all_referrals']);
Route::get('/assistants/test', [Assistants::class, 'test']);
Route::get('/assistants/add_test', [Assistants::class, 'add_test']);
Route::get('/assistants/medicines', [Assistants::class, 'medicines']);
Route::get('/assistants/stock', [Assistants::class, 'stock']);
Route::get('/assistants/add_stock', [Assistants::class, 'add_stock']);
Route::post('/create_stock', [Assistants::class, 'create_stock']);
Route::post('/create_test', [Assistants::class, 'create_test']);
Route::get('/assistants/invoices', [Assistants::class, 'invoices']);
Route::get('/assistants/create_invoice', [Assistants::class, 'create_invoice']);
Route::get('/assistants/profile_settings', [Assistants::class, 'profile_settings']);
Route::get('/assistants/change_password', [Assistants::class, 'change_password']);
Route::get('/assistants/patient_details', [Assistants::class, 'patient_details']);
Route::post('/user_otp_registration', [Assistants::class, 'user_otp_registration']);
Route::get('assistants/show_prescription/{id}', [Assistants::class, 'show_prescription']);
Route::get('/assistants/dependent/{id}', [Assistants::class, 'dependent']);
Route::get('/assistants/add_dependent/{id}', [Assistants::class, 'add_dependent']);
Route::post('/dependent_data', [Assistants::class, 'dependent_data']);
Route::get('/assistants/doctor_profile/{id}', [Assistants::class, 'doctor_profile']);
Route::get('/assistants/create_invoice2/{id}', [Assistants::class, 'create_invoice2']);
Route::post('/search_patient', [Assistants::class, 'search_patient']);
Route::post('/store_invoice', [Assistants::class, 'store_invoice']);
Route::get('/fetch-amount', [Assistants::class, 'fetchAmount'])->name('fetch-amount');
Route::get('/assistants/invoice_view/{id}', [Assistants::class, 'invoice_view']);
Route::get('/assistants/videocall/{id}', [Assistants::class, 'videocall']);
Route::get('/assistants/start_consultation_for_patient_doctor/{patient_id}/{doctors_id}', [Assistants::class, 'start_consultation_for_patient_doctor']);
Route::get('/assistants/labreport', [Assistants::class, 'labreport']);
Route::post('/search_lab_report', [Assistants::class, 'search_lab_report']);
Route::post('/assistants/upload_report', [Assistants::class, 'upload_report']);
Route::get('/profileofpatient/{id}', [Assistants::class, 'profileofpatient']);
Route::get('/assistants/stock_description/{id}', [Assistants::class, 'stock_description']);
Route::get('/assistants/edit_stock/{id}', [Assistants::class, 'edit_stock']);
Route::post('/assistants/edit_stock_assistance/{id}', [Assistants::class, 'edit_stock_assistance']);
Route::post('/assistants/changePasswordAssistants', [Assistants::class, 'changePasswordAssistants']);
Route::post('/assistants/updateAssistant/{id}', [Assistants::class, 'updateAssistant']);
Route::post('/assistants/saveWebProfile/{id}', [Assistants::class, 'saveWebProfile']);

Route::get('/assistants/view_test/{id}', [Assistants::class, 'viewTest']);


//======================================================================================================================================




// -----------------------------Unique check---------------------------------

//---------- Common Panel-----------
//----------------------------------
Route::get('/unique_mobile_number', [Subpages::class, 'unique_mobile_number']);
Route::get('/unique_email', [SubPages::class, 'unique_email']);
Route::get('pincodes', [Subpages::class, 'pincodes']);
Route::get('/uniqueMobileNumberDis', [Subpages::class, 'uniqueMobileNumberDis']);
Route::get('/uniqueEmailDis', [Subpages::class, 'uniqueEmailDis']);


//---------- Home ----------
//--------------------------

//Home -> Info
Route::get('/subpages/KidneyStone', [Subpages::class, 'kidneyStone']);
Route::get('/subpages/Diabetes', [Subpages::class, 'diabetes']);
Route::get('/subpages/Thyroid', [Subpages::class, 'thyroid']);
Route::get('/subpages/Nutrition', [Subpages::class, 'nutrition']);
Route::get('/subpages/Fitness', [Subpages::class, 'fitness']);
Route::get('/subpages/Anxiety', [Subpages::class, 'anxiety']);
Route::get('/subpages/VitaminB12', [Subpages::class, 'vitaminB12']);
Route::get('/subpages/Anaemia', [Subpages::class, 'anaemia']);
Route::get('/subpages/Depression', [Subpages::class, 'depression']);


//---------- Admin Panel -----------
//----------------------------------

//----- Doctors ------
Route::get('/doctor/video_call/{id}', [Doctors::class, 'video_call']);
Route::get('/doctor/voice_call/{id}', [Doctors::class, 'voice_call']);
Route::post('/savePrescription', [Doctors::class, 'savePrescription']);
Route::post('/referralsave', [Doctors::class, 'referralsave']);
Route::get('/doctors/patient_profile/{id}', [Doctors::class, 'patient_profile']);
Route::get('/doctors/voice_call', [Doctors::class, 'voice_call']);
Route::get('/doctors/invoices', [Doctors::class, 'invoices']);
Route::get('/doctors/show_prescription/{consultation_id}', [Doctors::class, 'show_prescription']);


//----- Representatives -----
Route::get('/unique_mobile_number_dis', [Representatives::class, 'uniqueMobileNumberDis']);
Route::get('/unique_email_dis', [Representatives::class, 'uniqueEmailDis']);




//---------- NGO Panel ---------
//------------------------------

//Application
Route::get('ngo/ngo_register/{phone}', [Ngos::class, 'ngo_register']);
Route::get('ngo/ngo_panel_add_representative', [Ngos::class, 'ngo_panel_add_representative']);
Route::get('income_certificate/{id}', [Ngos::class, 'showIncomeCertificateModal']);
//Applicaiton->Form image view routes
Route::get('/income_certificate/{id}/{type}', [Ngos::class, 'images']);
Route::get('/representative_aadharcard/{id}/{type}', [Ngos::class, 'images']);
Route::get('/clinic_location/{id}/{type}', [Ngos::class, 'images']);
Route::get('/pradhan_photo/{id}/{type}', [Ngos::class, 'images']);
Route::get('/annual_income/{id}/{type}', [Ngos::class, 'images']);
Route::post('/ngo/changePasswordNgo', [Ngos::class, 'changePasswordNgo']);
Route::get('/ngo/ngo_profile', [Ngos::class, 'ngo_profile']);

// Route::get('/ngo/includes/show_certificate',[Ngos::class, 'ngo_show_certificate']); --> not used anymore

//Logout
Route::get('ngo/logout', [Ngos::class, 'logout']);


//---------- Assistant Panel ----------
//-------------------------------------
Route::get('assistants/patient_details2/{patient_id}', [Assistants::class, 'patient_details']);
Route::get('/assistants/start_consultation_for_patient/{id}', [Assistants::class, 'start_consultation_for_patient']);
Route::get('/assistants/video_call/{id}', [Assistants::class, 'video_call']);
Route::get('/assistants/show_prescription/{$consultation_id}', [Assistants::class, 'show_prescription']);
//Consultation
Route::get('/unique_mobile_number_assistant_patient', [Assistants::class, 'unique_mobile_number_assistant_patient']);
Route::post('/assistants/update_patients/{phone}', [Assistants::class, 'update_patient']);
// Route::get('/assistants/video_call/{mobile}', [Assistants::class, 'videoCall'])->name('assistantVideoConsultation');
Route::get('assistants/consultation/startconsultation', function () {
    return view('assistants/consultation/startconsultation');
});
//Logout
Route::get('/assistants/logout', [Assistants::class, 'logout']);
Route::get('/get-consultation-status/{consultation_id}', [Assistants::class, 'getConsultationStatus'])->name('consultation.status');
Route::post('/search_doctor', [Assistants::class, 'search_doctor']);
Route::get('/assistants/show_piscription/{id}', [Assistants::class, 'show_piscription']);
Route::post('/doctors/saveTiming', [Doctors::class, 'saveTiming']);

//---------- Doctors ----------
//-----------------------------

//Header
Route::post('/doctors/notification/reject', [Doctors::class, 'notificationReject']);
Route::post('/doctors/notification/rejectAll', [Doctors::class, 'notificationRejectAll']);

//Dashboard
Route::get('/doctors/dashboard', function () {
    return view('doctors.dashboard');
});
Route::get('/doctors/video_call/{id}', [Doctors::class, 'video_call']);
//Some Random Panel
Route::post('/patient/consultation/{assistantId}/{patientId}', [Doctors::class, 'videoConsultation'])->name('videoConsultation');


//Change Password
Route::post('/doctors/change_password', [Doctors::class, 'changepassword']);


//Logout
Route::get("/doctors/logout", [Doctors::class, 'logout']);
