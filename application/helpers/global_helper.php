<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('clean_input_method')) {

    function clean_input($string = '') {
        $string = str_replace("\\n", " <br/>", $string);
        $string = html_entity_decode($string, ENT_COMPAT, 'UTF-8');
        //$string = htmlentities($string,ENT_COMPAT, 'UTF-8');
        if (get_magic_quotes_gpc()) {
            $result_clean = mysql_real_escape_string($string);
        }
        return mysql_real_escape_string(strip_tags($string, ''));
    }

}

if (!function_exists('convert_datetime_to_indonesia_format')) {

    function convert_datetime_to_indonesia_format($english_format = '') {
        $value = '';
        if ($english_format != '') {
            $temp_english_format = explode("-", $english_format);
            $temp_tanggal = explode(" ", $temp_english_format[2]);
            $tanggal = $temp_tanggal[0];
            $bulan = $temp_english_format[1];
            $tahun = $temp_english_format[0];
            $temp_english_format = explode(" ", $english_format);
            $time = $temp_english_format[1];
            $value = $tanggal . " " . get_month_number($bulan) . " " . $tahun . " " . $time;
        }
        return $value;
    }

}

if (!function_exists('left')) {

    function left($string = '', $count='') {
        if ($string != '') {
            $string = substr($string, 0, $count);
        }
        return $string;
    }

}

if (!function_exists('generate_project_code')) {

    function generate_project_code($department = '', $order='', $count_project='') {
        $code_project = '';
        $code_project .= $department;

        if (strtoupper($department) == "PT" and strtoupper($order) == "C") {

            $code_project .= "-R";
        } else {
            $code_project .= "-" . $order;
        }

        $code_project .= "/" . date("y");
        $code_project .= date("m");
        $code_project .= date("d") . "/";
        $total_missed = 4 - strlen($count_project);
        $counter = "";
        for ($i = 1; $i <= $total_missed; $i++) {
            $counter .= "0";
        }
        if ($count_project == 0) {
            $count_project = 1;
        }
        $code_project .= $counter . $count_project;
        return $code_project;
    }

}

if (!function_exists('convert_datepicker_to_english_format')) {

    function convert_datepicker_to_english_format($indonesia_format = '') {
        $value = '';
        if ($indonesia_format != '') {
            $temp_english_format = explode(" ", $indonesia_format);
            $tanggal = $temp_english_format[0];
            $bulan = $temp_english_format[1];
            $tahun = $temp_english_format[2];

            $value = $tahun . "/" . get_month_number($bulan) . "/" . $tanggal;
        }
        return $value;
    }

}

if (!function_exists('get_month_number')) {

    function get_month_number($month = '') {
        $value = '0';
        switch ($month) {
            case "Jan" :
                $value = 1;
                break;
            case "01" :
                $value = "Jan";
                break;
            case "Feb" :
                $value = 2;
                break;
            case "02" :
                $value = "Feb";
                break;
            case "Mar" :
                $value = 3;
                break;
            case "03" :
                $value = "Mar";
                break;
            case "Apr" :
                $value = 4;
                break;
            case "04" :
                $value = "Apr";
                break;
            case "May" :
                $value = 5;
                break;
            case "05" :
                $value = "May";
                break;
            case "Jun" :
                $value = 6;
                break;
            case "06" :
                $value = "Jun";
                break;
            case "Jul" :
                $value = 7;
                break;
            case "07" :
                $value = "Jul";
                break;
            case "Aug" :
                $value = 8;
                break;
            case "08" :
                $value = "Aug";
                break;
            case "Sep" :
                $value = 9;
                break;
            case "09" :
                $value = "Sep";
                break;
            case "Oct" :
                $value = 10;
                break;
            case "10" :
                $value = "Oct";
                break;
            case "Nov" :
                $value = 11;
                break;
            case "11" :
                $value = "Nov";
                break;
            case "Dec" :
                $value = 12;
                break;
            case "12" :
                $value = "Dec";
                break;
        }
        return $value;
    }

}

