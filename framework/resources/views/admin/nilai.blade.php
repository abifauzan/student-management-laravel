@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header clearfix">
                  <h2 class="pull-left">
                      Nilai Siswa <small>Nilai siswa extra bimbel</small>
                  </h2>
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
                                  <th width="80px">NIS</th>
                                  <th width="130px">Nama</th>
                                  <th>Kelas</th>
                                  <th>Tahun Ajaran</th>
                                  <th width="100px">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>NIS</th>
                                  <th>Nama</th>
                                  <th>Kelas</th>
                                  <th>Tahun Ajaran</th>
                                  <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($siswas as $siswa)
                              <tr>
                                  <td>{{ $siswa->username }}</td>
                                  <td>{{ $siswa->nama_lengkap }}</td>
                                  <td>{{ $siswa->kelas }}  {{ Helper::kelas($siswa->kelas) }}</td>
                                  <td>{{ $siswa->tahun_ajaran }} - {{ Helper::evenOrOdd($siswa->tahun_ajaran) }}</td>
                                  <td>
                                    <a href="{{ route('admin.nilai.detail', $siswa->id_siswa) }}" class="btn btn-primary btn-sm waves-effect" title="Detail Siswa">
                                        <i class="material-icons">search</i>
                                        <span>DETAIL</span>
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
