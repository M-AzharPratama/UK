<?php

namespace App\Http\Controllers;


use App\Models\rombels;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombels::all();
        return view('rombel.index', compact('rombels'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('rombel.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rombel' => 'required',
        ]);
    
        Rombels::create([
            'rombel' => $request->rombel,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data rombel!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rombels $rombels, $id)
    {
        $students = rombels::find($id)->students;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rombels $rombels, $id)
    {
        //
        $rombels = rombels::find($id);

        return view('rombel.edit', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rombels $rombels, $id)
    {
        $request->validate([
            'rombel' => 'required',
        ]);
    
        rombels::where('id', $id)->update([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombel.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Rombels::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
