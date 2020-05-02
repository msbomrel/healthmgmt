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
                                            <button id="btn-add" class="btn btn-primary addcat">Add New Location
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Location</th>
                                            <th>Place to conduct Health Check</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($locations))
                                            @foreach($locations as $location)
                                                <tr>
                                                    <td>{{$location->location_code}}</td>
                                                    <td>{{$location->location_name}}</td>
                                                    <td>
                                                        {{$location->place_to_conduct_health_check}}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary open-modal"
                                                                value="{{$location->location_code}}">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger del-btn"
                                                                data-url="{{route('location.destroy', $location->location_code)}}">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
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
                            <label for="location_name" class="col-sm-12 control-label">Location Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="location_name form-control has-error" id="location_name"
                                       name="location_name" required>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="place_to_conduct_health_check" class="col-sm-12 control-label">Place to conduct
                                Healthcheck</label>
                            <div class="col-sm-12">
                                <input type="text" class="place_to_conduct_health_check form-control has-error"
                                       id="place_to_conduct_health_check"
                                       name="place_to_conduct_health_check" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save">Submit</button>
                        <input type="hidden" id="location_id" name="location_id" value="">
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
    <script>
        var url = "{{URL::to('location')}}";
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
            var location_name = $('#location_name').val();
            var place_to_conduct_health_check = $('#place_to_conduct_health_check').val();

            //used to determine the http ver to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var location_id = $('#location_id').val();
            var my_url = url;

            if (state === "update") {
                type = "PUT"; //for updating existing resource
                my_url += '/' + location_id;
            }
            if (location_name !== "") {
                console.log(my_url, type);
                // console.log(token);
                $.ajax({
                    type: type,
                    url: my_url,
                    data: {location_name: location_name, place_to_conduct_health_check: place_to_conduct_health_check},
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
                $('.location_name').after('<span class="label label-danger">Location cannot be empty</span>');
            }
        });

        //display modal form for editing
        $(document).on('click', '.open-modal', function () {
            var location_id = $(this).val();
            // console.log(affiliation_id);
            $.get(url + '/' + location_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#location_id').val(data.location_code);
                $('#location_name').val(data.location_name);
                $('#place_to_conduct_health_check').val(data.place_to_conduct_health_check);

                $('#btn-save').val("update");
                $('#btn-save').text("Update");
                $('#myModal').modal('show');
            })
        });
    </script>
@endsection
