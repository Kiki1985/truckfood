@extends('layouts.app')
@section('content')
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYzXj5wF4L6mChyyc5xwfb2QT1QEZ9VN8&callback=initMap&libraries=places"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="map" class="w-100" style="height: 300px"></div>
                @yield('content-home')
            </div>
        </div>
    </div>
</div>




@endsection
