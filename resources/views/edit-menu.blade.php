@extends('layout.master')
@section('content')
<form class="mx-5 my-5" action="/update-menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <h1>Edit Menu</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Food Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter food name" name="Name" value="{{$menu->Name}}"><br>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Food Description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter food description" name="Description" value="{{$menu->Description}}"><br>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Food Image</label><br>
        @if ($menu->Image)
        <img src="{{asset('storage/images/' .$menu->Image)}}" style="width: 200px; height: 200px alt="><br><br>
        @endif
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input food image" name="Image"><br>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
