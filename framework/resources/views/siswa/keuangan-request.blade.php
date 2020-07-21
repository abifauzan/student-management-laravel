@extends('layouts.app')

@section('title', 'Request Keuangan')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Konfirmasi Pembayaran Baru
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('siswa.get.request.submit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                  @if(Session::has('message'))
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('message') }}
                    </div>
                  @endif

                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="cicilan_ke">Cicilan ke</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="cicilan_ke" name="cicilan_ke" class="form-control" placeholder="Isi hanya angka" required>
                                  </div>
                              </div>
                          </div>
                      </div>
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
                              <label for="jumlah_dibayar">Jumlah Pembayaran</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="jumlah_dibayar" name="jumlah_dibayar" class="form-control" placeholder="Isi hanya angka" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="bukti_bayar">Bukti Pembayaran</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="file" id="bukti_bayar" name="bukti_bayar" class="form-control" >

                                  </div>
                                  <span class="col-orange">*Kosongkan bila tidak ada</span>
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
