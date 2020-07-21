<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// route for admin
Route::prefix('admin')->group(function(){
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'AdminController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminController@login')->name('admin.login.submit');
  Route::post('/logout', 'AdminController@logout')->name('admin.logout');
  Route::middleware(['if-admin'])->group(function(){
    Route::get('/login', 'AdminController@showLoginForm')->name('admin.login');
  });

  // admin profile
  Route::get('/profile', 'AdminController@profile')->name('admin.profile');
  Route::put('/profile', 'AdminController@profileUpdate')->name('admin.profile.update');
  Route::put('/profile/editfoto', 'AdminController@profileEditFoto')->name('admin.profile.foto');
  Route::put('/profile/changepassword', 'AdminController@adminChangePassword')->name('admin.change.password');


  //resource siswa
  Route::get('/siswa', 'AdminController@siswaGet')->name('admin.siswa.get');
  Route::get('/siswa/add', 'AdminController@siswaAdd')->name('admin.siswa.add');
  Route::post('/siswa/add', 'AdminController@siswaAddPost')->name('admin.siswa.add.submit');
  Route::get('/siswa/{id}', 'AdminController@siswaDetail')->name('admin.siswa.detail');
  Route::put('/siswa/{id}', 'AdminController@siswaDetailPost')->name('admin.siswa.detail.submit');
  Route::delete('/siswa/{id}', 'AdminController@siswaDelete')->name('admin.siswa.delete');
  Route::put('/siswa/{id}/editfoto', 'AdminController@siswaEditFotoPost')->name('admin.siswa.edit.foto.submit');
  Route::put('/siswa/{id}/changepassword', 'AdminController@siswaChangePassword')->name('admin.siswa.change.password.submit');
  Route::put('/siswa/{id}/naikkelas', 'AdminController@siswaNaikKelas')->name('admin.siswa.naik.kelas');

  //resource kelas
  Route::get('/kelas', 'AdminController@kelasGet')->name('admin.kelas.get');
  Route::get('/kelas/add', 'AdminController@kelasAdd')->name('admin.kelas.add');
  Route::post('/kelas/add', 'AdminController@kelasAddPost')->name('admin.kelas.add.submit');
  Route::get('/kelas/{id}/detail', 'AdminController@kelasDetail')->name('admin.kelas.detail');
  Route::put('/kelas/{id}/detail', 'AdminController@kelasUpdate')->name('admin.kelas.detail.submit');
  Route::delete('/kelas/{id}', 'AdminController@kelasDelete')->name('admin.kelas.delete');
  Route::get('/kelas/{id}/bukakelas', 'AdminController@bukaKelas')->name('admin.buka.kelas');
  Route::post('/kelas/{id}/bukakelas', 'AdminController@bukaKelasPost')->name('admin.buka.kelas.submit');
  Route::get('/kelas/{id}/editkelas', 'AdminController@editKelas')->name('admin.edit.kelas');
  Route::delete('/kelas/{id}/editkelas', 'AdminController@editKelasPost')->name('admin.edit.kelas.submit');

  //resource nilai
  Route::get('/nilai', 'AdminController@nilaiGet')->name('admin.nilai.get');
  Route::get('/nilai/{id}/detail', 'AdminController@nilaiDetail')->name('admin.nilai.detail');
  Route::get('/nilai/{id}/add/nilaiharian', 'AdminController@nilaiHarianAdd')->name('admin.nilai.harian.add');
  Route::post('/nilai/{id}/add/nilaiharian', 'AdminController@nilaiHarianAddPost')->name('admin.nilai.harian.add.submit');
  Route::get('/nilai/{id}/add/nilaitryout', 'AdminController@nilaiTryoutAdd')->name('admin.nilai.tryout.add');
  Route::post('/nilai/{id}/add/nilaitryout', 'AdminController@nilaiTryoutAddPost')->name('admin.nilai.tryout.add.submit');
  Route::get('/nilai/{id}/detail/nilaiharian', 'AdminController@nilaiDetailHarian')->name('admin.nilai.detail.harian');
  Route::get('/nilai/{id}/detail/nilaitryout', 'AdminController@nilaiDetailTryout')->name('admin.nilai.detail.tryout');
  Route::put('/nilai/{id}/detail/nilaiharian', 'AdminController@nilaiDetailHarianUpdate')->name('admin.nilai.detail.harian.update');
  Route::put('/nilai/{id}/detail/nilaitryout', 'AdminController@nilaiDetailTryoutUpdate')->name('admin.nilai.detail.tryout.update');
  Route::delete('/nilai/{id}/nilaiharian/delete', 'AdminController@nilaiHarianDelete')->name('admin.nilai.harian.delete');
  Route::delete('/nilai/{id}/nilaitryout/delete', 'AdminController@nilaiTryoutDelete')->name('admin.nilai.tryout.delete');

  // SBMPTN
  Route::get('/nilai/{id}/add/sbmptn', 'AdminController@nilaiSbmAdd')->name('admin.sbmptn.add');
  Route::post('/nilai/{id}/add/sbmptn', 'AdminController@nilaiSbmAddPost')->name('admin.sbmptn.add.submit');
  Route::get('/nilai/{id}/detail/sbmptn', 'AdminController@nilaiDetailSbm')->name('admin.sbmptn.detail');
  Route::put('/nilai/{id}/detail/sbmptn', 'AdminController@nilaiDetailSbmUpdate')->name('admin.sbmptn.detail.update');
  Route::delete('/nilai/{id}/sbmptn/delete', 'AdminController@nilaiSbmDelete')->name('admin.sbmptn.delete');

  //resource keuangan
  Route::get('/keuangan', 'AdminController@keuanganGet')->name('admin.keuangan.get');
  Route::get('/keuangan/{id}/detail', 'AdminController@keuanganDetail')->name('admin.keuangan.detail');
  Route::get('/keuangan/{id}/add/lunas', 'AdminController@keuanganLunasAdd')->name('admin.keuangan.lunas.add');
  Route::post('/keuangan/{id}/add/lunas', 'AdminController@keuanganLunasAddPost')->name('admin.keuangan.lunas.add.submit');
  Route::get('/keuangan/{id}/add/cicil', 'AdminController@keuanganCicilAdd')->name('admin.keuangan.cicil.add');
  Route::post('/keuangan/{id}/add/cicil', 'AdminController@keuanganCicilAddPost')->name('admin.keuangan.cicil.add.submit');
  Route::get('/keuangan/{id}/buat/cicil', 'AdminController@keuanganCicilBuat')->name('admin.keuangan.cicil.buat');
  Route::post('/keuangan/{id}/buat/cicil', 'AdminController@keuanganCicilBuatPost')->name('admin.keuangan.cicil.buat.submit');
  Route::delete('/keuangan/{id}/cicil/delete', 'AdminController@keuanganCicilDelete')->name('admin.keuangan.cicil.delete');

  //resource program kelas
  Route::get('/program', 'AdminController@programGet')->name('admin.program.get');
  Route::get('/program/add', 'AdminController@programAdd')->name('admin.program.add');
  Route::post('/program/add', 'AdminController@programAddPost')->name('admin.program.add.submit');
  Route::get('/program/{id}', 'AdminController@programDetail')->name('admin.program.detail');\
  Route::put('/program/{id}', 'AdminController@programDetailUpdate')->name('admin.program.detail.update');
  Route::delete('/program/{id}', 'AdminController@programDelete')->name('admin.program.delete');

  //resource bukti pembayaran
  Route::get('/requestpembayaran', 'AdminController@requestGet')->name('admin.request.get');
  Route::get('/requestpembayaran/{id}', 'AdminController@requestDetail')->name('admin.request.detail');
  Route::delete('/requestpembayaran/{id}', 'AdminController@requestDelete')->name('admin.request.delete');
  Route::put('/requestpembayaran/{id}', 'AdminController@requestDetailUpdate')->name('admin.request.detail.update');

  // changelogs
  Route::get('/changelogs', 'AdminController@changelogs')->name('admin.changelogs');

});