if (!function_exists('get_month_number_indo_full')) {

    function get_month_number_indo_full($month = '') {
        $value = '0';
        switch ($month) {
            case "Jan" :
                $value = 1;
                break;
            case "01" :
                $value = "Januari";
                break;
            case "Feb" :
                $value = 2;
                break;
            case "02" :
                $value = "Februari";
                break;
            case "Mar" :
                $value = 3;
                break;
            case "03" :
                $value = "Maret";
                break;
            case "Apr" :
                $value = 4;
                break;
            case "04" :
                $value = "April";
                break;
            case "May" :
                $value = 5;
                break;
            case "05" :
                $value = "Mei";
                break;
            case "Jun" :
                $value = 6;
                break;
            case "06" :
                $value = "Juni";
                break;
            case "Jul" :
                $value = 7;
                break;
            case "07" :
                $value = "July";
                break;
            case "Aug" :
                $value = 8;
                break;
            case "08" :
                $value = "Agustus";
                break;
            case "Sep" :
                $value = 9;
                break;
            case "09" :
                $value = "September";
                break;
            case "Oct" :
                $value = 10;
                break;
            case "10" :
                $value = "Oktober";
                break;
            case "Nov" :
                $value = 11;
                break;
            case "11" :
                $value = "November";
                break;
            case "Dec" :
                $value = 12;
                break;
            case "12" :
                $value = "Desember";
                break;
        }
        return $value;
    }

}

if (!function_exists('convert_date_to_indonesia_format')) {

    function convert_date_to_indonesia_format($english_format = '') {
        $value = '';

        if (($english_format != '') OR ($english_format == '0000-00-00')) {
            $temp_english_format = explode("-", $english_format);
            $tahun = $temp_english_format[0];
            if ($tahun != '0000') {
                $tanggal = $temp_english_format[2];
                $bulan = get_month_number($temp_english_format[1]);
                $tahun = $temp_english_format[0];
                $value = $tanggal . " " . $bulan . " " . $tahun;
            }
        }
        return $value;
    }

}

if (!function_exists('approval_status')) {

    function approval_status($id_approval = '') {
        $value = "";
        switch ($id_approval) {
            case "0" :
                $value = "New";
                break;
            case "1" :
                $value = "Approved";
                break;
            case "2" :
                $value = "Not Approved";
                break;
            default :
                $value = "";
        }
        return $value;
    }

}


if (!function_exists('type_of_tm_substantive')) {

    function type_of_tm_substantive($id_approval = '') {
        $value = "";
        switch ($id_approval) {
            case "1" :
                $value = "Trademark";
                break;
            case "2" :
                $value = "Service Mark";
                break;
            default :
                $value = "";
        }
        return $value;
    }

}


if (!function_exists('follow_up_status')) {

    function follow_up_status($follow_up = '') {
        $value = "";
        switch ($follow_up) {
            case "0" :
                $value = "";
                break;
            case "1" :
                $value = "Open";
                break;
            case "2" :
                $value = "Close";
                break;
            default :
                $value = "";
        }
        return $value;
    }

}

if (!function_exists('type_of_status_annuity')) {

    function type_of_status_annuity($id_status_annuity) {
        $value = "";
        switch ($id_status_annuity) {
            case "0" :
                $value = "";
                break;
            case "1" :
                $value = "After";
                break;
            case "2" :
                $value = "Back";
                break;
            case "3" :
                $value = "Public";
                break;
        }
        return $value;
    }

}


if (!function_exists('type_of_patent')) {

    function type_of_patent($id_patent) {
        $value = "";
        switch ($id_patent) {
            case "0" :
                $value = "";
                break;
            case "1" :
                $value = "Convention";
                break;
            case "2" :
                $value = "Utility";
                break;
            case "3" :
                $value = "PCT";
                break;
        }
        return $value;
    }

}

if (!function_exists('type_of_patent_PVP')) {

    function type_of_patent_PVP($id_patent) {
        $value = "";
        switch ($id_patent) {
            case "0" :
                $value = "";
                break;
            case "1" :
                $value = "Annual";
                break;
            case "2" :
                $value = "Perennial";
                break;
        }
        return $value;
    }

}


if (!function_exists('copy_file_ambadar')) {

    function copy_file_ambadar($full_path = '', $file_name='', $path_to_upload='') {
        $temp_file = explode(".", $file_name);
        $ext = $temp_file[count($temp_file) - 1];
        $new_file = left($file_name, 5) . date("Y") . "_" . date("m") . "_" . date("d") . "." . "_" . date("ss") . "." . $ext;
        copy($full_path, $path_to_upload . $new_file);
        return $path_to_upload . $new_file;
    }

}

if (!function_exists('selfURL')) {

    function selfURL() {
        $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
        $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
        $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
        return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
    }

}

if (!function_exists('strleft')) {

    function strleft($s1, $s2) {
        return substr($s1, 0, strpos($s1, $s2));
    }

}

//---added by Hery-20110329
# remove by key:
if (!function_exists('array_remove_key')) {

    function array_remove_key() {
        $args = func_get_args();
        return array_diff_key($args[0], array_flip(array_slice($args, 1)));
    }

}

# remove by value:
if (!function_exists('array_remove_value')) {

    function array_remove_value() {
        $args = func_get_args();
        return array_diff($args[0], array_slice($args, 1));
    }

}

if (!function_exists('adjust_width')) {

    //---defaule based on 1024 width of pixel as pole
    function adjust_width($config_width, $current_width, $pole_width=1280) {
        $comparer = ($pole_width / $current_width);

        return round($config_width / $comparer);
    }

}

if (!function_exists('adjust_height')) {

    //---defaule based on 800 height of pixel as pole
    function adjust_height($config_height, $current_height, $pole_height=800) {
        $comparer = ($pole_height / $current_height);

        return round($config_height / $comparer);
    }

}
if (!function_exists('add_date')) {

    function add_date($orgDate, $mth) {
        $cd = strtotime($orgDate);
        $retDAY = date('Y-m-d', mktime(0, 0, 0, date('m', $cd) + $mth, date('d', $cd), date('Y', $cd)));
        return $retDAY;
    }

}


#::cz_update:: 20120118
if (!function_exists('a_href_download_attachment')) {

    function a_href_download_attachment($file_name, $url_path) {
        $value = "<a href=\"#\">-</a>";
        if ($file_name != '') {
            if ($url_path != '') {
                $value = $url_path . $file_name;
                $value = "<a href=\"$value\" target=\"_blank\">$file_name</a>";
            } else {
                $value = "#";
                $value = "<a href=\"$value\">$file_name</a>";
            }
        }
        return $value;
    }

}

if (!function_exists('textarea_encode')) {

    function textarea_encode($str) {
        $a = array('\n', "\'");
        $b = array('<br/>', "'");
        $newphrase = str_replace($a, $b, clean_input($str));

        return $newphrase;
    }

}

if (!function_exists('textarea_decode')) {

    function textarea_decode($str) {
        $a = array('\n', '<br/>', "\'");
        $b = array('&#10;', '&#10;', "'");
        $newphrase = str_replace($a, $b, $str);
        return $newphrase;
    }

}



if (!function_exists('number_to_romawi')) {

    function number_to_romawi($number) {
        $str_romawi = '';
        switch ($number) {
            case 1:
                $str_romawi = "I";
                break;
            case 2:
                $str_romawi = "II";
                break;
            case 3:
                $str_romawi = "III";
                break;
            case 4:
                $str_romawi = "IV";
                break;
            case 5:
                $str_romawi = "V";
                break;
            case 6:
                $str_romawi = "VI";
                break;
            case 7:
                $str_romawi = "VII";
                break;
            case 8:
                $str_romawi = "VIII";
                break;
            case 9:
                $str_romawi = "IX";
                break;
            case 10:
                $str_romawi = "X";
                break;
            default:
                $str_romawi = $number;
                break;
        }
        return $str_romawi;
    }

}


if (!function_exists('format_date_indo_ddmmmyyyy')) {

    function format_date_indo_ddmmmyyyy($english_format = '') {
        $value = '';

        if (($english_format != '') OR ($english_format == '0000-00-00')) {
            $temp_english_format = explode("-", $english_format);
            $tahun = $temp_english_format[0];
            if ($tahun != '0000') {
                $tanggal = $temp_english_format[2];
                $bulan = get_month_number_indo_full($temp_english_format[1]);
                $tahun = $temp_english_format[0];
                $value = $tanggal . " " . $bulan . " " . $tahun;
            }
        }
        return $value;
    }

}
?>