@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header clearfix">
                  <h2 class="pull-left">
                      Edit Kelas
                  </h2>
                  <form action="{{route('admin.kelas.delete',$id)}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="nama_kelas" value="{{ $i->nama_kelas }}">
                    <button type="submit" onclick="return confirm('Hapus kelas ?')" class="btn bg-red pull-right waves-effect">DELETE</button>
                  </form>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.kelas.detail.submit', $i->id_kelas_bimbel) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nama_kelas">Nama Kelas</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" value="{{ $i->nama_kelas }}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="hari">Hari</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                  <select class="form-control" name="hari" required>
                                    <option selected disabled> -- Pilih hari --</option>
                                    <option {{ $i->hari == "Monday" ? 'selected' : '' }} value="Monday"> Senin </option>
                                    <option {{ $i->hari == "Tuesday" ? 'selected' : '' }} value="Tuesday"> Selasa </option>
                                    <option {{ $i->hari == "Wednesday" ? 'selected' : '' }} value="Wednesday"> Rabu </option>
                                    <option {{ $i->hari == "Thursday" ? 'selected' : '' }} value="Thursday"> Kamis </option>
                                    <option {{ $i->hari == "Friday" ? 'selected' : '' }} value="Friday"> Jum'at </option>
                                    <option {{ $i->hari == "Saturday" ? 'selected' : '' }} value="Saturday"> Sabtu </option>
                                    <option {{ $i->hari == "Sunday" ? 'selected' : '' }} value="Sunday"> Minggu </option>
                                  </select>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="mulai">Mulai</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="mulai" name="mulai" class="form-control" value="{{ $i->mulai }}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="mulai">Selesai</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="selesai" name="selesai" class="form-control" value="{{ $i->selesai }}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="maks_ruang">Maksimal Ruangan</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" id="maks_ruang" name="maks_ruang" class="form-control" value="{{ $i->maks_siswa }}">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                              <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
