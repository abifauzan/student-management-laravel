<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraBimbelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // create table superadmin
      Schema::create('superadmin', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_superadmin');
          $table->string('username')->unique();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('photo');
          $table->tinyInteger('active')->default(1);
          $table->dateTime('last_login');
          $table->rememberToken();
          $table->timestamps();
      });

      // create table siswa
      Schema::create('siswa', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->integer('id_siswa')->unsigned()->primary();
          $table->string('username')->unique();
          $table->string('nama_lengkap');
          $table->string('email')->unique();
          $table->string('password');
          $table->text('alamat');
          $table->string('phone');
          $table->tinyInteger('kelas');
          $table->string('photo')->nullable();
          $table->tinyInteger('active')->default(1);
          $table->text('cita_cita');
          $table->string('tempat_lahir');
          $table->date('tanggal_lahir');
          $table->string('tahun_ajaran');
          $table->dateTime('last_login')->nullable();
          $table->string('gender',5);
          $table->tinyInteger('isJadwal')->default(0);
          $table->tinyInteger('isLunas')->default(0);
          $table->integer('id_kelas')->unsigned();
          $table->rememberToken();
          $table->timestamps();
      });

      // create table nilai_sbmptn
      Schema::create('nilai_sbmptn', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_nilai_sbmptn');
          $table->integer('id_siswa')->unsigned();
          $table->string('tahun_ajaran');
          $table->string('nama');
          $table->string('total_benar', 8, 2);
          $table->string('total_salah', 8, 2);
      });

      // create table nilai_tryout
      Schema::create('nilai_tryout', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_nilai_tryout');
          $table->integer('id_siswa')->unsigned();
          $table->string('tahun_ajaran');
          $table->string('nama');
          $table->float('nilai_mtk', 8, 2)->nullable();
          $table->float('nilai_ipa', 8, 2)->nullable();
          $table->float('nilai_ips', 8, 2)->nullable();
          $table->float('nilai_bindo', 8, 2)->nullable();
          $table->float('nilai_english', 8, 2)->nullable();
          $table->float('nilai_fisika', 8, 2)->nullable();
          $table->float('nilai_biologi', 8, 2)->nullable();
          $table->float('nilai_kimia', 8, 2)->nullable();
          $table->float('nilai_geografi', 8, 2)->nullable();
          $table->float('nilai_ekonomi', 8, 2)->nullable();
          $table->float('nilai_sejarah', 8, 2)->nullable();
          $table->float('nilai_sosiologi', 8, 2)->nullable();
      });

      // create table nilai_harian
      Schema::create('nilai_harian', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_nilai_harian');
          $table->integer('id_siswa')->unsigned();
          $table->string('nama');
          $table->string('tahun_ajaran');
          $table->float('nilai_mtk', 8, 2)->nullable();
          $table->float('nilai_ipa', 8, 2)->nullable();
          $table->float('nilai_ips', 8, 2)->nullable();
          $table->float('nilai_bindo', 8, 2)->nullable();
          $table->float('nilai_english', 8, 2)->nullable();
          $table->float('nilai_fisika', 8, 2)->nullable();
          $table->float('nilai_biologi', 8, 2)->nullable();
          $table->float('nilai_kimia', 8, 2)->nullable();
          $table->float('nilai_geografi', 8, 2)->nullable();
          $table->float('nilai_ekonomi', 8, 2)->nullable();
          $table->float('nilai_sejarah', 8, 2)->nullable();
          $table->float('nilai_sosiologi', 8, 2)->nullable();
      });

      // create table keuangan
      Schema::create('keuangan', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_keuangan');
          $table->integer('id_siswa')->unsigned();
          $table->tinyInteger('status_bayar');
          $table->tinyInteger('is_lunas')->default(0);
          $table->date('tanggal_bayar');
          $table->string('cicilan_ke')->nullable();
          $table->string('cicilan_max')->nullable();
          $table->integer('id_kelas')->unsigned();
          $table->string('total_biaya');
          $table->string('tambahan_biaya')->nullable();
          $table->string('jumlah_dibayar')->nullable();
          $table->string('keterangan')->nullable();
          $table->timestamps();
      });

      // create table kelas
      Schema::create('kelas', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_kelas');
          $table->string('nama_kelas');
          $table->tinyInteger('tingkatan_kelas');
          $table->string('biaya');
          $table->string('harga_angsuran');
      });

      // create table bukti_pembayaran
      Schema::create('bukti_pembayaran', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_bukti_pembayaran');
          $table->integer('id_siswa')->unsigned();
          $table->tinyInteger('cicilan_ke');
          $table->string('foto_bukti_bayar')->nullable();
          $table->string('jumlah_dibayar');
          $table->date('tanggal_bayar');
          $table->tinyInteger('isRead')->default(0);
          $table->timestamps();
      });

      // create table jadwal_bimbel
      Schema::create('jadwal_bimbel', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id_jadwal_bimbel');
        $table->integer('id_siswa')->unsigned();
        $table->integer('id_kelas_bimbel')->unsigned();
      });

      // create table kelas_bimbel
      Schema::create('kelas_bimbel', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_kelas_bimbel');
          $table->string('nama_kelas');
          $table->string('hari');
          $table->string('mulai');
          $table->string('selesai');
          $table->string('maks_siswa');
      });

      // define the foreign key
      Schema::table('siswa', function($table) {
        $table->foreign('id_kelas')
              ->references('id_kelas')->on('kelas')
              ->onDelete('cascade')
              ->onUpdate('cascade');
       });

       Schema::table('nilai_sbmptn', function($table) {
         $table->foreign('id_siswa')
               ->references('id_siswa')->on('siswa')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });

       Schema::table('nilai_tryout', function($table) {
         $table->foreign('id_siswa')
               ->references('id_siswa')->on('siswa')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });

        Schema::table('nilai_harian', function($table) {
          $table->foreign('id_siswa')
                ->references('id_siswa')->on('siswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
         });

       Schema::table('keuangan', function($table) {
         $table->foreign('id_siswa')
               ->references('id_siswa')->on('siswa')
               ->onDelete('cascade')
               ->onUpdate('cascade');
         $table->foreign('id_kelas')
               ->references('id_kelas')->on('kelas')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });

        Schema::table('bukti_pembayaran', function($table) {
          $table->foreign('id_siswa')
                ->references('id_siswa')->on('siswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
         });

         Schema::table('jadwal_bimbel', function($table) {
           $table->foreign('id_siswa')
                 ->references('id_siswa')->on('siswa')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
           $table->foreign('id_kelas_bimbel')
                 ->references('id_kelas_bimbel')->on('kelas_bimbel')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('siswa');
      Schema::dropIfExists('nilai_tryout');
      Schema::dropIfExists('nilai_harian');
      Schema::dropIfExists('keuangan');
      Schema::dropIfExists('kelas');
      Schema::dropIfExists('bukti_pembayaran');
      Schema::dropIfExists('superadmin');
      Schema::dropIfExists('jadwal_bimbel');
      Schema::dropIfExists('kelas_bimbel');
    }
}
