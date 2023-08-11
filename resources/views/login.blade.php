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
      <span id="show_success_alert" class="" role="alert"></span>
      <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link active" id="btn_signin" data-bs-toggle="tab" data-bs-target="#sign_in"
          type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sign in</button>
        </li>
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link" id="btn_signin" data-bs-toggle="tab" data-bs-target="#sign_up" 
          type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sign up</button>
        </li>
      </ul>
      {{-- Login --}}
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="sign_in" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="mt-4" id="divicon">
            <i class="fa-solid fa-envelope" id="logo"></i>
            <input type="text" placeholder="Email">
            <span></span>
          </div>
          <div class="mt-4" id="input">
            <i class="fa-solid fa-lock" id="logo"></i>
            <input type="text" placeholder="Password">
            <span></span>
          </div>
          <div id="button" class="mt-2">
            <button class="btn btn-primary mt-4">Login</button>
          </div>
        </div>
        {{-- register --}}
        <div class="tab-pane fade" id="sign_up" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <form action="{{ route('admin_register') }}" method="POST" id="register_form">
            {{-- @csrf --}}
            {{ csrf_field() }}
            <div class="mt-4" id="divicon">
              <i class="fa-solid fa-envelope" id="logo"></i>
              <input type="text" name="email" id="email" placeholder="Email">
              <span></span>
            </div>
            <p class="invalid_feedback email_error"></p>
            <div class="mt-4" id="input">
              <i class="fa-solid fa-phone" id="logo"></i>
              <input type="text" name="phone" id="phone" placeholder="Phone">
              <span></span>
            </div>
            <p class="invalid_feedback phone_error"></p>
            <div class="mt-4" id="input">
              <i class="fa-solid fa-lock" id="logo"></i>
              <input type="text" name="pass" id="pass" placeholder="Password">
              <span></span>
            </div>
            <p class="invalid_feedback password_error"></p>
            <div class="mt-4" id="input">
            <i class="fa-solid fa-lock" id="logo"></i>
            <input type="text" name="cfpass" id="cfpass" placeholder="Confirm password">
            <span></span>
            </div>
            <p class="invalid_feedback"></p>
            <div id="button" class="mt-2">
              <button value="Login" id="register_btn" class="btn btn-success mt-4">Register</button>
            </div>
        </form>
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
    {{-- <script src="{{ asset('js/function.js') }}"></script> --}}
    <script>
      // $(document).ready(function(){
      //   $("#register_btn").click(function(e){
      //     e.preventDefault();
      //     // alert('hello');
      //     var _token = $("input[name='_token']").val();
      //     var email = $("input[name='email']").val();
      //     var phone = $("input[name='phone']").val();
      //     var pass = $("input[name='pass']").val();
      //     var cfpass = $("input[name='cfpass']").val();
      //   })
      //   $.ajax({
      //     url: "{{ route('admin_register') }}",
      //     type: "POST",
      //     data: {email:email, phone:phone, pass:pass, cfpass:cfpass},
      //     success: function(data){
      //       if($.isEmptyObject(data.errors)){
      //         $(".invalid_feedback").html('');
      //         alert(data.success);
      //       }
      //       else{
      //         let resp = data.errors;
      //         for(index in resp){
      //           $(".invalid_feedback").html(resp[index]);
      //         }
      //       }
      //     }
      //   })
      // })
      
      
      $(function(){
        $("#register_form").submit(function(e){
          // alert('Hello');
          e.preventDefault();
          $("#register_btn").text('Please wait...');
          $.ajax({
            url: '{{ route('admin_register') }}',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
              console.log(res);
              if(res.status == 400){
                showError('email', res.messages.email);
                showError('phone', res.messages.phone);
                showError('pass', res.messages.pass);
                showError('cfpass', res.messages.cfpass);
              }
              else if(res.status == 200){
                $("#show-success-alert").html(showMessage('success', res.messages));
                $("#register_form")[0].reset();
                removeValidationClasses("#register_form");
                $("#register_btn").text('Register');
              }
            }
          })
        })
      })
    </script>
    {{-- <script>
      $(function(){
        $('#register_form').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new Formdata(this), 
            processData: false,
            dataType: 'json',
            contenType: false,
            beforeSend: function(){
              $(document).find('p.invalid-feedback').text('');
            },
            success: function(data){
              if(data.status == 400 ){
                $.each(data.error, function(index, val){
                  $('p.')
                });
              }
            }
          })
        })
      })
    </script> --}}
</body>

</html>