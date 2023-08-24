<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'];
        if ($search != '') {
            $reader = Reader::where('Name', 'LIKE', "$search")->get();
        }
        else{
            $reader = Reader::all();
        }
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
        return redirect('/reader');
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

    public function update(Request $request, string $id)
    {
        if($request->has('u_image')){
            $files = $request->u_image;
            $file_name = $files->getClientoriginalName();
            $files->move(public_path('images'), $file_name);
            $request->merge(['upimage' => $file_name]);
        }
        $reader = Reader::find($id);
        $reader->image = $request->upimage;
        $reader->name = $request->u_name;
        $reader->age = $request->u_age;
        $reader->gender = $request->u_gender;
        $reader->email = $request->u_email;
        $reader->phone = $request->u_phone;
        $reader->reliability = $request->u_reliability;
        $reader->save();
        return redirect('/reader');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reader = Reader::find($id);
        $reader->delete();
        return redirect('/reader');
    }
}
