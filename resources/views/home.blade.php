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
            </div>
        </div>
    </div>
</div>
@endsection
