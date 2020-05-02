@extends('backend.layouts.master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6"><strong class="card-title">
                                                <h3 class="box-title">Employee: {{$employee->name}} >
                                                    (DOB: {{$employee->dob}}
                                                    ) </h3>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{route('employeefile.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="box box-info">
                                                <div class="row box-body">
                                                    <div class="col-sm-6 form-group">
                                                        <label for="title" class="col-sm-10 control-label">Employee
                                                            Code</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" name="employee_code"
                                                                   class="form-control"
                                                                   value="{{$employee->employee_code}}" required
                                                                   readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="target_year" class="col-sm-10 control-label">Target
                                                            year</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control targetyear"
                                                                   name="target_year"
                                                                   placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="implementation_date"
                                                               class="col-sm-10 control-label">Implementation
                                                            Date</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control pickdate" name="implementation_date"
                                                                   placeholder="" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label for="medical_exam_course" class="col-sm-10 control-label">Medical
                                                            Examination Course</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="medical_exam_course" class="form-control"
                                                                   id="medical_exam_course" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="classification" class="col-sm-10 control-label">Classification</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="classification" class="form-control"
                                                                   id="classification" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="medical_exam_course" class="col-sm-10 control-label">Awareness Date</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="awareness_date" class="form-control pickdate"
                                                                   id="awareness_date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="judgement_result" class="col-sm-10 control-label"
                                                        >Judgement Result</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="judgement_result" class="form-control"
                                                                   id="judgement_result" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="judgement_date" class="col-sm-10 control-label"
                                                        >Judgement Date</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="judgement_date" class="form-control pickdate"
                                                                   id="judgement_date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label for="judgement_date" class="col-sm-10 control-label"
                                                        >Require Re-Examination?</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" class="switch-checkbox" name="require_reexamination">
                                                                <span class="slider"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer text-center">
                                                    <button type="submit" id="submit" class="btn btn-info">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
        $(".pickdate").flatpickr({
            inline: false,
            maxDate: "today",
            dateFormat: "Y-m-d",
        });

        $(".targetyear").flatpickr({
            inline: false,
            dateFormat: "Y",
        });
    </script>
@endsection
