@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Buka Keuangan Lunas<small>Buka keuangan untuk siswa : {{$i->nama_lengkap}}</small>
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.keuangan.lunas.add.submit', $id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_siswa" value="{{$i->id_siswa}}">
                    <input type="hidden" name="status_bayar" value="1">
                    <input type="hidden" name="is_lunas" value="1">
                    <input type="hidden" name="id_kelas" value="{{$i->kelas()->first()->id_kelas}}">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="tanggan_bayar">Tanggal Pembayaran</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="tanggal_bayar" class="datepicker form-control" placeholder="Please choose a date..." data-dtp="dtp_CBGuw" required>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="total_biaya">Total Biaya</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <div class="form-line">
                                    <input type="number" name="total_biaya" class="form-control" value="{{$i->kelas()->first()->biaya}}">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="biaya_pendaftaran">Biaya Pendaftaran</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <div class="form-line">
                                    <input type="number" name="biaya_pendaftaran" class="form-control" value="200000">
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
