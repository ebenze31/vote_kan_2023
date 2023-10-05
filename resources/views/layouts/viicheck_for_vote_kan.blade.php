<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor1">
<head>
<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- loader-->
	<link href="{{ asset('partner_new/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('partner_new/js/pace.min.js') }}"></script>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo-partner/command-center/กาญจนบุรี.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('partner_new/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('partner_new/plugins/notifications/css/lobibox.min.css') }}" />
	<link href="{{ asset('/partner_new/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- izitoast -->
	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>


	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('partner_new/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/header-colors.css') }}" />
	<!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('/partner/fonts/fontawesome/css/fontawesome-all.min.css') }}">
 	<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

	<!-- carousel -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;400&family=Taviraj&display=swap" rel="stylesheet">
    <!-- datatables -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" /> --}}

	<title id="title_theme">ระบบรายงานผลคะแนน</title>
</head>
<style>
    *:not(i) {
		font-family: 'Prompt', sans-serif !important;
	}
    
    .main-shadow{
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }
    .main-radius{
        border-radius: 5px;
    }
</style>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modal_reset" data-backdrop="static" data-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:999999999!important;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">รีเซ็ต หน่วย / คะแนน</h5>
            <button id="btn_close_modal_reset" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <center>
                <img src="{{ url('/img/STK/warning.png') }}" class="m-2" width="60%" >
            </center>
            <h3 class="mt-3 mb-3 text-danger">
                ยืนยัน
                <br>
                การรีเซ็ต หน่วย / คะแนน หรือไม่
            </h3>
            <div class="d-none" id="spinner_of_reset_stations">
                <a href="javascript:;" class="" aria-expanded="false">
                    <div class="parent-icon">
                        <div class="spinner-border text-success" role="status" ></div>
                    </div>
                    <div class="menu-title text-success">Loading...</div>
                </a>
            </div>
          </div>
          <div class="modal-footer">
            <span type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</span>
            <span type="button" class="btn btn-info" onclick="reset_stations();">ยืนยัน</span>
          </div>
        </div>
      </div>
    </div>

    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="has-arrow">
                <div class="sidebar-header">
                    <a href="{{ url('/vote_kan_index') }}">
                        <h6 class="logo-text">ผลคะแนน</h6>
                    </a>
                    <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
                    </div>
                </div>
            </div>
            <!--navigation-->
            @if( Auth::check() )
            <ul class="metismenu" id="menu">
                <!-- <li>
                    <a href="{{ url('/vote_kan_stations') }}" >
                        <div class="parent-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div class="menu-title">รายชื่อหน่วย</div>
                    </a>
                </li> -->
                <li>
					<a href="javascript:;" class="has-arrow" aria-expanded="false">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">หน่วยเลือกตั้ง</div>
					</a>
					<ul class="mm-collapse">
						<li> <a href="{{ url('/vote_kan_stations') }}"><i class="bx bx-right-arrow-alt"></i>ลงทะเบียนแล้ว</a>
						</li>
						<li> <a href="{{ url('/vote_kan_stations_not_registered') }}"><i class="bx bx-right-arrow-alt"></i>ยังไม่ได้ลงทะเบียน</a>
						</li>
					</ul>
				</li>
                <li>
                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                        <div class="parent-icon">
                            <i class="fa-duotone fa-hundred-points"></i>
                        </div>
                        <div class="menu-title">ผลคะแนน</div>
                    </a>
                    <ul class="mm-collapse">
                        <li> 
                            <a href="{{ url('/vote_kan_admin/show_score') }}" >
                                <i class="bx bx-right-arrow-alt"></i>คะแนนรวม
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/vote_kan_scores') }}">
                                <i class="bx bx-right-arrow-alt"></i>การกรอกคะแนน
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/vote_kan_all_scores') }}">
                                <i class="bx bx-right-arrow-alt"></i>คะแนนแต่ละอำเภอ
                            </a>
                        </li>
                    </ul>
                </li>

                @if( Auth::user()->role == "admin" )
                    <li>
                        <a href="javascript:;" class="" aria-expanded="false" data-toggle="modal" data-target="#modal_reset" >
                            <div class="parent-icon">
                                <i class="fa-solid fa-repeat text-danger"></i>
                            </div>
                            <div class="menu-title">รีเซ็ต หน่วย / คะแนน</div>
                        </a>
                    </li>
                @endif
                
            </ul>
            @endif
            <!--end navigation-->
            <script>
                function reset_stations(){

                    document.querySelector('#spinner_of_reset_stations').classList.remove('d-none');

                    fetch("{{ url('/') }}/reset_vote_kan_data_stations/")
                        .then(response => response.text())
                        .then(result => {
                            // console.log(result);
                            if (result == "ดำเนินการเรียบร้อย") {
                                document.querySelector('#spinner_of_reset_stations').classList.add('d-none');
                                document.querySelector('#btn_close_modal_reset').click();
                            }

                        });
                }
            </script>

        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center" style="background-color:#3495c9!important;">
                <nav class="navbar navbar-expand">
                    <!-- <div class="mobile-toggle-menu"> -->
                        <!-- <i class='bx bx-menu'></i> -->
                    <!-- </div> -->

                    <!-- แสดงเฉพาะมือถือ -->
                    <div class="d-block d-md-none">
                        <div class="row">
                            <div class="col-3">
                                <img width="80" src="{{ asset('/img/vote_kan/อบจ_กาญxวีเช็ค.png') }}">
                            </div>
                            <div class="col-9 d-flex align-items-center justify-content-center">
                                <span class="text-white">
                                    อบจ. กาญจนบุรี ร่วมกับ วีเช็ค 
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- แสดงเฉพาะคอม -->
                    <div class="d-none d-lg-block">
                        <img width="50" src="{{ asset('/img/logo-partner/command-center/กาญจนบุรี.png') }}">
                        <span class="text-white"> x </span>
                        <img width="45" src="{{ asset('/img/logo-partner/command-center/วีเช็ค.png') }}">
                        <span class="text-white" style="margin-left: 10px;">
                            องค์การบริหารส่วนจังหวัดกาญจนบุรี ร่วมกับ ViiCHECK  รายงานผลการนับคะแนน (อย่างไม่เป็นทางการ)
                        </span>
                    </div>

                    <!-- <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="app-emailbox.html"><i class='bx bx-envelope'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-chat-box.html"><i class='bx bx-message'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-fullcalender.html"><i class='bx bx-calendar'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-to-do.html"><i class='bx bx-check-square'></i></a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon d-none">
                                <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="row row-cols-3 g-3 p-3">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                                            </div>
                                            <div class="app-title">Teams</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
                                            </div>
                                            <div class="app-title">Projects</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
                                            </div>
                                            <div class="app-title">Tasks</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
                                            </div>
                                            <div class="app-title">Feeds</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                                            </div>
                                            <div class="app-title">Files</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
                                            </div>
                                            <div class="app-title">Alerts</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                            ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                            ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown d-none d-lg-block">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: 10px;">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0" style="color: #ffffff!important;">
                                    @if(Auth::check())
                                        {{Auth::user()->name}}
                                    @endif
                                </p>
                            </div>
                            <div style="margin-left:10px ;">
                            <i class="fa-solid fa-bars text-white"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">    
                            <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>

                                <a class="dropdown-item btn" onclick="event.preventDefault();document.getElementById('logout_form_vote_kan').submit();">
                                    <i class='bx bx-log-out-circle'></i><span>Logout</span>
                                </a>

                                <form id="logout_form_vote_kan" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer" style="z-index: 999999999;">
            <p class="m-0">รายงานผลการนับคะแนน (อย่างไม่เป็นทางการ)</p>
            <p class="mb-0">
                Powered by 
                <a href="mailto:contact.viicheck.com" class="link text-secondary">
                    <img src="{{ asset('/img/logo-partner/command-center/logo-viicheck-outline.png') }}" width="50" alt="" />
                </a>
            </p>
        </footer>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://unpkg.com/izitoast/dist/js/iziToast.min.js'></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('partner_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/highcharts/js/highcharts.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/highcharts/js/exporting.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/highcharts/js/variable-pie.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/highcharts/js/export-data.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/highcharts/js/accessibility.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('partner_new/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script>
      new PerfectScrollbar('.dashboard-top-countries');
    </script>
    <script src="{{ asset('partner_new/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('partner_new/js/app.js') }}"></script>
    <script>
        const counterAnim = (qSelector, start = 0, end, duration = 1000) => {
            const target = document.querySelector(qSelector);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                target.innerText = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        };
    </script>
</body>

</html>
