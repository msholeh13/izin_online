@extends('leader.layout.app')

@section('content')

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
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" value="Erik T" disabled>
                                    </div>
                                    <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" value="19701111.2.20.20" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="3" disabled>indonesia</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" value="staff IT" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <input type="text" class="form-control" id="unit" value="non medis" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_cuti">Jenis Cuti</label>
                                        <input type="text" class="form-control" id="jenis_cuti" value="izin sakit" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan (Opsional)</label>
                                        <textarea class="form-control" rows="3" disabled>sakit perut</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_awal" class="">Tanggal Awal</label>
                                        <div class="">
                                            <input type="date" name="tanggal_awal" id="tanggal_awal" autocomplete="" class="form-control" value="2024-12-12" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_akhir" class="">Tanggal Awal</label>
                                        <div class="">
                                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" autocomplete="" class="form-control" value="2025-01-01" disabled>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
                    <!-- /.card -->
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Keterangan</h3>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <div class="d-flex" style="gap: 2em">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                                <label for="customRadio1" class="custom-control-label">Approved</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                                                <label for="customRadio2" class="custom-control-label">Not Approved</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alasan</label>
                                        <textarea class="form-control" rows="3" placeholder="Berikan balasan"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-center" style="gap: 2em">
                                <a href="{{route('dashboard')}}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    
@endsection