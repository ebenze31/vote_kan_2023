@extends('layouts.viicheck_for_vote_kan')

@section('content')
    <style>
        ul.pagination{
            left: 0;
        }
    </style>
    @php
    $count_vote_kan_stations = count($vote_kan_stations);
    @endphp
    <h1 class="text-center">
        หน่วยเลือกตั้งที่ลงทะเบียนแล้ว <span id="count_registred"></span> หน่วย
    </h1>
    
    <div class="table-responsive">
                <table id="table_vote_kan_stations" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>อำเภอ</th>
                            <th>ตำบล</th>
                            <th>หน่วยเลือกตั้ง</th>
                            <th>เจ้าหน้าที่ประจำหน่วย</th>
                            <th>เบอร์โทร</th>
                            <th>เบอร์โทร 2</th>
                            <th>จำนวนการเพิ่มคะแนน</th>
                            <th>จำนวนผู้มีสิทธิเลือกตั้ง</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vote_kan_stations as $item)
                        <tr>
                            <td>{{ $item->amphoe }}</td>
                            <td>{{ $item->tambon}}</td>
                            <td>{{ $item->polling_station_at}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone}}</td>
                            <td>{{ $item->phone_2}}</td>
                            <td>
                                @if(!empty($item->amount_add_score))
                                    {{ $item->amount_add_score }}
                                @else
                                    <span class="text-danger">ยังไม่มีการเพิ่มคะแนน</span>
                                @endif
                            </td>
                            <td>
                                @if(!empty($item->quantity_person))
                                    {{ number_format($item->quantity_person) }}
                                @else
                                    <span class="text-danger">ไม่มีข้อมูล</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/vote_kan_stations/' . $item->id . '/edit') }}" title="Edit Vote_kan_station">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>อำเภอ</th>
                            <th>ตำบล</th>
                            <th>หน่วยเลือกตั้ง</th>
                            <th>เจ้าหน้าที่ประจำหน่วย</th>
                            <th>เบอร์โทร</th>
                            <th>เบอร์โทร 2</th>
                            <th>จำนวนการเพิ่มคะแนน</th>
                            <th>จำนวนผู้มีสิทธิเลือกตั้ง</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        counterAnim("#count_registred", 0, <?php echo $count_vote_kan_stations; ?>, 1500);

        setTimeout(() => {
            document.querySelector('#count_registred').innerHTML = "{{ number_format($count_vote_kan_stations) }}" ;
        }, 1100);
        
        $("#table_vote_kan_stations tfoot th").each(function () {
            if($(this).text()){
                let title1 = $(this).text();
                if(title1){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title1 + '" />');
                }
            }
        });

        let now = new Date();
        let day = now.getDate().toString().padStart(2, '0'); // วัน
        let month = (now.getMonth() + 1).toString().padStart(2, '0'); // เดือน (เพิ่ม 1 เพราะว่ามันเริ่มต้นที่ 0)
        let year = now.getFullYear(); // ปี
        let hours = now.getHours().toString().padStart(2, '0'); // ชั่วโมง
        let minutes = now.getMinutes().toString().padStart(2, '0'); // นาที

        let formattedDate = `${day}-${month}-${year} ${hours}-${minutes}`;


        let file_name = "หน่วยเลือกตั้งที่ลงทะเบียนแล้ว " + formattedDate;

       // DataTable initialisation
        let table1 = $("#table_vote_kan_stations").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 2500,
            deferRender: true,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [0], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์
            ],
            order: [[3, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    extend: "excelHtml5",
                    text: "Export Excel",  // เปลี่ยนข้อความในปุ่มที่นี่
                    filename: file_name + ".xlsx" // เปลี่ยนชื่อไฟล์ตามที่คุณต้องการ
                },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            initComplete: function (settings, json) {
                let footer1 = $("#table_vote_kan_stations tfoot tr");
                $("#table_vote_kan_stations thead").append(footer1);

            }
        });

        $("#table_vote_kan_stations thead").on("keyup", "input", function () {
            table1.column($(this).parent().index())
                .search(this.value)
                .draw();

        });
    });

</script>
@endsection
