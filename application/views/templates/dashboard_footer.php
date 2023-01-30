<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="row">
            <div class="col-12">
                <img class="logo" src="./assets/img/footer.png" alt="footer-img" width="280" height="40">
            </div>
            <div class="col-12">
                <p class="text-light mt-3 ms-1 mb-2 mb-md-0 fw-lighter" style="font-size: 12px;">
                    Copyright &copy;
                    <?= Date('Y') ?> Corporate
                    Planning and Performance Management Division. Created by Ricky Rivaldo,
                    Data
                    Information Support Analyst
                </p>
            </div>
        </div>
</footer>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<div class="buy-now">
    <a href="#" class="btn btn-warning btn-buy-now"><i class='bx bxs-chevrons-up'></i></a>
</div>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
    integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"
    integrity="sha512-vyRAVI0IEm6LI/fVSv/Wq/d0KUfrg3hJq2Qz5FlfER69sf3ZHlOrsLriNm49FxnpUGmhx+TaJKwJ+ByTLKT+Yg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.js"
    integrity="sha512-EXRb/1mTZs4VEgPqlabQWHw2hnGn269OM3QvLfLeEeEp7GznVGkbYdu+bU9bb/XLYda6drPfWCyoMm6RYwSZMg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="<?= base_url('assets'); ?>/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js"
    integrity="sha512-467grL09I/ffq86LVdwDzi86uaxuAhFZyjC99D6CC1vghMp1YAs+DqCgRvhEtZIKX+o9lR0F2bro6qniyeCMEQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Main JS -->
<script src="<?= base_url('assets'); ?>/js/main.js"></script>

