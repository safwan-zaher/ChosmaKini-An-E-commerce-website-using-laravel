<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect; 

use Session;
Session_start();

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/admins');
    }
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return;
        }
        else
        {
            return Redirect::to('/admins')->send();
        }
    }
}
