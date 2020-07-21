<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SuperAdmin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => 'superadmin',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('superadmin'),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'last_login' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
    ];
});

$factory->define(App\Models\Siswa::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id_siswa' => $faker->numberBetween($min = 100, $max = 1000),
        'username' => $faker->numberBetween($min = 100000, $max = 900000),
        'nama_lengkap' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('super'),
        'alamat' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
        'kelas' => $faker->numberBetween($min = 1, $max = 12),
        'kat_kelas' => $faker->randomElement($array = array (1,2,3,4)),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'cita_cita' => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tahun_ajaran' => $faker->year($max = 'now'),
        'last_login' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
        'gender' => $faker->randomElement($array = array ('L','P')),
        'id_kelas' => function () {
            return factory(App\Models\Kelas::class)->create()->id_kelas;
        },
    ];
});

$factory->define(App\Models\NilaiTryout::class, function (Faker\Generator $faker) {

    return [
      'id_siswa' => function () {
          return factory(App\Models\Siswa::class)->create()->id_siswa;
      },
      'tahun_ajaran' => $faker->year($max = 'now'),
      'nama' => 'Tryout ' . $faker->randomElement($array = array ('1','2','3','4')),
    ];
});
$factory->define(App\Models\NilaiHarian::class, function (Faker\Generator $faker) {

    return [
      'id_siswa' => function () {
          return factory(App\Models\Siswa::class)->create()->id_siswa;
      },
      'tahun_ajaran' => $faker->year($max = 'now'),
      'nama' => $faker->realText($maxNbChars = 10, $indexSize = 1),
    ];
});

$factory->define(App\Models\Keuangan::class, function (Faker\Generator $faker) {

    return [
        'id_siswa' => function () {
            return factory(App\Models\Siswa::class)->create()->id_siswa;
        },
        'status_bayar' => $faker->numberBetween($min = 0, $max = 1),
        'tanggal_bayar' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'cicilan_ke' => $faker->numberBetween($min = 0, $max = 20),
        'cicilan_max' => $faker->numberBetween($min = 10, $max = 20),
        'id_kelas' => function () {
            return factory(App\Models\Kelas::class)->create()->id_kelas;
        },
        'total_biaya' => $faker->numberBetween($min = 1000000, $max = 10000000),
        'tambahan_biaya' => '150000',
        'jumlah_dibayar' => $faker->numberBetween($min = 1000000, $max = 10000000),
    ];
});

$factory->define(App\Models\Kelas::class, function (Faker\Generator $faker) {

    return [
        'nama_kelas' => $faker->word . ' class',
        'tingkatan_kelas' => $faker->numberBetween($min = 1, $max = 12),
        'biaya' => $faker->numberBetween($min = 1000000, $max = 10000000),
        'harga_angsuran' => $faker->numberBetween($min = 1000000, $max = 10000000),
    ];
});

$factory->define(App\Models\BuktiPembayaran::class, function (Faker\Generator $faker) {

    return [
        'id_siswa' => function () {
            return factory(App\Models\Siswa::class)->create()->id_siswa;
        },
        'cicilan_ke' => $faker->numberBetween($min = 0, $max = 20),
        'foto_bukti_bayar' => $faker->imageUrl($width = 640, $height = 480),
        'tanggal_bayar' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'jumlah_dibayar' => $faker->numberBetween($min = 100000, $max = 1000000),
    ];
});

$factory->define(App\Models\JadwalBimbel::class, function (Faker\Generator $faker) {

    return [
        'id_siswa' => function () {
            return factory(App\Models\Siswa::class)->create()->id_siswa;
        },
        'id_kelas_bimbel' => function () {
            return factory(App\Models\KelasBimbel::class)->create()->id_kelas_bimbel;
        },
    ];
});

$factory->define(App\Models\KelasBimbel::class, function (Faker\Generator $faker) {

    return [
        'nama_kelas' => $faker->numberBetween($min = 1, $max = 12) . ' ' . $faker->randomElement($array = array ('IPA','IPS','MTK')) . ' ' . $faker->randomDigitNotNull,
        'hari' => $faker->dayOfWeek($max = 'now'),
        'mulai' => $faker->time($format = 'H:i', $max = 'now'),
        'selesai' => $faker->time($format = 'H:i', $max = 'now'),
        'maks_siswa' => 20,
    ];
});
