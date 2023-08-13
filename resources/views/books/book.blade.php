@extends('layouts.app')
@section('title', 'Genres')
@section('content')
    <div id="menu">
        <img id="titleimg" src="{{ asset('images/joker1.png') }}" alt="">
        <p class="mt-2">Hello Phung</p>
    <ul>
        <a href="/addReader/"><li>Reader list</li></a>
        <a href="/genre/"><li>Genre list</li></a>
        <a href="/books/"><li>Books list</li></a>
        <a href="/category/"><li>Categories list</li></a>
        {{-- <li>List</li>
        <li>Teachers</li>
        <li>Students</li> --}}
    </ul>
    <div id="btn">
        <button id="add" name="add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createForm">Add new</button>
    </div>
    </div>
    <div id="option" class="row">
    <form class="col-8" id="form">
        <input type="text" name="search" class="form-control my-2 ms-5" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-danger my-2 ms-1"><ion-icon name="search-outline"></ion-icon></button>
    </form>
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
    {{-- <div class="col-2">Old book</div>
    <div class="col-2"> New book</div> --}}
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
                    {{-- <input type="text" id="" name="Caption" class="form-control mt-3" placeholder="Caption" aria-describedby="basic-addon1"> --}}
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
    <table class="table">
        <thead class="table-dark">
            <th class="col-2">Image</th>
            <th class="col-1">Genre</th>
            <th class="col-2">Name</th>
            <th class="col-2">Parallel name</th>
            {{-- <th class="col-2">Caption</th> --}}
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
                    {{-- {{ $book->Image }} --}}
                </td>
                <td>{{ $book->genre->Genres_Name }}</td>
                <td>{{ $book->Book_Name }}</td>
                <td>{{ $book->Parallel_name }}</td>
                {{-- <td>{{ $book->Caption }}</td> --}}
                <td>{{ $book->Author }}</td>
                <td>{{ $book->Publishing_year }}</td>
                <td>{{ $book->Number_of_pages }}</td>
                <td>
                    
                    <a href="/books/{{$book->id}}/edit"><button type="submit" class="btn btn-warning" id="edit_btn" value="{{ $book->id }}">Edit</button></a>
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

{{-- @section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#edit_btn', function(){
                var idd = $(this).val();
                // alert(idd);
                $('#updateForm').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/books/"+idd,
                    success: function (response){
                        $('#Book_Name').val(response.book.Book_Name);
                        $('#Parallel_name').val(response.book.Parallel_name); 
                        $('#Caption').val(response.book.Caption);
                        $('#Author').val(response.book.Author);
                        $('#Publishing_year').val(response.book.Publishing_year);
                        $('#Number_of_pages').val(response.book.Number_of_pages);
                        var genres = response.genre;
                        for (var i = 0; i < genres.length; i++){
                            // ------var htmlGenre = '<option value="'+genres[i]['id']+'"' + genres[i]['Genres_Name'] + '</option>';
                            var htmlGenre = '<option value='+genres[i]['id']+'> '+ genres[i]['Genres_Name'] +' </option>';
                            htmlGenre += '<option value='+genres[i]['id']+'> '+ genres[i]['Genres_Name'] +' </option>';
                            if (response.book.genre_id == genres[i]['id']){
                                htmlGenre += '<option value="'+genres[i]['id']+'" selected>' + genres[i]['Genres_Name'] + '</option>';
                            }
                        }
                        $('#genre_id').html(htmlGenre); 
                    }
                });
            });
        });
    </script>
@endsection --}}