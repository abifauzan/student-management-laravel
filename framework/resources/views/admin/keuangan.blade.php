@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header clearfix">
                  <h2 class="pull-left">
                      Daftar Keuangan Siswa <small>Daftar keuangan siswa extra bimbel</small>
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
                    @if (Session::has('messageError'))
                      <div class="alert bg-orange alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          {{Session::get('messageError')}}
                      </div>
                    @endif

                      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                          <thead>
                              <tr>
                                  <th width="80px">NIS</th>
                                  <th width="130px">Nama</th>
                                  <th width="50px">Kelas</th>
                                  <th width="80px">Tahun Ajaran</th>
                                  <th>Status Pembayaran</th>
                                  <th width="100px">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>NIS</th>
                                  <th>Nama</th>
                                  <th>Kelas</th>
                                  <th>Tahun Ajaran</th>
                                  <th>Status Pembayaran</th>
                                  <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($i as $siswa)
                              <tr>
                                  <td>{{ $siswa->username }}</td>
                                  <td>{{ $siswa->nama_lengkap }}</td>
                                  <td>{{ $siswa->kelas }}  {{ Helper::kelas($siswa->kelas) }}</td>
                                  <td>{{ $siswa->tahun_ajaran }} - {{ Helper::evenOrOdd($siswa->tahun_ajaran) }}</td>
                                  <td>
                                    @if ($siswa->isLunas == '1')
                                      <span class="col-green">Lunas</span>
                                    @else
                                      <span class="col-orange">Belum Lunas</span>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="{{ route('admin.keuangan.detail', $siswa->id_siswa) }}" class="btn btn-primary btn-xs waves-effect pull-left m-r-10 {{$siswa->keuanganSiswa->count() == 0 ? 'disabled' : ''}}" title="Detail Siswa">
                                        <i class="material-icons">search</i>
                                    </a>
                                    <a href="{{ route('admin.keuangan.lunas.add', $siswa->id_siswa) }}" class="btn bg-teal btn-xs waves-effect pull-left m-r-10 {{$siswa->isLunas == 1 ? 'disabled' : ''}}" title="Buka Keuangan Lunas">
                                        <i class="material-icons">done</i>
                                    </a>
                                    <a href="{{ route('admin.keuangan.cicil.add', $siswa->id_siswa) }}" class="btn bg-blue-grey btn-xs waves-effect pull-left {{$siswa->isLunas == 1 ? 'disabled' : ''}}" title="Buka Keuangan Cicilan">
                                        <i class="material-icons">attach_money</i>
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
