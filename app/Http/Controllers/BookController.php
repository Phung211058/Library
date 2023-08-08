<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genre = Genre::all();
        $search = $request['search'];
        if ($search != '') {
            $book = Book::where('Book_Name', 'LIKE', "%$search%")->orwhere('Parallel_Name', 'LIKE', "%$search%")->orwhere('Author', 'LIKE', "%$search%")->get();
        }
        else{
            $book = Book::all();
        }
        return view('books.book', compact('book','genre'));
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
        $book = new Book();
        $book->genre_id = $request->genre_id;
        $book->book_Name = $request->Book_Name;
        $book->parallel_name = $request->Parallel_name;
        $book->caption = $request->Caption;
        $book->author = $request->Author;
        $book->publishing_year = $request->Publishing_year;
        $book->Number_of_pages =  $request->Number_of_pages;
        $book->save();
        return redirect('/books');
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
        $book = Book::find($id);
        $genre = Genre::all();
        return view('books.editBook', compact('book', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->genre_id = $request->genre_id;
        $book->book_name = $request->update_Book_Name;
        $book->parallel_name = $request->update_Parallel_name;
        $book->caption = $request->update_Caption;
        $book->author = $request->update_Author;
        $book->publishing_year = $request->update_Publishing_year;
        $book->Number_of_pages =  $request->update_Number_of_pages;
        $book->save();
        return redirect('/books')->with('success', 'edit successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('delete', 'Delete successfully');
    }
}
