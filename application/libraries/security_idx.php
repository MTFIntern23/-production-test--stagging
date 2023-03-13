<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");


class Security_idx
{
    //*primary Key on URI (Faster x Efficient cache)
    function encrypt_url($string)
    {
        $output = false;
        $security = parse_ini_file('woody.ini'); 
        $secret_key     = $security['s_key'];
        $secret_iv      = $security['iv'];
        $encrypt_method = $security['s_mechanism'];
        $key = hash("sha256", $secret_key);
        $iv     = substr(hash("sha256",$secret_iv), 0, 16);
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
    //*primary Key on URI (More secure x High cache memory)
    function encryptURI($message, $encode = true)
    {
        $security = parse_ini_file('woody.ini'); 
        $key     = $security['ctr_key'];
        $METHOD = $security['s_method'];
        $key = hash("sha256", $key);
        $nonceSize = openssl_cipher_iv_length($METHOD);
        // $nonce = openssl_random_pseudo_bytes($nonceSize);
        $nonce = substr(hash("sha256",openssl_random_pseudo_bytes($nonceSize)), 0, 16);
        $ciphertext = openssl_encrypt(
            $message,
            $METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );
        if ($encode) {
            return mb_substr(base64_encode($nonce.$ciphertext),0, -1).'$';
        }
        return mb_substr($nonce.$ciphertext,0, -1).'$';
    }
    function decryptURI($message,$encoded = true)
    {
        $security = parse_ini_file('woody.ini'); 
        $key     = $security['ctr_key'];
        $METHOD = $security['s_method'];
        $key = hash("sha256", $key);
        $message = mb_substr($message,0, -1).'=';
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new Exception('Encryption failure');
            }
        }
        $nonceSize = openssl_cipher_iv_length($METHOD);
        // $nonce = substr(hash("sha256",mb_substr($message, 0, $nonceSize, '8bit')), 0, 16);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
        
        $plaintext = openssl_decrypt(
            $ciphertext,
            $METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );
        
        return $plaintext;
    }
    //*primary key on datas
    function sodiumEncrypt($message)
    {
        $nonce = random_bytes(
            SODIUM_CRYPTO_SECRETBOX_NONCEBYTES
        );
        $security = parse_ini_file('woody.ini'); 
        $key     = hex2bin($security['sodium']);
        $cipher = base64_encode(
            $nonce.
            sodium_crypto_secretbox(
                $message,
                $nonce,
                $key
            )
        );
        sodium_memzero($message);
        sodium_memzero($key);
        return $cipher;
    }
    function sodiumDecrypt($encrypted)
    {   
        $decoded = base64_decode($encrypted);
        if ($decoded === false) {
            throw new Exception('Scream bloody murder, the encoding failed');
        }
        if (mb_strlen($decoded, '8bit') < (SODIUM_CRYPTO_SECRETBOX_NONCEBYTES + SODIUM_CRYPTO_SECRETBOX_MACBYTES)) {
            throw new Exception('Scream bloody murder, the message was truncated');
        }
        $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
        $security = parse_ini_file('woody.ini'); 
        $key     = hex2bin($security['sodium']);
        $plain = sodium_crypto_secretbox_open(
            $ciphertext,
            $nonce,
            $key
        );
        if ($plain === false) {
            throw new Exception('the message was tampered with in transit');
        }
        sodium_memzero($ciphertext);
        sodium_memzero($key);
        return $plain;
    }
}