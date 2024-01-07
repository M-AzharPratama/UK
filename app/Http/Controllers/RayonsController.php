<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\user;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = rayons::with('user')->get();
        return view('rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = user::all();
        return view('rayon.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rayons $rayons, $id)
    {
        $rayons = rayons::find($id);
        $user = user::all();

        return view('rayon.edit', compact('rayons','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rayons $rayons, $id)
    {
        $data = $request->all();
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);
    
        rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rayons::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
