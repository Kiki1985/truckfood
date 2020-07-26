@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @foreach($trucks as $truck)
                <div class="card-body ">

                    
                    {{$truck->name}}
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
