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
                                            <button id="btn-add" class="btn btn-primary addcat">Add New Position
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Position Name</th>
                                            <th>Is Manager ?</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($positions))
                                            @foreach($positions as $position)
                                                <tr>
                                                    <td>{{$position->position_code}}</td>
                                                    <td>{{$position->position_name}}</td>
                                                    <td>@if($position->is_manager == 1) Yes @else No @endif</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary open-modal" value="{{$position->position_code}}">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger del-btn"
                                                                data-id="{{$position->position_code}}"
                                                                data-url="{{route('position.destroy', $position->position_code)}}">
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
                            <label for="position_name" class="col-sm-12 control-label">Position Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="position_name form-control has-error" id="position_name"
                                       name="position_name" required>
                            </div>
                            <br>
                            <label for="is_manager" class="col-sm-12 control-label">Is Manager ?</label>
                            <input type="checkbox" class="form-control" name="is_manager" id="is_manager">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save">Submit</button>
                        <input type="hidden" id="position_id" name="position_id" value="">
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
        var url = "{{URL::to('position')}}";
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
            var position_name = $('#position_name').val();
            var is_manager = 0;
            if ($('#is_manager').is(':checked')) {
                is_manager = 1
            }

            //used to determine the http ver to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var position_id = $('#position_id').val();
            var my_url = url;

            if (state === "update") {
                type = "PUT"; //for updating existing resource
                my_url += '/' + position_id;
            }
            if (position_name !== "") {
                console.log(my_url, type);
                // console.log(token);
                $.ajax({
                    type: type,
                    url: my_url,
                    data: {position_name: position_name, is_manager: is_manager},
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
                $('.position_name').after('<span class="label label-danger">Position cannot be empty</span>');
            }
        });

        //display modal form for editing
        $(document).on('click', '.open-modal', function () {
            var position_id = $(this).val();
            // console.log(position_id);
            $.get(url + '/' + position_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#position_id').val(data.position_code);
                $('#position_name').val(data.position_name);
                if(data.is_manager === 1){
                    $('#is_manager').attr("checked","checked");
                }

                $('#btn-save').val("update");
                $('#btn-save').text("Update");
                $('#myModal').modal('show');
            })
        });
    </script>
@endsection
