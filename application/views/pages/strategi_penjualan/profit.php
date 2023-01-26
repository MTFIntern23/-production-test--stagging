<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Profit Cabang</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Profit Cabang<b>
                        <?= $current_cabang->nama;?>
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
                <div id="chart_mtd">
                    <div class="row">
                        <div class="col">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="profit_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komponen Profit</th>
                                    <th>Profit MTD ...-...</th>
                                    <th>Est Profit MTD ...-...</th>
                                    <th>Est Profit V2 MTD ...-...</th>
                                    <th>Simulasi Profit V2 MTD ...-...</th>
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
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>

                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>

                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /datatables -->
                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="profit_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komponen Profit</th>
                                    <th>Profit MTD ...-...</th>
                                    <th>Est Profit MTD ...-...</th>
                                    <th>Est Profit V2 MTD ...-...</th>
                                    <th>Simulasi Profit V2 MTD ...-...</th>
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
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2022</td>
                                    <td>20M</td>
                                    <td>19M</td>
                                    <td>10M</td>
                                    <td>65.6%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /datatables -->
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
    // chart profit mtd
    var options_profit_mtd = {
        series: [{
            name: 'Net Profit',
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
    var chart_profit_mtd = new ApexCharts(document.querySelector("#profit_mtd_chart"), options_profit_mtd);
    chart_profit_mtd.render();

    // chart profit ytd
    var options_profit_ytd = {
        series: [{
            name: 'Net Profit',
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
    var chart_profit_ytd = new ApexCharts(document.querySelector("#profit_ytd_chart"), options_profit_ytd);
    chart_profit_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#profit_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#profit_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->