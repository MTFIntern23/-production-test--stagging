<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= htmlentities($meta['title']) ?>
    </title>
    <meta content="MyBranch 2023" name="title">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="MyBranch by Corporate Planning and Performance Management Division" name="keywords">
    <meta content="MyBranch 2023." name="description">
    <!-- cannonical -->
    <link rel="canonical" hreflang="id" href="https://mybranch.mtf.co.id/">
    <link rel="alternate" hreflang="en" href="https://mybranch.mtf.co.id/">
    <link rel="alternate" hreflang="x-default" href="https://mybranch.mtf.co.id/">
    <!-- cannonical ends -->
    <!-- open graph -->
    <meta property="og:title" content="MyBranch 2023">
    <meta property="og:url" content="https://mybranch.mtf.co.id/">
    <meta property="og:image" content="./assets/img/og-image.png">
    <meta property="og:description" content="MyBranch 2023.">
    <!-- open graph ends-->
    <!-- Favicons -->
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.webp" rel="icon">
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.webp" rel="apple-touch-icon">
    <!-- Custom fonts for this page-->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= base_url('assets'); ?>/vendor/animate/animate.css" rel="stylesheet">
    <!-- vendors -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Custom styles-->
    <link href="<?= base_url('assets'); ?>/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url('assets'); ?>/css/login.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core plugin JavaScript-->
    <script>
        var timerStart = Date.now();
        sessionStorage.setItem('is_aov',false);
        localStorage.removeItem('endTime')
    </script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="loader">
        <div class="row loader-div justify-content-center text-center align-items-center">
            <div class="col-12">
                <img class="loader-img" src="<?= base_url('assets'); ?>/img/logowarna.webp" alt="loader-img" loading="lazy
                ">
                <div class="col-12">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-login">