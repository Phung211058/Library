<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
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
        // print_r($_POST);
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|max:100',
            'phone' => 'required|integer',
            'pass' => 'required|min:8|max:20',
            'cfpass' => 'required|min:8|same:pass',
        ],
        [
            'email.unique' => 'this email have existed already',
            'cfpass.same' => 'Password did not matched',
            'cfpass.required' => 'Confirm password is required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 200,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            $account = new Admin();
            $account->email = $request->email;
            $account->phone = $request->phone;
            $account->password = $request->pass;
            $account->permission = 1;
            $account->save();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully',
            ]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
