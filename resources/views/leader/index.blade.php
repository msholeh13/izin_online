@extends('leader.layout.app')

@section('title', 'Dashboard')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header"></div>

    <section class="content">
      <div class="container-fluid">

        {{-- biodata --}}
        <div class="card">
          <div class="d-flex align-items-center gap-5">
            <div class="m-2">
              <img class="img-rounded" src="{{asset('assets/lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
            </div>
            <div class="m-2">
              <h3 class="">{{ Auth::user()->nama }}</h3>
              <h5 class="">{{ Auth::user()->nip ??  'null' }}</h5>
            </div>
          </div>
        </div>
        {{-- end biodata --}}
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>Cuti Tahunan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>Cuti Sakit</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Cuti Bersalin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Cuti Menunggu Persalinan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Surat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover data-table">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Keterangan Cuti</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Andreas</td>
                    <td>Cuti Sakit
                    </td>
                    <td class="text-center">
                      <a href="{{route('confirm')}}" class="btn btn-primary btn-sm">Balas</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Rara</td>
                    <td>Cuti Bersalin
                    </td>
                    <td class="text-center">
                      <a href="{{route('confirm')}}" class="btn btn-primary btn-sm">Balas</a>
                    </td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title fw-bold">Surat Keluar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-table">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal Balasan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Budi</td>
                    <td>02-01-2025
                    </td>
                    <td class="text-center">
                      <a href="{{route('confirm')}}" class="btn btn-primary btn-sm">Lihat</a>
                      <a href="#" class="btn btn-info btn-sm">Unduh</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Agus</td>
                    <td>12-12-2024
                    </td>
                    <td class="text-center">
                      <a href="{{route('confirm')}}" class="btn btn-primary btn-sm">Lihat</a>
                      <a href="#" class="btn btn-info btn-sm">Unduh</a>
                    </td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection