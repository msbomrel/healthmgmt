<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $positions = Position::all();
        return view('backend.position.index', compact('positions'));
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
        $input = $request->all();
        $country = Position::create($input);
        return Response::json($country);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Position $position
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $position = Position::where('position_code', $id)->first();
        return Response::json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Position $position
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $position = Position::where('position_code', $id)->update($request->all());
        return Response::json($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Position::where('position_code', $id)->delete();
        return redirect()->back();
    }
}
