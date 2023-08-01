<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Status;
use App\Models\PersonalInfo;
use App\Models\Driver;
use App\Http\Requests\ConfirmDriverRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Users::all();

        return view('users.index', ['model' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Users::find($id);

        return view('users.show', [
            'model' => $model,
            'orders' => $model->orders,
            'commentScores' => $model->commentScores,
            'cars' => $model->cars,
            'balanceHistory' => $model->balanceHistory,
            'driver' => $model->driver,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Users::findOrfail($id);
        $modelStatus = Status::all();
        $modelPersonalInfo = PersonalInfo::where(['id' => $model->personal_info_id])->first();

        return view('drivers.edit', [
            'model' => $model,
            'modelStatus' => $modelStatus,
            'modelPersonalInfo' => $modelPersonalInfo,
            'male' => Users::MALE,
            'female' => Users::FEMALE,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmDirver(ConfirmDriverRequest $request)
    {
        $data = $request->validated();

        $model = Users::findOrfail($data['user_id']);
        $modelPersonalInfo = PersonalInfo::find($model->personal_info_id);
        $modelDriver = Driver::where('user_id', $model->id)->first();

        $path_passport_images = $request->file('passport_images')->store('passport-images');
        $path_license_image = $request->file('license_image')->store('license-images');

        if (isset($modelDriver)) {
            $modelPersonalInfo->passport_serial_number = $data['passport_serial_number'];
            $modelPersonalInfo->passport_issued_by = $data['passport_issued_by'];
            $modelPersonalInfo->passport_expired_date = $data['passport_expired_date'];
            $modelPersonalInfo->passport_images = json_encode(["images" => $path_passport_images]);
            $modelPersonalInfo->save();
        }

        if (isset($modelDriver)) {
            $modelDriver->license_number = $data['license_number'];
            $modelDriver->license_expired_date = $data['license_expired_date'];
            $modelDriver->license_image = json_encode(["images" => $path_license_image]);
            $modelDriver->save();
        } else {
            $newDriver = new Driver();
            $newDriver->user_id = $model->id;
            $newDriver->license_number = $data['license_number'];
            $newDriver->license_expired_date = $data['license_expired_date'];
            $newDriver->license_image = json_encode(["images" => $path_license_image]);
            $newDriver->save();
        }
        
        return redirect()->route('users.show', ['id' => $model->id])->with('status', translate('Successfully created'));
    }
}
