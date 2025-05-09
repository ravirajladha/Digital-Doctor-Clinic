<?php 
    namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Notification;

    class HeaderComposer{
        public function compose(View $view){
            $notifications = Notification::where('to_auth_id', session('rexkod_digitaldrclinic_doctor_id'))->get();
            if($notifications){

            } else {
                $notifications = null;
            }
            $view->with('notifications', $notifications);
        }
    }