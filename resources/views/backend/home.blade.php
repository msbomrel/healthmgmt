@extends('backend.layouts.master')
@section('content')
    <div class="content pb-0">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7f-copy-file"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span
                                            class="count">@if(!empty($empfile_count)) {{ $empfile_count }} @else 0 @endif </span>
                                    </div>
                                    <a href="{{route('employeefile.index')}}">
                                        <div class="stat-heading">Health Examination File</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7f-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span
                                            class="count">@if(!empty($emp_count)) {{ $emp_count }}@else 0 @endif </span>
                                    </div>
                                    <a href="{{route('employee.index')}}">
                                        <div class="stat-heading">Employee</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7f-config"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">
                                            @if(!empty($pos_count)) {{ $pos_count }} @else 0 @endif
                                        </span>
                                    </div>
                                    <a href="{{route('position.index')}}">
                                        <div class="stat-heading">Position</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7f-speaker"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">
                                            @if(!empty($aff_count)) {{ $aff_count }} @else 0 @endif
                                        </span></div>
                                    <a href="{{route('affiliation.index')}}">
                                        <div class="stat-heading">Affiliation</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-5">
                                <i class="pe-7f-global"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">
                                            @if(!empty($loc_count)) {{ $loc_count }} @else 0 @endif
                                        </span></div>
                                    <a href="{{route('location.index')}}">
                                        <div class="stat-heading">Location</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
