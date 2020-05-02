<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Healthexamfile;
use Illuminate\Http\Request;

class HealthexamfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $files = Healthexamfile::all();
        return  view('backend.employee.healthfilesrecord', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($employee_code)
    {
        $employee = Employee::where('employee_code', $employee_code)->first();
        return  view('backend.employee.createhealthfile', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if(!empty($input['require_reexamination'])){
            $input['require_reexamination'] = 1;
        }else{
            $input['require_reexamination'] = 0;
        }
        Healthexamfile::create($input);
        return  redirect()->route('employeefile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Healthexamfile  $healthexamfile
     * @return \Illuminate\Http\Response
     */
    public function show(Healthexamfile $healthexamfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Healthexamfile  $healthexamfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Healthexamfile $healthexamfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Healthexamfile  $healthexamfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Healthexamfile $healthexamfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Healthexamfile  $healthexamfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Healthexamfile $healthexamfile)
    {
        //
    }
}
