<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reader = Reader::all();

        return view('reader.addReader', compact('reader'));
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
        if($request->has('Reader_image')){
            $file = $request->Reader_image;
            $file_name = $file->getClientoriginalName();
            // dd($file_name);
            $file->move(public_path('images'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $reader = new Reader();
        $reader->Image = $request->image;
        $reader->name = $request->Reader_name;
        $reader->gender = $request->Reader_gender;
        $reader->age = $request->Reader_age;
        $reader->email = $request->Reader_email;
        $reader->phone = $request->Reader_phone;
        $reader->reliability = 3;
        $reader->save();
        return redirect('/addReader');
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
        $reader = Reader::find($id);
        return view('reader.editReader', compact('reader'));
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
}
