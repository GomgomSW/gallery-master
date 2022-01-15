<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;

class StaffGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arts  = Art::all();
        return view('arts.index', [
            'arts' => $arts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'release' => 'required | integer | min:0 | max:2021',
            'writer' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);
        

        $art = Art::create([
            'name' => $request->input('name'),
            'release' => $request->input('release'),
            'writer' => $request->input('writer'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' =>auth()->user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $art = Art::find($id);

        return view('arts.show')->with('art', $art);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $art = Art::find($id)->first();
        return view('arts.edit')->with('art', $art);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'release' => 'required | integer | min:0 | max:2021',
            'writer' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);

        $art = Art::where('id', $id)->
            update([
                'name' => $request->input('name'),
                'release' => $request->input('release'),
                'writer' => $request->input('writer'),
                'type' => $request->input('type'),
                'description' => $request->input('description'),
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        return redirect('/arts');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Art $art)
    {
        $art-> delete();
        return redirect('/arts');
    }
}
