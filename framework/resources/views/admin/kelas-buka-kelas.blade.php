@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Buka Kelas
                  </h2>
              </div>
              <div class="body table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th>Kelas</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th width="130px">Maks. Ruangan</th>
                            <th width="130px">Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $i[0]->nama_kelas }}</td>
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
          @if (count($siswas))
            <form action="{{ route('admin.buka.kelas.submit', $id) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id_kelas_bimbel" value="{{ $i[0]->id_kelas_bimbel }}">
              <input type="hidden" name="nama_kelas" value="{{ $i[0]->nama_kelas }}">
              <button type="submit" class="btn btn-success waves-effect m-b-30">SUBMIT</button>
              <table class="table table-bordered table-striped table-hover js-basic-example-kelas dataTable">
                  <thead>
                      <tr>
                        <th width="5px">
                          <input type="checkbox" class="filled-in btn-block" id="selectAll">
                          <label for="selectAll"></label>
                        </th>
                        <th width="80px">NIS</th>
                        <th width="200px">Nama</th>
                        <th width="50px">Kelas</th>
                        <th width="80px">Tahun Ajaran</th>
                        <th width="80px">Jenis Kelamin</th>
                      </tr>
                  </thead>
                  <tbody>


                    @php($number=0)
                    @foreach ($siswas as $siswa)
                          <tr>
                              <td>
                                <input type="checkbox" class="filled-in btn-block" name="id_siswa[]" value="{{$siswa->id_siswa}}" id="{{$number}}">
                                <label for="{{$number}}"></label>
                              </td>
                              <td>{{ $siswa->username }}</td>
                              <td>{{ $siswa->nama_lengkap }}</td>
                              <td>{{ $siswa->kelas }} {{ Helper::kelas($siswa->kelas) }}</td>
                              <td>{{ $siswa->tahun_ajaran }} - {{ Helper::evenOrOdd($siswa->tahun_ajaran) }}</td>
                              <td>{{ $siswa->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
                          </tr>
                      @php($number++)
                    @endforeach

                  </tbody>
              </table>
              <button type="submit" class="btn btn-success waves-effect">SUBMIT</button>

            </form>

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
