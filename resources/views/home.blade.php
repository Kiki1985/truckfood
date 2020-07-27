@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                
                <div id="map" class="w-100" style="height: 200px"></div>

                @if (\Request::is('trucks/*/location'))
                  <label for="searchmap" class="mt-3">Search map</label>
                  <input type="text" id="searchmap" class="form-control mb-3" placeholder="Search location">

                  <form method="POST" action="/trucks/{{$truck->id}}/addlatlng">
                    @method('PUT')
                    @csrf
                  <label for="searchmap">Lat</label>
                  <input type="text" name="lat" class="form-control mb-3" placeholder="Latitude">
                  <label for="searchmap">Lng</label>
                  <input type="text" name="lng" class="form-control mb-3" placeholder="Longitude">
                  <button type="submit" class="btn btn-primary">Save</button>
                  </form>

                @endif

                @if((!$trucks->isEmpty()))
                <table class="table mb-0">
                  <thead>
                   <tr>
                      <th scope="col">Name</th>
                      @if(auth()->user()->role === "Admin")
                      <th scope="col">Owner</th>
                      @endif
                      <th>State</th>
                      <th>City</th>
                      <th>Loaction</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trucks as $truck)
                    <tr>
                      <td>{{$truck->name}}</td>
                      @if(auth()->user()->role === "Admin")
                      <td>{{$truck->user->name}}</td>
                      @endif
                      <td>{{$truck->state->state}}</td>
                      <td>{{$truck->city}}</td>

                      <td><a href="/trucks/{{$truck->id}}/location"><button type="submit" class="btn btn-primary btn-sm">Add</button></a></td>

                      <td><a href="/trucks/{{$truck->id}}/edit"><button type="submit" class="btn btn-primary btn-sm">Edit</button></a></td>
                      <td>
                      <form method="POST" action="/trucks/{{$truck->id}}/delete">
                      @method('DELETE')
                      @csrf
                          <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                      </form>
                      </td>
                      </tr>
                     @endforeach
                  </tbody>
                </table>
                @endif
                

                <script>
                  function initMap() {

                    let location = {lat: 44.786568, lng: 20.448921};

                    let map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 4,
                      center: location
                    });

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'latlng', true); 
                    xhr.send(null);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState === 4){
                          let rez = JSON.parse(xhr.responseText);
                          console.log(rez);
                            for( let i in rez){
                              marker = new google.maps.Marker({
                              position: {lat: rez[i].lat, lng: rez[i].lng}, 
                              map: map,
                              draggable: true 
                              });
                            }
                        }
                    }
                  
                  }

                </script>
                {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYzXj5wF4L6mChyyc5xwfb2QT1QEZ9VN8&callback=initMap"></script>--}}
            </div>
            
        </div>
    </div>
</div>
@endsection
