<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
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
        $category = Category::all();
        $search = $request['search'];
        if ($search != '') {
            $book = Book::where('Book_Name', 'LIKE', "%$search%")->orwhere('Parallel_Name', 'LIKE', "%$search%")
                                ->orwhere('Author', 'LIKE', "%$search%")->get();
        }
        else{
            $book = Book::all();
        }
        return view('books.book', compact('book','genre', 'category'));
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
        if($request->has('Image')){
            $file = $request->Image;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $book = new Book();
        $book->image = $request->image;
        $book->genre_id = $request->genre_id;
        $book->book_Name = $request->Book_Name;
        $book->parallel_name = $request->Parallel_name;
        $book->author = $request->Author;
        $book->publishing_year = $request->Publishing_year;
        $book->number_of_pages =  $request->Number_of_pages;
        $book->save();
        $book->categories()->attach($request->categories);
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
        $cate = Category::all();
        return view('books.editBook', compact('book', 'genre', 'cate'));
    }

    public function update(Request $request, string $id)
    {
        if($request->has('update_Image')){
            $files = $request->update_Image;
            $file_nam = $files->getClientoriginalName();
            $files->move(public_path('images'), $file_nam);
            $request->merge(['upimage' => $file_nam]);
        }
        
        $book = Book::find($id);
        $book->image = $request->upimage; 
        $book->genre_id = $request->genre_id;
        $book->book_name = $request->update_Book_Name;
        $book->parallel_name = $request->update_Parallel_name;
        $book->author = $request->update_Author;
        $book->publishing_year = $request->update_Publishing_year;
        $book->number_of_pages =  $request->update_Number_of_pages;
        $book->categories()->attach($request->categories);
        $book->save();
        return redirect('/books');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books');
    }
}