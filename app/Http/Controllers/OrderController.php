<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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
        $model = Order::all();

        return view('order.index', [
            'model' => $model
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('order.show', [
            'order' => $order,
            'offers' => $order->offers,
            'commentScores' => $order->commentScores
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Order::findOrfail($id);
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

        $order = Order::findOrFail($id);
        $order->update($request->all());
        if (isset($data['seats']))
            $order->seats = json_encode($data['seats']);
            
        $order->save();
        
        return redirect()->route('order.index'); // ->with('updated', translate('Data successfully updated'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('order.index'); // ->with('updated', translate('Data successfully updated'));
    }
}
