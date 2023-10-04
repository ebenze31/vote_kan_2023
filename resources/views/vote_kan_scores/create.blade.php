@extends('layouts.viicheck_for_vote_kan')

@section('content')
<style>
    .record-score {
        height: 300px;
        overflow: auto;
    }

    .name-user-score {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 60%;
    }
</style>

@php
    $data_station = App\Models\Vote_kan_station::where('user_id' , Auth::user()->id)->first();
    $data_score = App\Models\Vote_kan_score::where('user_id' , Auth::user()->id)->orderBy('id', 'desc')->get();
    $count_data_score = count($data_score);
@endphp

@if(!empty($data_station->amphoe))
<!-- Modal -->
<!-- <div class="modal fade" id="modal_quantity_person" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_quantity_person" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_quantity_person">
                    จำนวนผู้มาลงคะแนน
                </h5>
            </div>
            <div class="modal-body">
                <h5 class="card-title text-center">หน่วยเลือกตั้งของคุณ</h5>
                <p class="d-block m-0 font-18">
                    อ.{{$data_station->amphoe}}
                    เขต{{$data_station->area}}
                </p>
                <p class="d-block m-0 font-18">
                    ต.{{$data_station->tambon}}
                </p>
                <p class="d-block m-0 font-18">
                    หน่วยเลือกตั้งที่ {{$data_station->polling_station_at}}
                </p>
                <hr>
                <label for="quantity_person" class="form-label" style="font-size: 20px;">จำนวนผู้มาลงคะแนน</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                    <input class="form-control border-start-0" id="quantity_person" name="quantity_person" placeholder="จำนวนผู้มาลงคะแนน" type="number" value="{{ isset($data_station->quantity_person) ? $data_station->quantity_person : ''}}">

                    <input class="form-control d-none" id="id_station" name="id_station" value="{{ $data_station->id }}">
                </div>
            </div>
            <div class="m-3">
                <button type="button" id="btn_close_quantity_person" class="d-none" data-dismiss="modal">Close</button>
                <center>
                    <button type="button" class="btn btn-success" style="width:75%;" onclick="submit_quantity_person();">
                        ส่งข้อมูล
                    </button>
                </center>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="card border-top border-0 border-4 border-danger m-2">
    <div class="card-body px-2 py-3">
        <h5>
            ผู้ลงคะแนน : <span id="show_text_quantity_person">{{ number_format($data_station->quantity_person) }}</span> คน
            <span id="btn_open_quantity_person" class="btn btn-sm btn-warning float-end" data-toggle="modal" data-target="#modal_quantity_person">
                แก้ไข
            </span>
        </h5>
    </div>
</div> -->

<div class="card border-top border-0 border-4 border-danger m-2">
    <div class="card-body  px-4 py-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
            </div>
            <h4 class="mb-0 text-danger">กรอกผลคะแนน</h4>
        </div>
        
        <div class="card-body  border-top p-0 pt-3 mb-4">
            
            <h5 class="card-title text-center">หน่วยเลือกตั้ง</h5>
            <p class="d-block m-0 font-18">
                อ.{{$data_station->amphoe}}
                เขต{{$data_station->area}}
            </p>
            <p class="d-block m-0 font-18">
                ต.{{$data_station->tambon}}
            </p>
            <p class="d-block m-0 font-18">
                หน่วยเลือกตั้งที่ {{$data_station->polling_station_at}}
            </p>
        </div>
        <hr>
        <form id="vote_kan_scores" method="POST" action="{{ url('/vote_kan_scores') }}" accept-charset="UTF-8" class="form-horizontal row g-3 needs-validation" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('vote_kan_scores.form', 
            [
            'formMode' => 'create',
            'name_vote_score' => $data_station->name ,
            ]
        )
        </form>

    </div>
