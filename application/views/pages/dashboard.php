<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
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
                                                <a href="<?= site_url('lending')?>"><button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
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
                                            <div id="dashboard_epd_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= site_url('epd_monitoring')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-tod-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_tod_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= site_url('tod_monitoring')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-npl-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_npl_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= site_url('npl_monitoring')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row-db-cwo-monitoring" class="row mb-4 me-md-4 d-none">
                                        <div class="col-12 ms-1  mb-4">
                                            <div id="dashboard_cwo_monitoring_chart"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= site_url('cwo_monitoring')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
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
                                                <a href="<?=site_url('performa_so')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
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
                                                <a href="<?=site_url('performa_dealer')?>"> <button
                                                        class="badge btn btn-primary ms-1" type="button"><i
                                                            class='bx bx-right-arrow-alt me-1'></i>See more</button></a>
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
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    <?php
        $items_mtd = array();
        $aktual_mtd = array();
        $aktual_last_mtd = array();
        $target_mtd = array();
        $komitmen_mtd = array();
        $items_mtd_profit = array();
        $profit_mtd = array();
        $profit_prev_mtd = array();
        //tod
        $tod_items_mtd = array();
        $tod_pencapaian_mtd = array();
        $tod_pencapaian_last_mtd = array();
        foreach($current_month_tod as $row) {
            $tod_items_mtd[] = htmlentities($row -> bucket_od);
            $tod_pencapaian_mtd[] = htmlentities($row -> osp_all);
        }
        foreach($last_month_tod as $row) {
            $tod_pencapaian_last_mtd[] = htmlentities($row -> osp_all);
        }
        //tod ends
        //npl
        $npl_items_mtd = array();
        $npl_persentasi_mtd = array();
        foreach($performa_month_npl as $row) {
            $npl_items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $npl_persentasi_mtd[] = htmlentities($row -> persentasi);
        }
        //npl ends
        //cwo
        $cwo_items_mtd = array();
        $cwo_persentasi_mtd = array();
        foreach($performa_month_cwo as $row) {
            $cwo_items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $cwo_persentasi_mtd[] = htmlentities($row -> persentasi);
        }
        //cwo ends
        foreach($performa_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $aktual_mtd[] = htmlentities($row -> aktual);
            $target_mtd[] = htmlentities($row -> target);
            $komitmen_mtd[] = htmlentities($row -> komitment);
        }
        foreach($performa_last_month as $row) {
            $aktual_last_mtd[] = htmlentities($row -> aktual);
        }
        foreach($current_month_profit as $key=>$row) {
            $items_mtd_profit[] = htmlentities($row -> komponen_profit);
            $profit_mtd[] = htmlentities($row -> profit);
            $profit_prev_mtd[] = htmlentities($last_month_profit[$key]->profit);
        }
    ?>
    //mtd grovv
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var fields_mtd_profit = <?php echo json_encode($items_mtd_profit) ?>;
    var aktual_mtd = <?php echo json_encode($aktual_mtd) ?>;
    var aktual_last_mtd = <?php echo json_encode($aktual_last_mtd) ?>;
    var used_aktual_last_mtd = aktual_last_mtd.slice(0, fields_mtd.length)
    var komitmen_mtd = <?php echo json_encode($komitmen_mtd) ?>;
    var target_mtd = <?php echo json_encode($target_mtd) ?>;
    var profit_mtd = <?php echo json_encode($profit_mtd) ?>;
    var profit_prev_mtd = <?php echo json_encode($profit_prev_mtd) ?>;
    //tod
    var tod_fields_mtd = <?php echo json_encode($tod_items_mtd) ?>;
    var tod_pencapaian_mtd = <?php echo json_encode($tod_pencapaian_mtd) ?>;
    var tod_pencapaian_last_mtd = <?php echo json_encode($tod_pencapaian_last_mtd) ?>;
    var used_status_tod = ['Current','1-30','31-60','61-90','91-120','121-150','151-180']
    //npl
    var npl_fields_mtd = <?php echo json_encode($npl_items_mtd) ?>;
    var npl_persentasi_mtd = <?php echo json_encode($npl_persentasi_mtd) ?>;
    //cwo
    var cwo_fields_mtd = <?php echo json_encode($cwo_items_mtd) ?>;
    var cwo_persentasi_mtd = <?php echo json_encode($cwo_persentasi_mtd) ?>;
    //chart dashboard
    initialize_=0;
    var sum_aktual = (aktual_mtd.map(sum_to_prev)).map(bFormatter)
    initialize_=0;
    var sum_aktual_last = (used_aktual_last_mtd.map(sum_to_prev)).map(bFormatter)
    initialize_=0;
    var now_month = month_name(new Date().getMonth()+1) + ' '+ (new Date().getFullYear());
    var prev_month;
    if(new Date().getMonth()==0){
            prev_month=month_name((12)) + ' '+ (new Date().getFullYear()-1);
    }else{
            prev_month=month_name(new Date().getMonth()) + ' '+ (new Date().getFullYear());
    }
    var options_dashboard = {
        series: [{
            name: 'Akumulasi Aktual ' + prev_month,
            type: 'column',
            data: sum_aktual_last
        },{
            name: 'Akumulasi Aktual '+now_month,
            type: 'column',
            data: sum_aktual
        }, {
            name: 'Target',
            type: 'line',
            data: target_mtd.map(bFormatter)
        }, {
            name: 'Komitmen',
            type: 'line',
            data: komitmen_mtd.map(bFormatter)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
        plotOptions: {
            bar: {
                borderRadius: 3,
                dataLabels: {
                    position: 'bottom',
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + " M";
            },
            enabledOnSeries: [1,2,3]
        },
        stroke: {
            width: [1, 4, 4]
        },
        xaxis: {
            categories: fields_mtd,
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
    };

    var chart = new ApexCharts(document.querySelector("#dashboard_chart"), options_dashboard);
    chart.render();

    //chart epd dashboard
    var options_dashboard_epd = {
          series: [{
          name: 'Net EPD',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart_db_epd = new ApexCharts(document.querySelector("#dashboard_epd_monitoring_chart"), options_dashboard_epd);
        chart_db_epd.render();

    //chart tod dashboard
    var options_dashboard_tod = {
        series: [{
            name: 'OSP All (' + month_name((new Date().getMonth())) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: tod_pencapaian_last_mtd.map(bFormatter)
        },{
            name: 'OSP All (' + month_name((new Date().getMonth()) + 1) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: tod_pencapaian_mtd.map(bFormatter)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1,4]
        },
        xaxis: {
            categories: used_status_tod,
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
                    text: "OSP ALL (M)",
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
        };

        var chart_db_tod = new ApexCharts(document.querySelector("#dashboard_tod_monitoring_chart"), options_dashboard_tod);
        chart_db_tod.render();

    //chart npl dashboard
    var options_dashboard_npl = {
        colors: [function({ value, seriesIndex, w }) {
            if(value < 1){
                return '#26E7A6'
            }else if(value == 1){
                return '#FEB830'
            }else if(value >1){
                return '#FF5870'
            }
            
        }],
        series: [{
            name: 'Persentase',
            type: 'column',
            data: npl_persentasi_mtd
        }],
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
        // forceNiceScale: true,
        plotOptions: {
            bar: {
                borderRadius: 5,
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
            style: {
                fontSize: '8px',
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: npl_fields_mtd,
            labels: {
                style: {
                    colors: '#000000',
                }
            },
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
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " % (Persen)"
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                dataLabels: {
                    enabled: false,
                },
            }
        }],
        };

    var chart_db_npl = new ApexCharts(document.querySelector("#dashboard_npl_monitoring_chart"), options_dashboard_npl);
    chart_db_npl.render();

    //chart cwo dashboard
    var options_dashboard_cwo = {
        colors: [function({ value, seriesIndex, w }) {
            if(value < 20){
                return '#26E7A6'
            }else if(value == 20){
                return '#FEB830'
            }else if(value >20){
                return '#FF5870'
            }
            
        }],
        series: [{
            name: 'Persentase',
            type: 'column',
            data: cwo_persentasi_mtd
        }],
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
        // forceNiceScale: true,
        plotOptions: {
            bar: {
                borderRadius: 5,
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
            style: {
                fontSize: '8px',
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: cwo_fields_mtd,
            labels: {
                style: {
                    colors: '#000000',
                }
            },
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
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " % (Persen)"
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                dataLabels: {
                    enabled: false,
                },
            }
        }],
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
    $(document).ready(function () {
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