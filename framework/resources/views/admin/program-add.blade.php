@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Tambah Program Baru
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.program.add.submit') }}">
                    {{ csrf_field() }}

                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nama_kelas">Nama Program</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Isi nama program" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="tingkatan_kelas">Tingkatan Kelas</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                    <select class="form-control" name="tingkatan_kelas" required>
                                      <option selected disabled> -- Pilih Kelas --</option>
                                    @for ($i=1; $i < 13 ; $i++)
                                      <option value="{{$i}}">{{$i}} {{Helper::kelas($i)}}</option>
                                    @endfor
                                    </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="biaya">Biaya</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <div class="form-line">
                                    <input type="number" name="biaya" class="form-control" placeholder="Isi biaya program" required>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="harga_angsuran">Harga Angsuran Per bulan</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <div class="form-line">
                                    <input type="number" name="harga_angsuran" class="form-control" placeholder="Isi harga angsuran per bulan program" required>
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
