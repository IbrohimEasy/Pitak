<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorList;
use App\Models\Status;
use App\Http\Requests\ClassListRequest;

class ColorsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colorLists = ColorList::all();
        return view('color-lists.index', ['colorLists'=>$colorLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('color-lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new ColorList();
        $model->name = $request->name;
        $model->code = $request->code;
        $model->save();
        return redirect()->route('colorList.index')->with('status', translate('Successfully created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = ColorList::find($id);
        return view('color-lists.show', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $colorLists = ColorList::find($id);
        return view('color-lists.edit', ['colorLists'=>$colorLists]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = ColorList::find($id);
        $model->name = $request->name;
        $model->code = $request->code;
        $model->save();
        return redirect()->route('colorList.index')->with('status', translate('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = ColorList::find($id);
        $model->delete();
        return redirect()->route('colorList.index')->with('status', translate('Successfully deleted'));
    }
}
