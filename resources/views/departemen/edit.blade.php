@extends('layouts.app')
@section('content')
    <form action="{{ url('departemen/' . $data->kodedepartemen) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit departemen</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Departemen</label>
                            <input type="text" class="form-control" name="nama_departemen"
                                value="{{ $data->nama_departemen }}">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
