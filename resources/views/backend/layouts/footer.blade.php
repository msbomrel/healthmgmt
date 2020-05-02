<script src="{{asset('backend/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/popper.min.js')}}"></script>
<script src="{{asset('backend/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/lib/toastr/toastr.min.js')}}"></script>
<script src="{{asset('backend/js/lib/moment/moment.js')}}"></script>
<script src="{{asset('backend/calendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('backend/calendar/fullcalendar-init.js')}}"></script>
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/dropzone.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>

<script src="{{asset('backend/js/custom.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
@yield('scripts')

