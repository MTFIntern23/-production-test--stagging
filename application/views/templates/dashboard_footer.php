<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="row">
            <div class="col-12">
                <img class="logo" src="./assets/img/footer.webp" alt="footer-img" width="280" height="40" loading="lazy">
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
<!-- Idle Modal -->
<div class="modal fade" id="idleModal" tabindex="-1" aria-labelledby="idleModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="idleModalLabel"><i
                        class="bx bxs-error-circle me-2 text-danger fs-2"></i>Tindakan <code>Idling</code>
                    terdeteksi
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Untuk otoritas keamanan aplikasi,<br> pastikan tidak melakukan tindakan idling
                    <code>[Tidak melakukan apapun dalam waktu yang lama]</code>.
                </p>
                <p> Silakan klik tombol <code>close</code> untuk melanjutkan* <br>
                    atau aplikasi akan <code>Logout</code> otomatis dalam <span id="time-left"
                        class="fw-bold text-warning">45</span>
                    <span class="fw-bold text-warning">Detik</span>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Warning Modal -->
<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="warningModalLabel"><i
                        class="bx bxs-error me-2 text-warning fs-2"></i>Waspada serangan <code>Phising</code> !
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold text-danger">Anda terdeteksi meninggalkan aplikasi.</p>
                <p>Meninggalkan aplikasi / Membuka Tab Baru saat aplikasi web masih berjalan sangat berbahaya!
                    <br>Pastikan selalu waspada terhadap link apapun ketika meninggalkan aplikasi.
                </p>
                <small>* Cari tahu tentang <code>Phising</code> dan cara mencegahnya <a class="text-warning fw-bold"
                        href="https://tekno.kompas.com/read/2009/05/27/17001058/10.tips.mencegah.serangan.phising"
                        target="_blank"><u>disini</u></a></small>
                <br>
                <small>* Tekan tombol <code>Lanjutkan</code> untuk melanjutkan aktivitas</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
<div class="buy-now">
    <a href="#" class="btn btn-warning btn-buy-now"><i class='bx bxs-chevrons-up'></i></a>
</div>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js" integrity="sha512-vyRAVI0IEm6LI/fVSv/Wq/d0KUfrg3hJq2Qz5FlfER69sf3ZHlOrsLriNm49FxnpUGmhx+TaJKwJ+ByTLKT+Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url('assets'); ?>/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js" integrity="sha512-467grL09I/ffq86LVdwDzi86uaxuAhFZyjC99D6CC1vghMp1YAs+DqCgRvhEtZIKX+o9lR0F2bro6qniyeCMEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Main JS -->
<script src="<?= base_url('assets'); ?>/js/main.js"></script>
<script type="module" src="<?= base_url('assets'); ?>/js/useIdle.js"></script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG GLOBAL JS -->
<!-- ==================== -->
<!-- ==================== -->
<script>
    //notyf
    var notyf = new Notyf({
        duration: 3000,
            position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true
    });
    notyf.error(`Logout Aborted`);
    //modalIdle
    var durasiToLogout = 45; //ms
    var idleModal = new bootstrap.Modal(document.getElementById("idleModal"), {});
    var warningModal = new bootstrap.Modal(document.getElementById("warningModal"), {});
    var timing = document.getElementById("time-left");
    var timerLogout = null;
    $('#idleModal').on('show.bs.modal', function(e) {
        $(document).on("keydown", function(e) {
            if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault();
        });
        // window.onbeforeunload = function(e) {
        //     e.preventDefault();
        //     e.returnValue = '';
        // }
        window.onload = function() {
            window.location.href =
                '<?= site_url("auth/logout")?>'
        }
        timerLogout = setInterval(function() {
            if (durasiToLogout == -1) {
                clearInterval(timerLogout)
                durasiToLogout = 45
                window.location.href =
                    '<?= site_url("auth/logout")?>'
            } else {
                timing.innerHTML = durasiToLogout;
                durasiToLogout--;
            }
        }, 1000);
    });
    $("#idleModal").on("hide.bs.modal", function() {
        // window.location.href =
        //     '<?= site_url("auth/logout")?>'
        clearInterval(timerLogout)
        timing.innerHTML = 45;
        durasiToLogout = 45
    });
    //all about animation
    AOS.init({
        duration: 1200,
    });
    function animateValue(obj, start, end, duration, isNorm) {
        let startTimestamp = null;
        let end_str = end.toString().split('.');
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min(((timestamp - startTimestamp) / duration), 1);
            (end_str[0].length >= 3)?(isNorm == true) ? obj.innerHTML = Math.floor(progress * (end - start) + start) : obj.innerHTML = Number((progress * (end - start) + start)).toFixed(1) + '%':(isNorm == true) ? obj.innerHTML = parseFloat(progress * (end - start) + start).toFixed(1) : obj.innerHTML = Number((progress * (end - start) + start)).toFixed(1) + '%';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    const percentage_anim = document.querySelectorAll('#number-animate');
    const norm_anim = document.querySelectorAll('#number-animate-norm');
    percentage_anim.forEach((number, idx) => {
        animateValue(number, 0.00, parseFloat(number.innerHTML), 1500, false);
    });
    norm_anim.forEach((number, idx) => {
        animateValue(number, 0.00, parseFloat(number.innerHTML), 1500, true);
    });
    //disable right click and inspect
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });
    document.onkeydown = function (e) {
        // if(e.keyCode == 123) {
        //     return false;
        // }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
    }
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
    const to_detail_mtd = function (page,id=null) {
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
        } else if (page == 'tod') {
            window.location.href = '<?= base_url('tod_monitoring_detail')?>'
        } else if (page == 'armo') {
            window.location.href = '<?= base_url('performa_armo_detail')?>'
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
        }else if (page == 'tod') {
            window.location.href = '<?= base_url('tod_monitoring_detail')?>'
        }else if (page == 'armo') {
            window.location.href = '<?= base_url('performa_armo_detail')?>'
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
    //select input dropdown
    let filter = document.querySelector("#filter");
    let areaSubFilter = document.querySelectorAll('#sub-filter');
    let callSubFilter = function(callSubFilter,valuesSubFilters) {
        let str = "";
        let idx = "";
        callSubFilter.forEach((element,idx) => {
            str += `<option value= "${valuesSubFilters[idx]}">${element}</option>`;
        });
        return str;
    }
    //serverside rendering
    function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function(e, settings) {
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        setTimeout(dt.ajax.reload, 0);
                        return false;
                    });
                });
                dt.ajax.reload();
        };
</script>
</body>

</html>