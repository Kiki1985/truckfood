@extends('layouts.app')

@section('content')
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

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYzXj5wF4L6mChyyc5xwfb2QT1QEZ9VN8&callback=initMap&libraries=places"></script>
<script>
  function initMap() {
    let location = {lat: 38.500000, lng: -98.000000};
    let map = new google.maps.Map(document.getElementById("map"), {
    zoom: 3.9,
    center: location
    });
    renderPosition(map)
  }
</script>

@if(!\Request::is("trucks/*/editlocation"))

<script>
  function renderPosition(map) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'getlocations', true); 
    xhr.send(null);
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4){
      let rez = JSON.parse(xhr.responseText);
        for( let i in rez){
          if(rez[i].lat !== null) {
            marker = new google.maps.Marker({
            position: {lat: rez[i].lat, lng: rez[i].lng}, 
            map: map,
            });
          }
        }
      }
    }
  }
</script>

@endif
@endsection
