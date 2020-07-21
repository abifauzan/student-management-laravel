@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Edit Kelas
                  </h2>
              </div>
              <div class="body table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th width="130px">Maks. Ruangan</th>
                            <th width="130px">Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $i[0]->nama_kelas }}</td>
                            <td>{{ $i[0]->hari }}</td>
                            <td>{{ $i[0]->mulai }}</td>
                            <td>{{ $i[0]->selesai }}</td>
                            <td>{{ $i[0]->maks_siswa }} Orang</td>
                            <td>{{ $i[0]->maks_siswa - $i[0]->jadwal->count() }} Orang</td>
                        </tr>
                    </tbody>
                </table>

              </div>
          </div>
      </div>
  </div>

  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="body table-responsive">
          @if (count($i[0]->jadwal))
            <table class="table table-bordered table-striped table-hover js-basic-example-kelas dataTable">
                  <thead>
                      <tr>
                        <th width="80px">NIS</th>
                        <th width="200px">Nama</th>
                        <th width="50px">Kelas</th>
                        <th width="80px">Tahun Ajaran</th>
                        <th width="80px">Jenis Kelamin</th>
                        <th width="10px">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($i[0]->jadwal as $siswa)
                          <tr>
                              <td>{{ $siswa->siswa->username }}</td>
                              <td>{{ $siswa->siswa->nama_lengkap }}</td>
                              <td>{{ $siswa->siswa->kelas }} {{ Helper::kelas($siswa->siswa->kelas) }}</td>
                              <td>{{ $siswa->siswa->tahun_ajaran }} - {{ Helper::evenOrOdd($siswa->siswa->tahun_ajaran) }}</td>
                              <td>{{ $siswa->siswa->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
                              <td>
                                <form action="{{ route('admin.edit.kelas.submit',$siswa->id_siswa) }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="id_jadwal_bimbel" value="{{$siswa->id_jadwal_bimbel}}">
                                  <button type="submit" onclick="return confirm('Hapus Siswa ?');" class="btn btn-xs bg-orange waves-effect" title="Hapus Siswa">
                                      <i class="material-icons">delete</i>
                                  </button>
                                </form>

                              </td>
                          </tr>
                    @endforeach

                  </tbody>
              </table>

          @else
            <div class="alert bg-orange">
                Maaf, siswa tidak ditemukan
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
  $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
  });
  </script>
@endsection
