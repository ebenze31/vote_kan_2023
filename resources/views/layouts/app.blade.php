<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('/img/logo-partner/command-center/กาญจนบุรี.png') }}" type="image/x-icon" />
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
    <title>ระบบรายงานผลคะแนน</title>
</head>

<style type="text/css">
    .main-shadow {
      box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }

    .main-radius {
      border-radius: 5px;
    }
</style>

<body>

    <!--wrapper-->
    <div class="wrapper">
        <div class="authentication-header"></div>
        <header class="login-header shadow">
            <!--  -->
        </header>

        @yield('content')

        <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
            <p class="mb-0">
                Powered by 
                <a href="mailto:contact.viicheck.com" class="link text-secondary">
                    <img src="{{ asset('/img/logo-partner/command-center/logo-viicheck-outline.png') }}" width="50" alt="" />
                </a>
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