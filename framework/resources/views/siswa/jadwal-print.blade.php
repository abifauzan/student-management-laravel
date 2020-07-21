<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jadwal Bimbel {{ $jadwal[0]->siswa()->first()->nama_lengkap }} | Database Siswa Extra Bimbel</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>
  <body>

    <div class="col-md-8 col-md-offset-2">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">

              <div class="body table-responsive">
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
                      @foreach ($jadwal as $get)
                      @php($no++)
                        <tr>
                            <th scope="row">{{$no}}</th>
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

    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        window.print();
      });
    </script>
  </body>
</html>
