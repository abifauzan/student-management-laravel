@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header clearfix">
                <h2 class="pull-left">
                    Daftar Kelas <small>Daftar Kelas Extra Bimbel</small>
                </h2>
                <a href="{{ route('admin.kelas.add') }}" class="btn btn-primary waves-effect pull-right">
                    <i class="material-icons">assignment_ind</i>
                    <span>Tambah Kelas</span>
                </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                @if (Session::has('message'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{Session::get('message')}}
                  </div>
                @endif

                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <thead>
                          <tr>
                              <th>Kelas</th>
                              <th>Hari</th>
                              <th>Mulai</th>
                              <th>Selesai</th>
                              <th>Banyak Siswa</th>
                              <th>Maks. Ruangan</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Banyak Siswa</th>
                            <th>Maks. Ruangan</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($i as $kelas)
                          <tr>
                              <td>{{$kelas->nama_kelas}}</td>
                              <td>{{Helper::translateHari($kelas->hari)}}</td>
                              <td>{{$kelas->mulai}}</td>
                              <td>{{$kelas->selesai}}</td>
                              <td>{{$kelas->jadwal->count()}} Orang</td>
                              <td>{{$kelas->maks_siswa}} Orang</td>
                              <td>
                                <a href="{{ route('admin.kelas.detail', $kelas->id_kelas_bimbel) }}" class="btn btn-xs bg-blue waves-effect pull-left m-r-5" title="Detail Kelas">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="{{ route('admin.buka.kelas', $kelas->id_kelas_bimbel) }}" class="btn btn-xs bg-green waves-effect pull-left m-r-5 {{$kelas->maks_siswa - $kelas->jadwal->count() == 0 ? 'disabled' : ''}}" title="Buka Kelas">
                                    <i class="material-icons">input</i>
                                </a>
                                <a href="{{ route('admin.edit.kelas', $kelas->id_kelas_bimbel) }}" class="btn btn-xs bg-orange waves-effect pull-left m-r-5" title="Update Kelas">
                                    <i class="material-icons">assignment_return</i>
                                </a>
                              </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>

              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
