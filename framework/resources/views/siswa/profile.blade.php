@extends('layouts.app')

@section('title', 'Profil')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-pink">
                <h2>
                    My Profile <small>You can edit your profile here...</small>
                </h2>
            </div>
            <div class="body">
              <form action="{{ route('siswa.get.profile.submit') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{Auth::user()->id_siswa}}">
                @if(Session::has('message'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{ Session::get('message') }}
                  </div>
                @endif
              <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                        <label for="nis">NIS</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="{{ Auth::user()->username }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="nama_lengkap">Nama Lengkap</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="nama_lengkap" class="form-control" value="{{ Auth::user()->nama_lengkap }}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="email">Email</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="alamat">Alamat</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <textarea name="alamat" rows="4" class="form-control no-resize">
                                  {{ Auth::user()->alamat }}
                                </textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="telephone">Telephone</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="telephone" class="form-control" value="{{ Auth::user()->phone }}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="tempat_lahir">Tempat Lahir</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="tempat_lahir" class="form-control" value="{{ Auth::user()->tempat_lahir }}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <input type="date" name="tanggal_lahir" class="form-control date" value="{{Auth::user()->tanggal_lahir}}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="cita_cita">Cita - cita / Hobby</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <textarea name="cita_cita" rows="4" class="form-control no-resize">
                                  {{ Auth::user()->cita_cita }}
                                </textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                          <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                          <button type="reset" class="btn btn-warning m-t-15 waves-effect">RESET</button>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body clearfix">
              <div class="col-md-12">
                @if(Session::has('messagePhoto'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{ Session::get('messagePhoto') }}
                  </div>
                @endif
                <img src="{{ asset('images/siswa/avatar/'.Auth::user()->photo) }}" class="img-responsive thumbnail" alt="">
              </div>
              <p class="align-center col-blue-grey font-bold">
                Kelas : {{Auth::user()->kelas}} {{ Helper::kelas(Auth::user()->kelas) }} <br>
                Tahun Ajaran : {{ Auth::user()->tahun_ajaran}} - {{ Helper::evenOrOdd(Auth::user()->tahun_ajaran) }}
              </p>
              <hr>
              <p class="align-center">{{Auth::user()->cita_cita}}</p>
              <div class="col-md-12 col-md-offset-3">
                <button type="button" data-toggle="modal" data-target="#defaultModal" class="btn btn-primary waves-effect">Edit Photo</button>
              </div>
            </div>
        </div>
    </div>
  </div>


  <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
    <form action="{{ route('siswa.upload.photo') }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{Auth::user()->id_siswa}}">
    {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Foto</h4>
                </div>
                <div class="modal-body">

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                            <label for="foto">Upload Foto</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                            <div class="form-group">
                                <div class="form-line">
                                  <input type="file" name="foto" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="reset" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
