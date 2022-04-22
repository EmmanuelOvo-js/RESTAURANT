@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Product</div>
                <div class="card-body img-responsive">
                    <img src="{{asset('image')}}/{{$food->image}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Details</div>

                <div class="card-body">
                    <p><h2 style="font-weight: bold;">{{$food->name}}</h2></p>
                    <p class="lead">{{$food->description}}</p>
                    <p><h4 style="color: green;">${{$food->price}}</h4></p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection