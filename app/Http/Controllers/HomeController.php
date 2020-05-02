<?php

namespace App\Http\Controllers;

use App\Affiliation;
use App\Employee;
use App\Healthexamfile;
use App\Location;
use App\Position;
use Illuminate\Http\Request;

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
        $data['empfile_count'] = Healthexamfile::all()->count();
        $data['emp_count'] = Employee::all()->count();
        $data['loc_count'] = Location::all()->count();
        $data['aff_count'] = Affiliation::all()->count();
        $data['pos_count'] = Position::all()->count();
        return view('backend.home', $data);
    }
}
