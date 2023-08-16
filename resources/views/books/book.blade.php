@extends('layouts.app')
@section('title', 'Books')
@section('main', 'Books')
@section('content')
    @if(session('success'))
    <p class="alert alert-success col-4">
      {{ session('success') }}
    </p>
    @endif
    @if(session('delete'))
    <p class="alert alert-success col-4">
      {{ session('delete') }}
    </p>
    @endif
    </div>
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add Book here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/books/" method="POST" style="display: inline" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="Image" id="inputGroupFile02" value="choose image">
                    <select class="form-select mt-3" name="genre_id" id="">
                        @foreach ($genre as $gen)
                            <option value="{{ $gen->id }}">{{ $gen->Genres_Name }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="" name="Book_Name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
                    <input type="text" id="" name="Parallel_name" class="form-control mt-3" placeholder="Parallel Name" aria-describedby="basic-addon1">
                    <input type="text" id="" name="Author" class="form-control mt-3" placeholder="Author" aria-describedby="basic-addon1">
                    <select class="form-select mt-3" name="categories[]" id="" multiple>
                        @foreach ($category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="" name="Publishing_year" class="form-control mt-3" placeholder="Publishing year" aria-describedby="basic-addon1">
                    <input type="text" id="" name="Number_of_pages" class="form-control mt-3" placeholder="Number of pages" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        </div>
    </div> 
    <table class="table table-hover">
        <thead class="table-secondary">
            <th class="col-2">Image</th>
            <th class="col-1">Genre</th>
            <th class="col-2">Name</th>
            <th class="col-2">Parallel name</th>
            <th class="col-1">Author</th>
            <th class="col-1">Publishing year</th>
            <th class="col-1">Number of page</th>
            <th class="col-2">Action</th>
        </thead>
        <tbody>
            @foreach($book as $book)
            <tr>
                <td>
                    <img id="contentimg" src="/images/{{ $book->Image }}" alt="">
                </td>
                <td>{{ $book->genre->Genres_Name }}</td>
                <td>{{ $book->Book_Name }}</td>
                <td>{{ $book->Parallel_name }}</td>
                <td>{{ $book->Author }}</td>
                <td>{{ $book->Publishing_year }}</td>
                <td>{{ $book->Number_of_pages }}</td>
                <td>
                    <a href="/books/{{$book->id}}/edit">
                        <button type="submit" class="btn btn-warning" id="edit_btn" value="{{ $book->id }}">Edit</button>
                    </a>
                    <form action="/books/{{ $book->id }}" method="POST" style="display: inline">
                        @csrf @method('delete')
                        <button type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection