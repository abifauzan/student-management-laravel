@extends('layouts.app')

@section('content')
  <div class="block-header">
      <h2>DASHBOARD </h2>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header">
              <h2>
                  Welcome, {{ Auth::guard('admin')->user()->username }}
              </h2>
          </div>
          <div class="body">
              Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
          </div>
      </div>
    </div>
  </div>

  <div class="row clearfix">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-pink ">
              <div class="icon">
                  <i class="material-icons">group</i>
              </div>
              <div class="content">
                  <div class="text">LIHAT SISWA</div>
                  <a href="{{route('admin.siswa.get')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-cyan">
              <div class="icon">
                  <i class="material-icons">assignment</i>
              </div>
              <div class="content">
                  <div class="text">NILAI SISWA</div>
                  <a href="{{route('admin.nilai.get')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-light-green">
              <div class="icon">
                  <i class="material-icons">assignment_ind</i>
              </div>
              <div class="content">
                  <div class="text">DAFTAR KELAS</div>
                  <a href="{{route('admin.kelas.get')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-orange">
              <div class="icon">
                  <i class="material-icons">attach_money</i>
              </div>
              <div class="content">
                  <div class="text">KEUANGAN</div>
                  <a href="{{route('admin.keuangan.get')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
  </div>

  <div class="row clearfix">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card">
          <div class="header bg-blue-grey">
              <h2>Request Pembayaran Baru  &nbsp; <span class="badge bg-green">{{ count($aa) >= 1 ? count($aa) . ' New' : '0' }}</span></h2>

          </div>
          <div class="body">
              <div class="table-responsive">
                @if (Session::has('message'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{Session::get('message')}}
                  </div>
                @endif
                @if (count($aa) == 0)
                  <div class="alert bg-orange">
                      Maaf, tidak ada request pembayaran yang masuk
                  </div>
                @else
                  <table class="table table-hover js-basic-example-length dataTable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
                              <th>Request Cicilan</th>
                              <th>Detail</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php($no=0)
                        @foreach ($aa as $a)
                          @php($no++)
                          <tr>
                              <td>{{$no}}</td>
                              <td>{{$a->siswa->nama_lengkap}}</td>
                              <td>{{$a->siswa->kelas}} {{Helper::kelas($a->siswa->kelas)}}</td>
                              <td>Ke {{$a->cicilan_ke}}</td>
                              <td>
                                  <a href="{{route('admin.request.detail.update', $a->id_bukti_pembayaran)}}" class="btn bg-blue btn-xs waves-effect">
                                      <i class="material-icons">arrow_forward</i>
                                  </a>
                              </div>
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

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="header bg-teal">
                <h2>
                    Program Kelas
                </h2>
            </div>
            <div class="body">
              <div class="table-responsive">


                <table class="table table-hover js-basic-example-length dataTable">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Biaya</th>
                          <th>Detail</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php($no1=0)
                    @foreach ($bb as $b)
                      @php($no1++)
                      <tr>
                          <td>{{$no1}}</td>
                          <td>{{$b->nama_kelas}}</td>
                          <td>{{$b->tingkatan_kelas}} {{Helper::kelas($b->tingkatan_kelas)}}</td>
                          <td>Rp. {{Helper::setPrice($b->biaya)}}</td>
                          <td>
                              <a href="{{route('admin.program.detail',$b->id_kelas)}}" class="btn bg-blue btn-xs waves-effect">
                                  <i class="material-icons">arrow_forward</i>
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
