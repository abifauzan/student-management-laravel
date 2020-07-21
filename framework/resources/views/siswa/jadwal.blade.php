@extends('layouts.app')

@section('title', 'Jadwal Bimbel')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="body table-responsive">
            @if ($getCount == 0)
              <div class="alert bg-orange">
                Maaf, jadwal anda belum dibuat
              </div>
            @else


              <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $jadwal[0]->siswa()->first()->username }}</th>
                        <td>{{ $jadwal[0]->siswa()->first()->nama_lengkap }}</td>
                        <td>{{ $jadwal[0]->siswa()->first()->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
                        <td>{{ $jadwal[0]->siswa()->first()->kelas }} {{ Helper::kelas($jadwal[0]->siswa()->first()->kelas) }}</td>
                        <td>{{ $jadwal[0]->siswa()->first()->tahun_ajaran}} - {{ Helper::evenOrOdd($jadwal[0]->siswa()->first()->tahun_ajaran) }} </td>
                    </tr>
                </tbody>
            </table>
            @endif
          </div>
      </div>
    </div>
  </div>

  @if ($getCount == 0)
    &nbsp;
  @else


    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
              <h2>Jadwal Bimbel Hari Ini</h2>
              <small>{{ Helper::tanggalIndo(date("Y-m-d"), true) }}</small>
            </div>
            <div class="body table-responsive">
              @if ($getJadwalToday == 0)
                <div class="alert bg-orange">
                  Anda tidak mempunyai jadwal belajar hari ini <br>
                </div>
              @else
                <table class="table table-striped table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th width="10px">No</th>
                            <th width="100px">Hari</th>
                            <th width="100px">Mulai</th>
                            <th width="100px">Selesai</th>
                            <th width="150px">Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php($no=0)
                      @foreach ($jadwal as $key)

                        @if ($key->kelasBimbel->hari == date('l'))
                          @php($no++)
                            <tr>
                                <th scope="row">{{$no}}</th>
                                <td>{{ Helper::translateHari($key->kelasBimbel->hari) }}</td>
                                <td>{{ $key->kelasBimbel->mulai }}</td>
                                <td>{{ $key->kelasBimbel->selesai }}</td>
                                <td>{{ $key->kelasBimbel->nama_kelas }}</td>
                            </tr>
                        @endif
                      @endforeach

                    </tbody>
                </table>
              @endif
            </div>
        </div>
      </div>

    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header clearfix">
                    <h2 class="pull-left">Jadwal Bimbel </h2>
                    <a href="{{ route('siswa.jadwal.print') }}" target="_blank" class="btn btn-default waves-effect pull-right">
                        <i class="material-icons">print</i>
                        <span>PRINT...</span>
                    </a>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped table-hover js-basic-example-jadwal dataTable">
                        <thead class="bg-blue">
                            <tr>
                                <th width="100px">Hari</th>
                                <th width="100px">Mulai</th>
                                <th width="100px">Selesai</th>
                                <th width="150px">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($jadwal as $get)
                            <tr>
                                <td>{{ Helper::translateHari($get->kelasBimbel->hari) }}</td>
                                <td>{{ $get->kelasBimbel->mulai }}</td>
                                <td>{{ $get->kelasBimbel->selesai }}</td>
                                <td>{{ $get->kelasBimbel->nama_kelas }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  @endif
@endsection
