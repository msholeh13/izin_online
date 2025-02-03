@extends('leader.layout.app')

@section('title', 'Halaman Konfirmasi')

@section('content')

{{-- @dd($user) --}}

    <div class="content-wrapper">
        <div class="content-header"></div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Biodata Karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->cutiRequest->user->nama }}" disabled>
                                </div>
                                <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="{{ $user->cutiRequest->user->nip }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" disabled>{{ $user->cutiRequest->user->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" value="{{ $user->cutiRequest->user->jabatan }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" id="unit" value="{{ $user->cutiRequest->user->unit }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_cuti">Jenis Cuti</label>
                                    <input type="text" class="form-control" id="jenis_cuti" value="{{ $user->cutiRequest->jenis_cuti }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan (Opsional)</label>
                                    <textarea class="form-control" rows="3" disabled>{{ $user->cutiRequest->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_awal" class="">Tanggal Awal</label>
                                    <div class="">
                                        <input type="date" name="tanggal_awal" id="tanggal_awal" autocomplete="" class="form-control" value="{{ $user->cutiRequest->tanggal_mulai }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_akhir" class="">Tanggal Awal</label>
                                    <div class="">
                                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" autocomplete="" class="form-control" value="{{ $user->cutiRequest->tanggal_selesai }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Keterangan</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="d-flex" style="gap: 2em">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="approved" {{old('status', 'approved') == 'approved' ? 'checked' : ''}} disabled>
                                                <label for="customRadio1" class="custom-control-label">Approved</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="not_approved" {{old('status') == 'not_approved' ? 'checked' : ''}} disabled>
                                                <label for="customRadio2" class="custom-control-label">Not Approved</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alasan</label>
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" rows="3" placeholder="Berikan balasan jika pengajuan di tolak"  disabled></textarea>
                                        @error('catatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-center" style="gap: 2em">
                                        <a href="{{ Auth::user()->jabatan == 'kepala_ruangan' ? route('kr-dashboard') : route('dashboard')}}" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-primary"  disabled>Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    
@endsection