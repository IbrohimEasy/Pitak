<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\PersonalInfo;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $staffs = User::all();
        return view('user.index', ['staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $companies = Company::all();
        return view('user.create', ['roles'=>$roles, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
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
        if(isset($file)) {
            $image_name = $random . '' . date('Y-m-dh-i-s') . '.' . $file->extension();
            $file->storeAs('public/user/', $image_name);
            $personal_info->avatar = $image_name;
        }
        $personal_info->gender = $request->gender;
        $personal_info->birth_date = $request->birth_date;
        $personal_info->save();
        $model = new User();
        $model->email =  $request->email;
        if(isset($request->password)){
            $model->password = Hash::make($request->password);
        }
        $model->password = Hash::make($request->password);
        if($request->role_id =! "0"){
            $model->role_id = (int)$request->role_id;
        }
        if($request->company_id =! "0"){
            $model->company_id = (int)$request->company_id;
        }
        $model->personal_info_id = $personal_info->id;
        $model->save();
        return redirect()->route('user.index')->with('status', translate('Successfully created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = User::find($id);
        return view('user.show', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $companies = Company::all();
        $staff = User::find($id);
        return view('user.edit', ['roles'=>$roles, 'companies'=>$companies, 'staff'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $model = User::find($id);
        $personal_info = $model->personalInfo;
        $personal_info->first_name = $request->first_name;
        $personal_info->last_name = $request->last_name;
        $personal_info->middle_name = $request->middle_name;
        $personal_info->phone_number = $request->phone_number;
        $letters = range('a', 'z');
        $random_array = [$letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)]];
        $random = implode("", $random_array);
        $file = $request->file('avatar');
        if(isset($file)){
            $sms_avatar = storage_path('app/public/user/'.$personal_info->avatar);
            if(file_exists($sms_avatar)){
                unlink($sms_avatar);
            }
            $image_name = $random.''.date('Y-m-dh-i-s').'.'.$file->extension();
            $file->storeAs('public/user/', $image_name);
            $personal_info->avatar = $image_name;
        }
        $personal_info->gender = $request->gender;
        $personal_info->birth_date = $request->birth_date;
        $personal_info->save();
        $model->email = $request->email;
        if(isset($request->new_password)){
            if($request->new_password == $request->password_confirmation){
                $model->password = Hash::make($request->new_password);
            }
        }
        if($request->role_id =! "0"){
            $model->role_id = (int)$request->role_id;
        }
        if($request->company_id =! "0"){
            $model->company_id = (int)$request->company_id;
        }
        $model->personal_info_id = $personal_info->id;
        $model->save();
        return redirect()->route('user.index')->with('status', translate('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = User::find($id);
        $sms_avatar = storage_path('app/public/user/'.$model->personalInfo->avatar);
        if(file_exists($sms_avatar)){
            unlink($sms_avatar);
        }
        $model->personalInfo->delete();
        $model->delete();
        return redirect()->route('user.index')->with('status', translate('Successfully deleted'));
    }

    public function account(){
        $user = Auth::user();
        $stuffs = User::all();
        return view('user.account', ['stuffs'=>$stuffs, 'user'=>$user]);
    }
}
