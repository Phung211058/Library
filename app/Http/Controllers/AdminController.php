<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($_POST);
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins|max:50',
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
                'status' => 400,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            $account = new Admin();
            $account->email = $request->email;
            $account->phone = $request->phone;
            $account->password = Hash::make($request->pass);
            $account->role = 1;
            $account->save();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully',
            ]);
        };
    }

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'log_email' => 'required|email',
            'log_pass' => 'required',
        ],
        [
            'log_email.required' => 'The field can not be empty',
            'log_pass.required' => 'The field can not be empty',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            // dd(Auth::guard('admins')->attempt([
            //     'email' => $request->log_email,
            //     'password' => $request->log_pass,
            // ]));
            // {
            if(Auth::guard('admins')->attempt([
                    'email' => $request->log_email,
                    'password' => $request->log_pass,
            ])){
            $request->session()->regenerate();
            $account = Admin::where('email', $request->log_email)->first();
            Auth::login($account);
                // if($account){
                    // if(Hash::check($request->log_pass, $account->password)){
                         // $request->session()->put('loggedIn', $account->id);
                        return response()->json([
                            'status' => 200,
                            'message' => 'Success',
                        ]);
                    // }
                    // else{
                    //     return response()->json([
                    //         'status' => 401,
                    //         'errors' => 'Email or password is incorrect!',
                    //     ]);
                    // }
            }
            else{
                return response()->json([
                    'status' => 401,
                    'errors' => 'User does not exist!',
                ]);
            }

            // }

            // if (Auth::attempt($request->only(['log_email', 'log_pass']))){
            //     return response()->json([
            //         'status' => 200,
            //         'success' => url('books'),
            //     ]);
                
            // }
            // else{
            //     return response()->json([
            //         'status' => 404,
            //         'errors' => 'User does not exist',
            //     ]);
            // }
        }
    }


    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
