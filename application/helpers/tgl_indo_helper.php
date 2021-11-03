<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_indo')) {
  function format_indo($date)
  {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    // array hari dan bulan
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $hari = date("w", strtotime($date));
    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

    return $result;
  }
}

if (!function_exists('format_bulan_indo')) {
  function format_bulan_indo($date)
  {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    // array hari dan bulan
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $result =  $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

    return $result;
  }
}