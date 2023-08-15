<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.genre', compact('genres'));
    }

    // fetch_genres
    public function fetch_genres()
    {
        $genres = Genre::all();
        return response()->json([
            'status' => 100,
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'Genres_Name' => 'required'
        ],
        [
            'Genres_Name.required' => 'The field does not empty',
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            $genre = new Genre();
            $genre->Genres_name = $request->Genres_Name;
            $genre->save();
            return response()->json([
                'status' => 200,
                'message' => 'Success',
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
        $genre = Genre::find($id);
        // if($genre){
            return response()->json([
                'status' => 200,
                'genre' => $genre, 
            ]);
        // }
        // else{
        //     return response()->json([
        //         'status' => 200,
        //         'genre' => 'Edit successfully', 
        //     ]);
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'update_name' => 'required'
        ],
        [
            'update_name.required' => 'The field does not empty',
        ]);
        if($validate->fails()){
            return response()->json([
                'status' => 405,
                'errors' => $validate->messages(),
            ]);
        }
        else{
            $genre = Genre::find($id);
            $genre->Genres_name = $request->update_name;
            $genre->update();
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
        
        $book = Genre::find($id);
        $book->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }
}
