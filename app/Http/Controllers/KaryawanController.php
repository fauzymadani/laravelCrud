<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\File;
// use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $karyawan = karyawan::all();
        return view('karyawan.index',['karyawan'=>$karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required |mimes:jpeg,jpg,png,gif'
        ],[
            'nip.required' => 'Nip Wajib Diisi',
            'nama_karyawan.required' => 'Nama karyawan Wajib Diisi',
            'gaji_karyawan.required' => 'ini Wajib Diisi',
            'alamat.required' => 'Wajib Diisi coy',
            'jenis_kelamin.required' => 'wajib wajib Wajib Diisi gustiiii',
            'foto.required' => 'foto wajib diisi',
            'foto.mimes' => 'Foto diperbolehkan berkestensi jpeg, jpg, png, gif.',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data = [
            'nip' => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'foto' => $foto_nama,
        ];
        Karyawan::create($data);
        return redirect('karyawan')->with('success', 'Karyawan Berhasi DiTambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Karyawan::where('nip',$id)->firstOrFail();
        return view('karyawan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nip' => 'required',
        'nama_karyawan' => 'required',
        'gaji_karyawan' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
    ],[
        'nip.required' => 'Nip Wajib Diisi',
        'nama_karyawan.required' => 'Nama karyawan Wajib Diisi',
        'gaji_karyawan.required' => 'ini Wajib Diisi',
        'alamat.required' => 'Wajib Diisi coy',
        'jenis_kelamin.required' => 'wajib wajib Wajib Diisi gustiiii',
    ]);

    $data = [
        'nip' => $request->nip,
        'nama_karyawan' => $request->nama_karyawan,
        'gaji_karyawan' => $request->gaji_karyawan,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
    ];

    if ($request->hasFile('foto')) {
        $request->validate([
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ],[
            'foto.mimes' => 'Foto Yang Diperbolehkan Sistem Berekstensi jpeg, png, gif, jpg.'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data_foto = Karyawan::where('nip', $id)->first();

        if ($data_foto && File::exists(public_path('foto') . '/' . $data_foto->foto)) {
            // halo
            File::delete(public_path('foto') . '/' . $data_foto->foto);
        }

        // halig siah melong source code urang!!
        $data['foto'] = $foto_nama;
    }

    Karyawan::where('nip', $id)->update($data);

    return redirect('karyawan')->with('success', 'Karyawan Berhasil Diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Karyawan::where('nip',$id)->first();

        File::delete(public_path('foto').'/'.$data->foto);
        
        Karyawan::where('nip',$id)->delete();
        return redirect('karyawan')->with('success', 'Karyawan Berhasi Di Hapus');
    }
}
