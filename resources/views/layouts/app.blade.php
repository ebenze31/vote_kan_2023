<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('img/logo/tcra.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('theme/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('theme/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('theme/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/icons.css')}}" rel="stylesheet">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <title>TCRA - สมาคมรถเช่าไทย</title>
</head>

<body>

    <!--wrapper-->
    <div class="wrapper">
        <div class="authentication-header"></div>
        <header class="login-header shadow">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{asset('')}}">
                        <img src="{{asset('img/logo/tcra.png')}}" width="50" alt="" />
                        สมาคมรถเช่าไทย
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"> <a class="nav-link active" aria-current="page" href="https://www.tcra.or.th/"><i class='bx bx-home-alt me-1'></i>Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
            <p class="mb-0">
                <img src="{{asset('img/logo/tcra.png')}}" width="20" alt="" />
                TCRA © Power by <a href="mailto:contact.viicheck.com" class="link text-secondary">2B-Green</a>
            </p>
        </footer>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--Password show & hide js -->
    <!--app JS-->
    <script src="{{asset('theme/js/app.js')}}"></script>
</body>

</html>