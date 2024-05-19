@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
        <form name="add product" method="post" enctype="multipart/form-data" action="{{route('products.store')}}">
            @csrf
            <div class="form-group">
                <label for="comment">Name:</label>
                <input name="title" type="text" placeholder = "Page name" class="form-control"/>
            </div>
            <div class="custom-file ">
                <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Image</div>
            </div>
            <div class="form-group">
                <label for="comment">Min Description:</label>
                <textarea name="min_description" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea name="description" class="form-control" rows="8"></textarea>
            </div>
            <div class="form-group">
                <select name="categories[]" id="categories" class="form-control" multiple data-live-search="true">
                    <option value="" disabled selected>Nothing selected</option>
                    @foreach ($categories as $key => $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

    </div>
    </form>
@endsection