<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG GLOBAL JS -->
<!-- ==================== -->
<!-- ==================== -->
<script>
    //all about animation
    AOS.init({
        duration: 1200,
    });
    function animateValue(obj, start, end, duration, isNorm) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            (isNorm == true) ? obj.innerHTML = Math.floor(progress * (end - start) + start) : obj.innerHTML = Number((progress * (end - start) + start)).toFixed(1) + '%';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    const percentage_anim = document.querySelectorAll('#number-animate');
    const norm_anim = document.querySelectorAll('#number-animate-norm');
    percentage_anim.forEach((number, idx) => {
        animateValue(number, 0, parseFloat(number.innerHTML), 1500, false);
    });
    norm_anim.forEach((number, idx) => {
        animateValue(number, 0, parseFloat(number.innerHTML), 1500, true);
    });

    //console-warning
    var _0x44a1 = ["log", "color: #546FE6; font-size: 18px;", "color: red; font-size: 24px;",
        "%cBy doing anthing in this console, you risk giving attackers access to your account or computer",
        "%cWARNING", "color: red; font-size: 75px; text-shadow: 2px 2px #546FE6;"
    ];
    ! function (o, e) {
        ! function (e) {
            for (; --e;) o.push(o.shift())
        }(++e)
    }(_0x44a1, 343);
    var _0x30b5 = function (o, e) {
        return _0x44a1[o -= 0]
    };
    setTimeout(function () {
        console.log(_0x30b5("0x3"), _0x30b5("0x4")), console.log(
            "%cIf someone tells you to write, copy/paste or read anything from this console, there is a 101% chance you're being scammed!",
            _0x30b5("0x0")), console[_0x30b5("0x5")](_0x30b5("0x2"), _0x30b5("0x0")), console[_0x30b5(
                "0x5")](
                    "%cNo, this console CANNOT be used to gain access to someone elses account, only yours. ",
                    _0x30b5("0x0")), console[_0x30b5("0x5")]("%cStay safe and close this side-bar.", _0x30b5("0x1"))
    }, 1500);

    //session hide/show
    const chart_mtd_detail = document.querySelectorAll('#chart_mtd')
    const chart_ytd_detail = document.querySelectorAll('#chart_ytd')
    const btn_mtd = document.querySelectorAll('#btn-chart-mtd')
    const btn_ytd = document.querySelectorAll('#btn-chart-ytd')
    const btn_detail_mtd = document.querySelectorAll('#to_detail_mtd')
    const btn_detail_ytd = document.querySelectorAll('#to_detail_ytd')
    //so detail
    const to_detail_mtd = function (page) {
        sessionStorage.setItem("is_mtd", true);
        if (page == 'so') {
            window.location.href = '<?= base_url('performa_so_detail')?>'
        } else if (page == 'dealer') {
            window.location.href = '<?= base_url('performa_dealer_detail')?>'
        } else if (page == 'produk') {
            window.location.href = '<?= base_url('performa_produk_detail')?>'
        } else if (page == 'history') {
            window.location.href = '<?= base_url('history_assets_detail')?>'
        } else if (page == 'jbrand') {
            window.location.href = '<?= base_url('history_assets_jbrand_detail')?>'
        }
    }
    const to_detail_ytd = function (page) {
        sessionStorage.setItem("is_mtd", false);
        if (page == 'so') {
            window.location.href = '<?= base_url('performa_so_detail')?>'
        } else if (page == 'dealer') {
            window.location.href = '<?= base_url('performa_dealer_detail')?>'
        } else if (page == 'produk') {
            window.location.href = '<?= base_url('performa_produk_detail')?>'
        } else if (page == 'history') {
            window.location.href = '<?= base_url('history_assets_detail')?>'
        } else if (page == 'jbrand') {
            window.location.href = '<?= base_url('history_assets_jbrand_detail')?>'
        }
    }
    //btn session
    if ((sessionStorage.getItem("is_mtd") == 'false')) {
        btn_ytd.forEach((btn,idx) => {
            if (btn.classList.contains('btn-secondary')) {
                btn.classList.remove('btn-secondary');
            }
            if (!btn.classList.contains('bg-chart-active')) {
                btn.classList.add('bg-chart-active');
            }
            btn_mtd[idx].classList.remove('bg-chart-active');
            btn_mtd[idx].classList.add('btn-secondary');
        });
    }
    //chart session
    if (sessionStorage.getItem("is_mtd") == 'true') {
        chart_mtd_detail.forEach((chart_mtd,idx)=>{
            chart_mtd.classList.remove('d-none');
            if (!chart_ytd_detail[idx].classList.contains('d-none')) {
                chart_ytd_detail[idx].classList.add('d-none');
            }
        })
    } else {
        chart_ytd_detail.forEach((chart_ytd,idx)=>{
            chart_ytd.classList.remove('d-none');
            if (!chart_mtd_detail[idx].classList.contains('d-none')) {
                chart_mtd_detail[idx].classList.add('d-none');
            }
        })
    }
    function show_mtd_chart () {
        sessionStorage.setItem('is_mtd',true)
        chart_mtd_detail.forEach((mtd, idx) => {
            mtd.classList.remove('d-none');
            if (!chart_ytd_detail[idx].classList.contains('d-none')) {
                chart_ytd_detail[idx].classList.add('d-none');
            }
            //btn
            if (btn_ytd[idx].classList.contains('bg-chart-active')) {
                btn_ytd[idx].classList.remove('bg-chart-active');
                btn_ytd[idx].classList.add('btn-secondary');
            }
            if (!btn_mtd[idx].classList.contains('bg-chart-active')) {
                btn_mtd[idx].classList.remove('btn-secondary');
                btn_mtd[idx].classList.add('bg-chart-active');
            }
        });
    }
    function show_ytd_chart () {
        sessionStorage.setItem('is_mtd',false)
        chart_ytd_detail.forEach((ytd, idx) => {
            ytd.classList.remove('d-none');
            if (!chart_mtd_detail[idx].classList.contains('d-none')) {
                chart_mtd_detail[idx].classList.add('d-none');
            }
            //btn
            if (btn_mtd[idx].classList.contains('bg-chart-active')) {
                btn_mtd[idx].classList.remove('bg-chart-active');
                btn_mtd[idx].classList.add('btn-secondary');
            }
            if (!btn_ytd[idx].classList.contains('bg-chart-active')) {
                btn_ytd[idx].classList.remove('btn-secondary');
                btn_ytd[idx].classList.add('bg-chart-active');
            }
        })
    }
</script>
</body>

</html>