<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Category::all();
        return view('categories.category', compact('cate'));
    }

    public function fetch_cate()
    { 
        $cate = Category::all();
        return response()->json([
            'status' => 100,
            'cate' => $cate
        ]);
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
        $validate = Validator::make($request->all(), [
            'cate_name' => 'required',
        ],
        [
            'cate_name.required' => 'This field is not empty',
        ]);
        if($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            $cate = new Category();
            $cate->name = $request->cate_name;
            $cate->save();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully',
            ]);
        }
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
        $cate = Category::find($id);
        return response()->json([
            'status' => 200,
            'cate' => $cate,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'update_cate' => 'required'
        ],
        [
            'update_cate.required' => 'The field does not empty',
        ]
    );
    if ($validate->fails()){
        return response()->json([
            'status' => 400,
            'errors' => $validate->messages(),
        ]);
    }
    else{
        $cate = Category::find($id);
        $cate->name = $request->update_cate;
        $cate->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return response()->json([
            'status' => 200,
            'message' => 'deleted successfully'
        ]);
    }
}
