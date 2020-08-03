@extends('home')

@section('content-home')
<div id="map" class="w-100" style="height: 300px"></div>
<form method="POST" action="/trucks/{{$truck->id}}/updatelocation">
  @method('PUT')
  @csrf
  @include('trucks.states')
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
  function renderPosition(map){
    marker = new google.maps.Marker({
    position: {lat: {{$truck->lat}}, lng: {{$truck->lng}} }, 
    map: map,
    draggable: true
    });
  } 
</script>

@endsection
