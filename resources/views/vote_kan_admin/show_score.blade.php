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
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        border-radius: 50px;
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
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <h1>ผลการนับคะแนนอย่างไม่เป็นทางการ</h1>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <span class="float-end">
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
                            <img class="card-img" style="width: clamp(140px, 60%, 208px);" src="{{ asset('/img/vote_kan/1.png') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 col-xl-7 name-section text-center mt-sm-3 mt-xs-3">
                        <div class="d-flex justify-content-center">

                            <span class="rank_score divScore text-white mb-3 font-35">1</span>
                        </div> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นายสุกวี แสงเป่า</h3>
                        <h3 class="mb-0 mt-3 text-white font-weight-bold">
                            <span id="show_text_score_1">{{ $score_num_1 }}</span> คะแนน
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
                            <img class="card-img" style="width: clamp(140px, 60%, 208px);" src="{{ asset('/img/vote_kan/2.png') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 col-xl-7 name-section text-center mt-sm-3 mt-xs-3">
                        <div class="d-flex justify-content-center">

                            <span class="rank_score divScore text-white mb-3 font-35">2</span>
                        </div> <!-- เพิ่ม class flex-grow-1 เพื่อควบคุมการขยายของ div นี้ -->
                        <h3 class="mb-0 text-white font-weight-bold">นายประวัติ กิจธรรมกูลนิจ</h3>
                        <h3 class="mb-0 mt-3 text-white font-weight-bold">
                            <span id="show_text_score_2">{{ $score_num_2 }}</span> คะแนน
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!--end row-->

<hr>

<!-- <div class="row mb-3">
    <div class="col-12 col-lg-8">
        <div class="card radius-10 w-100 h-100">
            <h4 class="font-weight-bold m-3">ส่งผลคะแนนแล้ว</h4>
            <hr class="m-0">
            <div class="card-body">
                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody class="fz_body font-weight-bold">
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 1</div>
                                    </div>
                                </td>
                                <td>5,555 คะแนน</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 2</div>
                                    </div>
                                </td>
                                <td>4,541 คะแนน</td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">อำเภอ 3</div>
                                    </div>
                                </td>
                                <td>3,000 คะแนน </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100 h-100">
            <div id="amphoeSendScoreChart"></div>
        </div>
    </div>
</div> -->

<div id="carousel_sum_score_amphoe" class="carousel slide" data-bs-ride="carousel">
    

    <div class="carousel-inner">

        <div class="carousel-item active" data-bs-interval="10000">
            <div class="card radius-10">
                <div class="card-header">
                    <h3>เมืองกาญจนบุรี</h3>
                </div>
                <div class="row">
                    <div class="col-9 card-body">
                        <div id="เมืองกาญจนบุรี"></div>
                    </div>
                    <div class="col-3">
                        <div class="radius-10 mt-4 bg-gradient-Ohhappiness">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0 text-white">นับคะแนนแล้ว</h5>
                                        <h3 class="mb-0 text-white"><span id="percentage_เมืองกาญจนบุรี">68</span>%</h3>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-percent font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item" data-bs-interval="10000">
            <div class="card radius-10">
                <div class="card-header">
                    <h3>ท่ามะกา</h3>
                </div>
                <div class="row">
                    <div class="col-9 card-body">
                        <div id="ท่ามะกา"></div>
                    </div>
                    <div class="col-3">
                        <div class="radius-10 mt-4 bg-gradient-Ohhappiness">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0 text-white">นับคะแนนแล้ว</h5>
                                        <h3 class="mb-0 text-white"><span id="percentage_ท่ามะกา">14</span>%</h3>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-percent font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 14%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <li class="text-danger" style=" background-color: #2366e1;" data-bs-target="#carousel_sum_score_amphoe" data-bs-slide-to="1" class="">
            </li>
        </ol>
        <a class="" href="#carousel_sum_score_amphoe" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style=" background-color: #2366e1 !important;border-radius: 5px;
	margin: 20px;"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    
   
</div>

<hr>

