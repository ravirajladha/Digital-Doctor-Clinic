<?php

namespace App\View\Components;

use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * The doctor instance.
     */
    public $doctor;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch the doctor instance based on the phone in the session.
        $this->doctor = Doctor::where('phone', session('rexkod_digitaldrclinic_doctor_phone'))->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
