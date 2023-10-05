@extends('layouts.viicheck_for_vote_kan')

@section('content')
    <div class="container">  
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        แก้ไขข้อมูลคะแนน {{ $vote_kan_all_score->name_amphoe }}
                    </h3>
                    <div class="card-body">
                        <a href="{{ url('/vote_kan_all_scores') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/vote_kan_all_scores/' . $vote_kan_all_score->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('vote_kan_all_scores.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
