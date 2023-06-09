<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Status;
use App\Models\CarList;
use App\Models\Country;
use App\Models\City;

use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Orders::all();

        return view('order.index', [
            'model' => $model
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Orders::findOrfail($id);
        $modelStatus = Status::all();
        $modelCarsList = CarList::all();
        $modelCity = City::where(['country_id' => 234, 'type' => 'city'])->get();

        return view('order.edit', [
            'model' => $model,
            'modelStatus' => $modelStatus,
            'modelCarsList' => $modelCarsList,
            'modelCity' => $modelCity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id)
    {
        $data = $request->validated();

        $order = Orders::findOrFail($id);
        $order->update($request->all());
        $order->seats = json_encode($data['seats']);
        $order->save();
        
        return redirect()->route('order.index'); // ->with('updated', translate('Data successfully updated'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();
        
        return redirect()->route('order.index'); // ->with('updated', translate('Data successfully updated'));
    }
}
