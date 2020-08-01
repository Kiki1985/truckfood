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
                  <div class="form-group">
                    <label for="state">State</label>
                    <select name="state_id" class="form-control">
                      <option value="{{$truck->state->id}}">{{$truck->state->state}}</option>
                      @foreach($states as $state)
                      <option value="{{$state->id}}">{{$state->state}}</option>
                      @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" name="city" class="form-control" placeholder="Enter city" value="{{$truck->city}}" required>
                      @error('city')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
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
