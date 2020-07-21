<?php

use Illuminate\Database\Seeder;
use App\Models\SuperAdmin;
use App\Models\Siswa;
use App\Models\NilaiSiswa;
use App\Models\Keuangan;
use App\Models\Kelas;
use App\Models\BuktiPembayaran;

class ExtraBimbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // seeding table
      // DB::table('siswa')->delete();
      // DB::table('nilai_tryout')->delete();
      // DB::table('nilai_harian')->delete();
      // DB::table('keuangan')->delete();
      // DB::table('kelas')->delete();
      // DB::table('bukti_pembayaran')->delete();
      // DB::table('jadwal_bimbel')->delete();
      // DB::table('kelas_bimbel')->delete();

      $admin = factory(App\Models\SuperAdmin::class)
                  ->create();
      // $kelas = factory(App\Models\Kelas::class, 2)
      //             ->create();
      // $keuangan = factory(App\Models\Keuangan::class, 2)
      //             ->create();
      // $buktiPembayaran = factory(App\Models\BuktiPembayaran::class, 2)
      //             ->create();
      // $jadwal_bimbel = factory(App\Models\JadwalBimbel::class, 2)
      //             ->create();
      // $kelas_bimbel = factory(App\Models\KelasBimbel::class, 6)
      //             ->create();
    }
}
