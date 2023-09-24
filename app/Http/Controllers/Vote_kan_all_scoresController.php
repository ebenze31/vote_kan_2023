<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Vote_kan_all_score;
use Illuminate\Http\Request;

class Vote_kan_all_scoresController extends Controller
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
            $vote_kan_all_scores = Vote_kan_all_score::where('name_amphoe', 'LIKE', "%$keyword%")
                ->orWhere('number_1', 'LIKE', "%$keyword%")
                ->orWhere('number_2', 'LIKE', "%$keyword%")
                ->orWhere('Amount_person', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vote_kan_all_scores = Vote_kan_all_score::latest()->paginate($perPage);
        }

        return view('vote_kan_all_scores.index', compact('vote_kan_all_scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vote_kan_all_scores.create');
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
        
        Vote_kan_all_score::create($requestData);

        return redirect('vote_kan_all_scores')->with('flash_message', 'Vote_kan_all_score added!');
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
        $vote_kan_all_score = Vote_kan_all_score::findOrFail($id);

        return view('vote_kan_all_scores.show', compact('vote_kan_all_score'));
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
        $vote_kan_all_score = Vote_kan_all_score::findOrFail($id);

        return view('vote_kan_all_scores.edit', compact('vote_kan_all_score'));
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
        
        $vote_kan_all_score = Vote_kan_all_score::findOrFail($id);
        $vote_kan_all_score->update($requestData);

        return redirect('vote_kan_all_scores')->with('flash_message', 'Vote_kan_all_score updated!');
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
        Vote_kan_all_score::destroy($id);

        return redirect('vote_kan_all_scores')->with('flash_message', 'Vote_kan_all_score deleted!');
    }
}
