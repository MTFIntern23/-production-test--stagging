<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        Performa ARMO</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa ARMO<b>
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
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_armo_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_armo_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama ARMO</th>
                                    <th>SUpervisor</th>
                                    <th>Pencapaian Bulan Ini</th>
                                    <th>Target Bulan Ini</th>
                                    <th>Lending</th>
                                    <th>Prestasi Pencapaian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>22 Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('armo')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button id="to_detail_mtd" onclick="to_detail_mtd('armo')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button id="to_detail_mtd" onclick="to_detail_mtd('armo')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button id="to_detail_mtd" onclick="to_detail_mtd('armo')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button id="to_detail_mtd" onclick="to_detail_mtd('armo')" type="button"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
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
                                <div id="performa_armo_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_armo_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama ARMO</th>
                                    <th>SUpervisor</th>
                                    <th>Pencapaian Bulan Ini</th>
                                    <th>Target Bulan Ini</th>
                                    <th>Lending</th>
                                    <th>Prestasi Pencapaian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>24 Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('armo')"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('armo')"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('armo')"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('armo')"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
                                            Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('armo')"
                                            class="btn_session badge btn btn-primary me-2"><i
                                                class='bx bx-detail me-1'></i>
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
    // chart performa_armo mtd
    var options_performa_armo_mtd = {
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
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;

                }
            }
        }
    };
    var chart_performa_armo_mtd = new ApexCharts(document.querySelector("#performa_armo_mtd_chart"),
        options_performa_armo_mtd);
    chart_performa_armo_mtd.render();

    // chart performa_armo ytd
    var options_performa_armo_ytd = {
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
    var chart_performa_armo_ytd = new ApexCharts(document.querySelector("#performa_armo_ytd_chart"),
        options_performa_armo_ytd);
    chart_performa_armo_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_armo_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#performa_armo_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->