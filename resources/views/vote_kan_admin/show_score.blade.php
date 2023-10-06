@extends('layouts.viicheck_for_vote_kan')

@section('content')

<style>
    .divScore{
        background: linear-gradient(to right, #3b80e9, #1f62e0)!important;
    }

    .divScore-num-1{
        background: linear-gradient(to right, #fa8532, #ff6a00)!important;
    }

    .divScore-num-2{
        background: linear-gradient(to right, #f59fd0, #E476B5)!important;
    }

    .rank_score {
        width: 180px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        border-radius: 20px;
        border-style: double;
        /* margin-left: 45%; */
    }

    .gold_color_gradient {
        background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                    radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
    }

    .silver_color_gradient {
    background:
        radial-gradient(ellipse farthest-corner at right bottom, #C0C0C0 0%, #B0B0B0 8%, #A9A9A9 30%, #808080 40%, transparent 80%),
        radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #F0F0F0 8%, #D3D3D3 25%, #A9A9A9 62.5%, #A9A9A9 100%);
    }

    .bronze_color_gradient {
        background:
            radial-gradient(ellipse farthest-corner at right bottom, #CD7F32 0%, #A0522D 8%, #8B4513 30%, #704214 40%, transparent 80%),
            radial-gradient(ellipse farthest-corner at left top, #D2691E 0%, #A0522D 8%, #8B4513 25%, #704214 62.5%, #704214 100%);
    }
    @media (max-width:576px) {
        .name-section{
            margin-top: 15px;
        }
    }
</style>



<div class="row ">
    <div class="col-12">
        <img src="{{ asset('/img/vote_kan/banner.png') }}" class="banner_pc" style="width:100%;" alt="">
    </div>
    <div class="col-12">
        <span class="float-end mt-3">
            อัพเดทล่าสุด : <span id="time_update_data">{{ date("H:i") }} น.</span>
        </span>
    </div>
</div>

<hr>

<div class="row row-cols-1 row-cols-lg-2 ">

    <div class="col">
        <div id="card_num_1" class="card radius-10 overflow-hidden divScore-num-1">
            <div class="card-body">
                <div class="d-flex align-items-center row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-5  img-section">
                        <div class="col-12 d-flex justify-content-center">
                            <img class="card-img" style="width: clamp(140px, 75%, 208px);" src="{{ asset('/img/vote_kan/1.png') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 col-xl-7 name-section text-center mt-sm-3 mt-xs-3">
                        <div class="d-flex justify-content-center">
                            <span class="rank_score divScore text-white mb-3 font-35">
                                <span style="font-size:25px!important;">หมายเลข</span>&nbsp;1
                            </span>
                        </div> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นายสุกวี แสงเป่า</h3>
                        <h3 class="mb-0 mt-3 text-white font-weight-bold">
                            <span id="show_text_score_1"></span> คะแนน
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div id="card_num_1" class="card radius-10 overflow-hidden divScore-num-2">
            <div class="card-body">
                <div class="d-flex align-items-center row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-5  img-section">
                        <div class="col-12 d-flex justify-content-center">
                            <img class="card-img" style="width: clamp(140px, 75%, 208px);" src="{{ asset('/img/vote_kan/2.png') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 col-xl-7 name-section text-center mt-sm-3 mt-xs-3">
                        <div class="d-flex justify-content-center">
                            <span class="rank_score divScore text-white mb-3 font-35">
                                <span style="font-size:25px!important;">หมายเลข</span>&nbsp;2
                            </span>
                        </div> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นายประวัติ กิจธรรมกูลนิจ</h3>
                        <h3 class="mb-0 mt-3 text-white font-weight-bold">
                            <span id="show_text_score_2"></span> คะแนน
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<div class="row">
    <style>
        /* สร้างแถบบาร์แบ่งสี */
        .bar-linear {
            position: relative;
            width: 100%; /* กำหนดความสูงของแถบ */
            height: 40px; /* กำหนดความสูงของแถบ */
            background-color: #e3e3e3;
            overflow: hidden;
        }

        .bar-linear-percentage{
            background: linear-gradient(to right, #ff6a00 50%, #E476B5 50%);
        }

        /* สร้างคำของความสัดส่วน 70% และ 30% */
        .percentage-left,
        .percentage-right {
            position: absolute;
            top: 0;
            color: white; /* สีตัวอักษร */
            line-height: 40px; /* ขยายสูงให้ตรงกับความสูงของแถบ */
            font-size: 30px;
        }

        .percentage-left {
            left: 5px; /* ตำแหน่งต่อส่วนซ้าย */
        }

        .percentage-right {
            right: 5px; /* ตำแหน่งต่อส่วนขวา */
        }

        .bar-linear:after {
          content: "";
          position: absolute;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          background: linear-gradient(110deg, rgba(227, 227, 227, 0) 0%, rgba(227, 227, 227, 0) 20%, rgba(227, 227, 227, 0.5) 30%, rgba(227, 227, 227, 0) 40%, rgba(227, 227, 227, 0) 80%);
          animation: gradient-animation_2 8s linear infinite;
        }

        @keyframes gradient-animation_2 {
          0% {
            transform: translateX(-100%);
          }

          100% {
            transform: translateX(1000%);
          }
        }

    </style>


    <div class="col-12 mt-3">
        <div class="bar-linear bar-linear-percentage main-shadow main-radius">
            <span id="text_linear_percentage_1" class="percentage-left">50%</span>
            <span id="text_linear_percentage_2" class="percentage-right">50%</span>
        </div>
    </div>

</div>

<hr class="my-4" style="border: skyblue solid 2px;color: skyblue;">

<div class="col-12 text-center">
    <h2>ผลการนับคะแนนแต่ละอำเภอ</h2>
</div>

@if(!empty($data_score))
<div id="carousel_sum_score_amphoe" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-inner">

        @foreach($data_score as $item)

        @php
            $active = '';
            if($item->name_amphoe == 'เมืองกาญจนบุรี'){
                $active = 'active';
            }
        @endphp
        <div class="carousel-item {{ $active }}" data-bs-interval="10000">
            <div class="card radius-10">
                <div class="card-header">
                    <h4>{{ $item->name_amphoe }}</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9 card-body">
                        <div id="{{ $item->name_amphoe }}"></div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">

                        <div class="card radius-10 divScore-num-1 mt-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เบอร์ 1</p>
                                        <h4 class="my-1 text-white">
                                            คิดเป็น <b id="text_show_percen_1_{{ $item->name_amphoe }}"> </b>%
                                        </h4>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <img src="{{ url('/img/STK/percent.png') }}" width="50">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card radius-10 divScore-num-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เบอร์ 2</p>
                                        <h4 class="my-1 text-white">
                                            คิดเป็น <b id="text_show_percen_2_{{ $item->name_amphoe }}"> </b>%
                                        </h4>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <img src="{{ url('/img/STK/percent.png') }}" width="50">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="radius-10 mt-4 bg-gradient-Ohhappiness d-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0 text-white">นับคะแนนแล้ว</h5>
                                        <h3 class="mb-0 text-white">
                                            <span id="percentage_{{ $item->name_amphoe }}">
                                                <!-- percentage  -->
                                            </span>%
                                        </h3>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-percent font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div id="line_percentage_{{ $item->name_amphoe }}" class="progress-bar bg-white" role="progressbar" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="carousel-item" data-bs-interval="10000">
            <div class="card-header">
                <h4>การช่วยเหลือที่รวดเร็วกว่าเดิม</h4>
            </div>
            <div class="row">
                <div class="col-9 card-body">
                    <img src="{{ asset('/img/vote_kan/Limited Edition (1).png') }}" class="banner_pc" style="width:100%;" alt="">
                </div>
            </div>
            
        </div>

    </div>
    <div class="d-flex justify-content-between">
        <a class="" href="#carousel_sum_score_amphoe" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style=" background-color: #2366e1 !important;border-radius: 5px;
	margin: 20px;"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <ol class="carousel-indicators mt-5">
            <li class="text-danger" style=" background-color: #2366e1;" data-bs-target="#carousel_sum_score_amphoe" data-bs-slide-to="0" class="active">
            </li>
            @for($i = 1; $i < 14 ; $i++)
            <li class="text-danger" style=" background-color: #2366e1;" data-bs-target="#carousel_sum_score_amphoe" data-bs-slide-to="{{ $i }}" class="">
            </li>
            @endfor
        </ol>
        <a class="" href="#carousel_sum_score_amphoe" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style=" background-color: #2366e1 !important;border-radius: 5px;
	margin: 20px;"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    
   
</div>
<hr>
@endif

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    let score_num_1 = 0;
    let score_num_2 = 0;
    let amount_person = [] ;
    let percentage_a_1 ;
    let percentage_a_2 ;
    let score_number_1 ;
    let score_number_2 ;

    let amphoe_score_1_2 ;

    @foreach($data_score as $data_item)
        
        percentage_a_1 = 0;
        percentage_a_2 = 0;
        amphoe_score_1_2 = 0;

        @if(!empty($data_item->number_1))
            score_num_1 = score_num_1 + parseInt("{{ $data_item->number_1 }}");
        @endif
        @if(!empty($data_item->number_2))
            score_num_2 = score_num_2 + parseInt("{{ $data_item->number_2 }}");
        @endif

        score_number_1 = parseInt("{{ $data_item->number_1 }}");
        score_number_2 = parseInt("{{ $data_item->number_2 }}");

        amphoe_score_1_2 = score_number_1 + score_number_2 ;

        if(amphoe_score_1_2){
            percentage_a_1 = ( score_number_1  / amphoe_score_1_2 ) * 100 ;
            percentage_a_2 = ( score_number_2  / amphoe_score_1_2 ) * 100 ;
        }

        document.querySelector('#text_show_percen_1_{{ $data_item->name_amphoe }}').innerHTML = percentage_a_1.toFixed(0);
        document.querySelector('#text_show_percen_2_{{ $data_item->name_amphoe }}').innerHTML = percentage_a_2.toFixed(0);

    @endforeach

    let format_num_1 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(score_num_1) ;
    let format_num_2 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(score_num_2) ;

    document.querySelector('#show_text_score_1').innerHTML = format_num_1.toString();
    document.querySelector('#show_text_score_2').innerHTML = format_num_2.toString();

    let all_score_1_2 = score_num_1 + score_num_2 ;
        // console.log(all_score_1_2);

    if(all_score_1_2){

        let percentage_vs_1 = ( score_num_1  / all_score_1_2 ) * 100 ;
        let percentage_vs_2 = ( score_num_2  / all_score_1_2 ) * 100 ;

        document.querySelector('#text_linear_percentage_1').innerHTML = percentage_vs_1.toFixed(0) + "%" ;
        document.querySelector('#text_linear_percentage_2').innerHTML = percentage_vs_2.toFixed(0) + "%" ;

        let for_style = percentage_vs_1.toFixed(0) ;
        let linear_percentage = document.querySelector('.bar-linear-percentage');
            linear_percentage.setAttribute('style' , 'background: linear-gradient(to right, #ff6a00 '+for_style+'%, #E476B5 '+for_style+'%)!important;');
    }

</script>


<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        setTimeout(() => {

            for (let i = 0; i < 13; i++) {
                let name_key = "amphoe_" + parseInt(i + 1);
                Create_graph(name_amphoe[name_key] , update_score_num_1[name_key] , update_score_num_2[name_key]);
            }

        }, 2000);

        var reface_Create_graph = setInterval(function() {
            loop_Create_graph();
        }, 60000);
        // }, 25000);

    });

    function loop_Create_graph(){

        // console.log('loop_Create_graph');

        fetch("{{ url('/') }}/api/get_data_show_score")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                document.querySelector('#show_text_score_1').innerHTML = result['sum_num_1'] ;
                document.querySelector('#show_text_score_2').innerHTML = result['sum_num_2'] ;

                counterAnim("#show_text_score_1", score_num_1, result['sum_num_1'], 1500); // 1.5 วินาที
                counterAnim("#show_text_score_2", score_num_2, result['sum_num_2'], 1500); // 1.5 วินาที

                let loop_format_num_1 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(result['sum_num_1']) ;
                let loop_format_num_2 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(result['sum_num_2']) ;

                setTimeout(() => {
                    document.querySelector('#show_text_score_1').innerHTML = loop_format_num_1 ;
                    document.querySelector('#show_text_score_2').innerHTML = loop_format_num_2 ;
                }, 1600);

                score_num_1 = result['sum_num_1'] ;
                score_num_2 = result['sum_num_2'] ;

                // คิดเปอร์เซนต์ทั้งจังหวัด
                let loop_all_score_1_2 = score_num_1 + score_num_2 ;

                let loop_percentage_vs_1 = ( score_num_1  / loop_all_score_1_2 ) * 100 ;
                let loop_percentage_vs_2 = ( score_num_2  / loop_all_score_1_2 ) * 100 ;

                document.querySelector('#text_linear_percentage_1').innerHTML = loop_percentage_vs_1.toFixed(0) + "%" ;
                document.querySelector('#text_linear_percentage_2').innerHTML = loop_percentage_vs_2.toFixed(0) + "%" ;

                let loop_for_style = loop_percentage_vs_1.toFixed(0) ;
                let loop_linear_percentage = document.querySelector('.bar-linear-percentage');
                    loop_linear_percentage.setAttribute('style' , 'background: linear-gradient(to right, #ff6a00 '+loop_for_style+'%, #E476B5 '+loop_for_style+'%)!important;');

                update_score_num_1 = {
                    "amphoe_1" : result['score_amphoe_num_1']['amphoe_1'],
                    "amphoe_2" : result['score_amphoe_num_1']['amphoe_2'],
                    "amphoe_3" : result['score_amphoe_num_1']['amphoe_3'],
                    "amphoe_4" : result['score_amphoe_num_1']['amphoe_4'],
                    "amphoe_5" : result['score_amphoe_num_1']['amphoe_5'],
                    "amphoe_6" : result['score_amphoe_num_1']['amphoe_6'],
                    "amphoe_7" : result['score_amphoe_num_1']['amphoe_7'],
                    "amphoe_8" : result['score_amphoe_num_1']['amphoe_8'],
                    "amphoe_9" : result['score_amphoe_num_1']['amphoe_9'],
                    "amphoe_10" : result['score_amphoe_num_1']['amphoe_10'],
                    "amphoe_11" : result['score_amphoe_num_1']['amphoe_11'],
                    "amphoe_12" : result['score_amphoe_num_1']['amphoe_12'],
                    "amphoe_13" : result['score_amphoe_num_1']['amphoe_13'],
                };

                update_score_num_2 = {
                    "amphoe_1" : result['score_amphoe_num_2']['amphoe_1'],
                    "amphoe_2" : result['score_amphoe_num_2']['amphoe_2'],
                    "amphoe_3" : result['score_amphoe_num_2']['amphoe_3'],
                    "amphoe_4" : result['score_amphoe_num_2']['amphoe_4'],
                    "amphoe_5" : result['score_amphoe_num_2']['amphoe_5'],
                    "amphoe_6" : result['score_amphoe_num_2']['amphoe_6'],
                    "amphoe_7" : result['score_amphoe_num_2']['amphoe_7'],
                    "amphoe_8" : result['score_amphoe_num_2']['amphoe_8'],
                    "amphoe_9" : result['score_amphoe_num_2']['amphoe_9'],
                    "amphoe_10" : result['score_amphoe_num_2']['amphoe_10'],
                    "amphoe_11" : result['score_amphoe_num_2']['amphoe_11'],
                    "amphoe_12" : result['score_amphoe_num_2']['amphoe_12'],
                    "amphoe_13" : result['score_amphoe_num_2']['amphoe_13'],
                };

                amount_person = [];
                amount_person = {
                    "amphoe_1" : result['amount_person']['amphoe_1'],
                    "amphoe_2" : result['amount_person']['amphoe_2'],
                    "amphoe_3" : result['amount_person']['amphoe_3'],
                    "amphoe_4" : result['amount_person']['amphoe_4'],
                    "amphoe_5" : result['amount_person']['amphoe_5'],
                    "amphoe_6" : result['amount_person']['amphoe_6'],
                    "amphoe_7" : result['amount_person']['amphoe_7'],
                    "amphoe_8" : result['amount_person']['amphoe_8'],
                    "amphoe_9" : result['amount_person']['amphoe_9'],
                    "amphoe_10" : result['amount_person']['amphoe_10'],
                    "amphoe_11" : result['amount_person']['amphoe_11'],
                    "amphoe_12" : result['amount_person']['amphoe_12'],
                    "amphoe_13" : result['amount_person']['amphoe_13'],
                };

                for (let zi = 0; zi < 13; zi++) {
                    let name_key = "amphoe_" + parseInt(zi + 1);

                    Create_graph(
                        name_amphoe[name_key],
                        update_score_num_1[name_key],
                        update_score_num_2[name_key]
                    );

                    percentage_a_1 = 0;
                    percentage_a_2 = 0;
                    amphoe_score_1_2 = 0;

                    score_number_1 = parseInt(update_score_num_1[name_key]);
                    score_number_2 = parseInt(update_score_num_2[name_key]);

                    amphoe_score_1_2 = score_number_1 + score_number_2 ;

                    if(amphoe_score_1_2){
                        percentage_a_1 = ( score_number_1  / amphoe_score_1_2 ) * 100 ;
                        percentage_a_2 = ( score_number_2  / amphoe_score_1_2 ) * 100 ;
                    }

                    document.querySelector('#text_show_percen_1_'+name_amphoe["amphoe_" + parseInt(zi + 1)]).innerHTML = percentage_a_1.toFixed(0);
                    document.querySelector('#text_show_percen_2_'+name_amphoe["amphoe_" + parseInt(zi + 1)]).innerHTML = percentage_a_2.toFixed(0);

                }

            });

        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0'); // ชั่วโมง
        let minutes = now.getMinutes().toString().padStart(2, '0'); // นาที
        let formattedDate = `${hours}:${minutes}`;

        document.querySelector('#time_update_data').innerHTML = formattedDate + " น.";

    }

    
    // ---------------------------------------
    var update_score_num_1 = [];
    var update_score_num_2 = [];
    var name_amphoe = [];

    name_amphoe = {
        "amphoe_1" : "เมืองกาญจนบุรี",
        "amphoe_2" : "ท่ามะกา",
        "amphoe_3" : "ทองผาภูมิ",
        "amphoe_4" : "สังขละบุรี",
        "amphoe_5" : "พนมทวน",
        "amphoe_6" : "เลาขวัญ",
        "amphoe_7" : "ศรีสวัสดิ์",
        "amphoe_8" : "ด่านมะขามเตี้ย",
        "amphoe_9" : "หนองปรือ",
        "amphoe_10" : "ห้วยกระเจา",
        "amphoe_11" : "ท่าม่วง",
        "amphoe_12" : "บ่อพลอย",
        "amphoe_13" : "ไทรโยค",
    };

    update_score_num_1 = {
        @foreach($data_score as $data)
            "amphoe_{{ $data->id }}" : "{{ $data->number_1 }}",
        @endforeach
    };

    update_score_num_2 = {
        @foreach($data_score as $data)
            "amphoe_{{ $data->id }}" : "{{ $data->number_2 }}",
        @endforeach
    };

    // ---------------------------------------
    let chart = [] ;
    let options = [];

    function Create_graph(amphoe , score_num_1 , score_num_2 , ){

        document.querySelector("#"+amphoe).innerHTML = "" ;

        let format_Create_graph_num_1 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(score_num_1) ;
        let format_Create_graph_num_2 = new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(score_num_2) ;

        options[amphoe] = {
            series: [{
                data: [ score_num_1 , score_num_2 ]
            }],
                chart: {
                height: 250,
                type: 'bar',
                events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
                }
            },
            colors: ["#ff6a00", "#E476B5"],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: [
                    ['เบอร์ 1', format_Create_graph_num_1 +' คะแนน',],
                    ['เบอร์ 2', format_Create_graph_num_2 +' คะแนน',],
                ],
                labels: {
                    style: {
                        fontSize: '14px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '18px'
                    }
                }
            }
        };

        if(chart[amphoe]){
            chart[amphoe].destroy();
            chart[amphoe] = null ;
        }

        chart[amphoe] = new ApexCharts(document.querySelector("#"+amphoe),  options[amphoe]);
        chart[amphoe].render();

    }

    function myStop_reface_Create_graph() {
        clearInterval(reface_Create_graph);
        // console.log("STOP LOOP");
    }

</script>

@endsection
