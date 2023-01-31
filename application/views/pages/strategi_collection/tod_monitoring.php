<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand',false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        TOD Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    TOD Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                <div class="row mb-4 ms-2 me-2">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-block">
                            <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                            <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                        </div>
                    </div>
                </div>
                <div id="chart_mtd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="tod_monitoring_mtd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="tod_monitoring_mtd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="tod_monitoring_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>BucketOD</th>
                                    <th>OSP All</th>
                                    <th>OSP Restru</th>
                                    <th>OSP Normal</th>
                                    <th>Ratio All</th>
                                    <th>Ratio Restru</th>
                                    <th>Ratio Normal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Current</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1-30</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>31-60</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>61-90</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>91-120</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>121-150</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>151-180</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('tod')" type="button"
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
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="tod_monitoring_ytd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="tod_monitoring_ytd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="tod_monitoring_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>BucketOD</th>
                                    <th>OSP All</th>
                                    <th>OSP Restru</th>
                                    <th>OSP Normal</th>
                                    <th>Ratio All</th>
                                    <th>Ratio Restru</th>
                                    <th>Ratio Normal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Current</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1-30</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td>
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>31-60</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>61-90</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>91-120</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>121-150</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
                                            class="btn_session badge btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit"><i class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>151-180</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>9999</td>
                                    <td>9999</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('tod')"
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
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    //here
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart tod_monitoring mtd
    var options_tod_monitoring_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 350,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
    };
    var chart_tod_monitoring_mtd = new ApexCharts(document.querySelector("#tod_monitoring_mtd_chart"),
        options_tod_monitoring_mtd);
    chart_tod_monitoring_mtd.render();

    // chart epd_monitoring mtd
    var options_tod_monitoring_mtd_2 = {
        series: [{
            name: 'TEAM A',
            type: 'column',
            data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
        }, {
            name: 'TEAM B',
            type: 'area',
            data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
        }, {
            name: 'TEAM C',
            type: 'line',
            data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
        }],
        chart: {
            height: 350,
            type: 'line',
            stacked: false,
        },
        stroke: {
            width: [0, 2, 5],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },

        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
            '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
        ],
        markers: {
            size: 0
        },
        xaxis: {
            type: 'datetime'
        },
        yaxis: {
            title: {
                text: 'Points',
            },
            min: 0
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;

                }
            }
        }
    };
    var chart_tod_monitoring_mtd_2 = new ApexCharts(document.querySelector("#tod_monitoring_mtd_chart_2"),
        options_tod_monitoring_mtd_2);
    chart_tod_monitoring_mtd_2.render();

    // chart tod_monitoring ytd
    var options_tod_monitoring_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart: {
            height: 350,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
    };
    var chart_tod_monitoring_ytd = new ApexCharts(document.querySelector("#tod_monitoring_ytd_chart"),
        options_tod_monitoring_ytd);
    chart_tod_monitoring_ytd.render();

    // chart tod_monitoring ytd
    var options_tod_monitoring_ytd_2 = {
        series: [{
            name: 'YTD <?php echo Date("F Y");?>',
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
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    };
    var chart_tod_monitoring_ytd_2 = new ApexCharts(document.querySelector("#tod_monitoring_ytd_chart_2"),
        options_tod_monitoring_ytd_2);
    chart_tod_monitoring_ytd_2.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function() {
        $('#tod_monitoring_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#tod_monitoring_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->