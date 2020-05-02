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
                                            <button id="btn-add" class="btn btn-primary addcat">Add New Affiliation
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Affiliation Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($affiliations))
                                            @foreach($affiliations as $affiliation)
                                                <tr>
                                                    <td>{{$affiliation->affiliation_code}}</td>
                                                    <td>
                                                        {{$affiliation->affiliation_name}}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary open-modal"
                                                                value="{{$affiliation->affiliation_code}}">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger del-btn"
                                                                data-url="{{route('affiliation.destroy', $affiliation->affiliation_code)}}">
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
                            <label for="affiliation_name" class="col-sm-12 control-label">Affiliation Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="affiliation_name form-control has-error" id="affiliation_name"
                                       name="affiliation_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save">Submit</button>
                        <input type="hidden" id="affiliation_id" name="affiliation_id" value="">
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
        var url = "{{URL::to('affiliation')}}";
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
            var affiliation_name = $('#affiliation_name').val();

            //used to determine the http ver to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var affiliation_id = $('#affiliation_id').val();
            var my_url = url;

            if (state === "update") {
                type = "PUT"; //for updating existing resource
                my_url += '/' + affiliation_id;
            }
            if (affiliation_name !== "") {
                console.log(my_url, type);
                // console.log(token);
                $.ajax({
                    type: type,
                    url: my_url,
                    data: {affiliation_name: affiliation_name},
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
                $('.affiliation_name').after('<span class="label label-danger">affiliation cannot be empty</span>');
            }
        });

        //display modal form for editing
        $(document).on('click', '.open-modal', function () {
            var affiliation_id = $(this).val();
            // console.log(affiliation_id);
            $.get(url + '/' + affiliation_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#affiliation_id').val(data.affiliation_code);
                $('#affiliation_name').val(data.affiliation_name);

                $('#btn-save').val("update");
                $('#btn-save').text("Update");
                $('#myModal').modal('show');
            })
        });
    </script>
@endsection
