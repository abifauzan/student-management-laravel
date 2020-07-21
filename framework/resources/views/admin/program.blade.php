@extends('layouts.app')

@section('content')
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header clearfix">
                <h2 class="pull-left">
                    Daftar Progam <small>Daftar program Kelas Extra Bimbel</small>
                </h2>
                <a href="{{ route('admin.program.add') }}" class="btn btn-primary waves-effect pull-right">
                    <i class="material-icons">assignment_ind</i>
                    <span>Tambah Program</span>
                </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                @if (Session::has('message'))
                  <div class="alert bg-green alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      {{Session::get('message')}}
                  </div>
                @endif

                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <thead>
                          <tr>
                              <th>Kelas</th>
                              <th>Tingkatan Kelas</th>
                              <th>Biaya</th>
                              <th>Harga Angsuran</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>Kelas</th>
                            <th>Tingkatan Kelas</th>
                            <th>Biaya</th>
                            <th>Harga Angsuran</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($i as $kelas)
                          <tr>
                              <td>{{$kelas->nama_kelas}}</td>
                              <td>{{$kelas->tingkatan_kelas}}  {{Helper::kelas($kelas->tingkatan_kelas)}}</td>
                              <td>{{$kelas->biaya}}</td>
                              <td>{{$kelas->harga_angsuran}}</td>
                              <td>
                                <a href="{{ route('admin.program.detail', $kelas->id_kelas) }}" class="btn btn-xs bg-blue waves-effect pull-left m-r-5" title="Detail Program">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <form class="pull-left margin-0 padding-0" action="{{ route('admin.program.delete', $kelas->id_kelas) }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" onclick="return confirm('Hapus Program ?');" class="btn btn-xs bg-orange waves-effect" title="Hapus Program">
                                      <i class="material-icons">delete</i>
                                  </button>
                                </form>

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
