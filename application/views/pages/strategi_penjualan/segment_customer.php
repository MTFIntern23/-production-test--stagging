<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand',false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Segment Customer</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="border-bottom: 3px solid #202657;">
                    <h5 class="card-header text-dark fs-4 text-start">
                        Customer Segment <b>
                            <?= $current_cabang->nama_cabang;?>
                        </b>
                    </h5>
                    <div class="row ms-2 me-2">
                        <div class="col">
                            <div class="d-md-block">
                                <button id="btn-history" class="badge btn bg-chart-active-2" onclick="show_pendikan()"
                                    type="button"><i class='bx bxs-graduation me-1'></i>Jenis Pendidikan</button>
                                <button id="btn-history-jbrand" class="badge btn btn-history-null "
                                    onclick="show_kecamatan()" type="button"><i
                                        class='bx bxs-school me-1'></i>Kecamatan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pendidikan-field">
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
                    <!-- <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Jenis Pendidikan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div> -->
                    <div id="chart_mtd">
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pendidikan_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="pendidikan_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
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
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                    <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="pendidikan_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="pendidikan_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                        <table id="pendidikan_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>S1 YTD</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>D3</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SMA</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>
                </div>
                <div id="kecamatan-field" class="d-none">
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
                    <div id="chart_mtd">
                    <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_mtd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="kecamatan_mtd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="kecamatan_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Lending MTD Des 22</th>
                                        <th>Lending MTD Jan 23</th>
                                        <th>Unit MTD Des 22</th>
                                        <th>Unit MTD Jan 23</th>
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
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Agung Auto</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>205</td>
                                        <td>205</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>PT Cipta Karya</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /datatables -->
                    </div>

                    <div id="chart_ytd" class="d-none">
                    <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 first_chart_pd ">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_ytd_chart"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-6 second_chart_pd">
                                <div class="ms-3 me-4 ">
                                    <div id="kecamatan_ytd_chart_2"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 ">
                                <div class="ms-3 me-4 third_chart_pd">
                                    <div id="kecamatan_ytd_chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                        <table id="kecamatan_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Lending MTD 2022</th>
                                        <th>Lending MTD 2023</th>
                                        <th>Unit MTD 2022</th>
                                        <th>Unit MTD 2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tanah Abang</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pasar Senen</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Harmoni</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>Rp 2,000,000,000</td>
                                        <td>200</td>
                                        <td>200</td>
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
    const pendidikan_field = document.querySelector('#pendidikan-field')
    const kecamatan_field = document.querySelector('#kecamatan-field')
    const show_pendikan = function () {
        pendidikan_field.classList.remove('d-none');
        if (!kecamatan_field.classList.contains('d-none')) {
            kecamatan_field.classList.add('d-none');
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
    const show_kecamatan = function () {
        kecamatan_field.classList.remove('d-none');
        if (!pendidikan_field.classList.contains('d-none')) {
            pendidikan_field.classList.add('d-none');
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
    var options_pendidikan_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 330,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_mtd = new ApexCharts(document.querySelector("#pendidikan_mtd_chart"),
        options_pendidikan_mtd);
    chart_pendidikan_mtd.render();

    var options_pendidikan_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 330,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_mtd_2 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_2"),
        options_pendidikan_mtd_2);
    chart_pendidikan_mtd_2.render();

    var options_pendidikan_mtd_3 = {
        series: [{
            name: "History Assets MTD",
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
        },

    };
    var chart_pendidikan_mtd_3 = new ApexCharts(document.querySelector("#pendidikan_mtd_chart_3"),
        options_pendidikan_mtd_3);
    chart_pendidikan_mtd_3.render();

    // chart history_assets ytd
    var options_pendidikan_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_ytd = new ApexCharts(document.querySelector("#pendidikan_ytd_chart"),
        options_pendidikan_ytd);
    chart_pendidikan_ytd.render();

    var options_pendidikan_ytd_2 = {
        title: {
            text: 'YTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_pendidikan_ytd_2 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_2"),
        options_pendidikan_ytd_2);
    chart_pendidikan_ytd_2.render();

    var options_pendidikan_ytd_3 = {
        series: [{
                name: "Pendidikan YTD",
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
            tooltipHoverFormatter: function(val, opts) {
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
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_pendidikan_ytd_3 = new ApexCharts(document.querySelector("#pendidikan_ytd_chart_3"),
        options_pendidikan_ytd_3);
    chart_pendidikan_ytd_3.render();

    // chart history_assets jbrand_ mtd
    var options_kecamatan_mtd = {
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
    var chart_kecamatan_mtd = new ApexCharts(document.querySelector("#kecamatan_mtd_chart"),
        options_kecamatan_mtd);
    chart_kecamatan_mtd.render();

    // chart history_assets ytd
    var options_kecamatan_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_mtd = new ApexCharts(document.querySelector("#kecamatan_mtd_chart"),
        options_kecamatan_mtd);
    chart_kecamatan_mtd.render();

    var options_kecamatan_mtd_2 = {
        title: {
            text: 'MTD <?php  $oneMonthAgo = new \DateTime("1 month ago");echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_mtd_2 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_2"),
        options_kecamatan_mtd_2);
    chart_kecamatan_mtd_2.render();

    var options_kecamatan_mtd_3 = {
        series: [{
                name: "Kecamatan MTD",
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
            tooltipHoverFormatter: function(val, opts) {
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
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_kecamatan_mtd_3 = new ApexCharts(document.querySelector("#kecamatan_mtd_chart_3"),
        options_kecamatan_mtd_3);
    chart_kecamatan_mtd_3.render();

    // chart kecamatan ytd
    var options_kecamatan_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_ytd = new ApexCharts(document.querySelector("#kecamatan_ytd_chart"),
        options_kecamatan_ytd);
    chart_kecamatan_ytd.render();

    var options_kecamatan_ytd_2 = {
        title: {
            text: 'YTD <?php $oneMonthAgo = new \DateTime("1 month ago"); echo $oneMonthAgo->format("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 330,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: 180
                },
                legend: {
                    position: 'bottom'
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    width: 170
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart_kecamatan_ytd_2 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_2"),
        options_kecamatan_ytd_2);
    chart_kecamatan_ytd_2.render();

    var options_kecamatan_ytd_3 = {
        series: [{
                name: "kecamatan YTD",
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
            tooltipHoverFormatter: function(val, opts) {
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
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        },

    };
    var chart_kecamatan_ytd_3 = new ApexCharts(document.querySelector("#kecamatan_ytd_chart_3"),
        options_kecamatan_ytd_3);
    chart_kecamatan_ytd_3.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#pendidikan_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#pendidikan_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#kecamatan_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#kecamatan_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->