@extends('layout.master')
@section('content')
<h4 class="mx-4 mt-3">Welcome Back
    @auth
    {{ auth()->user()->name }}
    @else
    Guest
    @endauth!
</h4>
<div class="d-flex flex-wrap">
    @forelse ($menus as $menu)
        <div class="card w-40 my-3 mx-4" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage/images/'.$menu->Image)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$menu->Name}}</h5>
                <p class="card-text">{{$menu->Description}}</p>
                @can('isAdmin')
                    <a href="{{route('edit', $menu -> id)}}" class="btn btn-primary">Edit</a>
                    <form action="/delete-menu/{{$menu->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @empty
        <h1>Empty</h1>
    @endforelse
</div>

@endsection
