<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['url' => 'ngo_request', 'name' => 'NGO Registration'],
            ['url' => 'camp_request', 'name' => 'Camp Request'],
            ['url' => 'representatives', 'name' => 'Representatives'],
            ['url' => 'contact_request', 'name' => 'Contact Request'],
            ['url' => 'specialities', 'name' => 'Specialities'],
            ['url' => 'test', 'name' => 'Tests'],
            ['url' => 'medicines', 'name' => 'Medicines'],
            ['url' => 'clinic_hospital', 'name' => 'Clinic/Hospital'],
            ['url' => 'Digitaldrclininc_center', 'name' => 'DDC Center'],
            ['url' => 'stock', 'name' => 'Stocks'],
            ['url' => 'doctors', 'name' => 'Doctors'],
            ['url' => 'assistants', 'name' => 'Assistants'],
            ['url' => 'patients', 'name' => 'Patients'],
            ['url' => 'consultations', 'name' => 'Consultations'],
            ['url' => 'transactions', 'name' => 'Transactions'],
            ['url' => 'newsroomdetails', 'name' => 'News Room'],
            ['url' => 'socialmedia', 'name' => 'Social media'],
        ];
        DB::table('pages')->insert($pages);
    }
}
