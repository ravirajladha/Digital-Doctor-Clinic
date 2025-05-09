<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Sub_admin;

class SubAdminNavbar extends Component
{
    public $permissions;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $sub_admin= Sub_admin::where('auth_id', session('rexkod_digitaldrclinic_sub_admin_id'))->first();
        $this->permissions = explode(',',$sub_admin->permissions);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sub-admin-navbar');
    }
}
