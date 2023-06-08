<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('class-lists.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class-lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('class-lists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('class-lists.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('class-lists.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('class-lists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('class-lists.index');
    }
}
