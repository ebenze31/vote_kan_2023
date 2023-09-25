@extends('layouts.app')

@section('content')

<style>
    *:not(i) {
        font-family: 'Prompt', sans-serif;
    }

    @media (max-width: 767px) {

        /* เพิ่มหรือปรับแต่ง CSS สำหรับมือถือที่มีความกว้างไม่เกิน 767px */
        .loginPC {
            display: none;
        }

        .radio-input-mobile-login input {
            display: none;
        }

        .radio-input-mobile-login {
            position: relative;
            display: flex;
            align-items: center;
            border-radius: 100px;
            background-color: #fff;
            color: #2c5597;
            width: 100%;
            overflow: hidden;
            border: 1px solid rgba(53, 52, 52, 0.226);
        }

        .radio-input-mobile-login label {
            width: 100%;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            font-weight: 600;
            letter-spacing: -1px;
            font-size: 3vw;
        }
        
        .selection-type-login {
            display: none;
            position: absolute;
            height: 100%;
            width: 50%;
            z-index: 0;
            left: 0;
            top: 0;
            transition: .15s ease;
        }

        .radio-input-mobile-login label:has(input:checked) {
            color: #fff;
        }

        .radio-input-mobile-login label:has(input:checked)~.selection-type-login {
            background-color: rgb(11 117 223);
            display: inline-block;
        }

        .radio-input-mobile-login label:nth-child(1):has(input:checked)~.selection-type-login {
            transform: translateX(calc(0%));
        }

        .radio-input-mobile-login label:nth-child(2):has(input:checked)~.selection-type-login {
            transform: translateX(calc(100%));
        }
        
    }

    @media(max-width: 450px){
        .font-alert-mobile{
            font-size: 3vw;
            
        }
        .font-header-alert-mobile{
            font-size: 3.9vw !important;
            font-weight: bold;
            
        }
        .alert-mobile{
            padding-right: 4px !important;
            padding-left: 4px !important;
        }

    }

    @media (min-width: 768px) {

        /* เพิ่มหรือปรับแต่ง CSS สำหรับแท็บเล็ตและคอมพิวเตอร์ที่มีความกว้างไม่ต่ำกว่า 768px */
        .loginMobile {
            display: none;

        }

        .headerLogin {
            font-weight: bold;
            margin: 0;
            color: #fff;
        }

        .detailLogin {
            font-size: 24px;
            font-weight: bold;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 25px 0 30px;
            color: #fff733;
        }


        .btnSwip {
            border-radius: 20px;
            border: 1px solid #0f72ac;
            background-color: #0f72ac;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .btnSwip:active {
            transform: scale(0.95);
        }

        .btnSwip:focus {
            outline: none;
        }

        .btnSwip.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        .btnSwipDanger:active {
            transform: scale(0.95);
        }

        .btnSwipDanger:focus {
            outline: none;
        }

        .btnSwipDanger.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }
        .formLogin {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        .inputLogin {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .containerLogin {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 850px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .containerLogin.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }
        .containerLogin.left-panel-active .sign-in-container {
            transform: translateX(100%);
        }
        .sign-up-container {
            left: -50%;
            width: 50%;
            opacity: 0;
            z-index: 9990000;
        }
        .select-customer-login{
            margin-left: 50% !important;
        }

        
        .containerLogin.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .containerLogin.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #2c5597;
            background: -webkit-linear-gradient(to right, #0f72ac, #2c5597);
            background: linear-gradient(to right, #0f72ac, #2c5597);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .containerLogin.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .containerLogin.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .text-vote-kan {
            color: #0f72ac !important;
        }

        .iconShowPassword {
            position: absolute;
            right: 0;
            border: 0;
            z-index: 99;
            top: 20%;
        }

    }

    .alert{
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 1100;
        animation: alertExrance .5s ease 0s 1 normal forwards;
    }

    @keyframes alertExrance {
    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}
.password-input{
    border-radius: 3px !important;
}
</style>
<div class="wrapper loginPC">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center">
        <div class="">

            <div class="containerLogin" id="containerLogin">
                <div class="form-container sign-in-container">
                    <form class="formLogin row g-3" action="#" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="headerLogin text-vote-kan mb-4">เข้าสู่ระบบ</h1>

                        <input type="email" class="form-control inputLogin @error('username') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="input-group p-0" id="show_hide_password">
                            <input type="password" class="form-control border-end-0 inputLogin @error('password') is-invalid @enderror password-input" id="password" name="password" value="" placeholder="Password" required autocomplete="current-password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @if (Route::has('password.request'))
                        <div class="d-flex justify-content-end w-100 d-none">
                            <a class="btn btn-link text-muted float-right p-0 mt-1" href="{{ route('password.request') }}?back={{ url()->full() }}">
                                {{ __('ลืมรหัสผ่าน ?') }}
                            </a>
                        </div>
                        @endif
                        <button class="btnSwip" type="submit">Login</button>

                        <span style="text-transform: uppercase;text-align: center;" class="col-md-2 mt-3 d-none d-lg-block"> หรือ </span>

                        <div class="col-12 main-shadow main-radius" style="background-color: #28A745;">
                            <a href="{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}">
                                <button style="padding-top: 5px; padding-bottom: 5px;color: #ffff;" type="button" class="btn">
                                    <img width="10%" class="main-shadow" style="border-radius: 20px;background-color: #ffff;" src="{{ asset('/img/icon_login/icon-line.png') }}">&nbsp;&nbsp; Login with LINE
                                </button>
                            </a>
                        </div>
                        <br><br>
                            
                    </form>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-1" style="left:5%;width:90%;position: absolute; top:82%;">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white me-2"><i class="bx bxs-message-square-x"></i>
                                </div>
                                <div class="w-100 float-left float-end">
                                    <h6 class="mb-0 text-white float-left float-end">Email หรือ Password ไม่ถูกต้อง</h6>
                                    <div class="text-white float-left float-end">กรุณาตรวจสอบและลองใหม่อีกครั้ง</div>
                                </div>
                            </div>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif

                </div>

                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                            <img src="{{ asset('/img/vote_kan/อบจ_กาญxวีเช็ค.png') }}" class="mb-2" width="250" alt="">
                            <h1 class="headerLogin">ระบบรายงาน<br>ผลคะแนน</h1>
                            <p class="detailLogin">(อย่างไม่เป็นทางกการ)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
