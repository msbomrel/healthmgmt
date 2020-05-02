<?php

namespace App\Http\Controllers;

use App\Affiliation;
use App\Employee;
use App\Location;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::all();

        foreach ($employees as $employee){
            $regStatus = false;

            if(date('m',strtotime($employee->dob)) == Carbon::today()->month){
                $regStatus = true;
            }
            $employee->register_status = $regStatus;
        }

        $positions = Position::select('position_code','position_name')->get();
        $locations = Location::select('location_code','location_name')->get();
        $affiliations = Affiliation::select('affiliation_code','affiliation_name')->get();
        return  view('backend.employee.index', compact('employees','positions','locations','affiliations'));
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
        $employee = Employee::create($request->all());
        return Response::json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $employee = Employee::where('employee_code', $id)->first();
        return Response::json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::where('employee_code', $id)->update($request->all());
        return Response::json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Employee::where('employee_code', $id)->delete();
        return  redirect()->back();
    }
}
