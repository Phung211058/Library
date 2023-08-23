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
    <form id="r_form" action="/reader/{{ $reader->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div id="TitleIma">
        <img style="width: 100%" src="" alt="">
    </div>
    <div id="r_main">
        <div class="col-6">
            <div id="content">
                <Span class="mt-4">ID</Span>
                <input type="text" class="form-control mt-3 me-5" value="{{ $reader->id }}" disabled>
            </div>
            <div id="content">
                <Span class="mt-4">Image</Span>
                <input type="file" class="form-control mt-3 me-4" name="u_image" value="{{ $reader->Image }}">
            </div>
            <div id="content">
                <Span class="mt-4">Gender</Span>
                <select name="u_gender" class="form-select mt-3 me-5">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                </select>
            </div>
            <div id="content">
                <Span class="mt-4">Age</Span>
                <input name="u_age" type="text" class="form-control mt-3 me-5" value="{{ $reader->Age }}">
            </div>
            {{-- <div id="content">
                <Span class="mt-2">Email </Span>
                <input name="update_Parallel_name" type="text" class="form-control mt-3" value=>
            </div> --}}
        </div>
        <div class="col-6">
            <div id="content">
                <Span class="mt-4">Name</Span>
                <input name="u_name" type="text" class="form-control mt-3" value="{{ $reader->Name }}">
            </div>
            <div id="content">
                <Span class="mt-4">Email </Span>
                <input name="u_email" type="text" class="form-control mt-3" value="{{ $reader->Email }}">
            </div>
            <div id="content">
                <Span class="mt-4">Phone</Span>
                <input name="u_phone" type="text" class="form-control mt-3" value="{{ $reader->Phone }}">
            </div>
            <div id="content">
                <Span class="mt-4">Reliability</Span>
                <input name="u_reliability" type="text" class="form-control mt-3" value="{{ $reader->Reliability }}">
            </div>
            {{-- <div id="content">
                <Span class="mt-2">Number of pages</Span>
                <input name="update_Number_of_pages" type="text" class="form-control mt-3" value="">
            </div>
            <div id="content">
                <Span class="mt-5">Category</Span>
                <select name="tags[]" id="tags" class="form-control mt-3" multiple>
                    @foreach
                        <option> </option>
                    @endforeach
                </select>
            </div> --}}
        </div>
    </div>
    <div id="actions">
        <button type="submit" class="btn btn-success me-2">Save</button>
    </div>
    </form>
    <a href="/reader"><button id="cancel" class="btn btn-danger ms-2">Cancel</button></a>
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