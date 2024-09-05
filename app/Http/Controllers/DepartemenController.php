<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departemen = Departemen::all();
        return view('departemen.index', ['departemen'=>$departemen]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_departemen' => 'required',
        ]);
        Departemen::create([
            'nama_departemen' =>$request->nama_departemen,
        ]);
        return redirect('departemen')->with('success','Departemen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Departemen::where('kodedepartemen',$id)->first();
        return view('departemen.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_departemen' => 'required',
        ]);
        $data = ([
            'nama_departemen' =>$request->nama_departemen,
        ]);
        Departemen::where('kodedepartemen',$id)->update($data);
        return redirect('departemen')->with('success','Departemen berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Departemen::where('kodedepartemen',$id)->delete();
        return redirect('departemen')->with('success','Departemen berhasil dihapus!');
    }
}
