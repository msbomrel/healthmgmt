<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
@include('backend.layouts.header')
<body class="js-ready">
<!-- Left Panel -->
@if(Auth::user())
    @include('backend.layouts.sidebar')
@endif
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    @if(Auth::user())
        @include('backend.layouts.navbar')
    @endif
    @yield('content')

    <div class="clearfix">

    </div>
    @include('backend.layouts.delete')
    @include('backend.layouts.footer')
</div>
</body>
</html>
