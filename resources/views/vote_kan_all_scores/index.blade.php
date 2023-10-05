@extends('layouts.viicheck_for_vote_kan')

@section('content')
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
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>อำเภอ</th>
                                        <th>จำนวนผู้มีสิทธิเลือกตั้ง</th>
                                        <th>คะแนน เบอร์ 1</th>
                                        <th>คะแนน เบอร์ 2</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vote_kan_all_scores as $item)
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td><h4>{{ $item->name_amphoe }}</h4></td>
                                        <td>{{ $item->Amount_person }}</td>
                                        <td>{{ $item->number_1 }}</td>
                                        <td>{{ $item->number_2 }}</td>
                                        <td>
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
@endsection
