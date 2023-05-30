<?php

function format_uang ($angka) {
    return number_format($angka, 0, ',', '.');
};

function terbilang($angka) {
    $angka = abs($angka);
    $baca = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $terbilang = "";
    if ($angka < 12) {
        $terbilang = " ". $baca[$angka];
    } else if ($angka <20) {
        $terbilang = terbilang($angka - 10). " belas";
    } else if ($angka < 100) {
        $terbilang = terbilang($angka/10)." puluh". terbilang($angka % 10);
    } else if ($angka < 200) {
        $terbilang = " seratus" . terbilang($angka - 100);
    } else if ($angka < 1000) {
        $terbilang = terbilang($angka/100) . " ratus" . terbilang($angka % 100);
    } else if ($angka < 2000) {
        $terbilang = " seribu" . terbilang($angka - 1000);
    } else if ($angka < 1000000) {
        $terbilang = terbilang($angka/1000) . " ribu" . terbilang($angka % 1000);
    } else if ($angka < 1000000000) {
        $terbilang = terbilang($angka/1000000) . " juta" . terbilang($angka % 1000000);
    } else if ($angka < 1000000000000) {
        $terbilang = terbilang($angka/1000000000) . " milyar" . terbilang(fmod($angka,1000000000));
    } else if ($angka < 1000000000000000) {
        $terbilang = terbilang($angka/1000000000000) . " trilyun" . terbilang(fmod($angka,1000000000000));
    }     
    return $terbilang;
}