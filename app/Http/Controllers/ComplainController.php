<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplainReason;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ComplainReasons = ComplainReason::all();
        return view('complain.index', ['ComplainReasons'=>$ComplainReasons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new ComplainReason();
        $model->text = $request->text;
        $model->save();
        return redirect()->route('complain.index')->with('status', translate('Successfully created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = ComplainReason::find($id);
        return view('complain.show', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ComplainReason = ComplainReason::find($id);
        return view('complain.edit', ['ComplainReason'=>$ComplainReason]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = ComplainReason::find($id);
        $model->text = $request->text;
        $model->save();
        return redirect()->route('complain.index')->with('status', translate('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = ComplainReason::find($id);
        $model->delete();
        return redirect()->route('complain.index')->with('status', translate('Successfully deleted'));
    }
}
