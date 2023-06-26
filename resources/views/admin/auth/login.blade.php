<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ get_from_setting('app_name') }} | Log in </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
    .error {
        border-color: red;
    }

    .feedback {
        color: red
    }

    .my-auto {
        margin-top: auto;
        margin-bottom: auto;
    }

    .logo {
        width: 85%;
    }

    .logo1 img {
        /* width: 100px; */
        z-index: 9;
        position: relative;
    }

    .logo2 img {
        width: 200px;
        position: relative;
        z-index: 9;
    }

    .login-page,
    .register-page {
        /* /background-image: url(images/banner.png); */
        position: relative;
        background-repeat: no-repeat;
        align-items: center;
        object-fit: cover;
        background-position: center;
        background-size: 100% 100%;
        min-height: 100vh !important;
        height: inherit;
        background-color: #fff !important;
    }

    .login-page::after,
    .register-page::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        /* background: transparent linear-gradient(90deg, #1C84A6 0%, #386BB2 25%, #7356A3 49%, #903B94 72%, #C54961 100%) 0% 0% no-repeat padding-box;
opacity: 0.5; */
        /* background-color: #577FB3; */
        /* background-color: transparent linear-gradient(180deg, #577FB3 0%, #577EB3F8 11%, #577EB3E4 24%, #577EB3C3 38%, #577EB394 53%, #577EB358 68%, #577EB310 84%, #577EB300 87%) 0% 0% no-repeat padding-box; */
        mix-blend-mode: multiply;
        /* opacity: 1; */
    }

    .logo-header {
        margin-bottom: 0;
        z-index: 9;
        padding: 20px 35px;
        align-items: center;
        position: relative;
    }

    .logo-header::after {
        content: "";
        position: absolute;
        /* width: 100%; */
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* background: transparent linear-gradient(180deg, #577FB3 0%, #577EB3F8 11%, #577EB3E4 24%, #577EB3C3 38%, #577EB394 53%, #577EB358 68%, #577EB310 84%, #577EB300 87%) 0% 0% no-repeat padding-box; */
        /* mix-blend-mode: multiply; */
        opacity: 1;
    }

    .login-box,
    .register-box {
        width: 360px;
        z-index: 9;
    }

    /* .logo-header img {
        width: 350px;
    } */

    .login-box .card,
    .register-box .card {
        margin-bottom: 0;
        box-shadow: none;
        background: transparent;
        border: 0;
    }

    .input-group {
        border: 1px solid #000;
        /* border-radius: 5px; */
        background: #E7E8EA;
    }

    .input-group input.form-control {
        background: transparent;
        border: 0;
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
    }

    .input-group-text {
        background-color: transparent;
        color: #484848;
        border: 0;
        padding: 10px 0px 10px 20px;
    }

    .login-box-msg,
    .register-box-msg {
        color: #000;
        font-size: 16px;
        font-weight: 500;
        margin: 0;
        padding: 0 0px 10px;
        text-align: left;
        font-family: 'Montserrat', sans-serif;
    }

    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 100;
        color: #fff;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
    }

    .remember-forgot-box {
        /* display: flex; */
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .forgot-pass-box a {
        color:#F6917D;
        font-size: 14px;
        font-weight: 400;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-primary {
        background-color: #000;
        border: 3px solid #000;
        border-radius: 25px;
        color: #fff;
        /* background-color: #007bff; */
        border-color: none;
        /* box-shadow: none; */
        margin-bottom: 0px;
        margin-top: 30px;
        font-size: 12px;
        width: 100%;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-primary:hover {
        background-color: #000;
        border: 3px solid #000;
        /* border-radius: 5px; */
        color: #fff;
        /* background-color: #007bff; */
        border-color: none;
        /* box-shadow: none; */
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        transition: background-color 5000000s ease-in-out 0s;
        -webkit-text-fill-color: #484848 !important;
    }

    .btn-primary img {
        width: 15px;
    }

    [class*=icheck-]>label {
        line-height: 15px;
        min-height: 15px;
    }

    [class*=icheck-]>input:first-child+label::before {
        width: 15px;
        height: 15px;
        margin-left: -20px;
    }

    a.register-noe {
        color: #fff;
        /* border-bottom: 1px solid; */
        display: inline-block;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
    }

    [class*=icheck-]>input:first-child:checked+label::after {
        top: -5px;
        left: 7px;
        width: 7px;
    }

    .login-box,
    .register-box {
        width: 420px;
        padding: 30px 30px 5px;
        box-sizing: border-box;
        /* background-color: rgb(0 0 0/ 50%); */
        background-color: rgb(248 237 235/ 10%) !important;
        /* margin: auto 30px auto 30px; */
        border: 1px solid #3d3c3c;
        /* box-shadow: 20px 20px 50px 10px #efb3b3; */
        /* background: rgb(0 40 65 / 88%); */
        /* mix-blend-mode: multiply; */
        /* opacity: 0.88; */
    }

    .card-body {
        padding: 0;
    }

    .club-img img {
        width: 50%;
    }

    .club-img {
        text-align: center !important;
        margin-bottom: 30px;
    }

    .back-btn {
        text-align: right;
        display: block;
        color: #fff;
        /* border-bottom: 1px solid #fff; */
        /* width: max-content; */
        /* margin: 0 auto; */
        font-size: 14px;
        font-family: 'Montserrat', sans-serif;
    }

    .back-btn:hover {
        color: #fff;
    }

    .disclaim-txt {
        text-align: right;
        width: 100%;
        color: #fff;
        font-size: 10px;
        padding-right: 20px;
        margin-bottom: 20px;
        letter-spacing: 0.09px;
    }

    #preloadernew {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        overflow: hidden;
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .preloadernew video {
        width: 100vw;
        height: auto;
        object-fit: fill;
    }

    @media screen and (max-width: 767px) {
        .logo1 img {
            width: 75px;
        }

        .logo2 img {
            width: 120px;
        }

        .login-box,
        .register-box {
            width: calc(100% - 20px);
            margin: auto 10px 10px 10px;
        }

        .login-page,
        .register-page {
            background-image: url(images/mobile.jpg);
        }

        /* .login-page, .register-page{
            height: 100%;
        } */
    }

    .toggle-password {
    position: relative;
    cursor: pointer;
    }

    .toggle-password i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #999;
    }

    .toggle-password i:hover {
    color: #555;
    }

    .forgot-pass-box{color: #fff !important;font-size: 13px;text-align: center;}
    </style>
</head>

<body class="hold-transition ">
    <div class="login-page">
        <div class="logo-header d-flex justify-content-between">
            <a href="{{url('/login')}}" class="logo-img logo1"><img src="http://reneebackyard.com/images/system_images/1687688879renee.png" class="img-fluid" alt=""></a>
           
        </div>
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
               
                <div class="card-body">
                    {{-- <div class="club-img">
                        <img src="images/metabolik.png" class="img-fluid" alt="">
                    </div>  --}}
                    <p class="login-box-msg">Welcome Back! Let's Get You Logged In.</p>
                    @error('email')
                    <p class="feedback">{{ $message }}</p>
                    @enderror

                    @error('password')
                    <p class="feedback">{{ $message }}</p>
                    @enderror
                    <form autocomplete="off" class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <input name="email" type="email" class="form-control @error('email')  error @enderror" placeholder="Email" required>


                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input name="password" id="password" type="password"
                                class="form-control  @error('email')  error @enderror " placeholder="Password" required>
                                <span id="togglePassword" class="toggle-password" onclick="togglePasswordField()">
                                    <i class="fas fa-eye"></i>
                                  </span>

                        </div>
                        <div class="">
                            
                           
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark btn-block">Submit <img
                                        src="images/icon_signin.svg" class="img-fluid" alt=""></button>
                            </div><br>
                            <!-- /.col -->
                        </div>
                       
                    </form>

                    <!-- /.social-auth-links -->

                  

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
        

    </div>

   

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
       function togglePasswordField() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword").querySelector("i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
            }
    
    </script>
</body>

</html>