</div>
<div class="card mx-2">
    <div class="card-cody p-3">
        @if($data_score != "[]")
        <h4>คะแนนที่ลงไว้ล่าสุด</h4>
        <ul class="list-group list-group-flush record-score">
            @foreach($data_score as $item)
            <li class="list-group-item d-flex align-items-center flex-wrap">
                <div class="d-flex justify-content-center w-100">
                    <h4 class="mb-0">ครั้งที่ {{$count_data_score}}</h4>
                    @php
                    $count_data_score = $count_data_score - 1;
                    @endphp
                </div>
                <div class="d-flex justify-content-between w-100">
                    <h6 class="mb-0">เบอร์ที่ 1</h6>
                    <span class="text-secondary">{{$item->number_1}} คะแนน</span>
                </div>
                <div class="d-flex mt-2 justify-content-between w-100">
                    <h6 class="mb-0">เบอร์ที่ 2</h6>
                    <span class="text-secondary">{{$item->number_2}} คะแนน</span>
                </div>
                <!-- <div class="d-flex mt-2 justify-content-between w-100">
                        <h6 class="mb-0">เบอร์ที่ 3</h6>
                        <span class="text-secondary">{{$item->number_3}} คะแนน</span>
                    </div> -->
                <div class="d-flex mt-2 justify-content-between w-100 align-items-center ">
                    <h6 class="mb-0 name-user-score">โดย {{ $data_station->name }}</h6>
                    <span class="text-secondary">เวลา {{ (\Carbon\Carbon::parse($item->created_at))->format('H:i น.') }}</span>
                </div>
            </li>
            @endforeach
        </ul>
        <br><br>
        @endif
    </div>

</div>
@else
<div class="card border-top border-0 border-4 border-danger m-2 text-center">
    <center>
        <img src="{{ url('/img/STK/warning.png') }}" class="m-2" width="60%" >
    </center>
    <h3 class="mt-3 mb-3 text-danger">
        คุณยังไม่ได้ลงทะเบียน
    </h3>
    <a href="{{ url('/vote_kan_stations/create') }}" class="btn btn-success px-5 m-3">
        ลงทะเบียนหน่วยเลือกตั้ง
    </a>
</div>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function submit_vote_kan() {

        if ($("#vote_kan_scores")[0].checkValidity()) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'ส่งคะแนนเรียบร้อย',
                showConfirmButton: false,
                timer: 1500,
                willClose: () => {
                    document.getElementById("vote_kan_scores").submit();
                }
            })
            willClose: () => {
                document.getElementById("vote_kan_scores").submit();

            }
        } else {
            // Validate Form
            $("#vote_kan_scores")[0].reportValidity();
            event.preventDefault();
        }
    }

    function updateCurrentTime() {
        let currentTime = new Date();
        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();

        // แปลงชั่วโมงและวินาทีให้เป็นสตริง 2 หลัก
        let hoursString = hours.toString().padStart(2, '0');
        let minutesString = minutes.toString().padStart(2, '0');
        let secondsString = seconds.toString().padStart(2, '0');

        // แสดงข้อมูลเวลาในรูปแบบ "ชั่วโมง:นาที:วินาที"
        let timeString = hoursString + ":" + minutesString + ":" + secondsString;

        // อัปเดตข้อมูลเวลาบนหน้า HTML
        document.getElementById("current-time").textContent = timeString;
    }

    // เรียก updateCurrentTime เพื่อแสดงเวลาเริ่มต้น
    updateCurrentTime();

    // ใช้ setInterval เพื่ออัปเดตเวลาทุก 1 วินาที (1000 มิลลิวินาที)
    setInterval(updateCurrentTime, 1000);

    

    // document.addEventListener('DOMContentLoaded', (event) => {
    //     // console.log("START");
    //     // ตรวจสอบข้อมูลผู้มาลงคะแนน
    //     let check_quantity_person = "{ $data_station->quantity_person }" ;
    //         // console.log(check_quantity_person);

    //     if(!check_quantity_person){
    //         document.querySelector('#btn_open_quantity_person').click();
    //     }
    // });

    function submit_quantity_person(){

        let quantity_person = document.querySelector('#quantity_person').value ;
        let id_station = document.querySelector('#id_station').value ;

        fetch("{{ url('/') }}/api/submit_quantity_person/" + quantity_person + "/" + id_station)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result == "OK"){
                    document.querySelector('#show_text_quantity_person').innerHTML = parseInt(quantity_person).toLocaleString(); ;
                    document.getElementById("btn_close_quantity_person").click();
                }

            });

    }

</script>
@endsection