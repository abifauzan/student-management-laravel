@extends('layouts.app')

@section('content')
  <!-- Basic Examples -->
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header clearfix">
                  <h2 class="pull-left">
                      Siswa Extra Bimbel
                  </h2>
                  <a href="{{ route('admin.siswa.add') }}" class="btn btn-primary waves-effect pull-right">
                      <i class="material-icons">person</i>
                      <span>Tambah Siswa</span>
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
                                  <th width="80px">NIS</th>
                                  <th width="130px">Nama</th>
                                  <th>Program Kelas</th>
                                  <th>Kelas</th>
                                  <th>Tahun Ajaran</th>
                                  <th width="50px">Jenis Kelamin</th>
                                  <th width="100px">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>NIS</th>
                                  <th>Nama</th>
                                  <th>Program Kelas</th>
                                  <th>Kelas</th>
                                  <th>Tahun Ajaran</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($siswas as $siswa)
                              <tr>
                                  <td>{{ $siswa->username }}</td>
                                  <td>{{ $siswa->nama_lengkap }}</td>
                                  <td>{{ $siswa->kelas()->first()->nama_kelas }}</td>
                                  <td>{{ $siswa->kelas }}  {{ Helper::kelas($siswa->kelas) }}</td>
                                  <td>{{ $siswa->tahun_ajaran }} - {{ Helper::evenOrOdd($siswa->tahun_ajaran) }}</td>
                                  <td>{{ $siswa->gender == 'L' ? 'L' : 'P' }}</td>
                                  <td>
                                    <a href="{{ route('admin.siswa.detail', $siswa->id_siswa) }}" class="btn btn-xs bg-blue waves-effect pull-left m-r-5" title="Detail Siswa">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <form action="{{ route('admin.siswa.delete', $siswa->id_siswa) }}" method="POST" class="padding-0 margin-0 pull-left">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="_method" value="delete">
                                      <button type="submit" onclick="return confirm('Hapus Siswa ?')" class="btn btn-xs bg-orange waves-effect" data-toggle="tooltip" data-placement="top" title="Hapus Siswa">
                                          <i class="material-icons">delete</i>
                                      </button>
                                    </form>

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
  <!-- #END# Basic Examples -->

@endsection
