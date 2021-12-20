<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return $this->dashboardStrategy()->index();
    }

    public function dashboardStrategy()
    {
        if(Auth::user()->is_staff === 1)
        {
            $user_type = 'staff';
        }
        elseif(Auth::user()->is_admin === 1)
        {
            $user_type = 'staff';
        }
        else
        {
            $user_type = 'student';
        }

        $strategy = [

            'staff'    => new StaffDashboardController(),
            'student'  => new StudentDashboardController(),

        ];

        if (!array_key_exists($user_type, $strategy)) {
            throw new \Exception('Could not find user type strategy');
        }

        return $strategy[$user_type];
    }
}
