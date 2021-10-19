<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {

        $user = Auth::user();

        $id = Auth::id();

        //dd($user->hasRole('student'));

        if (Auth::user()->hasRole('student')) {

            return view("v1.dashboard.student");

        }

        if (Auth::user()->hasRole('staff')) {

            return view("v1.dashboard.staff");

        }

        if (Auth::user()->hasRole('sysadmin')) {

            return view("v1.dashboard.sysadmin");

        }        
        
        //$user->assignRole('student');

        // Test role creation and alloc
        
       // $role = Role::create(['name' => 'student']);
        //$permission = Permission::create(['name' => 'upload work']);

       // $role->givePermissionTo($permission);
       // $permission->assignRole($role);

    }

}