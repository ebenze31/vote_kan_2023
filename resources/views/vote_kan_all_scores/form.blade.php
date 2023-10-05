<div class="row">
    <div class="col-6 mt-3">
        <div class="form-group {{ $errors->has('name_amphoe') ? 'has-error' : ''}}">
            <label for="name_amphoe" class="control-label">{{ 'อำเภอ' }}</label>
            <input class="form-control" name="name_amphoe" type="text" id="name_amphoe" value="{{ isset($vote_kan_all_score->name_amphoe) ? $vote_kan_all_score->name_amphoe : ''}}" readonly>
            {!! $errors->first('name_amphoe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-6 mt-3">
        <div class="form-group {{ $errors->has('Amount_person') ? 'has-error' : ''}}">
            <label for="Amount_person" class="control-label">{{ 'จำนวนผู้มีสิทธิเลือกตั้ง' }}</label>
            <input class="form-control" name="Amount_person" type="text" id="Amount_person" value="{{ isset($vote_kan_all_score->Amount_person) ? $vote_kan_all_score->Amount_person : ''}}" readonly>
            {!! $errors->first('Amount_person', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-6 mt-3">
        <div class="form-group {{ $errors->has('number_1') ? 'has-error' : ''}}">
            <label for="number_1" class="control-label">{{ 'เบอร์ 1' }}</label>
            <input class="form-control" name="number_1" type="text" id="number_1" value="{{ isset($vote_kan_all_score->number_1) ? $vote_kan_all_score->number_1 : ''}}" required oninput="check_sum_score_all();">
            {!! $errors->first('number_1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-6 mt-3">
        <div class="form-group {{ $errors->has('number_2') ? 'has-error' : ''}}">
        <label for="number_2" class="control-label">{{ 'เบอร์ 2' }}</label>
        <input class="form-control" name="number_2" type="text" id="number_2" value="{{ isset($vote_kan_all_score->number_2) ? $vote_kan_all_score->number_2 : ''}}" required oninput="check_sum_score_all();">
        {!! $errors->first('number_2', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
</div>

<h6 id="error_check_sum_score_all" class="mt-3 mb-1 text-danger d-none">
    คะแนนมากกว่าจำนวนผู้มีสิทธิเลือกตั้ง
</h6>

<div class="form-group mt-3">
    <button style="width:25%;" id="btn_submit_score_vote_kan" class="btn btn-info text-white mt-3" onclick="submit_edit_score()">ยืนยัน</button>

    <input id="input_submit" class="btn btn-info text-white d-none" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'Create' }}">
</div>

<script>

    function submit_edit_score(){
        document.querySelector('#input_submit').click();
    }

    function check_sum_score_all(){

        document.querySelector('#error_check_sum_score_all').classList.add('d-none');
        document.querySelector('#btn_submit_score_vote_kan').disabled = true ;

        let number_1 = document.querySelector('#number_1').value ;
        let number_2 = document.querySelector('#number_2').value ;

        if(!number_1){
            number_1 = 0 ;
        }
        if(!number_2){
            number_2 = 0 ;
        }

        let sum_score_all = parseInt(number_1) + parseInt(number_2);

        // console.log(sum_score_all);

        setTimeout(function() {
            if(parseInt(sum_score_all) > parseInt("{{ $vote_kan_all_score->Amount_person }}") && (number_1 != 0 && number_2 != 0) ){
                // console.log("คะแนนไม่ถูกต้อง");

                document.querySelector('#number_1').value = "" ;
                document.querySelector('#number_2').value = "" ;

                document.querySelector('#number_1').focus() ;

                document.querySelector('#error_check_sum_score_all').classList.remove('d-none');

            }else if(parseInt(sum_score_all) <= parseInt("{{ $vote_kan_all_score->Amount_person }}") && (number_1 != 0 && number_2 != 0) ){
                document.querySelector('#btn_submit_score_vote_kan').disabled = false ;
            }
        }, 1500);
    }
</script>
