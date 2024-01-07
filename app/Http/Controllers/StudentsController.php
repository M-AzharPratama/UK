<?php

namespace App\Http\Controllers;

use App\Models\rombels;
use App\Models\rayons;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::with('rombel','rayon')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('student.create',compact('rombels','rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students, $id)
    {
        $rombel = students::find($id)->rombel;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(students $students, $id)
    {
        $students = students::find($id);
        $rombels = rombels::all();
        $rayons = rayons::all();

        return view('student.edit', compact('students','rombels','rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, students $students, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);
    
        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('student.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        students::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function data()
    {
    // with: mengambil hasil relasi dari PK dan FK nya. valuenya == nama func relasi hasMany/ belongs To yg ada di modelnya
    $students = students::with('user')->simplePaginate(5);
    return view("student.ps.index", compact('$students'));
    }
}
