@extends('backend.layouts.master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6"><strong class="card-title">
                                                Health Examination Files
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Target Year</th>
                                            <th>Implementation Date</th>
                                            <th>Med Exam Course</th>
                                            <th>Classification</th>
                                            <th>Awareness Date</th>
                                            <th>Judgment Result</th>
                                            <th>Judgment Date</th>
                                            <th>Re-Examination ?</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($files))
                                            @foreach($files as $employee)
                                                <tr>
                                                    <td>{{$employee->employee->name}} ({{$employee->employee->employee_code}})</td>
                                                    <td>{{$employee->target_year}}</td>
                                                    <td>{{$employee->implementation_date}}</td>
                                                    <td>{{$employee->medical_exam_course}}</td>
                                                    <td>{{$employee->classification}}</td>
                                                    <td>{{$employee->awareness_date}}</td>
                                                    <td>{{$employee->judgement_result}}</td>
                                                    <td>{{$employee->judgement_date}}</td>
                                                    <td>
                                                        @if($employee->require_reexamination == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include("backend.layouts.datatable")
    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable({
                fixedHeader: true,
            });
        });
    </script>
@endsection
