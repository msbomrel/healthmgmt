<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
    @yield('title')
</title>
<meta name="description" content="Ela Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="apple-touch-icon" href="{{asset('favicon.png')}}">
<link rel="shortcut icon" href="{{asset('favicon.png')}}">
<link rel="stylesheet" href="{{asset('backend/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/pe-icon-7-filled.css')}}">
<link href="{{asset('backend/weather/css/weather-icons.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/calendar/fullcalendar.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
<link href="{{asset('backend/css/charts/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/lib/toastr/toastr.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/custom-style.css')}}" rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""/>
<link rel="stylesheet" href="{{asset('backend/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet"/>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet'/>
<link href="{{asset('backend/css/lib/dropzone/dropzone.css')}}" rel="stylesheet">


@yield('styles')
