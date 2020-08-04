@extends('home')

@section('content-home')
@if(count(auth()->user()->trucks) || (auth()->user()->role == 'Admin' && count($trucks)) )
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
  @can('update', $truck)
  <tr>
    <td>{{$truck->name}}</td>
    @if(auth()->user()->role === "Admin")
    <td>{{$truck->user->name}}</td>
    @endif
    <td>{{$truck->state->state}}</td>
    <td>{{$truck->city}}</td>
    <td>
      <a href="{{ route('location.edit', $truck) }}">
        <button type="submit" class="btn btn-primary btn-sm">
          Edit
        </button>
      </a>
    </td>
    <td>
      <a href="{{ route('trucks.edit', $truck) }}">
        <button type="submit" class="btn btn-primary btn-sm">
          Edit
        </button>
      </a>
    </td>
    <td>
      <form method="POST" action="/trucks/{{$truck->id}}/delete">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-secondary btn-sm">
          Delete
        </button>
      </form>
    </td>
  </tr>
  @endcan
  @endforeach
  </tbody>
</table>
@endif

@endsection
