
<div class="col-md-6">
    <label for="number_1" class="form-label" style="font-size: 20px;">คะแนนเบอร์ <b>1</b></label>
    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
        <input class="form-control border-start-0" name="number_1" placeholder="โปรดกรอกคะแนนเบอร์ 1" type="number" id="number_1" value="{{ isset($vote_kan_score->number_1) ? $vote_kan_score->number_1 : ''}}" required oninput="check_sum_score_all();">
    </div>
</div>
<div class="col-md-6">
    <label for="number_2" class="form-label" style="font-size: 20px;">คะแนนเบอร์ <b>2</b></label>
    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
        <input class="form-control border-start-0" name="number_2" placeholder="โปรดกรอกคะแนนเบอร์ 2" type="number" id="number_2" value="{{ isset($vote_kan_score->number_2) ? $vote_kan_score->number_2 : ''}}" required oninput="check_sum_score_all();">
    </div>
</div>

<div class="col-12 text-center">
    <h6 class="mt-2 ">เจ้าหน้าที่ผู้กรอกคะแนน  <span class="text-primary d-block">{{  $name_vote_score }}</span></h6>

    <h6 id="error_check_sum_score_all" class="mt-3 mb-1 text-danger d-none">
        คะแนนมากกว่าจำนวนผู้มีสิทธิเลือกตั้ง
    </h6>
    <button id="btn_submit_score_vote_kan" class="btn btn-success w-100 px-5 btn-block mt-3" onclick="submit_vote_kan()" disabled>ยืนยัน</button>
    <div class="text-muted mt-2">
        <span>เวลาปัจจุบัน</span>
        <span id="current-time"></span>
    </div>
</div>

<script>
    
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
            if(parseInt(sum_score_all) > parseInt("{{ $quantity_person }}") && (number_1 != 0 && number_2 != 0) ){
                // console.log("คะแนนไม่ถูกต้อง");

                document.querySelector('#number_1').value = "" ;
                document.querySelector('#number_2').value = "" ;

                document.querySelector('#number_1').focus() ;

                document.querySelector('#error_check_sum_score_all').classList.remove('d-none');

            }else if(parseInt(sum_score_all) <= parseInt("{{ $quantity_person }}") && (number_1 != 0 && number_2 != 0) ){
                document.querySelector('#btn_submit_score_vote_kan').disabled = false ;
            }
        }, 1500);
    }

</script>




