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

        
        
        //$user->assignRole('student');


        
       // $role = Role::create(['name' => 'student']);
        //$permission = Permission::create(['name' => 'upload work']);

       // $role->givePermissionTo($permission);
       // $permission->assignRole($role);

    }

}