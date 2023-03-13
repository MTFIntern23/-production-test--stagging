<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE ERROR</title>
    <link
        href="<?= $base_url ?>/assets/img/logo-icon-mtf.webp"
        rel="icon">
    <link
        href="<?= $base_url ?>/assets/img/logo-icon-mtf.webp"
        rel="apple-touch-icon">
    <link rel="stylesheet"
        href="<?= $base_url ?>/assets/css/pages_404.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="box">
        <img src="<?= $base_url ?>/assets/img/mybranch-white.webp" alt="err-img" width="100" height="50">
        <div class="box__ghost">
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="box__ghost-container">
                <div class="box__ghost-eyes">
                    <div class="box__eye-left"></div>
                    <div class="box__eye-right"></div>
                </div>
                <div class="box__ghost-bottom">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="box__ghost-shadow"></div>
        </div>
        <div class="box__description">
            <div class="box__description-container" style="width:800px">
                <div class="box__description-title" style="font-size: 10px;"><?php echo $heading; ?></div>
                <div class="box__description-text" style="font-size: 10px;"><?php echo $message; ?></div>
            </div>
        </div>
<?php 
require_once(APPPATH.'views/templates/basic_footer.php');
?>