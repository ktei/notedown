<?php

static $_alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
 '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
static $_upperCaseAlphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
 '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

function is_devenv() {
    return APPLICATION_ENV == 'development';
    //return false;
}

function redirect($dest) {
    header("Location: $dest");
    exit;
}

function strlength($string) {
    return strlen(utf8_decode($string));
}

function trunc($str, $n) {
    $len = mb_strlen($str);
    if ($len <= $n) {
        return $str;
    }
    if ($n > 4) {
        return mb_substr($str, 0, $n - 4) . '...' . mb_substr($str, $len - 3, 3);
    }
    return mb_substr($str, 0, n - 1) . ($len > $n ? '...' : '');
}

function bijectiveEncode($number, $caseSensitive = true) {
    if ($caseSensitive) {
        global $_alphabet;
        $alphabet = $_alphabet;
    } else {
        global $_upperCaseAlphabet;
        $alphabet = $_upperCaseAlphabet;
    }

    if (!isInteger($number)) {
        return false;
    }

    if ($number == 0) {
        return $alphabet[$number];
    }

    $result = '';
    $base = count($alphabet);

    while ($number > 0) {
        $digit = $number % $base;
        $result = $alphabet[$digit] . $result;
        $number = floor($number / $base);
    }
    return $result;
}

function genUuid() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                    // 32 bits for "time_low"
                    mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                    // 16 bits for "time_mid"
                    mt_rand(0, 0xffff),
                    // 16 bits for "time_hi_and_version",
                    // four most significant bits holds version number 4
                    mt_rand(0, 0x0fff) | 0x4000,
                    // 16 bits, 8 bits for "clk_seq_hi_res",
                    // 8 bits for "clk_seq_low",
                    // two most significant bits holds zero and one for variant DCE1.1
                    mt_rand(0, 0x3fff) | 0x8000,
                    // 48 bits for "node"
                    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function isInteger($number) {
    return ((string) (int) $number == $number);
}

function extractExt($fname) {
    return strtolower(strrchr($fname, '.'));
}

function safeDelelte($path) {
    if (file_exists($path)) {
        unlink($path);
    }
}
