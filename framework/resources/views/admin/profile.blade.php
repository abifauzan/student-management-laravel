@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-pink">
                <h2>
                    My Profile <small>You can edit profile here...</small>
                </h2>
            </div>
            <div class="body">
              <form action="{{ route('admin.profile.update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $i->id_superadmin }}">
                @if(Session::has('message'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{ Session::get('message') }}
                  </div>
                @endif
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" name="username" class="form-control" value="{{ $i->username }}">
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
                              <input type="email" name="email" class="form-control" value="{{ $i->email }}">
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

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                <img src="{{ asset('images/admin/avatar/'.$i->photo )}}" class="img-responsive thumbnail" alt="Avatar">
              </div>
              <hr>
              <div class="col-md-12 col-md-offset-3">
                <button type="button" data-toggle="modal" data-target="#defaultModal" class="btn btn-primary waves-effect">Edit Photo</button>
              </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
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
                @if(Session::has('messagePassIncorrect'))
                  <div class="alert bg-red alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{ Session::get('messagePassIncorrect') }}
                  </div>
                @endif
                @if(Session::has('messagePassNotMatch'))
                  <div class="alert bg-red alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{ Session::get('messagePassNotMatch') }}
                  </div>
                @endif
              </div>
              <div class="col-md-12">
                <button type="button" data-toggle="modal" data-target="#defaultModalPassword" class="btn btn-primary btn-block waves-effect">Change Password</button>
              </div>
            </div>
        </div>
    </div>

  </div>


  <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
      <div class="modal-dialog" role="document">
        <form action="{{ route('admin.profile.foto') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $i->id_superadmin }}">
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
        <form action="{{ route('admin.change.password') }}" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $i->id_superadmin }}">
        {{ csrf_field() }}
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Change Password</h4>
              </div>
              <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                        <label for="current_password">Current Password</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                        <div class="form-group">
                            <div class="form-line">
                              <input type="password" name="current_password" class="form-control input-password" required>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                          <label for="password">New Password</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-9">
                          <div class="form-group">
                              <div class="form-line">
                                <input type="password" name="password" class="form-control input-password" required>
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
                                <input type="password" name="c_password" class="form-control input-password" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <input type="checkbox" id="checkbox-unmask" class="filled-in">
                        <label for="checkbox-unmask">Show Password</label>
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

@section('script')
  <script>
    var pw   = $(".input-password"),
    cb   = $("#checkbox-unmask"),
    mask = true;

    cb.on("click", function(){

      if(mask === true){
        mask = false;
        pw.attr("type", "text");
      } else {
        mask = true;
        pw.attr("type", "password");
      }

    });

  </script>
@endsection
