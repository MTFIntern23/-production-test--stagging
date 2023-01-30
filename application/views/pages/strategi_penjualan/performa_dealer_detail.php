<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Perfoma Dealer Detail</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row pt-3 ms-2 me-2">
                    <div class="col ">
                        <div class="d-md-block">
                            <button class="badge btn btn-warning" type="button" onclick="to_performa_detail()"><i
                                    class='bx bxs-left-arrow-alt me-1'></i>Kembali
                                &nbsp;</button>
                        </div>
                    </div>
                </div>
                <h5 class="card-header text-dark fs-4 text-start" style="margin-bottom: -30px;">
                    Performa Dealer<b>
                        <?= $current_cabang->nama;?>
                    </b><br>
                    <p style="font-size: 38px;margin-top:10px;"><b>PT Cipta Karya Indonesia</b></p>
                </h5>
                <div class="row mt-1 mb-4 ms-2 me-2">
                    <div class="col-xl-7 col-lg-7 col-md-11 col-sm-12 col-xs-12">
                        <div class="card" style="background: #eae9e9;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <div class="d-grid gap-2 d-md-block">
                                            <div class="row">
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Alamat Dealer :
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Jl Yusufadiwinata No 61,
                                                        Menteng, Jakarta
                                                        Pusat
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kota : Jakarta Pusat</h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kecamatan : Gondang Lia</h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Kelurahan : Menteng</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="d-grid gap-2 d-md-bloc">
                                            <div class="row">
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Nama PIC : Ricky Rivaldo
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">No Telepon PIC: 082174398682
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Jabatan PIC: Direktur
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

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
                </div>
                <!-- / button -->
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
                <!-- chart mtd -->
                <div id="chart_mtd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_dealer_detail_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_dealer_detail_mtd" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Lending Amount</th>
                                    <th>Tangga Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 MTD</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
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
                                <div id="performa_dealer_detail_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_dealer_detail_ytd" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Lending Amount</th>
                                    <th>Tangga Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 YTD</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Januari 2022</td>
                                    <td>Ichitan</td>
                                    <td>Rp 3,000,000</td>
                                    <td>20 Januari 2023</td>
                                    <td>22 Januari 2023</td>
                                    <td>Buroq</td>
                                    <td>Ricky Rivaldo</td>
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
    const to_performa_detail = () => {
        window.location.href = "<?= site_url('performa_dealer')?>"
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // performa dealer detail mtd
    var options_performa_dealer_detail_mtd = {
        series: [{
            name: "Dealer MTD Detaill",
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
    var chart_performa_dealer_detail_mtd = new ApexCharts(document.querySelector("#performa_dealer_detail_mtd_chart"),
        options_performa_dealer_detail_mtd);
    chart_performa_dealer_detail_mtd.render();

    // chart performa_dealer_detail ytd
    var options_performa_dealer_detail_ytd = {
        series: [{
            name: "Dealer YTD Detail",
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
    var chart_performa_dealer_detail_ytd = new ApexCharts(document.querySelector("#performa_dealer_detail_ytd_chart"),
        options_performa_dealer_detail_ytd);
    chart_performa_dealer_detail_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_dealer_detail_mtd').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#performa_dealer_detail_ytd').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->