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
        
        @if (Auth::user()->jabatan != 'kepala_ruangan')
        {{-- row --}}
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Tahunan</span>
                <span class="info-box-number">{{ $jumlahPengajuan['tahunan'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Sakit</span>
                <span class="info-box-number">{{ $jumlahPengajuan['sakit'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Bersalin</span>
                <span class="info-box-number">{{ $jumlahPengajuan['bersalin'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Menunggu Persalinan</span>
                <span class="info-box-number">{{ $jumlahPengajuan['menunggu persalinan'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endif

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
                  @foreach ($dataApprovalFlows as $flow)
                    <tr>
                      <td>{{ $flow->cutiRequest->user->nama }}</td>
                      <td>{{ $flow->cutiRequest->jenis_cuti }}</td>
                      <td class="text-center">
                        {{-- {{$flow->cutiRequest->id}} --}}
                        <a href="{{ 
                          Auth::user()->jabatan == 'kepala_ruangan' ? route('kr-confirm', ['id' => $flow->cutiRequest->id]) : 
                          (Auth::user()->jabatan == 'kepala_unit' ? route('ku-confirm', ['id' => $flow->cutiRequest->id]) :
                          (Auth::user()->jabatan == 'kepala_SDM' ? route('ks-confirm', ['id' => $flow->cutiRequest->id]) :
                          (Auth::user()->jabatan == 'direktur' ? route('d-confirm', ['id' => $flow->cutiRequest->id]) : '#')))
                      }}" class="btn btn-primary btn-sm">Balas</a>
                      
                      </td>
                    </tr>
                  @endforeach
                  
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
                 
                  @foreach ($confirmedData as $data)
                  <tr>
                    <td>{{ $data->cutiRequest->user->nama}}</td>
                    <td>{{ $data->cutiRequest->updated_at }}</td>
                    <td class="text-center">
                      <a href="{{ 
                        Auth::user()->jabatan == 'kepala_ruangan' ? route('kr-confirmed', ['id' => $data->id]) : 
                        (Auth::user()->jabatan == 'kepala_unit' ? route('ku-confirmed', ['id' => $data->id]) :
                        (Auth::user()->jabatan == 'kepala_SDM' ? route('ks-confirmed', ['id' => $data->id]) :
                        (Auth::user()->jabatan == 'direktur' ? route('d-confirmed', ['id' => $data->id]) : '#')))
                    }}" class="btn btn-primary btn-sm">Lihat</a>
                    
                    </td>
                  </tr>
                  @endforeach
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