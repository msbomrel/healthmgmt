<?php

namespace App\Http\Controllers;

use App\Affiliation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $affiliations = Affiliation::all();
        return view('backend.affiliation.index', compact('affiliations'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $affiliation = Affiliation::create($request->all());
        return Response::json($affiliation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliation $affiliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $affiliation = Affiliation::where('affiliation_code', $id)->first();
        return Response::json($affiliation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $affiliation = Affiliation::where('affiliation_code', $id)->update($request->all());
        return Response::json($affiliation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $affiliation = Affiliation::where('affiliation_code', $id)->first();
        $affiliation->delete();
        return redirect()->back();

    }
}
