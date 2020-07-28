@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="map" class="w-100" style="height: 300px"></div>
                  <form method="POST" action="/trucks/{{$truck->id}}/addlatlng">
                    @method('PUT')
                    @csrf
                  <div class="form-group"> 
                    <label for="searchmap" class="mt-3">Search map</label>
                    <input type="text" id="searchmap" class="form-control mb-3" placeholder="Search location">
                  </div> 
                  <div class="form-group"> 
                    <label for="lat">Lat</label>
                    <input type="text" name="lat" class="form-control mb-3" placeholder="Latitude" value="{{$truck->lat}}">
                  </div>
                  <div class="form-group"> 
                    <label for="lng">Lng</label>
                    <input type="text" name="lng" class="form-control mb-3" placeholder="Longitude" value="{{$truck->lng}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
                  </form>

                <script>
                
                  function initMap() {
                    let searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
                    let location = {lat: 38.500000, lng: -98.000000};
                    let map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 3.9,
                      center: location
                    });

                    marker = new google.maps.Marker({
                      position: {lat: {{$truck->lat}}, lng: {{$truck->lng}} }, 
                      map: map,
                      draggable: true
                    });
                  }

                </script>
            </div>
            
        </div>
    </div>
</div>
@endsection
