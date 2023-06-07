<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\Staff;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){

        $personal_info = new PersonalInfo();
        $personal_info->first_name = $request->name;
        $personal_info->save();

        $staff = new Staff();
        $staff->login = $request->login;
        $staff->password = $request->password;
        $staff->personal_info_id = $personal_info->id;
        $staff->save();
        return redirect()->route();
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){

    }

}
