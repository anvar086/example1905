@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
        <form name="add page" method="post" action="{{route('pages.store')}}">
            @csrf
            <div class="form-group">
                <label for="comment">Name:</label>
                <input name="title" type="text" placeholder = "Page name" class="form-control"/>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
    </form>
@endsection