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
    <link rel="stylesheet" href="{{ asset('css/editBook.css') }}">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <form action="/books/{{ $book->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div id="TitleImgage">
        <img style="width: 100%" src="/images/{{ $book->Image }}" alt="">
    </div>
    <div id="main">
        <div class="col-6">
            <div id="content">
                <Span class="mt-4">ID</Span>
                <input type="text" class="form-control mt-3" value="{{ $book->id }}" disabled>
            </div>
            <div id="content">
                <Span class="mt-4">Image</Span>
                <input type="file" class="form-control mt-3" name="update_Image" id="inputGroupFile02" value="{{ $book->Image }}">
            </div>
            <div id="content">
                <Span class="mt-4">Genre</Span>
                <select name="genre_id" class="form-select mt-3" >
                    @foreach($genre as $genre) {
                        <option value="{{$genre->id}}" 
                            @if($genre->id == $book->genre_id) selected @endif>{{$genre->Genres_Name}}</option>
                    }
                    @endforeach
                </select>
            </div>
            <div id="content">
                <Span class="mt-4">Name</Span>
                <input name="update_Book_Name" type="text" class="form-control mt-3" value="{{ $book->Book_Name }}">
            </div>
            <div id="content">
                <Span class="mt-2">Parallel Name</Span>
                <input name="update_Parallel_name" type="text" class="form-control mt-3" value="{{ $book->Parallel_name }}">
            </div>
        </div>
        <div class="col-6">
            
            {{-- <div id="content">
                <Span class="mt-3">Caption</Span>
                <input name="update_Caption" type="text" class="form-control mt-1" value="{{ $book->Caption }}">
            </div> --}}
            <div id="content">
                <Span class="mt-4">Author</Span>
                <input name="update_Author" type="text" class="form-control mt-3" value="{{ $book->Author }}">
            </div>
            <div id="content">
                <Span class="mt-2">Publishing year</Span>
                <input name="update_Publishing_year" type="text" class="form-control mt-3" value="{{ $book->Publishing_year }}">
            </div>
            <div id="content">
                <Span class="mt-2">Number of pages</Span>
                <input name="update_Number_of_pages" type="text" class="form-control mt-3" value="{{ $book->Number_of_pages }}">
            </div>
            <div id="content">
                <Span class="mt-5">Category</Span>
                <select name="tags[]" id="tags" class="form-control mt-3" multiple>
                    @foreach($cate as $cate)
                        <option value="{{$cate->id}}" @if(in_array($cate->id, $book->categories->pluck('id')->toArray())) selected @endif>{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div id="action">
        <button type="submit" class="btn btn-success me-2">Save</button>
        {{-- <a href="/books/"><button type="text" class="btn btn-danger ms-2">Cancel</button></a> --}}
    </div>
    </form>
    <a href="/books/"><button id="cancel" class="btn btn-danger ms-2">Cancel</button></a>
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