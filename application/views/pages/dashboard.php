<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <div id="adm-content" class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="row  justify-content-center">
                        <div class="col-lg-4 col-xl-4 col-md-12 col-xs-12 col-sm-12">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-dark pt-3 fs-4 text-start">
                                        Keadaan Branch <b>
                                            <?= htmlentities($current_cabang->nama_cabang);?>
                                        </b>
                                    </p>
                                    <div id="except-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('lending')?>">
                                                    <div class="card text-white <?php
                                                    $today = $performa_lending_today[0]->app_in;
                                                    $yesterday = $performa_lending_today[1]->app_in;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="10">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-log-in'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 20px;">
                                                                                App In
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class="text-hp-rp text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>Rp
                                                                                        <span class ="get_val" id="number-animate-norm">
                                                                                            <?= $performa_lending_today[0]->app_in ?>
                                                                                        </span>
                                                                                        <span class="abbrv"></span>
                                                                                        /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >40</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?= getPercentage($today,$yesterday);
                                                                        ?> <span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('lending')?>">
                                                    <div class="card text-white <?php
                                                    $today = $performa_lending_today[0]->approved;
                                                    $yesterday = $performa_lending_today[1]->approved;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-check-square'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 18px;">
                                                                                Approved
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class="text-hp-rp text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>Rp
                                                                                        <span class ="get_val" id="number-animate-norm">
                                                                                            <?= $performa_lending_today[0]->approved ?>
                                                                                        </span>
                                                                                        <span class="abbrv"></span>
                                                                                        /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >10</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->approved;
                                                                            $yesteday = $performa_lending_today[1]->approved;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('lending')?>">
                                                    <div class="card text-white height-lepi-small <?php
                                                    $today = $performa_lending_today[0]->purchase_order;
                                                    $yesterday = $performa_lending_today[1]->purchase_order;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="200">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-purchase-tag-alt'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 12px;">
                                                                                Purchase Order
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class="text-hp-rp text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>Rp
                                                                                        <span class ="get_val" id="number-animate-norm">
                                                                                            <?= $performa_lending_today[0]->purchase_order ?>
                                                                                        </span>
                                                                                        <span class="abbrv"></span>
                                                                                        /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >25</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->purchase_order;
                                                                            $yesteday = $performa_lending_today[1]->purchase_order;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('lending')?>">
                                                    <div class="card text-white <?php
                                                    $today = $performa_lending_today[0]->lending;
                                                    $yesterday = $performa_lending_today[1]->lending;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-money-withdraw'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 20px;">
                                                                                Lending
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class="text-hp-rp text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>Rp
                                                                                        <span class ="get_val" id="number-animate-norm">
                                                                                            <?= $performa_lending_today[0]->lending ?>
                                                                                        </span>
                                                                                        <span class="abbrv"></span>
                                                                                        /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >25</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->lending;
                                                                            $yesteday = $performa_lending_today[1]->lending;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('epd_monitoring')?>">
                                                    <div class="card text-white <?php
                                                    $today = $performa_lending_today[0]->totalepd;
                                                    $yesterday = $performa_lending_today[1]->totalepd;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="400">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-calendar-exclamation'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 18px;">
                                                                                Total EPD
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class=" text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>
                                                                                        <span  id="number-animate">
                                                                                            <?= $performa_lending_today[0]->totalepd ?>
                                                                                        </span> /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >10</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->totalepd;
                                                                            $yesteday = $performa_lending_today[1]->totalepd;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('tod_monitoring')?>">
                                                    <div class="card text-white height-lepi-small <?php
                                                    $today = $performa_lending_today[0]->totaloverdue;
                                                    $yesterday = $performa_lending_today[1]->totaloverdue;
                                                    echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom" data-aos-delay="500">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-timer'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 13px;">
                                                                                Total Overdue
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class=" text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>
                                                                                        <span  id="number-animate">
                                                                                            <?= $performa_lending_today[0]->totaloverdue ?>
                                                                                        </span> /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >10</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->totaloverdue;
                                                                            $yesteday = $performa_lending_today[1]->totaloverdue;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('npl_monitoring')?>">
                                                    <div class="card text-white <?php
                                                    $today = $performa_lending_today[0]->totalnpl;
                                                    $yesterday = $performa_lending_today[1]->totalnpl;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-credit-card'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 18px;">
                                                                                Total NPL
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-dark text-start">
                                                                                <span class=" text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>
                                                                                        <span  id="number-animate">
                                                                                            <?= $performa_lending_today[0]->totalnpl ?>
                                                                                        </span> /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >10</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->totalnpl;
                                                                            $yesteday = $performa_lending_today[1]->totalnpl;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <a href="<?= site_url('cwo_monitoring')?>">
                                                    <div class="card text-white height-lepi-small-1366  <?php
                                                    $today = $performa_lending_today[0]->totalcwo;
                                                    $yesterday = $performa_lending_today[1]->totalcwo;
                                                    $pct = getPercentage($today,$yesterday);
                                                    echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                            ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                        data-aos-anchor-placement="top-bottom">
                                                        <div class="card-body col-12">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-2 text-start" style="margin-top: -16px;">
                                                                    <i class='bx bx-dollar-circle'
                                                                        style="font-size: 51px; margin-left: -15px;"></i>
                                                                </div>
                                                                <div class="col-10 text-start" style="margin-top: -10px;">
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-bottom: -10px !important;">
                                                                        <div class="col-5">
                                                                            <p class="text-light text-start text-db-badge"
                                                                                style="font-size: 16px;">
                                                                                Total CWO
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <p class="text-light text-end fw-bold text-tanggal-db"
                                                                                style="margin-right: 4px;">
                                                                                MTD
                                                                                <?= Date('j F Y') ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center align-items-center text-center"
                                                                        style="margin-top: -10px !important;">
                                                                        <div class="col-9">
                                                                            <p class="text-light text-start">
                                                                                <span class=" text-light value-db-badge"
                                                                                    style="font-size: 18px;"><b>
                                                                                        <span  id="number-animate">
                                                                                            <?= $performa_lending_today[0]->totalcwo ?>
                                                                                        </span> /</b><span
                                                                                        style="font-size: 10px;"><span
                                                                                            >10</span>
                                                                                        aplikasi</span>
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                            <p id="number-animate"
                                                                                class="text-dark fw-bold text-end badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                                style="font-size: 15px; margin-left: -38px;">
                                                                                <?php 
                                                                            $today = $performa_lending_today[0]->totalcwo;
                                                                            $yesteday = $performa_lending_today[1]->totalcwo;
                                                                            echo getPercentage($today,$yesteday);
                                                                        ?><span>%</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="only-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('lending')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->app_in;
                                                $yesterday = $performa_lending_today[1]->app_in;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                        ?> " style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 11px;">App Inn</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 8px;">Rp <span
                                                                                class ="get_val" id="number-animate-norm" >
                                                                                <?= $performa_lending_today[0]->app_in ?>
                                                                            </span>
                                                                            <span class="abbrv"></span>
                                                                            /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >40</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?= getPercentage($today,$yesterday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('lending')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->approved;
                                                $yesterday = $performa_lending_today[1]->approved;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 11px;">Approved</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 8px;">Rp <span
                                                                                class ="get_val" id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->approved ?>
                                                                            </span>
                                                                            <span class="abbrv"></span>
                                                                            /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->approved;
                                                                        $yesteday = $performa_lending_today[1]->approved;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('lending')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->purchase_order;
                                                $yesterday = $performa_lending_today[1]->purchase_order;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 8px;">Purchase Order</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 8px;">Rp <span
                                                                                class ="get_val" id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->purchase_order ?>
                                                                            </span>
                                                                            <span class="abbrv"></span>
                                                                            /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >25</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->purchase_order;
                                                                        $yesteday = $performa_lending_today[1]->purchase_order;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('lending')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->lending;
                                                $yesterday = $performa_lending_today[1]->lending;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 9px;">Lending</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 8px;">Rp <span
                                                                                class ="get_val" id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->lending ?>
                                                                            </span>
                                                                            <span class="abbrv"></span>
                                                                            /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >25</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct==0)?'bg-warning':(($pct<0)?'bg-danger':'bg-success');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->lending;
                                                                        $yesteday = $performa_lending_today[1]->lending;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('epd_monitoring')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalepd;
                                                $yesterday = $performa_lending_today[1]->totalepd;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 11px;">Total EPD</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 9px;"><span
                                                                            id="number-animate">
                                                                                <?= $performa_lending_today[0]->totalepd ?>
                                                                            </span> /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->totalepd;
                                                                        $yesteday = $performa_lending_today[1]->totalepd;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('tod_monitoring')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totaloverdue;
                                                $yesterday = $performa_lending_today[1]->totaloverdue;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 8px;">Total Overdue</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 9px;"><span
                                                                            id="number-animate">
                                                                                <?= $performa_lending_today[0]->totaloverdue ?>
                                                                            </span> /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->totaloverdue;
                                                                        $yesteday = $performa_lending_today[1]->totaloverdue;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('npl_monitoring')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalnpl;
                                                $yesterday = $performa_lending_today[1]->totalnpl;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 10px;">
                                                                            Total NPL</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 9px;"><span
                                                                            id="number-animate">
                                                                                <?= $performa_lending_today[0]->totalnpl ?>
                                                                            </span>
                                                                          
                                                                             /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->totalnpl;
                                                                        $yesteday = $performa_lending_today[1]->totalnpl;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div onclick="window.location.href = '<?= site_url('cwo_monitoring')?>'" class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalcwo;
                                                $yesterday = $performa_lending_today[1]->totalcwo;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');
                                        ?>" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="100">
                                                    <div class="card-body col-12">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-2 col-xs-2 text-start d-none"
                                                                style="font-size: 54px;margin-top: -16px;">
                                                                <i class='bx bx-log-in' style=" margin-left: -8px;"></i>
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 text-start"
                                                                style="margin-top: -8px;">
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-bottom: -10px !important;">
                                                                    <div
                                                                        class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-start">
                                                                        <p style="font-size: 10px;">
                                                                            Total CWO</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7 text-end">
                                                                        <p class="fw-bold" style="font-size: 9px;">MTD
                                                                            <?= Date('j F Y') ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center align-items-center text-center"
                                                                    style="margin-top: -10px !important;">
                                                                    <div
                                                                        class="col-xl-8 col-lg-8 col-md-6 col-sm-8 col-xs-8 text-start">
                                                                        <p class="text-ip-mini-1 fw-bold"
                                                                            style="font-size: 9px;"><span
                                                                            id="number-animate">
                                                                                <?= $performa_lending_today[0]->totalcwo ?>
                                                                            </span>
                                                                             /</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    >10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($today==1)?'bg-warning':(($today<1)?'bg-success':'bg-danger');?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
                                                                            style="font-size: 10px;">
                                                                            <?php 
                                                                        $today = $performa_lending_today[0]->totalcwo;
                                                                        $yesteday = $performa_lending_today[1]->totalcwo;
                                                                        echo getPercentage($today,$yesteday);
                                                                    ?> <span>%</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-8 col-md-12 col-xs-12 col-sm-12">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-dark pt-3 fs-4 text-start">
                                        Pertumbuhan Bulan <b>
                                            <?= Date('F Y') ?>
                                        </b>
                                    </p>
                                    <div class="row mb-4 ms-1 me-2">
                                        <div class="col">
                                            <div class="d-grid gap-2 d-md-block">
                                                <button id="show_lending_btn" class="badge btn bg-chart-active"
                                                type="button" onclick="show_this_field('row-db-lending',this.id)"><i
                                                class='bx bxs-color me-1'></i>Lending</button>
                                                <!-- <button id="show_profit_btn" class="badge btn btn-secondary"
                                                    type="button" onclick="show_this_field('row-db-profit',this.id)"><i
                                                        class='bx bx-dollar me-1'></i>Profit</button> -->
                                                <button id="show_epd_btn" class="badge btn btn-secondary" 
                                                    type="button" onclick="show_this_field('row-db-epd-monitoring',this.id)"><i
                                                        class='bx bx-calendar-exclamation me-1'></i>EPD</button>
                                                <button id="show_tod_btn" class="badge btn btn-secondary" 
                                                    type="button" onclick="show_this_field('row-db-tod-monitoring',this.id)"><i
                                                        class='bx bx-car me-1'></i>TOD</button>
                                                <button id="show_npl_btn" class="badge btn btn-secondary" 
                                                    type="button" onclick="show_this_field('row-db-npl-monitoring',this.id)"><i
                                                        class='bx bx-credit-card me-1'></i>NPL</button>
                                                <button id="show_cwo_btn" class="badge btn btn-secondary" 
                                                    type="button" onclick="show_this_field('row-db-cwo-monitoring',this.id)"><i
                                                        class='bx bx-dollar-circle me-1'></i>CWO</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="ms-1 me-4 mb-4">
                                    </div> -->
                                    <div id="row-db-lending" class="row mb-4 me-md-4">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button onclick="window.location.href='<?= site_url('lending')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="row-db-profit" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_profit_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= site_url('profit')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div id="row-db-epd-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div id="dashboard_epd_monitoring_chart"></div>
                                                    
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div id="dashboard_epd_monitoring_chart_2"></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button onclick="window.location.href='<?= site_url('epd_monitoring')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-tod-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_tod_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button onclick="window.location.href='<?= site_url('tod_monitoring')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-npl-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_npl_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                 <button onclick="window.location.href='<?= site_url('npl_monitoring')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-cwo-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_cwo_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                 <button onclick="window.location.href='<?= site_url('cwo_monitoring')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /datatables -->
                                </div>
                                <div class="col-12">
                                    <p class="text-dark pt-3 fs-4 text-start">
                                        Performa SO Bulan <b>
                                            <?= Date('F Y') ?>
                                        </b>
                                    </p>
                                    <div class="ms-1 me-4 mb-4">
                                        <table id="so_table" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Peringkat</th>
                                                    <th>Nama</th>
                                                    <th>Supervisor</th>
                                                    <th>Pencapaian</th>
                                                    <th>Target</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no=1; 
                                                    foreach ($performa_so as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?= htmlentities($row->peringkat);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->nama_so);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->nama_spv);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->mtd_pencapaian);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->target);?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                            <button onclick="window.location.href='<?= site_url('performa_so')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /datatables -->
                                </div>
                                <div class="col-12">
                                    <p class="text-dark pt-3 fs-4 text-start">
                                        Performa Dealer Bulan <b>
                                            <?= Date('F Y') ?>
                                        </b>
                                    </p>
                                    <div class="ms-1 me-4 mb-4">
                                        <table id="dealer_table" class="table table-striped table-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Peringkat</th>
                                                    <th>Nama Dealer</th>
                                                    <th>PIC</th>
                                                    <th>Pencapaian</th>
                                                    <th>Target</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no=1; 
                                                    foreach ($performa_dealer as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?= htmlentities($row->peringkat);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->nama_dealer);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->nama_pic);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->pencapaian);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->target);?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /datatables -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                            <button onclick="window.location.href='<?= site_url('performa_dealer')?>'"
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var now_month = month_name(new Date().getMonth()+1) + ' '+ (new Date().getFullYear());
    var prev_month;
    if(new Date().getMonth()==0){
            prev_month=month_name((12)) + ' '+ (new Date().getFullYear()-1);
    }else{
            prev_month=month_name(new Date().getMonth()) + ' '+ (new Date().getFullYear());
    }
    let num_abv = document.querySelectorAll('.get_val');
    let abbreviation_fields = document.querySelectorAll('.abbrv');
    num_abv.forEach((val,idx)=>{
        var numb = nFormatter(val.innerHTML);
        var arr_numb = numb.split(/(\s+)/);
        val.innerHTML = parseFloat(arr_numb[0]);
        abbreviation_fields[idx].innerHTML = arr_numb[2]
    })
    const btn_show_lending = document.querySelector('#show_lending_btn')
    const btn_show_profit = document.querySelector('#show_profit_btn')
    const btn_show_epd = document.querySelector('#show_epd_btn')
    const btn_show_tod = document.querySelector('#show_tod_btn')
    const btn_show_npl = document.querySelector('#show_npl_btn')
    const btn_show_cwo = document.querySelector('#show_cwo_btn')
    const btns_db = [btn_show_lending,btn_show_epd,btn_show_tod,btn_show_npl,btn_show_cwo]
    //fields
    const lending_field = document.querySelector('#row-db-lending')
    const profit_field = document.querySelector('#row-db-profit')
    const epd_field = document.querySelector('#row-db-epd-monitoring')
    const tod_field = document.querySelector('#row-db-tod-monitoring')
    const npl_field = document.querySelector('#row-db-npl-monitoring')
    const cwo_field = document.querySelector('#row-db-cwo-monitoring')
    const fields_db = [lending_field,epd_field,tod_field,npl_field,cwo_field]
    function show_this_field(field_name,btn_name){
        document.querySelector('#'+field_name).classList.remove('d-none');
        fields_db.forEach((field,idx)=>{
            if (field!=document.querySelector('#'+field_name)&&!field.classList.contains('d-none')) {
                field.classList.add('d-none');
            }
        })
        btns_db.forEach((btn,idx)=>{
            if (btn!=document.querySelector('#'+btn_name)&&btn.classList.contains('bg-chart-active')) {
                btn.classList.remove('bg-chart-active');
                btn.classList.add('btn-secondary');
            }
        })
        if (!document.querySelector('#'+btn_name).classList.contains('bg-chart-active')) {
            document.querySelector('#'+btn_name).classList.remove('btn-secondary');
            document.querySelector('#'+btn_name).classList.add('bg-chart-active');
        }
        if(field_name=='row-db-epd-monitoring'){
            show_content_epd()
        }else if(field_name=='row-db-tod-monitoring'){
            show_content_tod()
        }else if(field_name=='row-db-npl-monitoring'){
            show_content_npl()
        }else if(field_name=='row-db-cwo-monitoring'){
            show_content_cwo()
        }
        //!!hide others
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    <?php
        //!!
        $items_mtd = array();
        //!!
        foreach($performa_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
        }
    ?>
    //!!
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    //tod
    var used_status_tod = ['Current','1-30','31-60','61-90','91-120','121-150','151-180']
    //chart dashboard
    initialize_=0;
    var options_dashboard = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart = new ApexCharts(document.querySelector("#dashboard_chart"), options_dashboard);
    chart.render();

    //chart epd dashboard
    var options_dashboard_epd = {
        colors:['#26A0FC','#1ADF8D'],
        series: [],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
        };

        var chart_db_epd = new ApexCharts(document.querySelector("#dashboard_epd_monitoring_chart"), options_dashboard_epd);
        chart_db_epd.render();
    var options_dashboard_epd_2 = {
        colors:['#775DD0','#FF4862'],
        series: [],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
        };

        var chart_db_epd_2 = new ApexCharts(document.querySelector("#dashboard_epd_monitoring_chart_2"), options_dashboard_epd_2);
        chart_db_epd_2.render();

    //chart tod dashboard
    var options_dashboard_tod = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
        };

        var chart_db_tod = new ApexCharts(document.querySelector("#dashboard_tod_monitoring_chart"), options_dashboard_tod);
        chart_db_tod.render();

    //chart npl dashboard
    var options_dashboard_npl = {
        series: [],
        chart: {
            height: 350,
            type: 'bar',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
        };

    var chart_db_npl = new ApexCharts(document.querySelector("#dashboard_npl_monitoring_chart"), options_dashboard_npl);
    chart_db_npl.render();

    //chart cwo dashboard
    var options_dashboard_cwo = {
        series: [],
        chart: {
            height: 350,
            type: 'bar',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
        };
        var chart_db_cwo = new ApexCharts(document.querySelector("#dashboard_cwo_monitoring_chart"), options_dashboard_cwo);
        chart_db_cwo.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
        function show_content_epd(){
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/double_chartdata',
            data:{'params':'curr_month_0','params2':'last_month_0'},
            dataType: "json",
            success: function(res){
                var val_0_last = (res.data_lending2)[(res.data_lending2).length-1]
                chart_db_epd.updateSeries([{
                    name: 'EPD 8-30 (' + new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
                    type: 'column',
                    data: [(res.data_lending)[(res.data_fields).length-1]]
                },{
                    name: 'EPD 8-30 (Akhir ' + month_name((new Date().getMonth())) +')',
                    type: 'column',
                    data: [(res.data_lending2).map(e=>e=val_0_last).slice(0,(res.data_fields).length)]
                }])
                chart_db_epd.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 2,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " %";
                        },
                        enabledOnSeries: [0,1]
                    },
                    stroke: {
                        width: [1,1]
                    },
                    xaxis: {
                        categories: [(res.data_fields)[(res.data_fields).length-1]].map(dmyFormat),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: "EPD (%)",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                    ],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " % (Persen)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function (val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/double_chartdata',
            data:{'params':'curr_month_1','params2':'last_month_1'},
            dataType: "json",
            success: function(res){
                var val_1_last = (res.data_lending2)[(res.data_lending2).length-1]
                chart_db_epd_2.updateSeries([{
                    name: 'EPD 8-30 (' + new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
                    type: 'column',
                    data: [(res.data_lending)[(res.data_fields).length-1]]
                },{
                    name: 'EPD 8-30 (Akhir ' + month_name((new Date().getMonth())) +')',
                    type: 'column',
                    data: [(res.data_lending2).map(e=>e=val_1_last).slice(0,(res.data_fields).length)]
                }])
                chart_db_epd_2.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 2,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " %";
                        },
                        enabledOnSeries: [0,1]
                    },
                    stroke: {
                        width: [1,1]
                    },
                    xaxis: {
                        categories: [(res.data_fields)[(res.data_fields).length-1]].map(dmyFormat),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: "EPD (%)",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                    ],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " % (Persen)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function (val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        }
        function show_content_tod(){
            $.ajax({
                type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/tod_monitoring/double_chartdata',
            data:{'params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_db_tod.updateSeries([{
                    name: 'RATIO All (' + month_name((new Date().getMonth())) +' '+ new Date().getFullYear()+')',
                    type: 'column',
                    data: (res.data_lending2).map(bFormatter)
                },{
                    name: 'RATIO All (' + month_name((new Date().getMonth()) + 1) +' '+ new Date().getFullYear()+')',
                    type: 'column',
                    data: (res.data_lending).map(bFormatter)
                }])
                chart_db_tod.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " %";
                        },
                        // enabledOnSeries: [1,2]
                    },
                    stroke: {
                        width: [1, 1,4]
                    },
                    xaxis: {
                        categories: res.data_fields.map(function(val,idx){
                            return used_status_tod[idx]
                        }),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: "RATIO ALL (%)",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                    ],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " % (Persen)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function (val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
            });
        }
    function show_content_npl(){
            $.ajax({
                type:"POST",
                url: '<?php echo base_url(); ?>/strategi_collection/npl_monitoring/double_chartdata',
                data:{'params':'curr_month','params2':'curr_year','params3':'last_year'},
                dataType: "json",
                success: function(res){
                    var npl_fields_tot = (res.data_fields2).concat(res.data_fields);
                    var npl_persentasi_year= (res.data_persentasi2).concat(res.data_persentasi);
                    var npl_used_persentasi_last_ytd = (res.data_persentasi3).slice(0, npl_fields_tot.length)
                    chart_db_npl.updateOptions({
                        colors: [function({ value, seriesIndex, w }) {
                            if(value < 1){
                                return '#26E7A6'
                            }else if(value == 1){
                                return '#FEB830'
                            }else if(value >1){
                                return '#FF5870'
                            }
                            
                        }],
                        plotOptions: {
                            bar: {
                                borderRadius: 5,
                                dataLabels: {
                                    position: 'bottom',
                                },
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            formatter: function (val) {
                                return val + " %";
                            },
                            // enabledOnSeries: [1,2]
                        },
                        stroke: {
                            width: [1, 1]
                        },
                        xaxis: {
                            categories: npl_fields_tot.map(month_name),
                            tooltip: {
                                enabled: false
                            }
                        },
                        yaxis: [
                            {
                                forceNiceScale: true,
                                min: 0,
                                max: (get_max_interval(npl_persentasi_year)),
                                axisTicks: {
                                    show: true,
                                },
                                axisBorder: {
                                    show: true,
                                    color: '#008FFB'
                                },
                                labels: {
                                    style: {
                                        colors: '#008FFB',
                                    }
                                },
                                title: {
                                    text: "% (Persen)",
                                    style: {
                                        color: '#008FFB',
                                    }
                                },
                                tooltip: {
                                    enabled: true
                                }
                            }
                        ],
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + " % (Persen)"
                                }
                            }
                        },
                        legend: {
                            horizontalAlign: 'center',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                dataLabels: {
                                    formatter: function (val) {
                                        return val;
                                    },
                                },
                            }
                        }],
                    })
                    chart_db_npl.updateSeries([{
                        name: 'Persentase ' + (new Date().getFullYear()-1),
                        type: 'column',
                        data: npl_used_persentasi_last_ytd
                    },{
                        name: 'Persentase ' + new Date().getFullYear(),
                        type: 'column',
                        data: npl_persentasi_year
                    }])
                }
            });
        }
    function show_content_cwo(){
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/cwo_monitoring/double_chartdata',
            data:{'params':'curr_month','params2':'curr_year','params3':'last_year'},
            dataType: "json",
            success: function(res){
                var cwo_fields_tot = (res.data_fields2).concat(res.data_fields);
                var cwo_persentasi_year= (res.data_persentasi2).concat(res.data_persentasi);
                var cwo_used_persentasi_last_ytd = (res.data_persentasi3).slice(0, cwo_fields_tot.length)
                chart_db_cwo.updateOptions({
                    colors: [function({ value, seriesIndex, w }) {
                        if(value < 1){
                            return '#26E7A6'
                        }else if(value == 1){
                            return '#FEB830'
                        }else if(value >1){
                            return '#FF5870'
                        }
                        
                    }],
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " %";
                        },
                        // enabledOnSeries: [1,2]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: cwo_fields_tot.map(month_name),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            forceNiceScale: true,
                            min: 0,
                            max: (get_max_interval(cwo_persentasi_year)),
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: "% (Persen)",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " % (Persen)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function (val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
                chart_db_cwo.updateSeries([{
                    name: 'Persentase ' + (new Date().getFullYear()-1),
                    type: 'column',
                    data: cwo_used_persentasi_last_ytd
                },{
                    name: 'Persentase ' + new Date().getFullYear(),
                    type: 'column',
                    data: cwo_persentasi_year
                }])
            }
        });
    }
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/lending/chartdata',
            data:{'params':'curr_month'},
            dataType: "json",
            success: function(res){
                chart.updateSeries([{
                    name: 'Akumulasi Aktual',
                    type: 'column',
                    data: ((res.data_aktual).map(sum_to_prev)).map(bFormatter)
                }, {
                    name: 'Target',
                    type: 'line',
                    data: (res.data_target).map(bFormatter)
                }, {
                    name: 'Komitmen',
                    type: 'line',
                    data: (res.data_komitment).map(bFormatter)
                }])
                chart.updateOptions({
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " M";
                        },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    stroke: {
                        width: [1, 4, 4]
                    },
                    xaxis: {
                        categories: res.data_fields.map(dmFormat),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                style: {
                                    colors: '#008FFB',
                                }
                            },
                            title: {
                                text: "M (Milyar)",
                                style: {
                                    color: '#008FFB',
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    ],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function (val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
    
        $('#so_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#dealer_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        var search = document.querySelectorAll('input[type=search]');
        search.forEach((src, idx) => {
            src.classList.add('search-responsive');
        })
    });
</script>
<!-- / Content -->