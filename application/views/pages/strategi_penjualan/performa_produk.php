<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand',false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Performa Product</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa Group Product<b>
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
                <div class="row mb-4 ms-2 me-2">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-block">
                            <div class="row justify-content-sm-start">
                                <div class="select-filter col-xl-3 col-lg-3 col-md-5 col-sm-12"
                                    style="margin-right: -15px;">
                                    <select class="form-select" id='filter'
                                        onchange="setSubFilter(this.options[this.selectedIndex].value)">
                                        <option selected disabled>Pilih Filter</option>
                                        <option value="all">All</option>
                                        <option value="group_product">Group
                                            Product</option>
                                        <option value="jenis_asset">Jenis Asset
                                        </option>
                                        <option value="so">SO</option>
                                        <option value="jenis_customer">Jenis
                                            Customer</option>
                                        <option value="dealer">Dealer</option>
                                        <option value="armo">ARMO</option>
                                    </select>
                                </div>
                                <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                    style="margin-right: -15px;">
                                    <select class="form-select" id="sub-filter" disabled>
                                        <option value="">Pilih Sub-Filter</option>
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
                                <b>Top 5</b> Group Product
                                <?= $current_cabang->nama_cabang;?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div id="chart_mtd">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_produk_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_produk_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Group Product</th>
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
                                    <td>Tunas</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('produk')" type="button"
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
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('produk')" type="button"
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
                                        <button id="to_detail_mtd" onclick="to_detail_mtd('produk')" type="button"
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
                                <div id="performa_produk_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_produk_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Group Product</th>
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
                                    <td>Tunas YTD</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>Rp 2,000,000,000</td>
                                    <td>200</td>
                                    <td>200</td>
                                    <td>
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('produk')"
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
                                        <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('produk')"
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
                                    <td> <button type="button" id="to_detail_ytd" onclick="to_detail_ytd('produk')"
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
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "dealer", "armo"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["test1", "test2"],
            'sub2': ["Motor", "Mobil"],
            'sub3': ["Ricky", "Hilda"],
            'sub4': ["New", "Old"],
            'sub5': ["Tunas Toyota", "Mugen Honda"],
            'sub6': ["Pique", "CR", "Messi"],
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs)=>{
                subs.innerHTML = callSubFilter(subFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs)=>{
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)]);
                    subs.removeAttribute("disabled");
                })
            }
        })
    }
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart performa_produk mtd
    var options_performa_produk_mtd = {
        series: [{
            name: 'Product MDT',
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

    var chart_performa_produk_mtd = new ApexCharts(document.querySelector("#performa_produk_mtd_chart"),
        options_performa_produk_mtd);
    chart_performa_produk_mtd.render();

    // chart performa_produk ytd
    var options_performa_produk_ytd = {
        series: [{
            name: "Produk YTD",
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
    var chart_performa_produk_ytd = new ApexCharts(document.querySelector("#performa_produk_ytd_chart"),
        options_performa_produk_ytd);
    chart_performa_produk_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_produk_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
        $('#performa_produk_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [5, 25, 50, 75, 100],
        });
    });
</script>
<!-- / Content -->