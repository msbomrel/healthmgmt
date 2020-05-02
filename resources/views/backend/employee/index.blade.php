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
                                        <div class="col-lg-6"><strong class="card-title"></strong></div>
                                        <div class="col-lg-6 text-right">
                                            <button id="btn-add" class="btn btn-primary addcat">Add New Employee
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee Name</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Position</th>
                                            <th>Affiliation</th>
                                            <th>Location</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($employees))
                                            @foreach($employees as $employee)
                                                <tr>
                                                    <td>{{$employee->employee_code}}</td>
                                                    <td>{{$employee->name}}</td>
                                                    <td>{{ucfirst($employee->gender)}}</td>
                                                    <td class="@if($employee->register_status)) flat-color-3 @endif">
                                                        {{$employee->dob}}
                                                    </td>
                                                    <td>{{$employee->position->position_name}}</td>
                                                    <td>{{ucfirst($employee->affiliation->affiliation_name)}}</td>
                                                    <td>{{$employee->location->location_name}}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary open-modal"
                                                                value="{{$employee->employee_code}}">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger del-btn"
                                                                data-url="{{route('employee.destroy', $employee->employee_code)}}">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                        @if($employee->register_status)
                                                            @if(empty($employee->hasfile))
                                                                <a href="{{route('fileadd', $employee->employee_code)}}">
                                                                    <button class="btn btn-sm btn-primary">
                                                                        <i class="fa fa-address-book-o"
                                                                           aria-hidden="true">
                                                                            Register
                                                                        </i>
                                                                    </button>
                                                                </a>
                                                            @else
                                                                <button class="btn btn-sm btn-dark">Registered</button>
                                                            @endif
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group error">
                            <label for="name" class="col-sm-12 control-label">Employee Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="name form-control has-error" id="name"
                                       name="name" required>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="gender" class="col-sm-12 control-label">Gender</label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-control" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="dob" class="col-sm-12 control-label">Date of Birth</label>
                            <div class="col-sm-12">
                                <input type="text" class="dob form-control has-error" id="dob"
                                       name="dob" required>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="position_code" class="col-sm-12 control-label">Position</label>
                            <div class="col-sm-12">
                                <select name="position_code" class="form-control" id="position_code">
                                    @if(!empty($positions))
                                        @foreach($positions as $position)
                                            <option
                                                value="{{$position->position_code}}">{{$position->position_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="affiliation_code" class="col-sm-12 control-label">Affiliation</label>
                            <div class="col-sm-12">
                                <select name="affiliation_code" class="form-control" id="affiliation_code">
                                    @if(!empty($affiliations))
                                        @foreach($affiliations as $affiliation)
                                            <option
                                                value="{{$affiliation->affiliation_code}}">{{$affiliation->affiliation_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="location_code" class="col-sm-12 control-label">Location</label>
                            <div class="col-sm-12">
                                <select name="location_code" class="form-control" id="location_code">
                                    @if(!empty($locations))
                                        @foreach($locations as $location)
                                            <option
                                                value="{{$location->location_code}}">{{$location->location_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save">Submit</button>
                        <input type="hidden" id="employee_id" name="employee_id" value="">
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
        $(".dob").flatpickr({
            inline: false,
            maxDate: "today",
            dateFormat: "Y-m-d",
        });
    </script>
    <script>
        var url = "{{URL::to('employee')}}";
        $(window).on('load', function () {
            $('#myModal').modal({
                show: false,
                backdrop: 'static',
                keyboard: false
            });

        });

        //create new / update existing country
        $("#btn-save").on('click', function (e) {
            $('.label-danger').remove();
            e.preventDefault();
            var name = $('#name').val();
            var gender = $('#gender').val();
            var dob = $('#dob').val();
            var location_code = $('#location_code').val();
            var position_code = $('#position_code').val();
            var affiliation_code = $('#affiliation_code').val();

            //used to determine the http ver to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var employee_id = $('#employee_id').val();
            var my_url = url;

            if (state === "update") {
                type = "PUT"; //for updating existing resource
                my_url += '/' + employee_id;
            }
            if (name !== "" || gender !== "" || dob !== "") {
                console.log(my_url, type);
                $.ajax({
                    type: type,
                    url: my_url,
                    data: {
                        name: name, gender: gender, dob: dob, location_code: location_code,
                        position_code: position_code, affiliation_code: affiliation_code
                    },
                    dataType: 'json',
                    success: function (data) {
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                e.preventDefault();
                if (name !== "") {
                    $('.name').after('<span class="label label-danger">Name cannot be empty</span>');
                } else if (gender !== "") {
                    $('.gender').after('<span class="label label-danger">Gender cannot be empty</span>');
                } else {
                    $('.dob').after('<span class="label label-danger">DOB cannot be empty</span>');
                }
            }
        });

        //display modal form for editing
        $(document).on('click', '.open-modal', function () {
            var employee_id = $(this).val();
            // console.log(affiliation_id);
            $.get(url + '/' + employee_id + '/edit', function (data) {
                //success data
                $('#employee_id').val(data.employee_code);
                $('#name').val(data.name);
                $('#gender').val(data.gender);
                $('#dob').val(data.dob);
                $('#location_code').val(data.location_code);
                $('#position_code').val(data.position_code);
                $('#affiliation_code').val(data.affiliation_code);

                $('#btn-save').val("update");
                $('#btn-save').text("Update");
                $('#myModal').modal('show');
            })
        });
    </script>
@endsection
