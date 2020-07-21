<?php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function evenOrOdd($number) {

      if(intval($number) % 2 == 0) {
        return 'Genap';
      } else {
        return 'Gasal';
      }
    }

    public static function gradeNilai($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l) {
      $divided = 0;

      if ($a !== null) {
        $divided = $divided + 1;
      }

      if ($b !== null) {
        $divided = $divided + 1;
      }

      if ($c !== null) {
        $divided = $divided + 1;
      }

      if ($d !== null) {
        $divided = $divided + 1;
      }

      if ($e !== null) {
        $divided = $divided + 1;
      }

      if ($f !== null) {
        $divided = $divided + 1;
      }

      if ($g !== null) {
        $divided = $divided + 1;
      }

      if ($h !== null) {
        $divided = $divided + 1;
      }

      if ($i !== null) {
        $divided = $divided + 1;
      }

      if ($j !== null) {
        $divided = $divided + 1;
      }

      if ($k !== null) {
        $divided = $divided + 1;
      }

      if ($l !== null) {
        $divided = $divided + 1;
      }

      //$result = ( intval($a)+intval($b)+intval($c)+intval($d)+intval($e)+intval($f)+intval($g)+intval($h)+intval($i)+intval($j)+intval($k)+intval($l) )/$divided;
      $result = ( $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l )/$divided;
      $resultt = number_format($result);

      if(round($resultt) >= 85) {
        $grade = 'A';
      } elseif(round($resultt) >= 70 && round($resultt) <= 84) {
        $grade = 'B';
      } elseif(round($resultt) >= 60 && round($resultt) <= 69) {
        $grade = 'C';
      } elseif(round($resultt) >= 50 && round($resultt) <= 59) {
        $grade = 'D';
      } else $grade = 'E';

      return $grade;
    }

    public static function nilaiRataRataTryout($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l) {
      $divided = 10;

      $result = ( $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l ) / $divided;
      return number_format($result, 2);
    }

    public static function nilaiRataRata($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l) {

      $divided = 0;

      if ($a !== null) {
        $divided = $divided + 1;
      }

      if ($b !== null) {
        $divided = $divided + 1;
      }

      if ($c !== null) {
        $divided = $divided + 1;
      }

      if ($d !== null) {
        $divided = $divided + 1;
      }

      if ($e !== null) {
        $divided = $divided + 1;
      }

      if ($f !== null) {
        $divided = $divided + 1;
      }

      if ($g !== null) {
        $divided = $divided + 1;
      }

      if ($h !== null) {
        $divided = $divided + 1;
      }

      if ($i !== null) {
        $divided = $divided + 1;
      }

      if ($j !== null) {
        $divided = $divided + 1;
      }

      if ($k !== null) {
        $divided = $divided + 1;
      }

      if ($l !== null) {
        $divided = $divided + 1;
      }

      //$result = ( intval($a)+intval($b)+intval($c)+intval($d)+intval($e)+intval($f)+intval($g)+intval($h)+intval($i)+intval($j)+intval($k)+intval($l) )/$divided;
      $result = ( $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l )/$divided;

      //return intval($result);
      return number_format($result, 2);
    }

    public static function gradeSbmptn($benar,$salah) {

      $result = ( (($benar*4) + ($salah*(-1))) / 600 ) *100;

      //return intval($result);
      return number_format($result, 2);
    }


    public static function kelas($kelas) {
      if(intval($kelas) >= 10 && intval($kelas) <= 12) {
        $tingkatan = 'SMA';
      } elseif(intval($kelas) >= 7 && intval($kelas) <= 9) {
        $tingkatan = 'SMP';
      } elseif(intval($kelas) >= 1 && intval($kelas) <= 6) {
        $tingkatan = 'SD';
      }

      return $tingkatan;

    }

    public static function katKelas($kelas) {
      if(intval($kelas) == 4) {
        $tingkatan = 'SMA IPS';
      } elseif(intval($kelas) == 3) {
        $tingkatan = 'SMA IPA';
      } elseif(intval($kelas) == 2) {
        $tingkatan = 'SMP';
      } elseif(intval($kelas) == 1) {
        $tingkatan = 'SD';
      }

      return $tingkatan;

    }

    public static function setPrice($price) {
      $result = number_format($price,2,", ",".");
      return $result;
    }

    public static function tanggalIndo($tanggal, $cetak_hari = false) {

      	$hari = array(1 => 'Senin',
                			2 => 'Selasa',
                			3 => 'Rabu',
                			4 => 'Kamis',
                			5 => 'Jumat',
                			6 => 'Sabtu',
                			7 => 'Minggu',
      			);

      	$bulan = array(1 => 'Januari',
      				         2 => 'Februari',
      				         3 => 'Maret',
      				         4 => 'April',
      				         5 => 'Mei',
      				         6 => 'Juni',
      				         7 => 'Juli',
      				         8 => 'Agustus',
      				         9 => 'September',
      				         10 => 'Oktober',
      				         11 => 'November',
      				         12 => 'Desember',
      			);
      	$split 	  = explode('-', $tanggal);
      	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

      	if ($cetak_hari) {
      		$num = date('N', strtotime($tanggal));
      		return $hari[$num] . ', ' . $tgl_indo;
      	}
      	return $tgl_indo;
        //echo tanggal_indo ('2016-03-20'); // Hasil: 20 Maret 2016;
        //echo tanggal_indo ('2016-03-20', true); // Hasil: Minggu, 20 Maret 2016
      }

      public static function translateHari($now) {
        $hariIndo = array(1 => 'Senin',
                			2 => 'Selasa',
                			3 => 'Rabu',
                			4 => 'Kamis',
                			5 => 'Jumat',
                			6 => 'Sabtu',
                			7 => 'Minggu',
      			);

        $hariEnglish = array(1 => 'Monday',
                			2 => 'Tuesday',
                			3 => 'Wednesday',
                			4 => 'Thursday',
                			5 => 'Friday',
                			6 => 'Saturday',
                			7 => 'Sunday',
      			);
        for ($i=1; $i < 8; $i++) {
          if($hariEnglish[$i] === $now) {
            $getKey = $i;
            break;
          }
        }
        return $hariIndo[$getKey];
      }
}
