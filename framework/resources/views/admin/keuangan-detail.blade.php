@extends('layouts.app')

@section('content')
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header clearfix">
              <h2 class="pull-left">Detail keuangan siswa <small>Detail keuangan siswa : {{$i[0]->siswa()->first()->nama_lengkap}}</small></h2>
              @if ($i[0]->status_bayar == 0 && $i[0]->is_lunas == 0)
                <a href="{{ route('admin.keuangan.cicil.buat',$i[0]->id_siswa) }}" class="btn btn-primary waves-effect pull-right">
                    <i class="material-icons">attach_money</i>
                    <span>Buka Cicilan</span>
                </a>
              @endif

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
                          <th>Metode Pembayaran</th>
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
                          <td>
                          @if ($i[0]->is_lunas == 1)
                            Rp. 0
                          @else
                            Rp. {{ Helper::setPrice($sisa_pembayaran) }}
                          @endif
                          </td>
                          <td>
                          @if($i[0]->status_bayar == 1)
                            <span class="badge bg-green">Cash</span>
                          @else
                            <span class="badge bg-amber">Cicilan</span>
                          @endif

                          </td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tab-nav-right" role="tablist">
                      <li role="presentation" class="active"><a href="#data_keuangan" data-toggle="tab" aria-expanded="true">Data keuangan</a></li>
                    @if($i[0]->status_bayar === 0)
                      <li role="presentation" class=""><a href="#data_cicilan" data-toggle="tab" aria-expanded="false">Data Cicilan</a></li>
                    @endif

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                      <!-- Data Keuangan -->
                      <div role="tabpanel" class="tab-pane fade active in table-responsive" id="data_keuangan">
                          <table class="table">
                            <tr>
                              <th width="150px">Nama Siswa</th>
                              <td>{{ $i[0]->siswa()->first()->nama_lengkap }}</td>
                            </tr>
                            <tr>
                              <th width="150px">Program Kelas</th>
                              <td>{{ $i[0]->kelas()->first()->nama_kelas }}</td>
                            </tr>
                            <tr>
                              <th width="150px">Biaya Pendaftaran</th>
                              <td>Rp. {{ $i[0]->tambahan_biaya == 0 ? '-' : Helper::setPrice($i[0]->tambahan_biaya) }}</td>
                            </tr>
                            <tr>
                              <th width="150px">Biaya Kelas</th>
                              <td>Rp. {{ Helper::setPrice($i[0]->kelas()->first()->biaya) }}</td>
                            </tr>
                            <tr>
                              <th width="150px">Total Biaya</th>
                              <td>Rp. {{ Helper::setPrice($total_pembayaran) }}</td>
                            </tr>
                          @if($i[0]->status_bayar === 1)
                            <tr>
                              <th width="150px">Tanggal Cash</th>
                              <td>{{ Helper::tanggalIndo($i[0]->tanggal_bayar) }}</td>
                            </tr>
                            <tr>
                              <th width="150px">Status Pembayaran</th>
                              <td><span class="badge bg-green">Lunas</span></td>
                            </tr>
                          @else
                            <tr>
                              <th width="150px">Harga Angsuran</th>
                              <td>Rp. {{ Helper::setPrice($i[0]->kelas()->first()->harga_angsuran) }} </td>
                            </tr>
                            <tr>
                              <th width="150px">Diangsur selama</th>
                              <td>{{ $i[0]->cicilan_max }} Kali </td>
                            </tr>
                            <tr>
                              <th width="150px">Sisa angsuran</th>
                              <td>{{ $sisa_angsuran }} Kali </td>
                            </tr>
                            <tr>
                              <th width="150px">Sisa Pembayaran</th>
                              <td>Rp. {{ Helper::setPrice($sisa_pembayaran) }} </td>
                            </tr>
                            <tr>
                              <th width="150px">Status Pembayaran</th>
                              <td>
                              @if($get_sisa_angsuran->is_lunas == 1)
                                <span class="badge bg-green">Lunas</span>
                              @else
                                <span class="badge bg-red">Belum Lunas</span>
                              @endif
                              </td>
                            </tr>
                          @endif

                          </table>
                      </div>

                    @if ($i[0]->status_bayar == 0)
                      <!-- Data Cicilan -->
                      <div role="tabpanel" class="tab-pane fade in table-responsive" id="data_cicilan">
                        @if ($i[0]->is_lunas == 0)
                          <a href="{{ route('admin.keuangan.cicil.buat',$i[0]->id_siswa) }}" class="btn btn-primary waves-effect pull-right m-b-10">
                              <i class="material-icons">attach_money</i>
                              <span>Buka Cicilan</span>
                          </a>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th width="5px">No</th>
                              <th width="20px">Angsuran</th>
                              <th width="180px">Tanggal saat bayar</th>
                              <th width="200px">Jumlah yang dibayar</th>
                              <th width="50px">Penerima</th>
                              <th>Keterangan</th>
                              <th width="50px">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @php($no=0)


                          @foreach ($i as $cicil)
                            @php($no++)
                            <tr>
                              <td scope="row">{{$no}}</td>
                              <td>
                                <button type="button" class="btn btn-block btn-lg btn-primary waves-effect" disabled>
                                  Ke &nbsp;{{ $cicil->cicilan_ke }}
                                </button>
                              </td>
                              <td> {{ Helper::tanggalIndo($cicil->tanggal_bayar) }} </td>
                              <td>Rp. {{ Helper::setPrice($cicil->jumlah_dibayar) }}</td>
                              <td>Admin</td>
                              <td>{{ $cicil->keterangan === null ? '-' : $cicil->keterangan }}</td>
                              <td>
                                <form action="{{ route('admin.keuangan.cicil.delete', $cicil->id_keuangan) }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="btn btn-xs bg-orange waves-effect" onclick="return confirm('Hapus data cicilan ?');" title="Hapus data Cicilan">
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

  </div>

@endsection
