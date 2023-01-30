<!-- Content -->
<script>
        (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    // sessionStorage.setItem('is_jbrand',false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        History Assets</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="border-bottom: 3px solid #202657;">
                    <h5 class="card-header text-dark fs-4 text-start">
                        History Assets <b>
                            <?= $current_cabang->nama;?>
                        </b>
                    </h5>
                    <div class="row ms-2 me-2">
                        <div class="col">
                            <div class="d-md-block">
                                <button id="btn-history" class="badge btn bg-chart-active-2" onclick="show_history()"
                                    type="button"><i class='bx bxs-car me-1'></i>Tipe Kendaraan</button>
                                <button id="btn-history-jbrand" class="badge btn btn-history-null "
                                    onclick="show_jbrand()" type="button"><i class='bx bxs-credit-card me-1'></i>Jenis
                                    Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tipe-kendaraan-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <div class="row justify-content-sm-start">
                                    <div class="select-filter col-xl-3 col-lg-3 col-md-5 col-sm-12"
                                        style="margin-right: -15px;">
                                        <select class="form-select " aria-label="Filter">
                                            <option selected disabled>Pilih Filter</option>
                                            <option value="all">All</option>
                                            <option value="group_product">Group Product</option>
                                            <option value="jenis_asset">Jenis Asset</option>
                                        </select>
                                    </div>
                                    <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                        style="margin-right: -15px;">
                                        <select class="form-select " aria-label="Sub-filter">
                                            <option selected disabled>Pilih Sub-Filter</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-warning btn-search" onclick="" type="button"><i
                                                class='bx bx-search me-1'></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Tipe Kendaraan Cabang
                                    <?= $current_cabang->nama;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('history')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('history')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('history')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending YTD 2022</th>
                                        <th>Lending YTD 2023</th>
                                        <th>Unit YTD 2022</th>
                                        <th>Unit YTD 2023</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi YTD</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('history')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('history')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('history')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>
                <div id="jenis-brand-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                                <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                    type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 ms-2 me-2">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <div class="row justify-content-sm-start">
                                    <div class="select-filter col-xl-3 col-lg-3 col-md-5 col-sm-12"
                                        style="margin-right: -15px;">
                                        <select class="form-select " aria-label="Filter">
                                            <option selected disabled>Pilih Filter</option>
                                            <option value="all">All</option>
                                            <option value="group_product">Group Product</option>
                                            <option value="jenis_asset">Jenis Asset</option>
                                        </select>
                                    </div>
                                    <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                        style="margin-right: -15px;">
                                        <select class="form-select " aria-label="Sub-filter">
                                            <option selected disabled>Pilih Sub-Filter</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-warning btn-search" onclick="" type="button"><i
                                                class='bx bx-search me-1'></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Jenis Brand Kendaraan Cabang
                                    <?= $current_cabang->nama;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_jbrand_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_mtd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('jbrand')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('jbrand')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button id="to_detail_mtd" onclick="to_detail_mtd('jbrand')" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_jbrand_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_ytd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending YTD 2022</th>
                                        <th>Lending YTD 2023</th>
                                        <th>Unit YTD 2022</th>
                                        <th>Unit YTD 2023</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mitsubishi YTD</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('jbrand')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>
                                            <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('jbrand')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('jbrand')"
                                                class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
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
    const btn_history = document.querySelector('#btn-history')
    const btn_history_jbrand = document.querySelector('#btn-history-jbrand')
    const history_field = document.querySelector('#tipe-kendaraan-field')
    const jbrand_field = document.querySelector('#jenis-brand-field')
    //btn session
    if ((sessionStorage.getItem("is_jbrand") == 'true')) {
            if (btn_history_jbrand.classList.contains('btn-history-null')) {
                btn_history_jbrand.classList.remove('btn-history-null');
            }
            if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
                btn_history_jbrand.classList.add('bg-chart-active-2');
            }
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand") == 'true') {
            jbrand_field.classList.remove('d-none');
            if (!history_field.classList.contains('d-none')) {
                history_field.classList.add('d-none');
            }
    } else {
            history_field.classList.remove('d-none');
            if (!jbrand_field.classList.contains('d-none')) {
                jbrand_field.classList.add('d-none');
            }
    }
    //show btn
    function show_history() {
        sessionStorage.setItem('is_jbrand',false);
        history_field.classList.remove('d-none');
        if (!jbrand_field.classList.contains('d-none')) {
            jbrand_field.classList.add('d-none');
        }
        //btn
        if (btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('bg-chart-active-2');
            btn_history_jbrand.classList.add('btn-history-null');
        }
        if (!btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('btn-history-null');
            btn_history.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
    function show_jbrand() {
        sessionStorage.setItem('is_jbrand',true)
        jbrand_field.classList.remove('d-none');
        if (!history_field.classList.contains('d-none')) {
            history_field.classList.add('d-none');
        }
        //btn
        if (btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
        }
        if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('btn-history-null');
            btn_history_jbrand.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart history_assets mtd
    var options_history_assets_mtd = {
        series: [{
            name: 'History Assets MTD',
            type: 'column',
            data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
        }, {
            name: 'Social Media',
            type: 'line',
            data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
        }],
        chart: {
            height: 350,
            type: 'line',
        },
        stroke: {
            width: [0, 4]
        },
        title: {
            text: 'Traffic Sources'
        },
        dataLabels: {
            enabled: true,
            enabledOnSeries: [1]
        },
        labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
        xaxis: {
            type: 'datetime'
        },
        yaxis: [{
            title: {
                text: 'Website Blog',
            },

        }, {
            opposite: true,
            title: {
                text: 'Social Media'
            }
        }]
    };

    var chart_history_assets_mtd = new ApexCharts(document.querySelector("#history_assets_mtd_chart"),
        options_history_assets_mtd);
    chart_history_assets_mtd.render();
    // chart history_assets ytd
    var options_history_assets_ytd = {
        series: [{
            name: "History Assets YTD",
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
            text: 'Page Statistics',
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
            y: [{
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
    var chart_history_assets_ytd = new ApexCharts(document.querySelector("#history_assets_ytd_chart"),
        options_history_assets_ytd);
    chart_history_assets_ytd.render();

    // chart history_assets jbrand_ mtd
    var options_history_assets_jbrand_mtd = {
        series: [{
            name: "History Assets Jbrand MTD",
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
            text: 'Page Statistics',
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
            y: [{
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
    var chart_history_assets_jbrand_mtd = new ApexCharts(document.querySelector("#history_assets_jbrand_mtd_chart"),
        options_history_assets_jbrand_mtd);
    chart_history_assets_jbrand_mtd.render();

    // chart history_assets ytd
    var options_history_assets_jbrand_ytd = {
        series: [{
            name: "History Assets Jbrand YTD",
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
            text: 'Page Statistics',
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
            y: [{
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
    var chart_history_assets_jbrand_ytd = new ApexCharts(document.querySelector("#history_assets_jbrand_ytd_chart"),
        options_history_assets_jbrand_ytd);
    chart_history_assets_jbrand_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#history_assets_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#history_assets_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#history_assets_jbrand_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#history_assets_jbrand_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->