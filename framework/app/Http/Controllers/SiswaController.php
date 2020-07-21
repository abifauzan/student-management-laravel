<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Siswa;
use App\Models\Keuangan;
use App\Models\BuktiPembayaran;
use App\Models\JadwalBimbel;

class SiswaController extends Controller
{
  public function __construct()
  {
      $this->middleware('siswa', ['except' => ['showLoginForm','login']]);
  }

  public function index() {
    return view('siswa.home');
  }

  public function showLoginForm() {
    return view('siswa.login');
  }

  public function login(Request $request) {
    //return dd($request->all());
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required|min:4',
    ]);

    if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
      return redirect()->route('siswa.dashboard');
    }
    return redirect()->back()
            ->withInput($request->only(['username']))
            ->with('message', 'NIS Siswa or Password doesn\'t matched');
  }

  public function logout() {
    // get current user
    Auth::logout();

    return redirect()->route('siswa.login');
  }

  public function getNilai() {
    $siswa = Siswa::where('username', Auth::user()->username)->with(['nilaiTryout','nilaiHarian'])->first();
    return view('siswa.nilai',compact('siswa'));
  }

  public function getKeuangan() {
    $keuangan = Keuangan::where('id_siswa', Auth::user()->id_siswa)->with(['siswa','kelas'])->get();
    $getCount = 0;
    if (count($keuangan)) {
      $getCount = 1;
      $total = 0;
      foreach ($keuangan as $get) {
        $total += $get->jumlah_dibayar;
      }
      $total_pembayaran = intval($keuangan[0]->total_biaya) + intval($keuangan[0]->tambahan_biaya);
      $sisa_pembayaran = $total_pembayaran - $total;

      if($keuangan[0]->status_bayar == 0) {
        $get_sisa_angsuran = Keuangan::whereIdSiswa(Auth::user()->id_siswa)
                                        ->whereStatusBayar('0')
                                        ->orderBy('id_keuangan','desc')
                                        ->with(['siswa','kelas'])
                                        ->first();
        $sisa_angsuran = $get_sisa_angsuran->cicilan_max - substr($get_sisa_angsuran->cicilan_ke, -2);

        return view('siswa.keuangan',compact('keuangan', 'get_sisa_angsuran','sisa_angsuran','sisa_pembayaran','getCount'));
      }

      return view('siswa.keuangan',compact('keuangan','sisa_pembayaran','getCount'));
    } else {
      return view('siswa.keuangan', compact('getCount'));
    }


  }

  public function getRequest() {
    return view('siswa.keuangan-request');
  }

  public function postRequest(Request $request) {
    $this->validate($request, [
      'cicilan_ke' => 'required',
      'tanggal_bayar' => 'required',
      'jumlah_dibayar' => 'required',

    ]);
    //return $request->all();
    $file = $request->file('bukti_bayar');

    if($file) {
        $imageName = $file->getClientOriginalName();
        $file->move('images/bukti_bayar', $imageName);
        $i = new BuktiPembayaran;
        $i->id_siswa = Auth::user()->id_siswa;
        $i->cicilan_ke = $request->cicilan_ke;
        $i->foto_bukti_bayar = $imageName;
        $i->jumlah_dibayar = $request->jumlah_dibayar;
        $i->tanggal_bayar = $request->tanggal_bayar;
        $i->isRead = 0;
        $i->save();
    } else {
      $i = new BuktiPembayaran;
      $i->id_siswa = Auth::user()->id_siswa;
      $i->cicilan_ke = $request->cicilan_ke;
      $i->jumlah_dibayar = $request->jumlah_dibayar;
      $i->tanggal_bayar = $request->tanggal_bayar;
      $i->isRead = 0;
      $i->save();
    }


    return redirect()
            ->back()
            ->with('message', 'Informasi berhasil masuk, silahkan tunggu konfirmasi dari admin');

  }

  public function getJadwal() {
    $jadwal = JadwalBimbel::whereIdSiswa(Auth::user()->id_siswa)->with(['siswa', 'kelasBimbel'])->get();
    $getCount = 0;
    if (count($jadwal)) {
      $getCount = 1;
      $getJadwalToday = 0;
      foreach ($jadwal as $key) {
        if ($key->kelasBimbel->hari == date('l')) {
          $getJadwalToday++;
        }
      }
      return view('siswa.jadwal', compact('jadwal','getJadwalToday', 'getCount'));

    } else {
      return view('siswa.jadwal', compact('getCount'));
    }

  }

  public function jadwalPrint() {
    $jadwal = JadwalBimbel::whereIdSiswa(Auth::user()->id_siswa)->with(['siswa'])->get();
    return view('siswa.jadwal-print',compact('jadwal'));
  }

  public function getProfile() {
    return view('siswa.profile');
  }

  public function postProfile(Request $request) {
    $siswa = Siswa::find($request->id);

    $siswa->nama_lengkap = $request->nama_lengkap;
    $siswa->email = $request->email;
    $siswa->alamat = $request->alamat;
    $siswa->phone = $request->telephone;
    $siswa->tempat_lahir = $request->tempat_lahir;
    $siswa->tanggal_lahir = $request->tanggal_lahir;
    $siswa->cita_cita = $request->cita_cita;

    $siswa->save();

    return redirect()->back()->with('message','Profile berhasil di update');
  }

  public function siswaUploadPhoto(Request $request) {

    $file = $request->file('foto');
    if($file) {
        $siswa = Siswa::find($request->id);

        $file_path = $siswa->photo;
        $filename = public_path().'/images/siswa/avatar/'.$file_path;
        \File::delete($filename);

        $imageName = $file->getClientOriginalName();
        $file->move('images/siswa/avatar', $imageName);

        $siswa->photo = $imageName;
        $siswa->save();
    }
    return redirect()->back()->with('messagePhoto','Foto berhasil di update');
  }


}
