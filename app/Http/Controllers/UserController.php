<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\PersonalInfo;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function settings(){
        return view('settings.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personal_info = new PersonalInfo();
        $personal_info->first_name = $request->first_name;
        $personal_info->last_name = $request->last_name;
        $personal_info->middle_name = $request->middle_name;
        $personal_info->phone_number = $request->phone_number;
        $letters = range('a', 'z');
        $random_array = [$letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)]];
        $random = implode("", $random_array);
        $file = $request->file('avatar');
        $image_name = $random.''.date('Y-m-dh-i-s').'.'.$file->extension();
        $file->storeAs('public/user/', $image_name);
        $personal_info->avatar = $image_name;
        $personal_info->gender = $request->gender;
        $personal_info->birth_date = $request->birth_date;
        $personal_info->save();
        $model = new Staff();
        $model->login = $request->email;
        $model->password = Hash::make($request->password);
        if($request->role_id =! ""){
            $model->role_id = (int)$request->role_id;
        }
        if($request->company_id =! ""){
            $model->company_id = (int)$request->company_id;
        }
        $model->personal_info_id = $personal_info->id;
        $model->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('user.index');
    }
}
