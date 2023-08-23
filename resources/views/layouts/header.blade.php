
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
    <div class="container-fluid">
      <li class="navbar-brand ms-5" href="">@yield('main')</li>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ms-3 me-3" aria-current="page" href="#">Home</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link ms-3 me-3" href="/books">Books</a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Action
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/books">Books</a></li>
              <li><a class="dropdown-item" href="/genre">Genre</a></li>
              <li><a class="dropdown-item" href="/category">Cateogry</a></li>
              <li><a class="dropdown-item" href="/reader">Reader</a></li>
              {{-- <li><hr class="dropdown-divider"></li> --}}
              {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
        </ul>
        <form class="d-flex me-3" role="search">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
        <button class="btn btn-secondary ms-3" data-bs-toggle="modal" data-bs-target="#createForm">Add new</button>
        <a href="/logout/"><button class="btn btn-primary ms-3 me-5">Log out</button></a>
      </div>
    </div>
  </nav>