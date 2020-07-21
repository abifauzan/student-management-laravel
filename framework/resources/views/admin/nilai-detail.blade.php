@extends('layouts.app')

@section('content')
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header clearfix">
              <h2 class="pull-left">Nilai Siswa <small>Nilai siswa : {{$i->nama_lengkap}}</small></h2>
              <a href="{{ route('admin.siswa.detail', $i->id_siswa) }}" class="btn bg-orange btn-sm waves-effect pull-right" title="Detail Siswa">
                  <span>Edit Biodata Siswa</span>
              </a>
            </div>
            <div class="body table-responsive">
              <table class="table table-bordered table-condensed table-hover">
                  <thead>
                      <tr>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Kelas</th>
                          <th>Tahun Ajaran</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th>{{ $i->username }}</th>
                          <td>{{ $i->nama_lengkap }}</td>
                          <td>{{ $i->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
                          <td>{{ $i->kelas }} {{ Helper::kelas($i->kelas) }}</td>
                          <td>{{ $i->tahun_ajaran}} - {{ Helper::evenOrOdd($i->tahun_ajaran) }} </td>
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
                      <li role="presentation" class="active"><a href="#nilai_harian" data-toggle="tab" aria-expanded="true">Nilai Harian</a></li>
                      <li role="presentation" class=""><a href="#nilai_tryout" data-toggle="tab" aria-expanded="false">Nilai Try Out UN</a></li>
                      <li role="presentation" class=""><a href="#sbmptn" data-toggle="tab" aria-expanded="false">Nilai Try Out SBMPTN</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                      <!-- Nilai Harian -->
                      <div role="tabpanel" class="tab-pane fade active in table-responsive" id="nilai_harian">
                        <a href="{{ route('admin.nilai.harian.add', $i->id_siswa) }}" class="btn btn-primary btn-sm waves-effect m-b-10" title="Detail Siswa">
                            <i class="material-icons">add</i>
                            <span>BUAT NILAI</span>
                        </a>
                        @if (Session::has('messageHarian'))
                          <div class="alert bg-green alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                              {{Session::get('messageHarian')}}
                          </div>
                        @endif
                        @if(count($i->nilaiHarian) === 0)
                          <div class="alert bg-orange">
                              Maaf, nilai siswa belum dibuat
                          </div>
                        @else
                        <table class="table table-responsive">
                              <thead>
                                  <tr>
                                      <th width="15px">No.</th>
                                      <th>Keterangan</th>
                                      <th>Periode</th>
                                      <th width="200px" class="align-center">Tahun Ajaran</th>
                                      <th width="100px" class="align-center">Grade</th>
                                      <th width="50px">Detail</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @php($no = 0)
                                @foreach ($i->nilaiHarian as $nilaiHarian)
                                  @php($no++)

                                  <tr>
                                      <th scope="row">{{$no}}</th>
                                      <td>{{$nilaiHarian->nama}}</td>
                                      <td>{{ Helper::evenOrOdd($nilaiHarian->tahun_ajaran) }}  {{$nilaiHarian->tahun_ajaran}} </td>
                                      <td class="align-center">{{$nilaiHarian->tahun_ajaran}}</td>
                                      <td class="align-center">
                                      {{ Helper::gradeNilai($nilaiHarian->nilai_mtk, $nilaiHarian->nilai_ipa, $nilaiHarian->nilai_ips, $nilaiHarian->nilai_bindo, $nilaiHarian->nilai_english, $nilaiHarian->nilai_fisika, $nilaiHarian->nilai_biologi, $nilaiHarian->nilai_kimia, $nilaiHarian->nilai_geografi, $nilaiHarian->nilai_ekonomi, $nilaiHarian->nilai_sejarah, $nilaiHarian->nilai_sosiologi) }}
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-info btn-xs waves-effect" title="Lihat Detail" data-toggle="collapse" data-target="#collapseExample{{$no}}">
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </button>
                                      </td>
                                      <td class="clearfix">
                                        <a href="{{ route('admin.nilai.detail.harian', $nilaiHarian->id_nilai_harian) }}" class="btn bg-orange btn-xs waves-effect pull-left m-r-10" title="Edit Nilai">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="pull-left m-r-10" action="{{ route('admin.nilai.harian.delete', $nilaiHarian->id_nilai_harian) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" href="" class="btn bg-red btn-xs waves-effect " onclick="return confirm('Hapus Nilai ?');" title="Hapus Nilai">
                                              <i class="material-icons">delete</i>
                                          </button>
                                        </form>

                                      </td>
                                  </tr>
                                  <!-- data Nilai -->
                                    <tr class="collapse" id="collapseExample{{$no}}" aria-expanded="false" style="height: 0px;">
                                      <td colspan="4" class="text-center">&nbsp;</td>
                                      <td>
                                        <table class="table table-hover no-padding no-margin">
                                          @if ($nilaiHarian->nilai_mtk == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Matematika</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_mtk }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_ipa == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> IPA</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_ipa }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_ips == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> IPS</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_ips }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_bindo == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> B.Indonesia</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_bindo }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_english == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> B.Inggris</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_english }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_fisika == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Fisika</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_fisika }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_biologi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Biologi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_biologi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_kimia == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Kimia</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_kimia }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_geografi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Geografi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_geografi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_ekonomi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Ekonomi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_ekonomi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_sejarah == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Sejarah</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_sejarah }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiHarian->nilai_sosiologi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Sosiologi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiHarian->nilai_sosiologi }} </td>
                                            </tr>
                                          @endif
                                            <tr class="bg-teal">
                                              <th width="120px" class="align-right"> Rata-rata </th>
                                              <td width="5px"> : </td>
                                              <td class="align-left">
                                              {{ Helper::nilaiRataRata($nilaiHarian->nilai_mtk, $nilaiHarian->nilai_ipa, $nilaiHarian->nilai_ips, $nilaiHarian->nilai_bindo, $nilaiHarian->nilai_english, $nilaiHarian->nilai_fisika, $nilaiHarian->nilai_biologi, $nilaiHarian->nilai_kimia, $nilaiHarian->nilai_geografi, $nilaiHarian->nilai_ekonomi, $nilaiHarian->nilai_sejarah, $nilaiHarian->nilai_sosiologi) }}
                                              </td>
                                            </tr>
                                        </table>
                                      </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <!-- / END data Nilai -->
                                  @endforeach
                              </tbody>
                          </table>
                        @endif
                      </div>

                      <!-- Nilai Try out -->
                      <div role="tabpanel" class="tab-pane fade in table-responsive" id="nilai_tryout">
                        <a href="{{ route('admin.nilai.tryout.add', $i->id_siswa) }}" class="btn btn-primary btn-sm waves-effect m-b-10" title="Detail Siswa">
                            <i class="material-icons">add</i>
                            <span>BUAT NILAI</span>
                        </a>
                        @if (Session::has('messageTryout'))
                          <div class="alert bg-green alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                              {{Session::get('messageTryout')}}
                          </div>
                        @endif
                        @if(count($i->nilaiTryout) === 0)
                          <div class="alert bg-orange">
                              Maaf, nilai siswa belum dibuat
                          </div>
                        @else
                        <table class="table table-responsive">
                              <thead>
                                <tr>
                                    <th width="15px">No.</th>
                                    <th>Keterangan</th>
                                    <th>Periode</th>
                                    <th width="200px" class="align-center">Tahun Ajaran</th>
                                    <th width="100px" class="align-center">Grade</th>
                                    <th width="50px">Detail</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php($no = 0)
                                @foreach ($i->nilaiTryout as $nilaiTryout)
                                  @php($no++)

                                  <tr>
                                      <th scope="row">{{$no}}</th>
                                      <td>{{$nilaiTryout->nama}} </td>
                                      <td>{{ Helper::evenOrOdd($nilaiTryout->tahun_ajaran) }}  {{$nilaiTryout->tahun_ajaran}} </td>
                                      <td class="align-center">{{$nilaiTryout->tahun_ajaran}}</td>
                                      <td class="align-center">
                                      {{ Helper::nilaiRataRataTryout($nilaiTryout->nilai_mtk, $nilaiTryout->nilai_ipa, $nilaiTryout->nilai_ips, $nilaiTryout->nilai_bindo, $nilaiTryout->nilai_english, $nilaiTryout->nilai_fisika, $nilaiTryout->nilai_biologi, $nilaiTryout->nilai_kimia, $nilaiTryout->nilai_geografi, $nilaiTryout->nilai_ekonomi, $nilaiTryout->nilai_sejarah, $nilaiTryout->nilai_sosiologi) }}
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-info waves-effect" title="Lihat Detail" data-toggle="collapse" data-target="#collapseExampleTryout{{$no}}">
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </button>
                                      </td>
                                      <td class="clearfix">
                                        <a href="{{ route('admin.nilai.detail.tryout', $nilaiTryout->id_nilai_tryout) }}" class="btn bg-orange btn-xs waves-effect pull-left m-r-10" title="Edit Nilai">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="pull-left m-r-10" action="{{ route('admin.nilai.tryout.delete', $nilaiTryout->id_nilai_tryout) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" href="" class="btn bg-red btn-xs waves-effect " onclick="return confirm('Hapus Nilai ?');" title="Hapus Nilai">
                                              <i class="material-icons">delete</i>
                                          </button>
                                        </form>

                                      </td>
                                  </tr>
                                  <!-- data Nilai -->
                                    <tr class="collapse" id="collapseExampleTryout{{$no}}" aria-expanded="false" style="height: 0px;">
                                      <td colspan="4" class="text-center">&nbsp;</td>
                                      <td>
                                        <table class="table table-hover no-padding no-margin">
                                          @if ($nilaiTryout->nilai_mtk == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Matematika</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_mtk }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_ipa == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> IPA</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_ipa }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_ips == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> IPS</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_ips }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_bindo == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> B.Indonesia</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_bindo }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_english == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> B.Inggris</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_english }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_fisika == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Fisika</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_fisika }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_biologi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Biologi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_biologi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_kimia == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Kimia</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_kimia }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_geografi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Geografi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_geografi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_ekonomi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Ekonomi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_ekonomi }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_sejarah == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Sejarah</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_sejarah }} </td>
                                            </tr>
                                          @endif
                                          @if ($nilaiTryout->nilai_sosiologi == null)
                                            {{''}}
                                          @else
                                            <tr>
                                              <th width="120px" class="align-right"> Sosiologi</th>
                                              <td width="5px"> : </td>
                                              <td class="align-left"> {{ $nilaiTryout->nilai_sosiologi }} </td>
                                            </tr>
                                          @endif
                                          <tr class="bg-teal">
                                            <th width="120px" class="align-right"> Rata-rata </th>
                                            <td width="5px"> : </td>
                                            <td class="align-left">
                                              {{ Helper::nilaiRataRata($nilaiTryout->nilai_mtk, $nilaiTryout->nilai_ipa, $nilaiTryout->nilai_ips, $nilaiTryout->nilai_bindo, $nilaiTryout->nilai_english, $nilaiTryout->nilai_fisika, $nilaiTryout->nilai_biologi, $nilaiTryout->nilai_kimia, $nilaiTryout->nilai_geografi, $nilaiTryout->nilai_ekonomi, $nilaiTryout->nilai_sejarah, $nilaiTryout->nilai_sosiologi) }}
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <!-- / END data Nilai -->
                                  @endforeach
                              </tbody>
                          </table>
                        @endif
                      </div>

                      <!-- Nilai SBMPTN -->
                      <div role="tabpanel" class="tab-pane fade in table-responsive" id="sbmptn">
                        <a href="{{ route('admin.sbmptn.add', $i->id_siswa) }}" class="btn btn-primary btn-sm waves-effect m-b-10" title="Detail Siswa">
                            <i class="material-icons">add</i>
                            <span>BUAT NILAI</span>
                        </a>
                        @if (Session::has('messageSbm'))
                          <div class="alert bg-green alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                              {{Session::get('messageSbm')}}
                          </div>
                        @endif
                        @if(count($i->nilaiSbmptn) === 0)
                          <div class="alert bg-orange">
                              Maaf, nilai siswa belum dibuat
                          </div>
                        @else
                        <table class="table table-responsive">
                              <thead>
                                <tr>
                                    <th width="15px">No.</th>
                                    <th>Keterangan</th>
                                    <th>Periode</th>
                                    <th width="200px" class="align-center">Tahun Ajaran</th>
                                    <th width="100px" class="align-center">Passing Grade</th>
                                    <th width="50px">Detail</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php($no = 0)
                                @foreach ($i->nilaiSbmptn as $nilaiSbmptn)
                                  @php($no++)

                                  <tr>
                                      <th scope="row">{{$no}}</th>
                                      <td>{{$nilaiSbmptn->nama}} </td>
                                      <td>{{ Helper::evenOrOdd($nilaiSbmptn->tahun_ajaran) }}  {{$nilaiSbmptn->tahun_ajaran}} </td>
                                      <td class="align-center">{{$nilaiSbmptn->tahun_ajaran}}</td>
                                      <td class="align-center">
                                        {{ Helper::gradeSbmptn($nilaiSbmptn->total_benar,$nilaiSbmptn->total_salah) }}
                                      {{-- {{ Helper::nilaiRataRataTryout($nilaiTryout->nilai_mtk, $nilaiTryout->nilai_ipa, $nilaiTryout->nilai_ips, $nilaiTryout->nilai_bindo, $nilaiTryout->nilai_english, $nilaiTryout->nilai_fisika, $nilaiTryout->nilai_biologi, $nilaiTryout->nilai_kimia, $nilaiTryout->nilai_geografi, $nilaiTryout->nilai_ekonomi, $nilaiTryout->nilai_sejarah, $nilaiTryout->nilai_sosiologi) }} --}}
                                        <strong>%</strong
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-info waves-effect" title="Lihat Detail" data-toggle="collapse" data-target="#collapseExampleSbm{{$no}}">
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </button>
                                      </td>
                                      <td class="clearfix">
                                        <a href="{{ route('admin.sbmptn.detail', $nilaiSbmptn->id_nilai_sbmptn) }}" class="btn bg-orange btn-xs waves-effect pull-left m-r-10" title="Edit Nilai">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="pull-left m-r-10" action="{{ route('admin.sbmptn.delete', $nilaiSbmptn->id_nilai_sbmptn) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" href="" class="btn bg-red btn-xs waves-effect " onclick="return confirm('Hapus Nilai ?');" title="Hapus Nilai">
                                              <i class="material-icons">delete</i>
                                          </button>
                                        </form>

                                      </td>
                                  </tr>
                                  <!-- data Nilai -->
                                    <tr class="collapse" id="collapseExampleSbm{{$no}}" aria-expanded="false" style="height: 0px;">
                                      <td colspan="4" class="text-center">&nbsp;</td>
                                      <td>
                                        <table class="table table-hover no-padding no-margin">
                                          <tr class="bg-teal">
                                            <th width="120px" class="align-right"> Jumlah Benar</th>
                                            <td width="5px"> : </td>
                                            <td class="align-left"> {{ $nilaiSbmptn->total_benar }} </td>
                                          </tr>
                                          <tr>
                                            <th width="120px" class="align-right"> Jumlah Salah</th>
                                            <td width="5px"> : </td>
                                            <td class="align-left"> {{ $nilaiSbmptn->total_salah }} </td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <!-- / END data Nilai -->
                                  @endforeach
                              </tbody>
                          </table>
                        @endif
                      </div>

                  </div>
              </div>
            </div>
      </div>
  </div>
@endsection
