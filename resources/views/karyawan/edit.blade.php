@extends('layouts.app')


@section('content')
@if($errors->any())
@foreach($errors->all() as $err)
<p class="alert alert-danger">{{ $err }}</p>
@endforeach
@endif
<form action="{{ url('karyawan/' . $data->nip) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Karyawan</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nip</label>
                            <input type="number" class="form-control" name="nip" value="{{$data->nip}}">
                        </div>

                    

                    
                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" value="{{$data->nama_karyawan}}" >
                        </div>

                    
                    
                        <div class="form-group">
                            <label>Gaji Karyawan</label>
                            <input type="number" class="form-control" name="gaji_karyawan" value="{{$data->gaji_karyawan}}">
                        </div>

                    
                    
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" value="{{$data->alamat}}"></textarea>
                        </div>

                    
                    
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="custom-search">
                                <option value="" selected disabled hidden>--PILIh Jenis Kelamin---</option>
                                <option value="Pria" {{$data->jenis_kelamin == 'Pria' ? 'selected': ''}}>Pria</option>
                                <option value="Wanita" {{$data->jenis_kelamin == 'Wanita' ? 'selected': ''}}>Wanita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="foto">Upload Foto Karyawan</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        @if($data->foto)
                        <div class="form-group">
                        <img style="max-width: 100px; max-height:100px" src="{{url('foto').'/'.$data->foto}}">
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
