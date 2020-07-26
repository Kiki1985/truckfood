@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Truck</div>

                <div class="card-body">

                   <h5 class="mb-4">Create a new truck</h5>
                   @if(count($errors))
                      @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                      @endforeach <br>
                    @endif

                    <form method="POST" action="/trucks/create">
                    @csrf
                      <div class="form-group">
                        <label for="truckName">Truck name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter truck name" required>
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        <select name="state_id" class="form-control">
                          <option value="" selected disabled>Select state</option>
                          @foreach($states as $state)
                          <option value="{{$state->id}}">{{$state->state}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="town">Town</label>
                        <input type="text" name="town" class="form-control" placeholder="Enter town" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input name="website" type="text" class="form-control" placeholder="Enter website">
                      </div>
                      <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input name="instagram" type="text" class="form-control" placeholder="Enter instagram">
                      </div>
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" type="text" class="form-control" placeholder="Enter facebook">
                      </div>
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input name="twitter" type="text" class="form-control" placeholder="Enter twitter">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection