<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('home', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Menu::create([
            'Name' => $request -> Name,
            'Description' => $request -> Description,
            'Image' => $image_name,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('edit-menu', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Menu::findOrFail($id)->update([
            'Name' => $request -> Name,
            'Description' => $request -> Description,
            'Image' => $image_name,
        ]);

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $picture = "/storage/images/" . $menu->Image;
        $path = str_replace('\\', '/', public_path());
        unlink($path . $picture);
        Menu::destroy($id);
        return redirect('/');
    }

    public function setCookie(Request $request)
    {
        $user = Auth::user();
        Cookie::queue('nama', $user->name, 60);
        return redirect('/');
    }
}
