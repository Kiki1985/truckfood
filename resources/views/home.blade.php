@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Truck
                </div>
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
                <div id="map" class="w-100" style="height: 240px"></div>

                <script>
                  function initMap() {
                    let location = {lat: 44.786568, lng: 20.448921};
                    let map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 4,
                      center: location
                    });
                    let marker = new google.maps.Marker({
                      position: location, 
                      map: map,
                      draggable: true 
                    });
                  }
                  

                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYzXj5wF4L6mChyyc5xwfb2QT1QEZ9VN8&callback=initMap"></script>
            </div>
            
        </div>
    </div>
</div>
@endsection
