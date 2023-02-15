<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");

class security_idx
{
    function encrypt_url($string)
    {
        $output = false;
        $security = parse_ini_file('woody.ini'); 
        $secret_key     = $security['s_key'];
        $secret_iv      = $security['iv'];
        $encrypt_method = $security['s_mechanism'];
        $key = hash("sha256", $secret_key);
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        // $result = bin2hex(openssl_encrypt($string, $encrypt_method, $key, OPENSSL_RAW_DATA, $iv));
        $output = base64_encode($result);
        return $output;
    }
    function decrypt_url($string)
    {
        $output = false;
        $security = parse_ini_file('woody.ini'); 
        $secret_key     = $security['s_key'];
        $secret_iv      = $security['iv'];
        $encrypt_method = $security['s_mechanism'];
        $key = hash("sha256", $secret_key);
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        // $output = openssl_decrypt(pack('H*', base64_decode($string)), $encrypt_method, $key, OPENSSL_RAW_DATA, $iv);
        return $output;
    }
}