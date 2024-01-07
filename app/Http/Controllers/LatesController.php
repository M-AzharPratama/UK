<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = lates::with('student')->get();
        return view('late.index', compact('lates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = students::all();
        return view('late.create',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|file|max:1024',
        ]);

        Lates::create([
            
            'name' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(lates $lates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lates $lates, $id)
    {
        $lates = lates::find($id);
        $students = students::all();

        return view('late.edit', compact('lates','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lates $lates, $id)
    {
        $request->validate([
          
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|file|max:1024',
        ]);
    
        lates::where('id', $id)->update([
            
            'name' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
        ]);

        return redirect()->route('late.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        lates::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    

    public function displayImage($filename)
    {
        // Ambil data 'bukti' berdasarkan nama file dari parameter
        $late = Lates::where('bukti', $filename)->first();
    
        if (!$late) {
            abort(404);
        }
    
        // Ambil kolom 'bukti' dari data 'lates' yang ditemukan
        $imageData = $late->bukti;
    
        // Lakukan respons tergantung pada bagaimana gambar disimpan dalam kolom 'bukti'
        // Misalnya, jika 'bukti' adalah URL ke lokasi gambar:
        // Anda bisa langsung mengembalikan respons redirect ke URL gambar
        return redirect($imageData);
    
        // Jika 'bukti' adalah base64 encoded image:
        // Anda dapat mengembalikan respons dengan base64 decoded image
        // return response(base64_decode($imageData))->header('Content-Type', 'image/jpeg');
    }
    }
