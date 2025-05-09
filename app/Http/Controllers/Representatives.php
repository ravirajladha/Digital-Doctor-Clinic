<?php

namespace App\Http\Controllers;

use App\Models\New_clinic_reg;
use Illuminate\Http\Request;

class Representatives extends Controller
{
    public function representatives_reg()
    {
        return view('representatives/representatives_reg');
    }


    public function registerRepresentative(Request $req)
    {
        $reper = new New_clinic_reg();

        $storagePath = ('uploads/representative');

        if ($req->hasFile('income')) {
            $hashedFileName = hash('md5', $req->income) . '.' . $req->file('income')->getClientOriginalExtension();
            $reper->income = $req->file('income')->move($storagePath, $hashedFileName);
        } else {
            $reper->income = null;
        }

        if ($req->hasFile('year_amount')) {
            $hashedFileName = hash('md5', $req->year_amount) . '.' . $req->file('year_amount')->getClientOriginalExtension();
            $reper->year_amount = $req->file('year_amount')->move($storagePath, $hashedFileName);
        } else {
            $reper->year_amount = null;
        }

        if ($req->hasFile('place_img') && $req->hasFile('adhar_card')) {

            $hashedFileName = hash('md5', $req->adhar_card) . '.' . $req->file('adhar_card')->getClientOriginalExtension();
            $reper->adhar_card = $req->file('adhar_card')->move($storagePath, $hashedFileName);

            $hashedFileName = hash('md5', $req->place_img) . '.' . $req->file('place_img')->getClientOriginalExtension();
            $reper->place_img = $req->file('place_img')->move($storagePath, $hashedFileName);
        } else {
            $reper->adhar_card = null;
            $reper->place_img = null;
        }

        if ($req->hasFile('pradhan_verification')) {
            $hashedFileName = hash('md5', $req->pradhan_verification) . '.' . $req->file('pradhan_verification')->getClientOriginalExtension();
            $reper->pradhan_verification = $req->file('pradhan_verification')->move($storagePath, $hashedFileName);
        } else {
            $reper->pradhan_verification = null;
        }

        $reper->name = $req->name;
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
        $reper->status = 0;

        // Save the model
        $reper->save();

        // Set success message
        session()->put('success', 'Submitted successfully');

        // Redirect to the desired page
        return redirect('representatives/representatives_reg');
    }

    public function Representatives_page_edit($id)
    {
        $dataValue = New_clinic_reg::where('id', $id)->get();

        if ($dataValue) {
            $data = [
                'dataValue' => $dataValue,
            ];
            return view('admins/representativesedit', $data);
        } else {
            echo "No data found for ID: $id";
        }
    }


    // ----------------------- Max ------------------------------------
    public function Representatives_page_view($id)
    {
        $dataValue = New_clinic_reg::where('id', $id)->get();

        if ($dataValue) {
            $data = [
                'dataValue' => $dataValue,
            ];
            return view('admins/representativesview', $data);
        } else {
            echo "No data found for ID: $id";
        }
    }


    public function uploads_registerRepresentative($id, Request $req)
    {
        $reper =  New_clinic_reg::find($id);
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
            $reper->year_amount = $req->file('year_amount')->move($storagePath, $hashedFileName);
        } else {
            $reper->year_amount = $reper->year_amount;
        }
        if ($req->hasFile('place_img')) {

            $hashedFileName = hash('md5', $req->place_img) . '.' . $req->file('place_img')->getClientOriginalExtension();
            $reper->adhar_card = $req->file('place_img')->move($storagePath, $hashedFileName);
        } else {
            $reper->place_img = $reper->place_img;
        }
        // Handle the 'place_img' and 'adhar_card' file uploads
        if ($req->hasFile('adhar_card')) {

            $hashedFileName = hash('md5', $req->adhar_card) . '.' . $req->file('adhar_card')->getClientOriginalExtension();
            $reper->adhar_card = $req->file('adhar_card')->move($storagePath, $hashedFileName);
        } else {
            $reper->adhar_card = $reper->adhar_card;
        }

        // Handle the 'pradhan_verification' file upload
        if ($req->hasFile('pradhan_verification')) {
            $hashedFileName = hash('md5', $req->pradhan_verification) . '.' . $req->file('pradhan_verification')->getClientOriginalExtension();
            $reper->pradhan_verification = $req->file('pradhan_verification')->move($storagePath, $hashedFileName);
        } else {
            $reper->pradhan_verification = $reper->pradhan_verification;
        }

        $reper->name = $req->name;

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
        return redirect('admins/representatives')->with('success', 'Updated Successfully');
    }
    public function uniqueMobileNumberDis(Request $request)
    {
        $mobileNumber = $request->input('mobile_number');

        $existingNgo = New_clinic_reg::where('mobile_number', $mobileNumber)->first();

        if ($existingNgo) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    public function uniqueEmailDis(Request $request)
    {
        $email = $request->input('email');

        $existingNgo = New_clinic_reg::where('email', $email)->first();

        if ($existingNgo) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
