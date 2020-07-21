@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-md-8 margin-0 padding-0">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header bg-pink">
                  <h2>
                      Detail Siswa <small>You can edit student profile here...</small>
                  </h2>
              </div>
              <div class="body">
                <form action="{{ route('admin.siswa.detail.submit', $siswa->id_siswa) }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  @if(Session::has('message'))
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('message') }}
                    </div>
                  @endif
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                        <label for="kelas">Program Kelas</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                        <div class="form-group">
                            <div class="form-line">
                              <select class="form-control" name="program_kelas" required>
                                <option selected disabled> -- Pilih program Kelas --</option>
                              @foreach ($i as $kelas)
                                <option value="{{$kelas->id_kelas}}" {{ $siswa->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                                {{$kelas->nama_kelas}} | {{$kelas->tingkatan_kelas}} {{Helper::kelas($kelas->tingkatan_kelas)}}
                                </option>
                              @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                        <label for="kelas">Kelas</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                        <div class="form-group">
                            <div class="form-line">
                              <select class="form-control" name="kelas" required>
                                <option selected disabled> -- Pilih Kelas --</option>
                              @for ($i=1; $i < 13 ; $i++)
                                <option value="{{$i}}" {{ $siswa->kelas == $i ? 'selected' : ''}}>{{$i}} {{Helper::kelas($i)}}</option>
                              @endfor
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                        <label for="kelas">Jadwal Bimbel</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                        <div class="form-group">
                            <div class="form-line">
                              <select class="form-control" name="jadwal">
                                <option value="" selected> -- Pilih Kelas --</option>

                            @if(count($a))
                              @if(count($c))
                                @foreach($a as $b)
                                  <option value="{{$b->nama_kelas}}" {{ $c[0]->kelasBimbel->nama_kelas == $b->nama_kelas ? 'selected' : ''}}>{{$b->nama_kelas}} </option>
                                @endforeach
                              @else
                                @foreach($a as $b)
                                  <option value="{{$b->nama_kelas}}">{{$b->nama_kelas}} </option>
                                @endforeach
                              @endif
                                
                            @endif  
                              
                              </select>
                            </div>
                            <span class="col-orange">*Edit Jadwal kelas utama siswa</span>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="nis">NIS</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="nis" class="form-control" value="{{ $siswa->username }}">
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
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $siswa->nama_lengkap }}">
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
                                    <input type="email" name="email" class="form-control" value="{{ $siswa->email }}">
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
                                    {{ $siswa->alamat }}
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
                                    <input type="text" name="telephone" class="form-control" value="{{ $siswa->phone }}">
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
                                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}">
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
                                  <input type="date" name="tanggal_lahir" class="form-control date" value="{{$siswa->tanggal_lahir}}">
                                </div>
                                <span class="col-orange">*Format: yyyy-mm-dd</span><br>
                                <span class="col-orange">*Contoh: 1998-08-15</span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                            <div class="form-group">
                                <div class="form-line">
                                  <input type="text" name="tahun_ajaran" class="form-control date" value="{{$siswa->tahun_ajaran}}">
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
                                    {{ $siswa->cita_cita }}
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

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header bg-pink">
            <h2>
                Jadwal Bimbel Siswa <small>List jadwal bimbel siswa...</small>
            </h2>
          </div>

          <div class="body table-responsive">

            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Hari</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                </tr>
              </thead>
              <tbody>
              @foreach($c as $d)
                <tr>
                  <td>{{ $d->kelasBimbel->nama_kelas }}</td>
                  <td>{{ Helper::translateHari($d->kelasBimbel->hari) }}</td>
                  <td>{{ $d->kelasBimbel->mulai }}</td>
                  <td>{{ $d->kelasBimbel->selesai }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 margin-0 padding-0">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Foto Profile</h2>
            </div>
              <div class="body clearfix">
                <div class="col-md-12">
                  @if(Session::has('messagePhoto'))
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('messagePhoto') }}
                    </div>
                  @endif
                  <img src="{{ asset('images/siswa/avatar/'.$siswa->photo )}}" class="img-responsive thumbnail" alt="">
                </div>
                <p class="align-center col-blue-grey font-bold">
                  Kelas : {{$siswa->kelas}} {{ Helper::kelas($siswa->kelas) }} <br>
                  Tahun Ajaran : {{ $siswa->tahun_ajaran}} - {{ Helper::evenOrOdd($siswa->tahun_ajaran) }}
                </p>
                <hr>
                <p class="align-center">{{$siswa->cita_cita}}</p>
                <div class="col-md-12 col-md-offset-3">
                  <button type="button" data-toggle="modal" data-target="#defaultModal" class="btn btn-primary waves-effect">Edit Photo</button>
                </div>
              </div>
          </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                <h2>Edit Password</h2>
              </div>
              <div class="body clearfix">
                <div class="col-md-12">
                  @if(Session::has('messagePassword'))
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('messagePassword') }}
                    </div>
                  @endif
                  @if(Session::has('messagePasswordError'))
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('messagePasswordError') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-12">
                  <button type="button" data-toggle="modal" data-target="#defaultModalPassword" class="btn btn-primary btn-block waves-effect">Change Password</button>
                </div>
              </div>
          </div>
      </div>


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                <h2>Naik Kelas</h2>
              </div>
              <div class="body clearfix">
                <div class="col-md-12">
                  @if(Session::has('messageNaikKelas'))
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        {{ Session::get('messageNaikKelas') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-12">
                  <button type="button" data-toggle="modal" data-target="#defaultModalNaikKelas" class="btn btn-primary btn-block waves-effect">Update Kelas</button>
                </div>
              </div>
          </div>
      </div>
    </div>
      
  </div>


  <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
      <div class="modal-dialog" role="document">
        <form action="{{ route('admin.siswa.edit.foto.submit', $siswa->id_siswa) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
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



  <div class="modal fade" id="defaultModalPassword" tabindex="-1" role="dialog" style="display: none;">
      <div class="modal-dialog" role="document">
        <form action="{{ route('admin.siswa.change.password.submit', $siswa->id_siswa) }}" method="POST">
          <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Change Password</h4>
              </div>
              <div class="modal-body">

                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="password">New Password</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <input type="password" name="password" class="form-control" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="c_password">Confirm Password</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <input type="password" name="c_password" class="form-control" required>
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


  <div class="modal fade" id="defaultModalNaikKelas" tabindex="-1" role="dialog" style="display: none;">
      <div class="modal-dialog" role="document">
        <form action="{{ route('admin.siswa.naik.kelas', $siswa->id_siswa) }}" method="POST">
          <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Update Kelas Siswa</h4>
              </div>
              <div class="modal-body">

                  <div class="row clearfix">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Nama Siswa</th>
                            <th>Kelas Sekarang</th>
                            <th>Tahun Ajaran</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$siswa->nama_lengkap}}</td>
                            <td>{{$siswa->kelas}}  {{Helper::kelas($siswa->kelas)}}</td>
                            <td>{{$siswa->tahun_ajaran}} - {{Helper::evenOrOdd($siswa->tahun_ajaran)}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="naik_kelas">Naik ke kelas</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <input type="number" name="naik_kelas" value="{{$siswa->kelas + 1}}" class="form-control">
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="alert alert-info m-t-10">
                    Anda akan update kelas siswa atas nama : {{$siswa->nama_lengkap}}, maka : <br>
                    <strong>1) Data keuangan </strong> siswa sebelumnya akan di reset atau di hapus <br>
                    <strong>2) Jadwal Bimbel </strong> siswa sebelumnya akan di reset atau di hapus <br>
                    Silahkan update ulang data keuangan siswa dan jadwal bimbel siswa.
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
