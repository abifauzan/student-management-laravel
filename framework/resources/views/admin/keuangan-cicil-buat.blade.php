@extends('layouts.app')

@section('content')
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
              <h2>Detail keuangan siswa <small>Detail keuangan siswa : {{$i[0]->siswa()->first()->nama_lengkap}}</small></h2>

            </div>
            <div class="body table-responsive">
              <table class="table table-bordered table-condensed table-hover">
                  <thead>
                      <tr>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Program Kelas</th>
                          <th>Total Biaya</th>
                          <th>Sisa Pembayaran</th>
                          <th width="50px">Maksimal Angsuran</th>
                          <th width="50px">Sisa Angsuran</th>
                          <th width="70px">Cicilan Terakhir</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th>{{ $i[0]->siswa()->first()->username }}</th>
                          <td>{{ $i[0]->siswa()->first()->nama_lengkap }}</td>
                          <td>{{ $i[0]->kelas()->first()->nama_kelas }}</td>
                        @php
                          $total_pembayaran = intval($i[0]->kelas()->first()->biaya) + intval($i[0]->tambahan_biaya)
                        @endphp
                          <td>Rp. {{ Helper::setPrice($total_pembayaran) }}</td>
                          <td> {{ Helper::setPrice($sisa_pembayaran) }}</td>
                          <td> {{ $i[0]->cicilan_max }} kali </td>
                          <td> {{ $sisa_angsuran }} kali </td>
                          <td> Cicilan ke - {{ substr($get_sisa_angsuran->cicilan_ke, -2) }}</td>
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
              <div class="header">
                  <h2>
                      Buat Cicilan Baru
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.keuangan.cicil.buat.submit', $id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_siswa" value="{{$i[0]->id_siswa}}">
                    <input type="hidden" name="status_bayar" value="0">
                    <input type="hidden" name="is_lunas" value="0">
                    <input type="hidden" name="id_kelas" value="{{$i[0]->kelas()->first()->id_kelas}}">
                    <input type="hidden" name="cicilan_max" value="{{$i[0]->cicilan_max}}">
                    <input type="hidden" name="total_biaya" value="{{$i[0]->total_biaya}}">
                    <input type="hidden" name="tambahan_biaya" value="{{$i[0]->tambahan_biaya}}">

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
                            <label for="total_biaya">Cicilan ke</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="cicilan_ke" class="form-control" value="{{substr($get_sisa_angsuran->cicilan_ke, -2)+1}}">
                              </div>
                          </div>
                        </div>
                    </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="jumlah_dibayar">Jumlah Dibayar</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <div class="form-line">
                                @php
                                  $value = 0;
                                  if ($i[0]->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2) > 1) {
                                    $value = $i[0]->kelas()->first()->harga_angsuran;
                                  } elseif($i[0]->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2) == 1) {
                                    $value = $sisa_pembayaran;
                                  }
                                @endphp
                                    <input type="number" name="jumlah_dibayar" class="form-control" max="{{$sisa_pembayaran}}" value="{{$value}}">
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="ket">Keterangan</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                  <textarea rows="4" name="ket" class="form-control no-resize" placeholder="Isi keterangan..."></textarea>
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
