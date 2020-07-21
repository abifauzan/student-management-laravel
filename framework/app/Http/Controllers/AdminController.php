<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SuperAdmin;
use App\Models\Siswa;
use App\Models\KelasBimbel;
use App\Models\JadwalBimbel;
use App\Models\NilaiHarian;
use App\Models\NilaiTryout;
use App\Models\NilaiSbmptn;
use App\Models\Keuangan;
use App\Models\Kelas;
use App\Models\BuktiPembayaran;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin', ['except' => ['showLoginForm','login']]);
  }

  public function index() {
    $aa = BuktiPembayaran::where('isRead', 0)->get();
    $bb = Kelas::all();
    return view('admin.home', compact('aa','bb'));
  }

  public function profile() {
    $i = SuperAdmin::where('username', Auth::guard('admin')->user()->username)->first();
    return view('admin.profile', compact('i'));
  }

  public function profileUpdate(Request $request) {
    $i = SuperAdmin::find($request->id);
    $i->username = $request->username;
    $i->email = $request->email;

    $i->save();

    return redirect()->route('admin.profile')->with('message', 'Profile berhasil di update');

  }

  public function profileEditFoto(Request $request) {
    $file = $request->file('foto');
    if($file) {
        $i = SuperAdmin::find($request->id);

        $file_path = $i->photo;
        $filename = public_path().'/images/admin/avatar/'.$file_path;
        \File::delete($filename);


        $imageName = $file->getClientOriginalName();
        $file->move('images/admin/avatar', $imageName);

        $i->photo = $imageName;
        $i->save();
    }
    return redirect()->route('admin.profile')->with('messagePhoto','Foto berhasil di update');

  }

  public function adminChangePassword(Request $request) {
    $i = SuperAdmin::find($request->id);
    $check_old = $i->password;
    $new_password = $request->password;
    $password_safe = \Hash::make($new_password);
    $c_password = $request->c_password;

    if (\Hash::check($request->current_password, $check_old)) {
        if ($new_password == $c_password) {
          $i->password = $password_safe;
          $i->save();

          return redirect()->back()->with('messagePassword', 'Password berhasil di update');

        } else {
          return redirect()->back()->with('messagePassNotMatch', 'Maaf, password tidak cocok');
        }
    } else {
      return redirect()->back()->with('messagePassIncorrect', 'Maaf, Password tidak cocok dengan database');
    }
  }

  public function showLoginForm() {
    return view('admin.login');
  }

  public function login(Request $request) {
    //return dd($request->all());
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required|min:4',
    ]);

    if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
      return redirect()->route('admin.dashboard');
    }
    return redirect()->back()
            ->withInput($request->only(['username']))
            ->with('message', 'Username or Password doesn\'t matched');
  }

  public function logout() {
    Auth::guard('admin')->logout();

    return redirect()->route('admin.login');
  }

  // siswa Controller

  public function siswaGet() {
    $siswas = Siswa::with('kelas')->get();

    return view('admin.siswa', compact('siswas'));
  }

  public function siswaAdd() {
    $i = Kelas::all();
    $a = KelasBimbel::selectRaw('count(*) AS total, nama_kelas')->groupBy('nama_kelas')->orderBy('total', 'DESC')->get();
    return view('admin.siswa-add', compact('i', 'a'));
  }

  public function siswaAddPost(Request $request) {
    $file = $request->file('foto');
    $id_siswa = rand(10,1000);
    if($file) {
      $imageName = $file->getClientOriginalName();
      $file->move('images/siswa/avatar', $imageName);
      $i = new Siswa;
      $i->id_siswa = $id_siswa;
      $i->username = $request->nis;
      $i->nama_lengkap = $request->nama_lengkap;
      $i->email = $request->email;
      $i->password = \Hash::make($request->password);
      $i->alamat = $request->alamat;
      $i->phone = $request->phone;
      $i->kelas = $request->kelas;
      $i->photo = $imageName;
      $i->cita_cita = $request->cita_cita;
      $i->tempat_lahir = $request->tempat_lahir;
      $i->tanggal_lahir = $request->tanggal_lahir;
      $i->tahun_ajaran = $request->tahun_ajaran;
      $i->gender = $request->jenis_kelamin;
      $i->id_kelas = $request->program_kelas;
      $i->save();
    } else {
      $i = new Siswa;
      $i->id_siswa = rand(10,1000);
      $i->username = $request->nis;
      $i->nama_lengkap = $request->nama_lengkap;
      $i->email = $request->email;
      $i->password = \Hash::make($request->password);
      $i->alamat = $request->alamat;
      $i->phone = $request->phone;
      $i->kelas = $request->kelas;
      $i->photo = $imageName;
      $i->cita_cita = $request->cita_cita;
      $i->tempat_lahir = $request->tempat_lahir;
      $i->tanggal_lahir = $request->tanggal_lahir;
      $i->tahun_ajaran = $request->tahun_ajaran;
      $i->gender = $request->jenis_kelamin;
      $i->id_kelas = $request->program_kelas;
      $i->save();
    }
    

    if (isset($request->jadwal) || $request->jadwal != NULL) {

      $a = KelasBimbel::where('nama_kelas', $request->jadwal)->get();
      for ($b=0; $b < count($a); $b++) { 
        $c = new JadwalBimbel;
        $c->id_siswa = $id_siswa;
        $c->id_kelas_bimbel = $a[$b]->id_kelas_bimbel;
        $c->save();
        
      }
    } 
      
    return redirect()->route('admin.siswa.get')->with('message', 'Siswa Berhasil Ditambahkan');

  }

  public function siswaDetail($id) {
    $siswa = Siswa::find($id);
    $i = Kelas::all();
    $a = KelasBimbel::selectRaw('count(*) AS total, nama_kelas')->groupBy('nama_kelas')->orderBy('total', 'ASC')->get();
    $c = JadwalBimbel::where('id_siswa', $id)->get();
    return view('admin.siswa-detail', compact('siswa','i','a', 'c'));
  }

  public function siswaDetailPost(Request $request, $id) {
    $siswa = Siswa::find($id);

    $siswa->username = $request->nis;
    $siswa->nama_lengkap = $request->nama_lengkap;
    $siswa->email = $request->email;
    $siswa->alamat = $request->alamat;
    $siswa->phone = $request->telephone;
    $siswa->kelas = $request->kelas;
    $siswa->tempat_lahir = $request->tempat_lahir;
    $siswa->tanggal_lahir = $request->tanggal_lahir;
    $siswa->tahun_ajaran = $request->tahun_ajaran;
    $siswa->cita_cita = $request->cita_cita;
    $siswa->id_kelas = $request->program_kelas;

    $siswa->save();

    if (isset($request->jadwal) || $request->jadwal != NULL) {

      $a = KelasBimbel::where('nama_kelas', $request->jadwal)->get();

      $j = JadwalBimbel::where('id_siswa', $id)->get();

      if (count($j)) {
        for ($i=0; $i < count($j); $i++) { 

          $j[$i]->delete();
          
        }
      }
        

      for ($b=0; $b < count($a); $b++) { 
        $c = new JadwalBimbel;
        $c->id_siswa = $siswa->id_siswa;
        $c->id_kelas_bimbel = $a[$b]->id_kelas_bimbel;
        $c->save();
        
      }

    } 

    return redirect()->back()->with('message','Profile berhasil di update');
  }

  public function siswaDelete($id) {
    $siswa = Siswa::find($id);

    $file_path = $siswa->photo;
    $filename = public_path().'/images/siswa/avatar/'.$file_path;
    \File::delete($filename);

    $siswa->delete();

    return redirect()->back()->with('message', 'Siswa telah dihapus');
  }

  public function siswaEditFotoPost(Request $request, $id) {
    $file = $request->file('foto');
    if($file) {
        $siswa = Siswa::find($id);

        $file_path = $siswa->photo;
        $filename = public_path().'/images/siswa/avatar/'.$file_path;
        \File::delete($filename);


        $imageName = $file->getClientOriginalName();
        $file->move('images/siswa/avatar', $imageName);

        $siswa->photo = $imageName;
        $siswa->save();
    }
    return redirect()->back()->with('messagePhoto','Foto siswa berhasil di update');
  }

  public function siswaChangePassword(Request $request, $id) {
    if($request->password == $request->c_password) {
      $siswa = Siswa::find($id);
      $siswa->password = \Hash::make($request->password);
      $siswa->save();

      return redirect()->back()->with('messagePassword', 'Password siswa berhasil di update');
    }
    return redirect()->back()->with('messagePasswordError', 'Gagal Update password');

  }

  public function siswaNaikKelas(Request $request, $id) {
    $i = Siswa::find($id);
    $i->kelas = $request->naik_kelas;
    $i->isLunas = 0;
    $i->isJadwal = 0;
    $i->save();

    $a = Keuangan::where('id_siswa', $id)->get();
    for ($b=0; $b < count($a); $b++) {
      $c = Keuangan::where('id_siswa', $id)->delete();
    }

    $d = JadwalBimbel::where('id_siswa', $id)->get();
    for ($e=0; $e < count($d); $e++) {
      $f = JadwalBimbel::where('id_siswa', $id)->delete();
    }

    return redirect()->route('admin.siswa.get')->with('message', 'Berhasil update kelas siswa');

  }


  // kelas bimbel controller
  public function kelasGet() {
    $i = KelasBimbel::with('jadwal')->get();

    return view('admin.kelas', compact('i'));
  }

  public function kelasAdd() {
    return view('admin.kelas-add');
  }

  public function kelasAddPost(Request $request) {

    for ($a=0; $a < count($request->hari); $a++) { 
      $i = new KelasBimbel;
      $i->nama_kelas = $request->nama_kelas;
      $i->hari = $request->hari[$a];
      $i->mulai = $request->mulai;
      $i->selesai = $request->selesai;
      $i->maks_siswa = $request->maks_ruang;
      $i->save();
    }
      

    return redirect()->route('admin.kelas.get')->with('message','Kelas berhasil dibuat');

  }

  public function kelasDetail($id) {
    $i = KelasBimbel::find($id);
    return view('admin.kelas-edit', compact('i','id'));
  }

  public function kelasUpdate(Request $request, $id) {
    $i = KelasBimbel::find($id);
    $i->nama_kelas = $request->nama_kelas;
    $i->hari = $request->hari;
    $i->mulai = $request->mulai;
    $i->selesai = $request->selesai;
    $i->maks_siswa = $request->maks_ruang;
    $i->save();

    return redirect()->route('admin.kelas.get')->with('message','Kelas berhasil di update');
  }

  public function kelasDelete(Request $request, $id) {
    $i = KelasBimbel::where('nama_kelas',$request->nama_kelas)->get();
    for ($a=0; $a < count($i); $a++) { 
      $i[$a]->delete();
    }

    return redirect()->route('admin.kelas.get')->with('message', 'Kelas berhasil dihapus');

  }

  public function bukaKelas($id) {
    $i = KelasBimbel::where('id_kelas_bimbel', $id)->with('jadwal')->get();
    $siswas = Siswa::all();
    return view('admin.kelas-buka-kelas',compact('i', 'siswas', 'id'));
  }

  public function bukaKelasPost(Request $request, $id) {
    $d = KelasBimbel::where('nama_kelas', $request->nama_kelas)->get();

    

    for ($i=0; $i < count($request->id_siswa); $i++) { 
        for ($c=0; $c < count($d); $c++) { 
         
          $a = new JadwalBimbel;
          $a->id_siswa = $request->id_siswa[$i];
          $a->id_kelas_bimbel = $d[$c]->id_kelas_bimbel;
          $a->save();

          $b = Siswa::find($request->id_siswa[$i]);
          $b->isJadwal = 1;
          $b->save();

      }

      

    }
      
    
    return redirect()->route('admin.kelas.get')->with('message','Berhasil update kelas');

  }

  public function editKelas($id) {
    $i = KelasBimbel::where('id_kelas_bimbel', $id)->with('jadwal')->get();

    return view('admin.kelas-edit-kelas',compact('i', 'id'));
  }

  public function editKelasPost(Request $request, $id) {
    $i = JadwalBimbel::where('id_siswa',$id)
                        ->where('id_jadwal_bimbel', $request->id_jadwal_bimbel)
                        ->delete();

    $b = JadwalBimbel::where('id_siswa', $id)->count();
    if ($b == 0) {
      $a = Siswa::find($id);
      $a->isJadwal = 0;
      $a->save();
    }


    return redirect()->route('admin.kelas.get')->with('message', 'Berhasil hapus siswa dari kelas');
  }


  // nilai harian & nilai tryout Controllers
  public function nilaiGet() {
    $siswas = Siswa::with('nilaiHarian','nilaiTryout')->get();
    return view('admin.nilai', compact('siswas'));
  }

  public function nilaiDetail($id) {
    $i = Siswa::where('id_siswa',$id)->with('nilaiHarian','nilaiTryout','nilaiSbmptn')->first();
    return view('admin.nilai-detail', compact('i'));
  }

  public function nilaiHarianAdd($id) {
    return view('admin.nilai-harian-add', compact('id'));
  }

  public function nilaiHarianAddPost(Request $request, $id) {

    $i = new nilaiHarian;
    $i->id_siswa = $id;
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->nilai_mtk = $request->nilai_mtk;
    $i->nilai_ipa = $request->nilai_ipa;
    $i->nilai_ips = $request->nilai_ips;
    $i->nilai_bindo = $request->nilai_bindo;
    $i->nilai_english = $request->nilai_english;
    $i->nilai_fisika = $request->nilai_fisika;
    $i->nilai_biologi = $request->nilai_biologi;
    $i->nilai_kimia = $request->nilai_kimia;
    $i->nilai_geografi = $request->nilai_geografi;
    $i->nilai_ekonomi = $request->nilai_ekonomi;
    $i->nilai_sejarah = $request->nilai_sejarah;
    $i->nilai_sosiologi = $request->nilai_sosiologi;
    $i->save();

    return redirect()->route('admin.nilai.detail', $id)->with('messageHarian', 'Nilai harian berhasil dibuat');

  }

  public function nilaiTryoutAdd($id) {
    return view('admin.nilai-tryout-add', compact('id'));
  }

  public function nilaiSbmAdd($id) {
    return view('admin.nilai-sbm-add', compact('id'));
  }

  public function nilaiTryoutAddPost(Request $request, $id) {

    $i = new NilaiTryout;
    $i->id_siswa = $id;
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->nilai_mtk = $request->nilai_mtk;
    $i->nilai_ipa = $request->nilai_ipa;
    $i->nilai_ips = $request->nilai_ips;
    $i->nilai_bindo = $request->nilai_bindo;
    $i->nilai_english = $request->nilai_english;
    $i->nilai_fisika = $request->nilai_fisika;
    $i->nilai_biologi = $request->nilai_biologi;
    $i->nilai_kimia = $request->nilai_kimia;
    $i->nilai_geografi = $request->nilai_geografi;
    $i->nilai_ekonomi = $request->nilai_ekonomi;
    $i->nilai_sejarah = $request->nilai_sejarah;
    $i->nilai_sosiologi = $request->nilai_sosiologi;
    $i->save();

    return redirect()->route('admin.nilai.detail', $id)->with('messageTryout', 'Nilai tryout berhasil dibuat');

  }

  public function nilaiSbmAddPost(Request $request, $id) {

    $i = new NilaiSbmptn;
    $i->id_siswa = $id;
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->total_benar = $request->jumlah_benar;
    $i->total_salah = $request->jumlah_salah;
    $i->save();

    return redirect()->route('admin.nilai.detail', $id)->with('messageSbm', 'Nilai sbmptn berhasil dibuat');

  }

  public function nilaiDetailHarian($id) {
    $i = NilaiHarian::find($id);

    return view('admin.nilai-harian-edit', compact('i','id'));
  }

  public function nilaiDetailTryout($id) {
    $i = NilaiTryout::find($id);

    return view('admin.nilai-tryout-edit', compact('i','id'));
  }

  public function nilaiDetailSbm($id) {
    $i = NilaiSbmptn::find($id);

    return view('admin.nilai-sbm-edit', compact('i','id'));
  }

  public function nilaiDetailHarianUpdate(Request $request, $id) {

    $i = NilaiHarian::find($id);
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->nilai_mtk = $request->nilai_mtk;
    $i->nilai_ipa = $request->nilai_ipa;
    $i->nilai_ips = $request->nilai_ips;
    $i->nilai_bindo = $request->nilai_bindo;
    $i->nilai_english = $request->nilai_english;
    $i->nilai_fisika = $request->nilai_fisika;
    $i->nilai_biologi = $request->nilai_biologi;
    $i->nilai_kimia = $request->nilai_kimia;
    $i->nilai_geografi = $request->nilai_geografi;
    $i->nilai_ekonomi = $request->nilai_ekonomi;
    $i->nilai_sejarah = $request->nilai_sejarah;
    $i->nilai_sosiologi = $request->nilai_sosiologi;
    $i->save();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai harian dengan Nama: ' . $i->siswa->nama_lengkap . ' berhasil diupdate');

  }

  public function nilaiDetailTryoutUpdate(Request $request, $id) {

    $i = NilaiTryout::find($id);
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->nilai_mtk = $request->nilai_mtk;
    $i->nilai_ipa = $request->nilai_ipa;
    $i->nilai_ips = $request->nilai_ips;
    $i->nilai_bindo = $request->nilai_bindo;
    $i->nilai_english = $request->nilai_english;
    $i->nilai_fisika = $request->nilai_fisika;
    $i->nilai_biologi = $request->nilai_biologi;
    $i->nilai_kimia = $request->nilai_kimia;
    $i->nilai_geografi = $request->nilai_geografi;
    $i->nilai_ekonomi = $request->nilai_ekonomi;
    $i->nilai_sejarah = $request->nilai_sejarah;
    $i->nilai_sosiologi = $request->nilai_sosiologi;
    $i->save();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai tryout dengan Nama: ' . $i->siswa->nama_lengkap . ' berhasil diupdate');

  }

  public function nilaiDetailSbmUpdate(Request $request, $id) {

    $i = NilaiSbmptn::find($id);
    $i->nama = $request->ket;
    $i->tahun_ajaran = $request->tahun_ajaran;
    $i->total_benar = $request->jumlah_benar;
    $i->total_salah = $request->jumlah_salah;
    $i->save();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai tryout dengan Nama: ' . $i->siswa->nama_lengkap . ' berhasil diupdate');

  }

  public function nilaiHarianDelete($id) {
    $i = NilaiHarian::find($id)->delete();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai harian berhasil dihapus');

  }

  public function nilaiTryoutDelete($id) {
    $i = NilaiTryout::find($id)->delete();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai tryout berhasil dihapus');

  }

  public function nilaiSbmDelete($id) {
    $i = NilaiSbmptn::find($id)->delete();

    return redirect()->route('admin.nilai.get')->with('message', 'Nilai sbmptn berhasil dihapus');

  }

  // keuangan Controllers
  public function keuanganGet() {
    $i = Siswa::with('keuanganSiswa')->get();
    return view('admin.keuangan', compact('i'));
  }

  public function keuanganDetail($id) {
    $i = Keuangan::where('id_siswa', $id)->with('siswa','kelas')->get();

    $total = 0;
    foreach ($i as $get) {
      $total += $get->jumlah_dibayar;
    }

    $total_pembayaran = intval($i[0]->total_biaya) + intval($i[0]->tambahan_biaya);
    $sisa_pembayaran = $total_pembayaran - $total;

    if($i[0]->status_bayar == 0) {
      $get_sisa_angsuran = Keuangan::whereIdSiswa($id)
                                      ->whereStatusBayar('0')
                                      ->orderBy('id_keuangan','desc')
                                      ->with(['siswa','kelas'])
                                      ->first();
      $sisa_angsuran = $get_sisa_angsuran->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2);

      return view('admin.keuangan-detail',compact('i', 'get_sisa_angsuran','sisa_angsuran','sisa_pembayaran'));
    }

    return view('admin.keuangan-detail', compact('i', 'sisa_pembayaran'));
  }

  public function keuanganLunasAdd($id) {
    $i = Siswa::where('id_siswa',$id)->with('keuanganSiswa','kelas')->first();

    if ($i->keuanganSiswa->count()) {
      $a = Keuangan::where('id_siswa', $id)->with('siswa')->first();
      if ($a->status_bayar == 0) {
        return redirect()->route('admin.keuangan.get')->with('messageError','Maaf, metode pembayaran untuk siswa dengan nama : ' . $a->siswa()->first()->nama_lengkap . ' adalah cicilan. Silahkan klik menu : Detail siswa -> Buka cicilan ');
      }

    }
    return view('admin.keuangan-lunas-add', compact('i', 'id'));

  }

  public function keuanganLunasAddPost(Request $request, $id) {
    $i = new Keuangan;
    $i->id_siswa = $request->id_siswa;
    $i->id_kelas = $request->id_kelas;
    $i->status_bayar = $request->status_bayar;
    $i->is_lunas = $request->is_lunas;
    $i->tanggal_bayar = $request->tanggal_bayar;
    $i->total_biaya = $request->total_biaya;
    $i->tambahan_biaya = $request->biaya_pendaftaran;
    $i->save();

    $a = Siswa::find($id);
    $a->isLunas = 1;
    $a->save();

    return redirect()->route('admin.keuangan.get')->with('message', 'Berhasil membuat keuangan lunas');

  }

  public function keuanganCicilAdd($id) {
    $i = Siswa::where('id_siswa',$id)->with('keuanganSiswa','kelas')->first();

    if ($i->keuanganSiswa->count()) {
      $a = Keuangan::where('id_siswa', $id)->with('siswa')->get();
      if ($a[0]->siswa()->count() >= 1) {
        return redirect()
            ->route('admin.keuangan.get')
            ->with('messageError','Maaf, metode pembayaran cicilan sudah dibuka untuk siswa dengan nama : ' . $a[0]->siswa()->first()->nama_lengkap . '. Silahkan klik menu : Detail siswa -> Buka cicilan ');
      }

    }
    return view('admin.keuangan-cicil-add', compact('i', 'id'));
  }

  public function keuanganCicilAddPost(Request $request, $id) {
    $i = new Keuangan;
    $i->id_siswa = $request->id_siswa;
    $i->status_bayar = $request->status_bayar;
    $i->id_kelas = $request->id_kelas;
    $i->is_lunas = $request->is_lunas;
    $i->tanggal_bayar = $request->tanggal_bayar;
    $i->cicilan_ke = $request->cicilan_ke;
    $i->cicilan_max = $request->cicilan_max;
    $i->total_biaya = $request->total_biaya;
    $i->tambahan_biaya = $request->biaya_pendaftaran;
    $i->jumlah_dibayar = $request->jumlah_dibayar;
    $i->keterangan = $request->ket;
    $i->save();

    return redirect()->route('admin.keuangan.get')->with('message', 'Berhasil membuat keuangan cicilan ');
  }

  public function keuanganCicilBuat($id) {
    $i = Keuangan::where('id_siswa', $id)->with('siswa', 'kelas')->get();

    $total = 0;
    foreach ($i as $get) {
      $total += $get->jumlah_dibayar;
    }

    $total_pembayaran = intval($i[0]->total_biaya) + intval($i[0]->tambahan_biaya);
    $sisa_pembayaran = $total_pembayaran - $total;

    $get_sisa_angsuran = Keuangan::whereIdSiswa($id)
                                    ->whereStatusBayar('0')
                                    ->orderBy('id_keuangan','desc')
                                    ->with(['siswa','kelas'])
                                    ->first();
    $sisa_angsuran = $get_sisa_angsuran->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2);

    return view('admin.keuangan-cicil-buat', compact('i','id', 'sisa_pembayaran', 'get_sisa_angsuran','sisa_angsuran'));
  }

  public function keuanganCicilBuatPost(Request $request, $id) {

    $a = new Keuangan;
    $a->id_siswa = $request->id_siswa;
    $a->status_bayar = $request->status_bayar;
    $a->id_kelas = $request->id_kelas;
    $a->is_lunas = $request->is_lunas;
    $a->tanggal_bayar = $request->tanggal_bayar;
    $a->cicilan_ke = $request->cicilan_ke;
    $a->cicilan_max = $request->cicilan_max;
    $a->total_biaya = $request->total_biaya;
    $a->tambahan_biaya = $request->biaya_pendaftaran;
    $a->jumlah_dibayar = $request->jumlah_dibayar;
    $a->keterangan = $request->ket;
    $a->save();


    $i = Keuangan::where('id_siswa', $id)->with('siswa','kelas')->get();

    $total = 0;
    foreach ($i as $get) {
      $total += $get->jumlah_dibayar;
    }

    $total_pembayaran = intval($i[0]->total_biaya) + intval($i[0]->tambahan_biaya);
    $sisa_pembayaran = $total_pembayaran - $total;


    $get_sisa_angsuran = Keuangan::whereIdSiswa($id)
                                    ->whereStatusBayar('0')
                                    ->orderBy('id_keuangan','desc')
                                    ->with(['siswa','kelas'])
                                    ->first();
    $sisa_angsuran = $get_sisa_angsuran->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2);

    if ($total >= $total_pembayaran) {
      echo "Update keuangan cicil menjadi lunas";

      for ($i=0; $i < count($i) ; $i++) {
        $updateKeuangan = Keuangan::where('id_siswa',$id)->update(['is_lunas'=> 1]);
      }
      $updateSiswa = Siswa::find($id);
      $updateSiswa->isLunas = 1;
      $updateSiswa->save();

      return redirect()->route('admin.keuangan.get')->with('message', 'Keuangan siswa sudah lunas');
    }

    return redirect()->route('admin.keuangan.get')->with('message', 'Berhasil membuat keuangan cicilan');

  }

  public function keuanganCicilDelete($id) {
    $i = Keuangan::find($id)->delete();

    return redirect()->route('admin.keuangan.get')->with('message', 'Data berhasil dihapus');
  }

  //kelas Controllers
  public function programGet() {
    $i = Kelas::all();
    return view('admin.program', compact('i'));
  }

  public function programAdd() {
    return view('admin.program-add');
  }

  public function programAddPost(Request $request) {
    $i = new Kelas;
    $i->nama_kelas = $request->nama_kelas;
    $i->tingkatan_kelas = $request->tingkatan_kelas;
    $i->biaya = $request->biaya;
    $i->harga_angsuran = $request->harga_angsuran;
    $i->save();

    return redirect()->route('admin.program.get')->with('message', 'Berhasil membuat program kelas');

  }

  public function programDetail($id) {
    $i = Kelas::find($id);
    return view('admin.program-edit', compact('i','id'));
  }

  public function programDetailUpdate(Request $request, $id) {
    $i = Kelas::find($id);
    $i->nama_kelas = $request->nama_kelas;
    $i->tingkatan_kelas = $request->tingkatan_kelas;
    $i->biaya = $request->biaya;
    $i->harga_angsuran = $request->harga_angsuran;
    $i->save();

    return redirect()->route('admin.program.get')->with('message', 'Berhasil update program kelas');

  }

  public function programDelete($id) {
    $i = Kelas::find($id)->delete();

    return redirect()->route('admin.program.get')->with('message', 'Berhasil hapus program kelas');

  }

  //kelas bimbel Controllers
  public function requestGet() {
    $i = BuktiPembayaran::where('isRead', 1)->get();
    $c = BuktiPembayaran::where('isRead', 0)->get();
    return view('admin.request', compact('i','c'));
  }

  public function requestDetail($id) {
    $a = BuktiPembayaran::find($id);

    return view('admin.request-detail', compact('a'));
  }
  public function requestDetailUpdate($id) {
    $i = BuktiPembayaran::find($id);
    $i->isRead = 1;
    $i->save();

    return redirect()->route('admin.request.get')->with('message', 'Berhasil update data');
  }

  public function requestDelete($id) {
    $i = BuktiPembayaran::find($id);

    $file_path = $i->foto_bukti_bayar;
    $filename = public_path().'/images/bukti_bayar/'.$file_path;
    \File::delete($filename);

    $i->delete();

    return redirect()->route('admin.request.get')->with('message', 'Berhasil hapus data');
  }

  public function changelogs() {
    return view('admin.changelog');
  }

}
