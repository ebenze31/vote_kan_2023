<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote_kan_station;

use App\Models\Vote_kan_score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vote_kan_all_score;

class Vote_kan_scoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $vote_kan_scores = Vote_kan_score::where('vote_kan_stations_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('last', 'LIKE', "%$keyword%")
                ->orWhere('number_1', 'LIKE', "%$keyword%")
                ->orWhere('number_2', 'LIKE', "%$keyword%")
                ->orWhere('number_3', 'LIKE', "%$keyword%")
                ->get();
        } else {
            $vote_kan_scores = Vote_kan_score::get();
        }

        return view('vote_kan_scores.index', compact('vote_kan_scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vote_kan_scores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $data_station = Vote_kan_station::where('user_id' , Auth::user()->id)->first();

        $requestData['vote_kan_stations_id'] = $data_station->id;
        $requestData['user_id'] = Auth::id();
        $requestData['last'] = "Yes";
        $requestData['amphoe'] = $data_station->amphoe;

        $data_scores = Vote_kan_score::where('user_id', Auth::user()->id)->get();

        foreach ($data_scores as $item) {
            $item->update(['last' => null]);
        }
        // ddd($data_scores);
        Vote_kan_score::create($requestData);

        $update_amount_add_score = intval($data_station->amount_add_score + 1) ;

        DB::table('vote_kan_stations')
            ->where([ 
                    ['id', $data_station->id],
                ])
            ->update([
                    'amount_add_score' => $update_amount_add_score,
                ]);

        $all_score_in_amphoe = Vote_kan_score::where('amphoe',$requestData['amphoe'])
            ->where('last' , 'Yes')
            ->select('number_1' , 'number_2')
            ->get();

        $sum_score_1 = 0 ;
        $sum_score_2 = 0 ;
        foreach ($all_score_in_amphoe as $item) {
            $sum_score_1 = $sum_score_1 + $item->number_1 ;
            $sum_score_2 = $sum_score_2 + $item->number_2 ;
        }

        DB::table('vote_kan_all_scores')
            ->where([ 
                    ['name_amphoe', $requestData['amphoe']],
                ])
            ->update([
                    'number_1' => $sum_score_1,
                    'number_2' => $sum_score_2,
                ]);

        return redirect()->back();

        // return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vote_kan_score = Vote_kan_score::findOrFail($id);

        return view('vote_kan_scores.show', compact('vote_kan_score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $vote_kan_score = Vote_kan_score::findOrFail($id);

        return view('vote_kan_scores.edit', compact('vote_kan_score'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $vote_kan_score = Vote_kan_score::findOrFail($id);
        $vote_kan_score->update($requestData);

        return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Vote_kan_score::destroy($id);

        return redirect('vote_kan_scores')->with('flash_message', 'Vote_kan_score deleted!');
    }

    public function show_score()
    {
        $data_score = Vote_kan_all_score::get();

        return view('vote_kan_admin.vote_kan_admin', compact('data_score'));
    }

    public function show_score_public()
    {
        $data_score = Vote_kan_all_score::get();

        return view('vote_kan_admin.show_score_public', compact('data_score'));
    }

    function get_data_show_score(){

        $all_data = array();

        $data_score = Vote_kan_all_score::get();


        $score_num_1 = [] ;
        foreach($data_score as $r_1){
            if(!empty($r_1->number_1)){
                $score_num_1['amphoe_'.$r_1->id] = $r_1->number_1 ;
            }else{
                $score_num_1['amphoe_'.$r_1->id] = 0 ;
            }
        }

        $score_num_2 = [] ;
        foreach($data_score as $r_2){
            if(!empty($r_2->number_2)){
                $score_num_2['amphoe_'.$r_2->id] = $r_2->number_2 ;
            }else{
                $score_num_2['amphoe_'.$r_2->id] = 0 ;
            }
        }

        $amount_person = [] ;
        foreach($data_score as $r_3){
            if(!empty($r_3->Amount_person)){
                $amount_person['amphoe_'.$r_3->id] = $r_3->Amount_person ;
            }else{
                $amount_person['amphoe_'.$r_3->id] = 0 ;
            }
        }

        $sum_num_1 = 0 ;
        $sum_num_2 = 0 ;

        for ($i_1 = 0; $i_1 < count($score_num_1); $i_1++) { 
            $sum_num_1 = $sum_num_1 + $score_num_1['amphoe_'. intval($i_1+1)];
        }

        for ($i_2 = 0; $i_2 < count($score_num_2); $i_2++) { 
            $sum_num_2 = $sum_num_2 + $score_num_2['amphoe_'. intval($i_2+1)];
        }

        $all_data['sum_num_1'] = $sum_num_1 ;
        $all_data['sum_num_2'] = $sum_num_2 ;

        $all_data['score_amphoe_num_1'] = $score_num_1 ;
        $all_data['score_amphoe_num_2'] = $score_num_2 ;
        $all_data['amount_person'] = $amount_person ;

        return $all_data ; 

    }
}
