@extends('home')

@section('content-home')
<form method="POST" action="/trucks/{{$truck->id}}/updatelocation">
  @method('PUT')
  @csrf
  @include('trucks.states')
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
  function initMap() {
    let location = {lat: {{$truck->lat}}, lng: {{$truck->lng}}};
    let map = new google.maps.Map(document.getElementById("map"), {
    zoom: 7,
    center: location
    });
    renderPosition(map)
  }
  function renderPosition(map){
    marker = new google.maps.Marker({
    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',  
    position: {lat: {{$truck->lat}}, lng: {{$truck->lng}} }, 
    map: map,
    draggable: true
    });
  } 
</script>

@endsection
