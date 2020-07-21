@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Detail Request pembayaran <small>Request pembayaran cicilan Extra Bimbel</small>
                </h2>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th width="150px">Nama</th>
                    <td>{{$a->siswa->nama_lengkap}}</td>
                  </tr>
                  <tr>
                    <th width="150px">Kelas</th>
                    <td>{{$a->siswa->kelas}} {{Helper::kelas($a->siswa->kelas)}}</td>
                  </tr>
                  <tr>
                    <th width="150px">Request Cicilan</th>
                    <td>Ke {{$a->cicilan_ke}}</td>
                  </tr>
                  <tr>
                    <th width="150px">Tanggal Bayar</th>
                    <td>{{Helper::tanggalIndo($a->tanggal_bayar)}}</td>
                  </tr>
                  <tr>
                    <th width="150px">Jumlah Dibayar</th>
                    <td>Rp. {{Helper::setPrice($a->jumlah_dibayar)}}</td>
                  </tr>
                  <tr>
                    <th width="150px">Bukti Pembayaran</th>
                    <td>
                      @if ($a->foto_bukti_bayar == null)
                        -
                      @else
                        <img src="{{asset('images/bukti_bayar/'.$a->foto_bukti_bayar)}}" class="img-responsive" width="300px" alt="Bukti Pembayaran">
                      @endif
                    </td>
                  </tr>
                </table>
                <form class="" action="{{ route('admin.request.detail.update', $a->id_bukti_pembayaran) }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <button type="submit" class="btn bg-cyan waves-effect" title="Update Data">
                      <span>APPROVE</span>
                      <i class="material-icons">check</i>
                  </button>
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>

@endsection
