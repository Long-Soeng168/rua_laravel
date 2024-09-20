<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view epublication', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:create epublication', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:update epublication', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete epublication', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.faculties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faculties.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.faculties.edit', [
            'id' => $id,
        ]);
    }

    public function sideinfo()
    {
        return view('admin.faculties.sideinfo');
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
    public function types()
    {
        return view('admin.publications.type');
    }
    public function categories()
    {
        return view('admin.publications.category');
    }
    public function sub_categories()
    {
        return view('admin.publications.sub_category');
    }
    public function images($id)
    {
        $item = Publication::findOrFail($id);
        return view('admin.publications.image', [
            'item' => $item,
        ]);
    }
}
