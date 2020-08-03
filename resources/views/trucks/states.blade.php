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
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
            
