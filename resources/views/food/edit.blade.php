 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Alert message --}}
            @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}    
                    </div>                    
                @endif

                {{-- When you create a upload field you need to use this code:enctype="multipart/form-data --}}

            <form action="{{route('food.update',[$food->id])}}" method="POST" enctype="multipart/form-data">@csrf
                 {{method_field('PUT')}}
            <div class="card"> 
                <div class="card-header">Update Food</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                        value="{{$food->name}}">
                         @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">
                            {{$food->description}}
                        </textarea>
                         @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{$food->price}}">
                         @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">Select Catrgory</option>
                            @foreach (App\Models\Category::all() as $category)
                                <option value="
                                    {{$category->id}}"
                                    {{-- To select default cartegory --}}
                                    @if ($category->id==$food->category_id)
                                        selected
                                    @endif
                                    >
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                         @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                         @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">
                            Update
                        </button>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection