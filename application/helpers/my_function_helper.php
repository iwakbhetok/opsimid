<?php

//convert numbers to currency format
if (!function_exists('currency_format_idr')) {

    function currency_format_idr($number) {
        return 'Rp. ' . number_format($number);
    }

}

//convert numbers to currency format
if (!function_exists('currency_format_two_digit')) {

    function currency_format_two_digit($number) {
        return number_format($number, 2, '.', ',');
    }

}

if (!function_exists('get_current_date_time')) {

    function get_current_date_time() {
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = new DateTime();
        return $sekarang->format('Y-m-d H:i:s');
    }

}

if (!function_exists('create_input')) {

    function create_input($name, $value = '', $size = 20, $maxlength = 20) {
        $data = array(
            'name' => $name,
            'id' => $name,
            'value' => set_value($name, $value),
            'maxlength' => $maxlength,
            'size' => $size,
            'class' => 'my_class'
        );

        return form_input($data);
    }

}

if (!function_exists('has_special_character')) {

    function has_special_character($string) {
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string) === 1) {
// special chars in string
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('permalink')) {

    function permalink($text) {
        $text = str_replace('&', 'dan', $text);
        $text = preg_replace("/[^A-Za-z0-9\s]/", "", $text);
        $text = str_replace('--', "-", $text);
        $text = str_replace(' ', "-", $text);
        return strtolower($text);
    }

}

if (!function_exists('anti_injection')) {

    function anti_injection($data) {
        $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
        return $filter;
    }

}

if (!function_exists('get_time_dif')) {

    function get_time_dif($datetime1, $datetime2) {
        $seconds = strtotime($datetime2) - strtotime($datetime1);
        $days = floor($seconds / 86400);
        $hours = floor(($seconds - ($days * 86400)) / 3600);
        $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600)) / 60);
        $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes * 60)));
        $seconds = abs($seconds + ($minutes * 60) + ($hours * 60 * 60) + ($days * 24 * 60 * 60));
        if ($seconds < 60) {
            return $seconds . " detik yang lalu";
        } else {
            $minutes = floor($seconds / 60);
            if ($minutes < 60) {
                return $minutes . " menit yang lalu";
            } else {
                $hours = floor($minutes / 60);
                if ($hours < 24) {
                    return $hours . " jam yang lalu";
                } else {
                    $days = floor($hours / 24);
                    if ($days < 30) {
                        if ($days == 1) {
                            return "Kemarin - " . date('H:i', strtotime($datetime2));
                        }
                        return $days . " hari yang lalu";
                    } else {
                        if ($days > 30) {
                            $month = floor($days / 30);
                            if ($month < 12) {
                                return $month . " bulan yang lalu";
                            } else {
                                if ($month > 12) {
                                    $year = floor($month / 12);
                                    return $year . " tahun yang lalu";
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}


if (!function_exists('get_current_date')) {

    function get_current_date() {
        date_default_timezone_set('Asia/Jakarta');
        return date('Y-m-d');
    }

}

if (!function_exists('get_current_time')) {

    function get_current_time() {
        date_default_timezone_set('Asia/Jakarta');
        return time();
    }

}

if (!function_exists('tgl_now_indo')) {

    function tgl_now_indo() {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y m d");
        $tanggal = substr($tgl, 8, 2);
        $bulan = $this->app_model->getBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

}


if (!function_exists('tgl_indo')) {

    function tgl_indo($tgl) {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

}

if (!function_exists('hari_bulan_indo')) {

    function hari_bulan_indo() {
        date_default_timezone_set('Asia/Jakarta');
        $seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum\'at", "Sabtu");
        $hari = date("w");
        $hari_ini = $seminggu[$hari];

        return $hari_ini;
    }

}

if (!function_exists('bulan')) {

    function bulan($bln) {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

}

if (!function_exists('nama_hari')) {

    function nama_hari($tanggal) {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari;
    }

}

if (!function_exists('hitung_mundur')) {

    function hitung_mundur($wkt) {
        $waktu = array(365 * 24 * 60 * 60 => "tahun",
            30 * 24 * 60 * 60 => "bulan",
            7 * 24 * 60 * 60 => "minggu",
            24 * 60 * 60 => "hari",
            60 * 60 => "jam",
            60 => "menit",
            1 => "detik");

        $hitung = strtotime(gmdate("Y-m-d H:i:s", time() + 60 * 60 * 8)) - $wkt;
        $hasil = array();
        if ($hitung < 5) {
            $hasil = 'kurang dari 5 detik yang lalu';
        } else {
            $stop = 0;
            foreach ($waktu as $periode => $satuan) {
                if ($stop >= 6 || ($stop > 0 && $periode < 60))
                    break;
                $bagi = floor($hitung / $periode);
                if ($bagi > 0) {
                    $hasil[] = $bagi . ' ' . $satuan;
                    $hitung -= $bagi * $periode;
                    $stop++;
                } else if ($stop > 0)
                    $stop++;
            }
            $hasil = implode(' ', $hasil) . ' yang lalu';
        }
        return $hasil;
    }

}

if (!function_exists('tgl_sql')) {

    function tgl_sql($date) {
        $exp = explode('-', $date);
        if (count($exp) == 3) {
            $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        }
        return $date;
    }

}

if (!function_exists('tgl_str')) {

    function tgl_str($date) {
        $exp = explode('-', $date);
        if (count($exp) == 3) {
            $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        }
        return $date;
    }

}

if (!function_exists('tgl_jam_sql')) {

    function tgl_jam_sql($date) {
        $exp = explode(' ', $date);
        $tgl = $exp[0];
        $jam = $exp[1];
        $exp = explode('-', $tgl);
        if (count($exp) == 3) {
            $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        }
        return $date . ' ' . $jam;
    }

}

if (!function_exists('tgl_jam_str')) {

    function tgl_jam_str($date) {
        $exp = explode(' ', $date);
        $tgl = $exp[0];
        $jam = $exp[1];
        $exp = explode('-', $tgl);
        if (count($exp) == 3) {
            $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        }
        return $date . ' ' . $jam;
    }

}