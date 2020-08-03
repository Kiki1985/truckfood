@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="map" class="w-100" style="height: 300px"></div>
                  <form method="POST" action="/trucks/{{$truck->id}}/updatelocation">
                    @method('PUT')
                    @csrf
                    @include('trucks.states')
                    <button type="submit" class="btn btn-primary">Submit</button>
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
