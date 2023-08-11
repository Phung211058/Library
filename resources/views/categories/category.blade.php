<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
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
    </ul>
    <div id="btn">
        <button id="add" name="add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createForm">Add new</button>
    </div>
    </div>
    <div id="option" class="row">
    <form class="col-8" id="form">
        <input type="text" name="search" class="form-control my-2" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-danger my-2 ms-1"><ion-icon name="search-outline"></ion-icon></button>
    </form>
    </div>
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add genre here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category" method="POST" style="display: inline">
                    @csrf
                    <input type="text" id="name" name="category" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    {{-- Update --}}
    {{-- <div class="modal fade" id="updateForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update Genre here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/genre" method="POST" style="display: inline">
                        @csrf @method('PUT')
                        <input type="text" name="update_category" id="update_name" class="form-control mt-3">
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <table class="table">
        <thead class="table-dark">
            <th class="col-2">Id</th>
            <th class="col-7">Name</th>
            <th class="col-3">Action</th>
        </thead>
        <tbody>
            @foreach($cate as $cate)
            <tr>
                <td>{{ $cate->id }}</td>
                <td>{{ $cate->name }}</td>
                <td>
                    <button type="submit" class="btn btn-warning" id="edit_btn" value="{{ $cate->id }}" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>
                    <form action="/genre/{{ $cate->id }}" method="POST" style="display: inline">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>