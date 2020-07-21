@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Tambah Kelas Baru
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.kelas.add.submit') }}">
                    {{ csrf_field() }}

                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nama_kelas">Nama Kelas</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Isi nama kelas" required>
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
                                <input type="checkbox" name="hari[]" value="Monday" class="filled-in btn-block" id="senin">
                                <label for="senin" style="font-size: 13px !important;">Senin</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Tuesday" class="filled-in btn-block" id="selasa">
                                <label for="selasa" style="font-size: 13px !important;">Selasa</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Wednesday" class="filled-in btn-block" id="rabu">
                                <label for="rabu" style="font-size: 13px !important;">Rabu</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Thursday" class="filled-in btn-block" id="kamis">
                                <label for="kamis" style="font-size: 13px !important;">Kamis</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Friday" class="filled-in btn-block" id="jumat">
                                <label for="jumat" style="font-size: 13px !important;">Jum'at</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Saturday" class="filled-in btn-block" id="sabtu">
                                <label for="sabtu" style="font-size: 13px !important;">Sabtu</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="hari[]" value="Sunday" class="filled-in btn-block" id="minggu">
                                <label for="minggu" style="font-size: 13px !important;">Minggu</label>
                              </div>
                            </div>
                          </div>
                      </div>
                      {{-- <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="hari">Hari</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                  <select class="form-control" name="hari" required>
                                    <option selected disabled> -- Pilih hari --</option>
                                    <option value="Monday"> Senin </option>
                                    <option value="Tuesday"> Selasa </option>
                                    <option value="Wednesday"> Rabu </option>
                                    <option value="Thursday"> Kamis </option>
                                    <option value="Friday"> Jum'at </option>
                                    <option value="Saturday"> Sabtu </option>
                                  </select>
                                </div>
                            </div>
                          </div>
                      </div> --}}
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="mulai">Mulai</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="mulai" name="mulai" class="form-control" placeholder="Isi jam mulai kelas" required>
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
                                      <input type="text" id="selesai" name="selesai" class="form-control" placeholder="Isi jam selesai kelas" required>
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
                                      <input type="number" id="maks_ruang" name="maks_ruang" class="form-control" placeholder="Isi maksimal ruangan" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                              <button type="submit" class="btn btn-primary m-t-15 waves-effect">KIRIM</button>
                              <button type="reset" class="btn btn-warning m-t-15 waves-effect">RESET</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
