@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Request pembayaran masuk <small>Request pembayaran cicilan Extra Bimbel</small>
                </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                @if (count($c)  == 0)
                  <div class="alert bg-orange">
                      Maaf, tidak ada request pembayaran baru
                  </div>
                @else
                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <thead>
                          <tr>
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
                              <th>Request Cicilan</th>
                              <th>Tanggal Bayar</th>
                              <th>Jumlah Dibayar</th>
                              <th>Bukti Pembayaran</th>
                              <th width="60px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($c as $d)
                          <tr>
                              <td>{{$d->siswa->nama_lengkap}}</td>
                              <td>{{$d->siswa->kelas}}  {{Helper::kelas($d->siswa->kelas)}}</td>
                              <td>Cicilan ke &nbsp; {{$d->cicilan_ke}}</td>
                              <td>{{Helper::tanggalIndo($d->tanggal_bayar, true)}}</td>
                              <td>Rp. {{Helper::setPrice($d->jumlah_dibayar)}}</td>
                              <td>
                                @if ($d->foto_bukti_bayar == null)
                                  -
                                @else
                                  <img src="{{asset('images/bukti_bayar/'.$d->foto_bukti_bayar)}}" class="img-responsive" width="150px" alt="Bukti Pembayaran">
                                @endif
                              </td>
                              <td class="clearfix">
                                <a href="{{ route('admin.request.detail', $d->id_bukti_pembayaran) }}" class="btn btn-xs pull-left m-r-10 bg-teal waves-effect" action="{{ route('admin.request.detail', $d->id_bukti_pembayaran) }}">
                                  <i class="material-icons">check</i>
                                </a>

                                <form class="pull-left margin-0 padding-0" action="{{ route('admin.request.delete', $d->id_bukti_pembayaran) }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" onclick="return confirm('Hapus Data ?');" class="btn btn-xs bg-orange waves-effect" title="Hapus Data">
                                      <i class="material-icons">delete</i>
                                  </button>
                                </form>

                              </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>
                @endif
              </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Request Pembayaran Cicilan <small>Request pembayaran cicilan Extra Bimbel</small>
                </h2>
            </div>
            <div class="body">
              @if (count($i)  == 0)
                <div class="alert bg-orange">
                    Maaf, belum ada request yang di setujui
                </div>
              @else
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
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
                              <th>Request Cicilan</th>
                              <th>Tanggal Bayar</th>
                              <th>Jumlah Dibayar</th>
                              <th>Bukti Pembayaran</th>
                              <th>Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($i as $a)
                          <tr>
                              <td>{{$a->siswa->nama_lengkap}}</td>
                              <td>{{$a->siswa->kelas}}  {{Helper::kelas($a->siswa->kelas)}}</td>
                              <td>Cicilan ke &nbsp; {{$a->cicilan_ke}}</td>
                              <td>{{Helper::tanggalIndo($a->tanggal_bayar, true)}}</td>
                              <td>Rp. {{Helper::setPrice($a->jumlah_dibayar)}}</td>
                              <td>
                                @if ($a->foto_bukti_bayar == null)
                                  -
                                @else
                                  <img src="{{asset('images/bukti_bayar/'.$a->foto_bukti_bayar)}}" class="img-responsive" width="150px" alt="Bukti Pembayaran">
                                @endif
                              </td>
                              <td>
                                <form class="pull-left margin-0 padding-0" action="{{ route('admin.request.delete', $a->id_bukti_pembayaran) }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" onclick="return confirm('Hapus Data ?');" class="btn btn-xs bg-orange waves-effect" title="Hapus Program">
                                      <i class="material-icons">delete</i>
                                  </button>
                                </form>

                              </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>

              </div>
              @endif
            </div>
        </div>
    </div>
  </div>
@endsection
