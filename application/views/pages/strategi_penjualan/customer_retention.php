<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Customer Retention</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Customer Retention<b>
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
                                <div id="customer_retention_mtd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="customer_retention_mtd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="customer_retention_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Habibie</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>02/01/2023</td>
                                    <td>05/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Ainun</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>02/01/2023</td>
                                    <td>05/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>German</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>05/01/2023</td>
                                    <td>07/01/2023</td>
                                    <td>Mugen Toyota</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>4</td>
                                    <td>Gatot</td>
                                    <td>18M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>08/01/2023</td>
                                    <td>09/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>Kaca</td>
                                    <td>14M</td>
                                    <td>12M</td>
                                    <td>387</td>
                                    <td>10/01/2023</td>
                                    <td>15/01/2023</td>
                                    <td>Mugen Honda</td>
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
                                <div id="customer_retention_ytd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="customer_retention_ytd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="customer_retention_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No YTD</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Habibie</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>02/01/2023</td>
                                    <td>05/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Ainun</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>02/01/2023</td>
                                    <td>05/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>German</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>05/01/2023</td>
                                    <td>07/01/2023</td>
                                    <td>Mugen Toyota</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>4</td>
                                    <td>Gatot</td>
                                    <td>18M</td>
                                    <td>10M</td>
                                    <td>387</td>
                                    <td>08/01/2023</td>
                                    <td>09/01/2023</td>
                                    <td>Tunas Toyota</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>Kaca</td>
                                    <td>14M</td>
                                    <td>12M</td>
                                    <td>387</td>
                                    <td>10/01/2023</td>
                                    <td>15/01/2023</td>
                                    <td>Mugen Honda</td>
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
    // chart customer_retention mtd
    var options_customer_retention_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
    };
    var chart_customer_retention_mtd = new ApexCharts(document.querySelector("#customer_retention_mtd_chart"),
        options_customer_retention_mtd);
    chart_customer_retention_mtd.render();

    // chart customer_retention mtd
    var options_customer_retention_mtd_2 = {
        series: [{
            name: 'Website Blog',
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
    var chart_customer_retention_mtd_2 = new ApexCharts(document.querySelector("#customer_retention_mtd_chart_2"),
        options_customer_retention_mtd_2);
    chart_customer_retention_mtd_2.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd = {
        title: {
            text: 'YTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [44, 55, 13, 43],
        chart:
        {
            height: 350,
            // width: 400,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D'],
    };
    var chart_customer_retention_ytd = new ApexCharts(document.querySelector("#customer_retention_ytd_chart"),
        options_customer_retention_ytd);
    chart_customer_retention_ytd.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd_2 = {
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
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    };
    var chart_customer_retention_ytd_2 = new ApexCharts(document.querySelector("#customer_retention_ytd_chart_2"),
        options_customer_retention_ytd_2);
    chart_customer_retention_ytd_2.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#customer_retention_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#customer_retention_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->