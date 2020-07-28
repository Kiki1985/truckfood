@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Truck</div>

                <div class="card-body">

                   <h5 class="mb-4">Edit a truck info</h5>
                   @if(count($errors))
                      @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                      @endforeach <br>
                    @endif

                    <form method="POST" action="/trucks/{{$truck->id}}/update">
                    @method('PUT')
                    @csrf
                      <div class="form-group">
                        <label for="truckName">Truck name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter truck name" value="{{$truck->name}}" required>
                      </div>
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
                      </div>
                      <div class="form-group">
                        <label for="lat">Lat</label>
                        <input type="text" name="lat" class="form-control" placeholder="Latitude" value="{{$truck->lat}}" required>
                      </div> 
                      <div class="form-group"> 
                        <label for="lng">Lng</label>
                        <input type="text" name="lng" class="form-control" placeholder="Longitude" value="{{$truck->lng}}" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{$truck->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input name="website" type="text" class="form-control" placeholder="Enter website" value="{{$truck->website}}">
                      </div>
                      <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input name="instagram" type="text" class="form-control" placeholder="Enter instagram" value="{{$truck->instagram}}">
                      </div>
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" type="text" class="form-control" placeholder="Enter facebook" value="{{$truck->facebook}}">
                      </div>
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input name="twitter" type="text" class="form-control" placeholder="Enter twitter" value="{{$truck->twitter}}">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection