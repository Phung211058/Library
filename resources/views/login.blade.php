<!doctype html>
<html lang="en">

<head>
  <title>Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>

</style>
<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div id="contain">
      <p>Welcome blade</p>
      <div id="icon">
        <ion-icon name="logo-google"></ion-icon>
        <ion-icon name="logo-facebook"></ion-icon>
        <ion-icon name="logo-tiktok"></ion-icon>
      </div>
    </div>
    <div id="cover">
      {{-- <span id="show_success_alert" class="" role="alert"></span> --}}
    {{-- <p class="bg-success">egdbsvcsdergf</p> --}}
    <div class="alert" role="alert"></div>`

      <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link active" id="btn_signin" class="btn_signin" data-bs-toggle="tab" data-bs-target="#sign_in"
          type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sign in</button>
        </li>
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link" id="btn_signin" data-bs-toggle="tab" data-bs-target="#sign_up" 
          type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sign up</button>
        </li>
      </ul>
      {{-- Login form ______________________________________________________________________________________ --}}
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="sign_in" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="mt-4" id="divicon">
            <i class="fa-solid fa-envelope" id="logo"></i>
            <input type="text" name="log_email" id="log_email" placeholder="Email">
            <span></span>
          </div>
          <div class="mt-4" id="input">
            <i class="fa-solid fa-lock" id="logo"></i>
            <input type="password" name="log_pass" id="log_pass" placeholder="Password">
            <span></span>
          </div>
          <p class="mt-3 text-center text-danger" id="log_error"></p>
          <div id="button" class="mt-2">
            <button id="login_btn" class="btn btn-primary mt-2">Login</button>
          </div>
        </div>
        {{-- register form __________________________________________________________________________________ --}}
        <div class="tab-pane fade" id="sign_up" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mt-4" id="divicon">
              <i class="fa-solid fa-envelope" id="logo"></i>
              <input type="text" name="email" id="email" placeholder="Email">
              <span></span>
            </div>
            <p class="email_err"></p> 
            <div class="mt-4" id="input">
              <i class="fa-solid fa-phone" id="logo"></i>
              <input type="text" name="phone" id="phone" placeholder="Phone">
              <span></span>
            </div>
            <p class="phone_err"></p>
            <div class="mt-4" id="input">
              <i class="fa-solid fa-lock" id="logo"></i>
              <input type="password" name="pass" id="pass" placeholder="Password">
              <span></span>
            </div>
            <p class="pass_err"></p>
            <div class="mt-4" id="input">
            <i class="fa-solid fa-lock" id="logo"></i>
            <input type="password" name="cfpass" id="cfpass" placeholder="Confirm password">
            <span></span>
            </div>
            <p class="cfpass_err"></p>
            <div id="button" class="mt-2">
              <button value="" id="register_btn" class="btn btn-success mt-4">Register</button>
            </div>
        </div> 
      </div>
    </div>
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){
        $(document).on('click', '#register_btn', function(e){
          e.preventDefault();
          var data = {
            'email': $('#email').val(),
            'phone': $('#phone').val(),
            'pass': $('#pass').val(),
            'cfpass': $('#cfpass').val(),
          }

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });

          $.ajax({
            type: 'POST',
            url: '/register',
            data: data,
            dataType: 'json',
            success: function(response){
              if(response.status == 400){
                showerr(response.errors);
              }
              else{
                $('.alert').addClass('alert-success').text('Registration Success');
                clearerr();
              }
            }
          })
        })

        $(document).on('click', '#login_btn', function(e){
          e.preventDefault();
          var data = {
            'log_email': $('#log_email').val(),
            'log_pass': $('#log_pass').val(),
          }
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: 'POST',
            url: '/login',
            data: data,
            dataType: 'json',
            success: function(response) {
              console.log(response);
              if(response.status == 400){
                $.each(response.errors, function(key, value) {
                  $('#log_error').text(value);
                });
              }
              else if(response.status == 401) {
                $.each(response.errors, function(key, value) {
                  $('#log_error').text(value);
                });
              }
              else if(response.status == 200){
                $('#login_btn').text('Please waite...');
                window.location.href = '/books';
              }
            }
           })
        })

        $(document).on('click', '.btn_signin', function(e){
          e.preventDefault();
          $('.alert').removeClass('alert-success').text('');
        })

      })

      function showerr(errors){
        $.each(errors, function(key, value){
          $('.'+key+'_err').text(value);
      })}
      function clearerr(){
        $('#email').val('');
        $('#phone').val('');
        $('#pass').val('');
        $('#cfpass').val('');

        $('.email_err').text('');
        $('.phone_err').text('');
        $('.pass_err').text('');
        $('.cfpass_err').text('');
      }
    </script>
  </body>
</html>