<div class="row row-cols-1 row-cols-lg-4 mb-4">

    <!-- เมืองกาญจนบุรี -->
    @php
        $data_amphoe_1 = App\Models\Vote_kan_score::where('amphoe' , 'เมืองกาญจนบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_1_score_num_1 = 0 ;
        $amphoe_1_score_num_2 = 0 ;

        foreach ($data_amphoe_1 as $amphoe_1) {
            $amphoe_1_score_num_1 = $amphoe_1_score_num_1 + $amphoe_1->number_1 ;
            $amphoe_1_score_num_2 = $amphoe_1_score_num_2 + $amphoe_1->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <!-- <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>เมืองกาญจนบุรี</h3>
            </div>
            <div class="card-body">
                <div id="เมืองกาญจนบุรี"></div>
            </div>

        </div> -->
    </div>

    <!-- ท่ามะกา -->
    @php
        $data_amphoe_2 = App\Models\Vote_kan_score::where('amphoe' , 'ท่ามะกา')
            ->where('last', 'Yes')->get();

        $amphoe_2_score_num_1 = 0 ;
        $amphoe_2_score_num_2 = 0 ;

        foreach ($data_amphoe_2 as $amphoe_2) {
            $amphoe_2_score_num_1 = $amphoe_2_score_num_1 + $amphoe_2->number_1 ;
            $amphoe_2_score_num_2 = $amphoe_2_score_num_2 + $amphoe_2->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <!-- <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ท่ามะกา</h3>
            </div>
            <div class="card-body">
                <div id="ท่ามะกา"></div>
            </div>

        </div> -->
    </div>

    <!-- ทองผาภูมิ -->
    @php
        $data_amphoe_3 = App\Models\Vote_kan_score::where('amphoe' , 'ทองผาภูมิ')
            ->where('last', 'Yes')->get();

        $amphoe_3_score_num_1 = 0 ;
        $amphoe_3_score_num_2 = 0 ;

        foreach ($data_amphoe_3 as $amphoe_3) {
            $amphoe_3_score_num_1 = $amphoe_3_score_num_1 + $amphoe_3->number_1 ;
            $amphoe_3_score_num_2 = $amphoe_3_score_num_2 + $amphoe_3->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ทองผาภูมิ</h3>
            </div>
            <div class="card-body">
                <div id="ทองผาภูมิ"></div>
            </div>

        </div>
    </div>

    <!-- สังขละบุรี -->
    @php
        $data_amphoe_4 = App\Models\Vote_kan_score::where('amphoe' , 'สังขละบุรี')
            ->where('last', 'Yes')->get();

        $amphoe_4_score_num_1 = 0 ;
        $amphoe_4_score_num_2 = 0 ;

        foreach ($data_amphoe_4 as $amphoe_4) {
            $amphoe_4_score_num_1 = $amphoe_4_score_num_1 + $amphoe_4->number_1 ;
            $amphoe_4_score_num_2 = $amphoe_4_score_num_2 + $amphoe_4->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>สังขละบุรี</h3>
            </div>
            <div class="card-body">
                <div id="สังขละบุรี"></div>
            </div>

        </div>
    </div>

    <!-- พนมทวน -->
    @php
        $data_amphoe_5 = App\Models\Vote_kan_score::where('amphoe' , 'พนมทวน')
            ->where('last', 'Yes')->get();

        $amphoe_5_score_num_1 = 0 ;
        $amphoe_5_score_num_2 = 0 ;

        foreach ($data_amphoe_5 as $amphoe_5) {
            $amphoe_5_score_num_1 = $amphoe_5_score_num_1 + $amphoe_5->number_1 ;
            $amphoe_5_score_num_2 = $amphoe_5_score_num_2 + $amphoe_5->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>พนมทวน</h3>
            </div>
            <div class="card-body">
                <div id="พนมทวน"></div>
            </div>

        </div>
    </div>

    <!-- เลาขวัญ -->
    @php
        $data_amphoe_6 = App\Models\Vote_kan_score::where('amphoe' , 'เลาขวัญ')
            ->where('last', 'Yes')->get();

        $amphoe_6_score_num_1 = 0 ;
        $amphoe_6_score_num_2 = 0 ;

        foreach ($data_amphoe_6 as $amphoe_6) {
            $amphoe_6_score_num_1 = $amphoe_6_score_num_1 + $amphoe_6->number_1 ;
            $amphoe_6_score_num_2 = $amphoe_6_score_num_2 + $amphoe_6->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>เลาขวัญ</h3>
            </div>
            <div class="card-body">
                <div id="เลาขวัญ"></div>
            </div>

        </div>
    </div>

    <!-- ศรีสวัสดิ์ -->
    @php
        $data_amphoe_7 = App\Models\Vote_kan_score::where('amphoe' , 'ศรีสวัสดิ์')
            ->where('last', 'Yes')->get();

        $amphoe_7_score_num_1 = 0 ;
        $amphoe_7_score_num_2 = 0 ;

        foreach ($data_amphoe_7 as $amphoe_7) {
            $amphoe_7_score_num_1 = $amphoe_7_score_num_1 + $amphoe_7->number_1 ;
            $amphoe_7_score_num_2 = $amphoe_7_score_num_2 + $amphoe_7->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ศรีสวัสดิ์</h3>
            </div>
            <div class="card-body">
                <div id="ศรีสวัสดิ์"></div>
            </div>

        </div>
    </div>

    <!-- ด่านมะขามเตี้ย -->
    @php
        $data_amphoe_8 = App\Models\Vote_kan_score::where('amphoe' , 'ด่านมะขามเตี้ย')
            ->where('last', 'Yes')->get();

        $amphoe_8_score_num_1 = 0 ;
        $amphoe_8_score_num_2 = 0 ;

        foreach ($data_amphoe_8 as $amphoe_8) {
            $amphoe_8_score_num_1 = $amphoe_8_score_num_1 + $amphoe_8->number_1 ;
            $amphoe_8_score_num_2 = $amphoe_8_score_num_2 + $amphoe_8->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ด่านมะขามเตี้ย</h3>
            </div>
            <div class="card-body">
                <div id="ด่านมะขามเตี้ย"></div>
            </div>

        </div>
    </div>

    <!-- หนองปรือ -->
    @php
        $data_amphoe_9 = App\Models\Vote_kan_score::where('amphoe' , 'หนองปรือ')
            ->where('last', 'Yes')->get();

        $amphoe_9_score_num_1 = 0 ;
        $amphoe_9_score_num_2 = 0 ;

        foreach ($data_amphoe_9 as $amphoe_9) {
            $amphoe_9_score_num_1 = $amphoe_9_score_num_1 + $amphoe_9->number_1 ;
            $amphoe_9_score_num_2 = $amphoe_9_score_num_2 + $amphoe_9->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>หนองปรือ</h3>
            </div>
            <div class="card-body">
                <div id="หนองปรือ"></div>
            </div>

        </div>
    </div>

    <!-- ห้วยกระเจา -->
    @php
        $data_amphoe_10 = App\Models\Vote_kan_score::where('amphoe' , 'ห้วยกระเจา')
            ->where('last', 'Yes')->get();

        $amphoe_10_score_num_1 = 0 ;
        $amphoe_10_score_num_2 = 0 ;

        foreach ($data_amphoe_10 as $amphoe_10) {
            $amphoe_10_score_num_1 = $amphoe_10_score_num_1 + $amphoe_10->number_1 ;
            $amphoe_10_score_num_2 = $amphoe_10_score_num_2 + $amphoe_10->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ห้วยกระเจา</h3>
            </div>
            <div class="card-body">
                <div id="ห้วยกระเจา"></div>
            </div>

        </div>
    </div>

    <!-- ท่าม่วง -->
    @php
        $data_amphoe_11 = App\Models\Vote_kan_score::where('amphoe' , 'ท่าม่วง')
            ->where('last', 'Yes')->get();

        $amphoe_11_score_num_1 = 0 ;
        $amphoe_11_score_num_2 = 0 ;

        foreach ($data_amphoe_11 as $amphoe_11) {
            $amphoe_11_score_num_1 = $amphoe_11_score_num_1 + $amphoe_11->number_1 ;
            $amphoe_11_score_num_2 = $amphoe_11_score_num_2 + $amphoe_11->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ท่าม่วง</h3>
            </div>
            <div class="card-body">
                <div id="ท่าม่วง"></div>
            </div>

        </div>
    </div>

    <!-- บ่อพลอย -->
    @php
        $data_amphoe_12 = App\Models\Vote_kan_score::where('amphoe' , 'บ่อพลอย')
            ->where('last', 'Yes')->get();

        $amphoe_12_score_num_1 = 0 ;
        $amphoe_12_score_num_2 = 0 ;

        foreach ($data_amphoe_12 as $amphoe_12) {
            $amphoe_12_score_num_1 = $amphoe_12_score_num_1 + $amphoe_12->number_1 ;
            $amphoe_12_score_num_2 = $amphoe_12_score_num_2 + $amphoe_12->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>บ่อพลอย</h3>
            </div>
            <div class="card-body">
                <div id="บ่อพลอย"></div>
            </div>

        </div>
    </div>

    <!-- ไทรโยค -->
    @php
        $data_amphoe_13 = App\Models\Vote_kan_score::where('amphoe' , 'ไทรโยค')
            ->where('last', 'Yes')->get();

        $amphoe_13_score_num_1 = 0 ;
        $amphoe_13_score_num_2 = 0 ;

        foreach ($data_amphoe_13 as $amphoe_13) {
            $amphoe_13_score_num_1 = $amphoe_13_score_num_1 + $amphoe_13->number_1 ;
            $amphoe_13_score_num_2 = $amphoe_13_score_num_2 + $amphoe_13->number_2;
        }
    @endphp
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
        <div class="card radius-10 h-100">
            <div class="card-header">
                <h3>ไทรโยค</h3>
            </div>
            <div class="card-body">
                <div id="ไทรโยค"></div>
            </div>

        </div>
    </div>

</div><!--end row-->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- <script>
    let options = {
          series: [21, 22],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        let chart = new ApexCharts(document.querySelector("#amphoeSendScoreChart"), options);
        chart.render();

</script> -->

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

    });

    function loop_Create_graph(){

        fetch("{{ url('/') }}/api/get_data_show_score")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                document.querySelector('#show_text_score_1').innerHTML = result['sum_num_1'] ;
                document.querySelector('#show_text_score_2').innerHTML = result['sum_num_2'] ;

                counterAnim("#show_text_score_1", score_num_1, result['sum_num_1'], 1500); // 1.5 วินาที
                counterAnim("#show_text_score_2", score_num_2, result['sum_num_2'], 1500); // 1.5 วินาที

                setTimeout(() => {
                    document.querySelector('#show_text_score_1').innerHTML = result['sum_num_1'] ;
                    document.querySelector('#show_text_score_2').innerHTML = result['sum_num_2'] ;
                }, 1600);

                score_num_1 = result['sum_num_1'] ;
                score_num_2 = result['sum_num_2'] ;

                let class_bg_1 = "gold_color_gradient";
                let class_bg_2 = "divScore";

                if(score_num_1 > score_num_2){
                    class_bg_1 = "gold_color_gradient";
                    class_bg_2 = "divScore";
                }else if(score_num_1 == score_num_2){
                    class_bg_1 = "divScore";
                    class_bg_2 = "divScore";
                }
                else{
                    class_bg_1 = "divScore";
                    class_bg_2 = "gold_color_gradient";
                }

                let n11111 = document.querySelector('#card_num_1').classList[3];
                let n22222 = document.querySelector('#card_num_2').classList[3];

                document.querySelector('#card_num_1').classList.remove(n11111);
                document.querySelector('#card_num_2').classList.remove(n22222);

                document.querySelector('#card_num_1').classList.add(class_bg_1);
                document.querySelector('#card_num_2').classList.add(class_bg_2);

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

                for (let zi = 0; zi < 13; zi++) {
                    let name_key = "amphoe_" + parseInt(zi + 1);

                    Create_graph(
                        name_amphoe[name_key],
                        update_score_num_1[name_key],
                        update_score_num_2[name_key]
                    );
                }

            });

        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0'); // ชั่วโมง
        let minutes = now.getMinutes().toString().padStart(2, '0'); // นาที
        let formattedDate = `${hours}:${minutes}`;

        document.querySelector('#time_update_data').innerHTML = formattedDate + " น.";

    }

    
    // ---------------------------------------
    var score_num_1 = "{{ $score_num_1 }}" ;
    var score_num_2 = "{{ $score_num_2 }}" ;
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
        "amphoe_1" : "{{ $amphoe_1_score_num_1 }}",
        "amphoe_2" : "{{ $amphoe_2_score_num_1 }}",
        "amphoe_3" : "{{ $amphoe_3_score_num_1 }}",
        "amphoe_4" : "{{ $amphoe_4_score_num_1 }}",
        "amphoe_5" : "{{ $amphoe_5_score_num_1 }}",
        "amphoe_6" : "{{ $amphoe_6_score_num_1 }}",
        "amphoe_7" : "{{ $amphoe_7_score_num_1 }}",
        "amphoe_8" : "{{ $amphoe_8_score_num_1 }}",
        "amphoe_9" : "{{ $amphoe_9_score_num_1 }}",
        "amphoe_10" : "{{ $amphoe_10_score_num_1 }}",
        "amphoe_11" : "{{ $amphoe_11_score_num_1 }}",
        "amphoe_12" : "{{ $amphoe_12_score_num_1 }}",
        "amphoe_13" : "{{ $amphoe_13_score_num_1 }}",
    };

    update_score_num_2 = {
        "amphoe_1" : "{{ $amphoe_1_score_num_2 }}",
        "amphoe_2" : "{{ $amphoe_2_score_num_2 }}",
        "amphoe_3" : "{{ $amphoe_3_score_num_2 }}",
        "amphoe_4" : "{{ $amphoe_4_score_num_2 }}",
        "amphoe_5" : "{{ $amphoe_5_score_num_2 }}",
        "amphoe_6" : "{{ $amphoe_6_score_num_2 }}",
        "amphoe_7" : "{{ $amphoe_7_score_num_2 }}",
        "amphoe_8" : "{{ $amphoe_8_score_num_2 }}",
        "amphoe_9" : "{{ $amphoe_9_score_num_2 }}",
        "amphoe_10" : "{{ $amphoe_10_score_num_2 }}",
        "amphoe_11" : "{{ $amphoe_11_score_num_2 }}",
        "amphoe_12" : "{{ $amphoe_12_score_num_2 }}",
        "amphoe_13" : "{{ $amphoe_13_score_num_2 }}",
    };

    // ---------------------------------------
    let chart = [] ;
    let options = [];

    function Create_graph(amphoe , score_num_1 , score_num_2 , ){

        document.querySelector("#"+amphoe).innerHTML = "" ;

        options[amphoe] = {
            series: [{
                data: [ score_num_1 , score_num_2 ]
            }],
                chart: {
                height: 150,
                type: 'bar',
                events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
                }
            },

            plotOptions: {
                bar: {
                    // columnWidth: '45%',
                    borderRadius: 4,
                    horizontal: true,
                    distributed: true,
                    colors: {
                        ranges: [{
                            from: score_num_1,
                            to: score_num_1,
                            color: '#ff6a00' // กำหนดสีสำหรับเบอร์ 1
                        }, {
                            from: score_num_2,
                            to: score_num_2,
                            color: '#E476B5' // กำหนดสีสำหรับเบอร์ 2
                        }],
                        backgroundBarColors: ['#f2f2f2'], // สีพื้นหลังของแท่งที่ไม่ได้ระบุสี
                        backgroundBarOpacity: 1
                    },
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
                    ['เบอร์ 1', score_num_1 +' คะแนน'],
                    ['เบอร์ 2', score_num_2 +' คะแนน'],
                ],
                labels: {
                    style: {

                        fontSize: '12px'
                    }
                }
            }
        };


        chart[amphoe] = new ApexCharts(document.querySelector("#"+amphoe),  options[amphoe]);
        chart[amphoe].render();

    }

    function myStop_reface_Create_graph() {
        clearInterval(reface_Create_graph);
        // console.log("STOP LOOP");
    }

</script>

@endsection
