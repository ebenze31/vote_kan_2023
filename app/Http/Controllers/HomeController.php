<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vote_kan_data_station;
use Illuminate\Support\Facades\DB;
use App\Models\Vote_kan_station;
use App\Models\Vote_kan_score;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('show_score_public');
    }

    public function reset_vote_kan_data_stations($type){
        $data = Vote_kan_data_station::where('id' , "!=" , null)->get();

        foreach ($data as $item) {

            if($type == "score"){

                for ($ix=1; $ix <= 13 ; $ix++) { 
                    DB::table('vote_kan_all_scores')
                        ->where([ 
                                ['id', $ix],
                            ])
                        ->update([
                            'number_1' => null,
                            'number_2' => null,
                        ]);
                }

            }else{
                $xb = "";
                for ($i=1; $i <= intval($item->polling_station_at); $i++) { 

                    if($item->tambon == 'ท่าล้อ (เทศบาลเมืองกาญจนบุรี)'){
                        $xb = '34,35' ;
                    }else{
                        if(empty($xb)){
                            $xb = $i ;
                        }else{
                            $xb = $xb . "," . $i ;
                        }
                    }
                    
                }

                DB::table('vote_kan_data_stations')
                    ->where([ 
                            ['id', $item->id],
                        ])
                    ->update([
                        'not_registered' => $xb,
                        'registered' => null,
                    ]);

            }

        }

        if($type == "score"){
            Vote_kan_score::truncate();
        }else{
            Vote_kan_station::truncate();
        }

        return "ดำเนินการเรียบร้อย" ;
    }

    public function vote_kan_index(){

        $data_user = Auth::user();

        return view('vote_kan_admin.vote_kan_index', compact('data_user'));
    
    }
}
