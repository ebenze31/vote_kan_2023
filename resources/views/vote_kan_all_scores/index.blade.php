@extends('layouts.viicheck_for_vote_kan')

@section('content')

<style>
    
    .bauble_box .bauble_label {
      background: #c22;
      background-position: 62px 5px;
      background-repeat: no-repeat;
      background-size: auto 5px;
      border: 0;
      border-radius: 50px;
      box-shadow: inset 0 10px 20px rgba(0,0,0,.4), 0 -1px 0px rgba(0,0,0,.2), inset 0 -1px 0px #fff;
      cursor: pointer;
      display: inline-block;
      font-size: 0;
      height: 30px;
      position: relative;
      -webkit-transition: all 500ms ease;
      transition: all 500ms ease;
      width: 65px;
    }

    .bauble_box .bauble_label:before {
      background-color: rgba(255,255,255,.2);
      background-position: 0 0;
      background-repeat: repeat;
      background-size: 30% auto;
      border-radius: 50%;
      box-shadow: inset 0 -5px 25px #500, 0 10px 20px rgba(0,0,0,.4);
      content: '';
      display: block;
      height: 20px;
      left: 5px;
      position: absolute;
      top: 5px;
      -webkit-transition: all 500ms ease;
      transition: all 500ms ease;
      width: 25px;
      z-index: 2;
    }

    .bauble_box input.bauble_input {
      opacity: 0;
      z-index: 0;
    }

    /* Checked */
    .bauble_box input.bauble_input:checked + .bauble_label {
      background-color: #2c2;
    }

    .bauble_box input.bauble_input:checked + .bauble_label:before {
      background-position: 150% 0;
      box-shadow: inset 0 -5px 25px #050, 0 10px 20px rgba(0,0,0,.4);
      left: calc( 100% - 35px );
    }

</style>


    <div class="container">        
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        รายงานผลคะแนนในแต่ละอำเภอ
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <!-- <th>#</th> -->
                                        <th>อำเภอ</th>
                                        <th>จำนวนผู้มีสิทธิเลือกตั้ง</th>
                                        <th>คะแนน เบอร์ 1</th>
                                        <th>คะแนน เบอร์ 2</th>
                                        <th>สถานะลงคะแนนหน่วย</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vote_kan_all_scores as $item)
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td><h4>{{ $item->name_amphoe }}</h4></td>
                                        <td class="text-center">{{ number_format($item->Amount_person) }}</td>
                                        <td class="text-center">{{ number_format($item->number_1) }}</td>
                                        <td class="text-center">{{ number_format($item->number_2) }}</td>
                                        <td class="text-center">

                                            @php
                                                $checked = "" ;
                                                if( $item->status == "Active"){
                                                    $checked = "checked" ;
                                                }
                                            @endphp
                                            <div class="bauble_box">
                                                <input {{ $checked }} input_for="{{ $item->name_amphoe }}" class="bauble_input" id="bauble_check_{{ $item->name_amphoe }}" name="bauble_{{ $item->name_amphoe }}" type="checkbox" onclick="change_status('{{ $item->name_amphoe }}');">
                                                <label class="bauble_label" for="bauble_check_{{ $item->name_amphoe }}">Toggle</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <!-- <a href="{{ url('/vote_kan_all_scores/' . $item->id) }}" title="View Vote_kan_all_score"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->

                                            <a href="{{ url('/vote_kan_all_scores/' . $item->id . '/edit') }}" title="Edit Vote_kan_all_score">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </button>
                                            </a>

                                            <!-- <form method="POST" action="{{ url('/vote_kan_all_scores' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Vote_kan_all_score" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $vote_kan_all_scores->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        function change_status(name_amphoe){
            
            // console.log("change_status >> " + name_amphoe);

            let input_for = document.querySelector('[input_for="'+name_amphoe+'"]').checked; 
                // console.log(input_for);

            let status ;
            if(input_for){
                // console.log("เดิม 'ปิด' อยู่");
                status = "Active";
            }else{
                // console.log("เดิม 'เปิด' อยู่");
                status = "Inactive";
            }

            fetch("{{ url('/') }}/api/change_status/"+name_amphoe+"/" + status)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    
                });

        }

    </script>
@endsection
