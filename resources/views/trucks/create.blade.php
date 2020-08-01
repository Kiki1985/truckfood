@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
        @if(\Request::is('trucks/create'))
          <h5 class="mb-4">Create a new truck</h5>
          <form method="POST" action="/trucks/create">
          @csrf
        @else
          <h5 class="mb-4">Edit a truck info</h5>
          <form method="POST" action="/trucks/{{$truck->id}}/update">
          @method('PUT')
          @csrf
        @endif
            <div class="form-group has-error">
              <label for="truckName">Truck name</label>
              <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                placeholder="Enter truck name" 
                value="{{ \Request::is('trucks/create') ? old('name') : $truck->name }}" 
                required>
              @error('name')
                <p class="text-danger">{{$errors->first('name')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="state">State</label>
              <select name="state_id" class="form-control" required>
              @if(!\Request::is('trucks/create'))
                <option 
                  value="{{$truck->state->id}}">
                    {{$truck->state->state}}
                </option>
              @else
                <option value="" selected disabled>Select state</option>
              @endif
              @foreach($states as $state)
                <option name="option_id" value="{{$state->id}}">
                  {{$state->state}}
                </option>
                @if($errors->all())
                  <option value="{{old('state_id')}}" selected>
                    {{$states->find(old('state_id'))->state}}
                  </option>
                @endif
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input 
                type="text" 
                name="city" 
                class="form-control @error('city') is-invalid @enderror" 
                placeholder="Enter city" 
                value="{{ \Request::is('trucks/create') ? old('city') : $truck->city }}" 
                required>
              @error('city')
                <p class="text-danger">{{$errors->first('city')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea 
                name="description" 
                class="form-control @error('description') is-invalid @enderror" 
                rows="3" 
                required
              >{{ \Request::is('trucks/create') ? old('description') : $truck->description }}</textarea>
              @error('description')
                <p class="text-danger">{{$errors->first('description')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input name="website" type="text" class="form-control" placeholder="Enter website" value="{{old('website')}}">
            </div>
            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input name="instagram" type="text" class="form-control" placeholder="Enter instagram" value="{{old('website')}}">
            </div>
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input name="facebook" type="text" class="form-control" placeholder="Enter facebook" value="{{old('facebook')}}">
            </div>
            <div class="form-group">
              <label for="twitter">Twitter</label>
              <input name="twitter" type="text" class="form-control" placeholder="Enter twitter" value="{{old('twitter')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection