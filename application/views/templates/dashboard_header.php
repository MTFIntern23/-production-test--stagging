<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= htmlentities($title) ?>
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
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.png" rel="icon">
    <link href="<?= base_url('assets'); ?>/img/logo-icon-mtf.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
    rel="preload"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
    <!-- Icons. Uncomment required icon fonts -->
        <link
    rel="preload"
    href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
    <!-- Core CSS -->
    <link rel="preload" href="<?= base_url('assets'); ?>/css/core.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?= base_url('assets'); ?>/css/theme-default.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?= base_url('assets'); ?>/css/demo.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <!-- Vendors CSS -->
    <link
    rel="preload"
    href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.css"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.css"
        integrity="sha512-Ax++m07N1ygXmTSeRlQZnB5leVSw9eDeHQZ2ltn7oln1U3d+6d+/u1JEZ/zY/tLtmmEL741jEnDUlmWttBPLOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
    rel="preload"
    href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
    <link
    rel="preload"
    href="https://unpkg.com/aos@2.3.1/dist/aos.css"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
    <!-- Helpers -->
    <script  src="<?= base_url('assets'); ?>/js/helpers.js">
    </script>
    <script src="<?= base_url('assets'); ?>/js/config.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery.event.special.touchstart = {
            setup: function (_, ns, handle) {
                if (ns.includes("noPreventDefault")) {
                    this.addEventListener("touchstart", handle, {
                        passive: false
                    });
                } else {
                    this.addEventListener("touchstart", handle, {
                        passive: true
                    });
                }
            }
        };
        //countdown
        var interval = 7200000;
        function reset()
        {
            localStorage.endTime = +new Date + interval;
        }
        if(!localStorage.endTime){reset()};
        setInterval(function()
        {
            var remaining = localStorage.endTime - new Date;
            if( remaining >= 0 )
            {
                var milliseconds = Math.floor((remaining % 1000) / 100),
                    seconds = Math.floor((remaining / 1000) % 60),
                    minutes = Math.floor((remaining / (1000 * 60)) % 60),
                    hours = Math.floor((remaining / (1000 * 60 * 60)) % 24);
                hours = (hours < 10) ? "0" + hours : hours;
                minutes = (minutes < 10) ? "0" + minutes : minutes;
                seconds = (seconds < 10) ? "0" + seconds : seconds;
                $('#timer').text( hours + ":" + minutes + ":" + seconds);
                if(hours<=0&&minutes<=0&&seconds<=0){window.location.href = '<?= site_url('auth/logout')?>'}
            } else{
                reset();
            }
        }, 100);
        //global func
        function nFormatter(num, digits = 1) {
            const lookup = [
                {value: 1, symbol: " "},
                {value: 1e3, symbol: " k"},
                {value: 1e6, symbol: " JT"},
                {value: 1e9, symbol: " M"},
                {value: 1e12, symbol: " T"},
                {value: 1e15, symbol: " B"},
                {value: 1e18, symbol: " P"}
            ];
            const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
            var item = lookup.slice().reverse().find(function (item) {
                return num >= item.value;
            });
            return item ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol : "0";
        }
        function bFormatter(num) {
            return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000000000).toFixed(3)): Math.sign(num)*Math.abs(num)
        }
        var months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        function month_name(num){
            months.forEach((value,idx)=>{
                if(parseInt(num)-1 == idx){
                    num = value;
                }
            })
            return num;
        }
        var initialize_;
        function sum_to_prev(num){
            if(initialize_==null){
                initialize_ = 0;
            }
            initialize_ += parseInt(num);
            num = initialize_;
            return num;
        }
        function get_max_interval(arr){
            let max = 0
            arr.forEach((val,idx)=>{
                if(val>=max){
                    max = val
                }
            })
            return max*2;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"
        integrity="sha512-K5BohS7O5E+S/W8Vjx4TIfTZfxe9qFoRXlOXEAWJD7MmOXhvsSl2hJihqc0O8tlIfcjrIkQXiBjixV8jgon9Uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo bg-white-2 mb-3">
                    <a href="<?= site_url('dashboard')?>" class="app-brand-link ">
                        <span class="app-brand-logo demo">
                            <img src="<?= base_url('assets'); ?>/img/logowarna.png" alt="logo-mtf" width="180"
                                height="80" loading="lazy">
                        </span>
                    </a>
                    <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul id="adm-aside" class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item <?php if (htmlentities($identifier)=='is_home')echo 'active open'; ?>">
                        <a href="<?= site_url('dashboard')?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics" class="tzt">Dashboard</div>
                        </a>
                    </li>
                    <!-- Streategi Penjualan -->
                    <li
                        class="menu-item <?php if(htmlentities($identifier)=='is_strategi_penjualan')echo 'active open'; ?>">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-money"></i>
                            <div data-i18n="Streategi Penjualan ">Strategi Penjualan </div>
                        </a>
                        <ul class="menu-sub stay-open">
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_lending_cabang')echo 'active'; ?>">
                                <a href="<?= site_url('lending')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="Lending Cabang">Lending Cabang</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_performa_so')echo 'active'; ?>">
                                <a href="<?= site_url('performa_so')?>"  onclick="sessionStorage.setItem('is_mtd', true)"class="menu-link">
                                    <div data-i18n="Performa SO">Performa SO</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_performa_dealer')echo 'active'; ?>">
                                <a href="<?= site_url('performa_dealer')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="Performa Dealer">Performa Dealer</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_performa_produk')echo 'active'; ?>">
                                <a href="<?= site_url('performa_produk')?>"  onclick="sessionStorage.setItem('is_mtd', true)"class="menu-link">
                                    <div data-i18n="Performa Produk">Performa Product</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_history')echo 'active'; ?>">
                                <a href="<?= site_url('history_assets')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="History Assets">History Assets</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_segment_customer')echo 'active'; ?>">
                                <a href="<?= site_url('segment_customer')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="Segment Customer">Customer Segment</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_customer_retention')echo 'active'; ?>">
                                <a href="<?= site_url('customer_retention')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="Customer Retention">Customer Retention</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="menu-item <?php if(htmlentities($identifier)=='is_strategi_collection')echo 'active open'; ?>">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                            <div data-i18n="Strategi Collection">Strategi Collection</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_epd_monitoring')echo 'active'; ?>">
                                <a href="<?= site_url('epd_monitoring')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="EPD Monitoring">EPD Monitoring</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_tod_monitoring')echo 'active'; ?>">
                                <a href="<?= site_url('tod_monitoring')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="TOD Monitoring">TOD Monitoring</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_npl_monitoring')echo 'active'; ?>">
                                <a href="<?= site_url('npl_monitoring')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="NPL Monitoring">NPL Monitoring</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_cwo_monitoring')echo 'active'; ?>">
                                <a href="<?= site_url('cwo_monitoring')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="CWO Monitoring">CWO Monitoring</div>
                                </a>
                            </li>
                            <li
                                class="menu-item <?php if(htmlentities($submenu_identity)=='is_performa_armo')echo 'active'; ?>">
                                <a href="<?= site_url('performa_armo')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                                    <div data-i18n="Performa Armo">Performa Armo</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php if(htmlentities($identifier)=='is_profit_cabang')echo 'active open'; ?>">
                        <a href="<?= site_url('profit')?>" onclick="sessionStorage.setItem('is_mtd', true)" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                            <div data-i18n="Management Profit">Profitabilitas Cabang</div>
                        </a>
                    </li>
                    <li class="menu-item <?php if(htmlentities($identifier)=='is_sla_cabang')echo 'active open'; ?>">
                        <a href="<?= site_url('coming_soon')?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-recycle"></i>
                            <div data-i18n="Management Account">SLA Cabang</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="#">
                            <i class="text-warning bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <p class="text-suryanto text-light pt-3 fs-lg-4">
                                    Selamat Datang, <b>
                                        <?= (htmlentities($current_user->jenis_kelamin) == 0)?'Bapak':'Ibu';?>
                                        <?= explode(' ', trim(htmlentities($current_user->fullname) ))[0];?>
                                    </b>
                                </p>
                                <p class="text-suryanto-mobile text-light pt-3 fs-lg-4">Selamat Datang, <br> <b>Bapak
                                        <?= explode(' ', trim(htmlentities($current_user->fullname) ))[0];?>
                                    </b>
                                </p>
                            </div>
                        </div>
                        <div class="navbar-nav align-items-center timer-fields">
                            <div class="nav-item d-flex justify-content-end align-items-center">
                            <button class="btn btn-danger btn-timer" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover" data-aos="fade-left"
                                                       >
                                                <i class="bx bx-time"></i>
                                                <span id="timer"></span>
                                            </button>
                            </div>
                        </div>
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">

                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                                    <div class="row">
                                        <div class="col pt-lg-3 pt-md-3">
                                            <div class="avatar avatar-online ">
                                                <img src="<?= base_url('assets'); ?>/img/avatars/<?= (htmlentities($current_user->jenis_kelamin) == 0)?'usr_man.png':'usr_woman.png';?>"
                                                    class="w-px-40 h-auto rounded-circle" alt="logo-user"
                                                    loading="lazy" />
                                            </div>
                                        </div>
                                        <div
                                            class="col justify-content-center align-items-center text-left text-light d-xs-none">
                                            <p style="position: relative;top:20%;right: 0;font-size: 16px;"><span
                                                    class="usr-db"></span>
                                                <?= htmlentities($current_user->fullname) ?> <i
                                                    class='bx bx-chevron-down'></i>
                                            </p>
                                            <p style="font-size: 11px;">Branch Manager
                                                <?= htmlentities($current_cabang->nama_cabang);?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url('assets'); ?>/img/avatars/<?= (htmlentities($current_user->jenis_kelamin) == 0)?'usr_man.png':'usr_woman.png';?>"
                                                            class="w-px-40 h-auto rounded-circle" alt="logo-user"
                                                            loading="lazy" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        <?= htmlentities($current_user->fullname) ?>
                                                    </span>
                                                    <small class="text-muted" style="color: #6A7B8E !important;">Branch
                                                        Manager</small> <br>
                                                    <small class="text-muted" style="color: #6A7B8E !important;">
                                                        <?= htmlentities($current_cabang->nama_cabang);?>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('auth/logout')?>">
                                            <i class="bx bx-power-off me-2 text-danger"></i>
                                            <span class="align-middle">Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                <script>
                    var btn_time = document.querySelector('.btn-timer')
                    if(sessionStorage.getItem('is_aov')=='true'){
                        if(btn_time.hasAttribute('data-bs-toggle'))btn_time.removeAttribute('data-bs-toggle')
                        if(btn_time.hasAttribute('data-bs-trigger'))btn_time.removeAttribute('data-bs-trigger')
                        if(btn_time.hasAttribute('data-bs-content'))btn_time.removeAttribute('data-bs-content')
                        if(btn_time.hasAttribute('data-bs-aos'))btn_time.removeAttribute('data-bs-aos')
                        if(btn_time.hasAttribute('data-aos'))btn_time.removeAttribute('data-aos')
                        if(btn_time.classList.contains('aos-init'))btn_time.classList.remove('aos-init')
                        if(btn_time.classList.contains('aos-animate'))btn_time.classList.remove('aos-animate')
                    }
                </script>