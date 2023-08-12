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
  <style>
    img {
      width: 100px;
    }
  </style>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand ms-5" href="">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active ms-3 me-3" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3 me-3" href="/books">Books</a>
            </li>
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> --}}
          </ul>
          <form class="d-flex me-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <button class="btn btn-secondary ms-3" data-bs-toggle="modal" data-bs-target="#createForm">Add reader</button>

          <a href="/login/"><button class="btn btn-primary ms-3 me-5">Log out</button></a>
          
        </div>
      </div>
    </nav>

    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="">Add genre here</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addReader/" method="POST" style="display: inline" enctype="multipart/form-data">
              @csrf
              <input type="file" class="form-control" name="Reader_image" id="inputGroupFile02" value="choose image">
              <input type="text" id="" name="Reader_name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
              <select class="form-select mt-3" name="gender" id="">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
              </select>
              <input type="text" id="" name="Reader_age" class="form-control mt-3" placeholder="Age" aria-describedby="basic-addon1">
              {{-- <input type="text" id="" name="Caption" class="form-control mt-3" placeholder="Caption" aria-describedby="basic-addon1"> --}}
              <input type="text" id="" name="Reader_email" class="form-control mt-3" placeholder="Email" aria-describedby="basic-addon1">
              <input type="text" id="" name="Reader_phone" class="form-control mt-3" placeholder="Phone" aria-describedby="basic-addon1">
              {{-- <input type="text" id="" name="Reader_reability" class="form-control mt-3" placeholder="Number of page" aria-describedby="basic-addon1"> --}}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
          </form>
          </div>
          {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
              </form>
          </div> --}}
      </div>
      </div>
  </div>

    <table class="table table-hover text-center">
      <thead class="table-secondary">
        <th class="col-1">Image</th>
        <th class="col-2">Name</th>
        <th class="col-1">Gender</th>
        <th class="col-1">Age</th>
        <th class="col-2">Email</th>
        <th class="col-2">Phone</th>
        <th class="col-1">Realibility</th>
        <th class="col-2">Action</th>
    </thead>
    <tbody>
      <tr>
        <td><img src="{{ asset('images/joker1.png') }}" alt=""></td>
        <td>Nguyễn Minh Phụng</td>
        <td>Nam</td>
        <td>20</td>
        <td>PhungNMGBH211058@fpt.edu.vn</td>
        <td>0329257839</td>
        <td>3</td>
        <td>
          <button class="btn btn-success d-inline">View</button>
          <button class="btn btn-danger d-inline">Delete</button>
        </td>
      </tr>
    </tbody>
    </table>
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