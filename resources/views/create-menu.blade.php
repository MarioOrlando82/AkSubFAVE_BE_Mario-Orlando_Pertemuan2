@extends('layout.master')
@section('content')
<form class="mx-5 my-5" action="/store-menu" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Create Menu</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Food Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter food name" name="Name"><br>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Food Description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter food description" name="Description"><br>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Food Image</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input food image" name="Image"><br>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
