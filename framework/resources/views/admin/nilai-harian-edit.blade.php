@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Edit Nilai Harian
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.nilai.detail.harian.update', $id) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="ket">Keterangan</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="ket" name="ket" class="form-control" value="{{$i->nama}}" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="tahun_ajaran">Tahun Ajaran</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="tahun_ajaran" class="form-control" value="{{$i->tahun_ajaran}}" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_mtk">Nilai Matematika</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_mtk" name="nilai_mtk" class="form-control" value="{{$i->nilai_mtk}}" {{$i->nilai_mtk == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_ipa">Nilai IPA</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_ipa" name="nilai_ipa" class="form-control" value="{{$i->nilai_ipa}}" {{$i->nilai_ipa == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_ips">Nilai IPS</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_ips" name="nilai_ips" class="form-control" value="{{$i->nilai_ips}}" {{$i->nilai_ips == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_bindo">Nilai B.Indonesia</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_bindo" name="nilai_bindo" class="form-control" value="{{$i->nilai_bindo}}" {{$i->nilai_bindo == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_english">Nilai B.Inggris</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_english" name="nilai_english" class="form-control" value="{{$i->nilai_english}}" {{$i->nilai_english == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_fisika">Nilai Fisika</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_fisika" name="nilai_fisika" class="form-control" value="{{$i->nilai_fisika}}" {{$i->nilai_fisika == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_biologi">Nilai Biologi</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_biologi" name="nilai_biologi" class="form-control" value="{{$i->nilai_biologi}}" {{$i->nilai_biologi == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_kimia">Nilai Kimia</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_kimia" name="nilai_kimia" class="form-control" value="{{$i->nilai_kimia}}" {{$i->nilai_kimia == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_geografi">Nilai Geografi</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_geografi" name="nilai_geografi" class="form-control" value="{{$i->nilai_geografi}}" {{$i->nilai_geografi == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_ekonomi">Nilai Ekonomi</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_ekonomi" name="nilai_ekonomi" class="form-control" value="{{$i->nilai_ekonomi}}" {{$i->nilai_ekonomi == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_sejarah">Nilai Sejarah</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_sejarah" name="nilai_sejarah" class="form-control" value="{{$i->nilai_sejarah}}" {{$i->nilai_sejarah == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nilai_sosiologi">Nilai Sosiologi</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nilai_sosiologi" name="nilai_sosiologi" class="form-control" value="{{$i->nilai_sosiologi}}" {{$i->nilai_sosiologi == null ? 'disabled' : ''}}>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                              <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
