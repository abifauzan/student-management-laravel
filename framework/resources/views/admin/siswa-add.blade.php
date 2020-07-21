@extends('layouts.app')

@section('content')
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      Tambah Siswa Baru
                  </h2>
              </div>
              <div class="body">
                  <form class="form-horizontal" method="POST" action="{{ route('admin.siswa.add.submit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="kelas">Program Kelas</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                  <select class="form-control" name="program_kelas" required>
                                    <option selected disabled> -- Pilih program Kelas --</option>
                                  @foreach ($i as $kelas)
                                    <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas}} | {{$kelas->tingkatan_kelas}} {{Helper::kelas($kelas->tingkatan_kelas)}}</option>
                                  @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="kelas">Kelas</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                    <select class="form-control" name="kelas" required>
                                      <option selected disabled> -- Pilih Kelas --</option>
                                    @for ($i=1; $i < 13 ; $i++)
                                      <option value="{{$i}}">{{$i}} {{Helper::kelas($i)}}</option>
                                    @endfor
                                    </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="jadwal">Jadwal Bimbel</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                    <select class="form-control" name="jadwal">
                                      <option value="" selected> -- Pilih Kelas --</option>

                                  @if(count($a))
                                    @foreach($a as $b)
                                      <option value="{{$b->nama_kelas}}">{{$b->nama_kelas}} </option>
                                    @endforeach
                                  @endif  
                                    
                                    </select>
                                  </div>
                                  <span class="col-orange">*kosongkan jika belum ada</span>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nis">NIS Siswa</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="nis" name="nis" class="form-control" placeholder="Isi hanya angka" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="nama_lengkap">Nama Lengkap</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Isi nama lengkap" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="email">Email</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="email" id="email" name="email" class="form-control" placeholder="Isi email siswa" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="password">Password Siswa</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="password" id="password" name="password" class="form-control" placeholder="Isi Password Siswa" required>
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
                                    <textarea name="alamat" rows="4" class="form-control no-resize" placeholder="Isi Alamat Siswa" required></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="phone">Phone</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="phone" name="phone" class="form-control" placeholder="Isi telephone siswa" required>
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
                                    <textarea name="cita_cita" rows="4" class="form-control no-resize" placeholder="Isi Cita - cita / Hobby Siswa" required></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="tempat_lahir">Tempat Lahir</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Isi Tempat Lahir siswa" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                    <input type="text" name="tanggal_lahir" class="form-control" placeholder="Isi Tanggal Lahir Siswa" required>
                                  </div>
                                  <span class="col-orange">*Format: yyyy-mm-dd</span>
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
                                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="Isi Tahun Ajaran" required>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                    <select class="form-control" name="jenis_kelamin">
                                      <option selected disabled> -- Pilih --</option>
                                      <option value="L">Laki - Laki</option>
                                      <option value="P">Perempuan</option>
                                    </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="foto">Foto Profil</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="file" id="foto" name="foto" class="form-control">

                                  </div>
                                  <span class="col-orange">*Max Size: 3MB</span>
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
