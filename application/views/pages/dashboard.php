<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
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
                                            <?= htmlentities($current_cabang->nama);?>
                                        </b>
                                    </p>
                                    <div id="except-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->app_in;
                                                $yesterday = $performa_lending_today[1]->app_in;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            <span class=" text-light value-db-badge"
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->app_in ?>
                                                                                    </span>
                                                                                    M/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">40</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->approved;
                                                $yesterday = $performa_lending_today[1]->approved;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            <span class=" text-light value-db-badge"
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->approved ?>
                                                                                    </span>
                                                                                    M/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">10</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->purchase_order;
                                                $yesterday = $performa_lending_today[1]->purchase_order;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            <span class=" text-light value-db-badge"
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->purchase_order ?>
                                                                                    </span>
                                                                                    M/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">25</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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

                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->lending;
                                                $yesterday = $performa_lending_today[1]->lending;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            <span class=" text-light value-db-badge"
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->lending ?>
                                                                                    </span>
                                                                                    M/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">25</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->totalepd;
                                                $yesterday = $performa_lending_today[1]->totalepd;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->totalepd ?>
                                                                                    </span>%/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">10</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->totaloverdue;
                                                $yesterday = $performa_lending_today[1]->totaloverdue;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
                                        ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom" data-aos-delay="500">
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
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->totaloverdue ?>
                                                                                    </span>%/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">10</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->totalnpl;
                                                $yesterday = $performa_lending_today[1]->totalnpl;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
                                        ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom">
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
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->totalnpl ?>
                                                                                    </span>%/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">10</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white <?php
                                                $today = $performa_lending_today[0]->totalcwo;
                                                $yesterday = $performa_lending_today[1]->totalcwo;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
                                        ?> mb-2" style="height: 100px;" data-aos="fade-up"
                                                    data-aos-anchor-placement="top-bottom">
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
                                                                                style="font-size: 18px;"><b>Rp
                                                                                    <span id="number-animate-norm">
                                                                                        <?= $performa_lending_today[0]->totalcwo ?>
                                                                                    </span>%/</b><span
                                                                                    style="font-size: 10px;"><span
                                                                                        id="number-animate-norm">10</span>
                                                                                    aplikasi</span>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-3 <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                            </div>
                                        </div>
                                    </div>
                                    <div id="only-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-xs-12">
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->app_in;
                                                $yesterday = $performa_lending_today[1]->app_in;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->app_in ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">40</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->approved;
                                                $yesterday = $performa_lending_today[1]->approved;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->approved ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->purchase_order;
                                                $yesterday = $performa_lending_today[1]->purchase_order;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->purchase_order ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">25</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->lending;
                                                $yesterday = $performa_lending_today[1]->lending;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->lending ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">25</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalepd;
                                                $yesterday = $performa_lending_today[1]->totalepd;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->totalepd ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totaloverdue;
                                                $yesterday = $performa_lending_today[1]->totaloverdue;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->totaloverdue ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalnpl;
                                                $yesterday = $performa_lending_today[1]->totalnpl;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->totalnpl ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                <div class="card text-white mb-2 <?php
                                                $today = $performa_lending_today[0]->totalcwo;
                                                $yesterday = $performa_lending_today[1]->totalcwo;
                                                $pct = getPercentage($today,$yesterday);
                                                echo ($pct<0)?'bg-danger':'bg-success';
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
                                                                            style="font-size: 9px;">Rp <span
                                                                                id="number-animate-norm">
                                                                                <?= $performa_lending_today[0]->totalcwo ?>
                                                                            </span>
                                                                            M/</b><br> <span
                                                                                style="font-size: 7px;"><span
                                                                                    id="number-animate-norm">10</span>
                                                                                aplikasi</span>
                                                                        </p>
                                                                    </div>

                                                                    <div
                                                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 text-end <?php echo ($pct<0)?'bg-tredingdown':'bg-tredingup';?>">
                                                                        <p id="number-animate"
                                                                            class="text-dark fw-bold text-end text-ip-mini-2 badge <?php echo ($pct<0)?'bg-danger':'bg-success';?> bx bx-<?php echo ($pct<0)?'trending-down':'trending-up';?> "
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
                                                    type="button" onclick="show_lending()"><i
                                                        class='bx bxs-color me-1'></i>Lending</button>
                                                <button id="show_profit_btn" class="badge btn btn-secondary"
                                                    type="button" onclick="show_profit()"><i
                                                        class='bx bx-dollar-circle me-1'></i>Profit</button>
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
                                    <div id="row-db-profit" class="row mb-4 me-md-4 d-none">
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
                                                        <?= htmlentities($row->nama_spv);?>
                                                    </td>
                                                    <td>
                                                        <?= htmlentities($row->nama_so);?>
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
    const btn_show_lending = document.querySelector('#show_lending_btn')
    const btn_show_profit = document.querySelector('#show_profit_btn')
    const lending_field = document.querySelector('#row-db-lending')
    const profit_field = document.querySelector('#row-db-profit')
    const show_lending = function () {
        lending_field.classList.remove('d-none');
        if (!profit_field.classList.contains('d-none')) {
            profit_field.classList.add('d-none');
        }
        //btn
        if (btn_show_profit.classList.contains('bg-chart-active')) {
            btn_show_profit.classList.remove('bg-chart-active');
            btn_show_profit.classList.add('btn-secondary');
        }
        if (!btn_show_lending.classList.contains('bg-chart-active')) {
            btn_show_lending.classList.remove('btn-secondary');
            btn_show_lending.classList.add('bg-chart-active');
        }
    }
    const show_profit = function () {
        profit_field.classList.remove('d-none');
        if (!lending_field.classList.contains('d-none')) {
            lending_field.classList.add('d-none');
        }
        //btn
        if (btn_show_lending.classList.contains('bg-chart-active')) {
            btn_show_lending.classList.remove('bg-chart-active');
            btn_show_lending.classList.add('btn-secondary');
        }
        if (!btn_show_profit.classList.contains('bg-chart-active')) {
            btn_show_profit.classList.remove('btn-secondary');
            btn_show_profit.classList.add('bg-chart-active');
        }
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    //chart dashboard
    var options_dashboard = {
        series: [{
            name: 'Net Profit',
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

    var chart = new ApexCharts(document.querySelector("#dashboard_chart"), options_dashboard);
    chart.render();

    //chart profit dashboard
    var options_dashboard_profit = {
        series: [{
            name: "Session Duration",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
        },
        {
            name: "Page Views",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
        },
        {
            name: 'Total Visits',
            data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
        }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Profit Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function (val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [
                {
                    title: {
                        formatter: function (val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function (val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function (val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        }
    };
    var chart_db_profit = new ApexCharts(document.querySelector("#dashboard_profit_chart"), options_dashboard_profit);
    chart_db_profit.render();
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