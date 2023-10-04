<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Person_of_polling_station;
use Illuminate\Http\Request;

class Person_of_polling_stationController extends Controller
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
            $person_of_polling_station = Person_of_polling_station::where('amphoe', 'LIKE', "%$keyword%")
                ->orWhere('tambon', 'LIKE', "%$keyword%")
                ->orWhere('polling_station_at', 'LIKE', "%$keyword%")
                ->orWhere('quantity_person', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $person_of_polling_station = Person_of_polling_station::latest()->paginate($perPage);
        }

        return view('person_of_polling_station.index', compact('person_of_polling_station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('person_of_polling_station.create');
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
        
        Person_of_polling_station::create($requestData);

        return redirect('person_of_polling_station')->with('flash_message', 'Person_of_polling_station added!');
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
        $person_of_polling_station = Person_of_polling_station::findOrFail($id);

        return view('person_of_polling_station.show', compact('person_of_polling_station'));
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
        $person_of_polling_station = Person_of_polling_station::findOrFail($id);

        return view('person_of_polling_station.edit', compact('person_of_polling_station'));
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
        
        $person_of_polling_station = Person_of_polling_station::findOrFail($id);
        $person_of_polling_station->update($requestData);

        return redirect('person_of_polling_station')->with('flash_message', 'Person_of_polling_station updated!');
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
        Person_of_polling_station::destroy($id);

        return redirect('person_of_polling_station')->with('flash_message', 'Person_of_polling_station deleted!');
    }
}