// route for siswa

  Route::get('/', 'SiswaController@index')->name('siswa.dashboard');
  Route::get('/login', 'SiswaController@showLoginForm')->name('siswa.login');
  Route::post('/login', 'SiswaController@login')->name('siswa.login.submit');
  Route::post('/logout', 'SiswaController@logout')->name('siswa.logout');
  Route::middleware(['if-siswa'])->group(function(){
    Route::get('/login', 'SiswaController@showLoginForm')->name('siswa.login');
  });

  Route::get('/profile', 'SiswaController@getProfile')->name('siswa.get.profile');
  Route::put('/profile', 'SiswaController@postProfile')->name('siswa.get.profile.submit');
  Route::put('/profile/photo', 'SiswaController@siswaUploadPhoto')->name('siswa.upload.photo');
  Route::get('/nilai', 'SiswaController@getNilai')->name('siswa.get.nilai');
  Route::get('/keuangan', 'SiswaController@getKeuangan')->name('siswa.get.keuangan');
  Route::get('/keuangan/request', 'SiswaController@getRequest')->name('siswa.get.request');
  Route::post('/keuangan/request', 'SiswaController@postRequest')->name('siswa.get.request.submit');
  Route::get('/jadwal', 'SiswaController@getJadwal')->name('siswa.get.jadwal');
  Route::get('/jadwal/print', 'SiswaController@jadwalPrint')->name('siswa.jadwal.print');
