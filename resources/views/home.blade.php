@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="map" class="w-100" style="height: 300px"></div>

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
                      <th>Truck info</th>
                      <th>Truck</th>
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

                      <td><a href="/trucks/{{$truck->id}}/editlocation"><button type="submit" class="btn btn-primary btn-sm">Edit</button></a></td>

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
                    let location = {lat: 38.500000, lng: -98.000000};
                    let map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 3.9,
                      center: location
                    });
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'latlng', true); 
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
            </div>
            
        </div>
    </div>
</div>
@endsection
