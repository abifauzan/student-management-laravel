@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="block-header">
      <h2>DASHBOARD </h2>
  </div>
  <div class="row clearfix">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-pink ">
              <div class="icon">
                  <i class="material-icons">person</i>
              </div>
              <div class="content">
                  <div class="text">LIHAT PROFILE</div>
                  <a href="{{route('siswa.get.profile')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-cyan">
              <div class="icon">
                  <i class="material-icons">playlist_add_check</i>
              </div>
              <div class="content">
                  <div class="text">JADWAL BIMBEL</div>
                  <a href="{{route('siswa.get.jadwal')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box-2 bg-light-green">
              <div class="icon">
                  <i class="material-icons">assignment</i>
              </div>
              <div class="content">
                  <div class="text">DAFTAR NILAI</div>
                  <a href="{{route('siswa.get.nilai')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

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
                  <a href="{{route('siswa.get.keuangan')}}" class="btn btn-block btn-xs m-t-5 btn-default waves-effect">

                      <span>GO</span>
                      <i class="material-icons">arrow_forward</i>
                  </a>
              </div>
          </div>
      </div>
  </div>

  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header">
              <h2>
                  Welcome, {{ Auth::user()->nama_lengkap }}
              </h2>
          </div>
          <div class="body">
            Selamat datang di aplikasi Database Siswa Extra Bimbel.
          </div>
      </div>
  </div>
</div>

@endsection
