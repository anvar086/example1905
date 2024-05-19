@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
        <form name="add category" method="post" enctype="multipart/form-data" action="{{route('category.update',$category->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="comment">Name:</label>
                <input name="title" type="text" placeholder = "Page name" class="form-control" value="{{$category->title}}"/>
            </div>
            <div class="custom-file ">
                <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile" >{{$category->image}}</label>
                <div class="invalid-feedback">Image</div>
            </div>
            <div class="form-group">
                <label for="comment">Min Description:</label>
                <textarea name="min_description" class="form-control" rows="5">{{$category->min_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea name="description" class="form-control" rows="8">{{$category->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
    </form>
@endsection