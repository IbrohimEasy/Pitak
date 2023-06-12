<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarListRequest;
use App\Models\Carlist;
use App\Models\CarTypes;

class CarListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carLists = CarList::all();
        $carTypes = CarTypes::all();
        return view('car-lists.index', ['carLists'=>$carLists, 'carTypes'=>$carTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::all();
        return view('car-lists.create', ['statuses'=>$statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarListRequest $request)
    {
        return redirect()->route('carList.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('car-lists.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statuses = Status::all();
        return view('car-lists.edit', ['statuses'=>$statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarListRequest $request, string $id)
    {
        return redirect()->route('carList.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('carList.index');
    }
}
