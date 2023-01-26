<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Perfoma SO Detail</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row pt-3 ms-2 me-2">
                    <div class="col ">
                        <div class="d-md-block">
                            <button class="badge btn btn-warning" type="button" onclick="to_performa_so()"><i
                                    class='bx bxs-left-arrow-alt me-1'></i>Kembali
                                &nbsp;</button>
                        </div>
                    </div>
                </div>
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa SO<b>
                        <?= $current_cabang->nama;?>
                    </b> <br>
                    <p style="font-size: 38px;margin-top:10px;"><b>Ricky Rivaldo</b></p>

                </h5>
                <!-- button -->
                <div class="row mb-4 ms-2 me-2">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-block">
                            <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                            <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                        </div>
                    </div>
                    <div class="col cabang-di">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="btn-group">
                                <button type="button" class="badge btn btn-info dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Performa SO di Cabang
                                </button>
                                <ul class="dropdown-menu" style="width: 100%;">
                                    <li><a class="dropdown-item" href="#">SO di Dealer A</a></li>
                                    <li><a class="dropdown-item" href="#">SO di Dealer B</a></li>
                                    <li><a class="dropdown-item" href="#">SO di Dealer C</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / button -->
                <!-- chart mtd -->
                <div id="chart_mtd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_detail_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_detail_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Lending Amount</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>MTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>MTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>MTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>MTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>MTD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>
                <!-- / chart mtd -->
                <!-- chart ytd -->
                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_detail_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_detail_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Lending Amount</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>YTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>YTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>YTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>YTD</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                    <td>57</td>
                                    <td>YTD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- / datatables -->
                </div>
                <!-- chart ytd -->
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
    const to_performa_so = () => {
        window.location.href = "<?= site_url('performa_so')?>"
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // performa so detail mtd
    var options_performa_so_detail_mtd = {
        series: [{
            name: 'Performa SO Detail MTD',
            data: [44, 55, 57, 56, 61, 58, 63]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91]
        }, {
            name: 'Free Cash Flow',
            data: [35, 41, 36, 26, 45, 48, 52]
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
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
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
    var chart_performa_so_detail_mtd = new ApexCharts(document.querySelector("#performa_so_detail_mtd_chart"),
        options_performa_so_detail_mtd);
    chart_performa_so_detail_mtd.render();

    // chart performa_so_detail ytd
    var options_performa_so_detail_ytd = {
        series: [{
            name: 'Performa SO Detail YTD',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 61, 58]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 87, 105, 91]
        }, {
            name: 'Free Cash Flow',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 35, 41, 36]
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
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
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
    var chart_performa_so_detail_ytd = new ApexCharts(document.querySelector("#performa_so_detail_ytd_chart"),
        options_performa_so_detail_ytd);
    chart_performa_so_detail_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_so_detail_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#performa_so_detail_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->