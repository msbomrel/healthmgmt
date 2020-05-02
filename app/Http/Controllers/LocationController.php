<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $locations = Location::all();
        return view('backend.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $location = Location::create($request->all());
        return Response::json($location);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Location $location
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $location = Location::where('location_code', $id)->first();
        return Response::json($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Location $location
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $location = Location::where('location_code', $id)->update($request->all());
        return Response::json($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Location $location
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Location::where('location_code', $id)->delete();
        return redirect()->back();
    }
}
