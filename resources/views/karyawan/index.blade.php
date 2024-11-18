@extends('layouts/app')
@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Sisfo Pegawai</h6>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ route('karyawan.create') }}">Tambah Data</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto Karyawan</th>
                                                <th>Nip</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Gaji Karyawan</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($karyawan as $karyawan)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        @if ($karyawan->foto)
                                                        <img style="max-width: 100px; max-height:100px" src="{{url('foto').'/'.$karyawan->foto}}">
                                                        @endif
                                                    </td>
                                                    <td>{{ $karyawan->nip }}</td>
                                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                                    <td>{{ $karyawan->gaji_karyawan }}</td>
                                                    <td>{{ $karyawan->alamat }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ url('karyawan/' . $karyawan->nip . '/edit') }}">Edit</a>
                                                        <form
                                                            action="{{ url('karyawan/' . $karyawan->nip) }}"
                                                            method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm ('apakah anda ingin menghapus data?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
            @endsection
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->
