@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                {{-- Message alert --}}
                 @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}    
                    </div>                    
                @endif
                <div class="card-header">All Food
                     <span class="float-end">
                        <a href="{{route('food.create')}}">
                            <button class="btn btn-secondary">Add Food</button>
                        </a>
                    </span>
                </div>
                   
                <div class="card-body">
                    {{-- @foreach ($categories as $category)
                        <p>{{$category->name}}</p>
                    @endforeach --}}

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($foods)>0)
                            @foreach ($foods as $key=>$food)
                            <tr>
                                <td><img src="{{asset('image')}}/{{$food->image}}" alt="" width="80px"></td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>${{$food->price}}</td>
                                <td>{{$food->category->name}}</td>
                                <td>
                                    <a href="{{route('food.edit',[$food->id])}}">
                                        <button class="btn btn-outline-success">
                                            Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                            
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$food->id}}">
                                Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Food</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-danger">
                                                    Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                </td>
                            </tr>
                            @endforeach

                             @else
                                <td>No food to display</td>
                            @endif
                        </tbody>
                    </table>
                     {{-- For pagination links to show up --}}
                        {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection