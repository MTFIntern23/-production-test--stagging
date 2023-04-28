<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
    sessionStorage.setItem('is_aov', true);
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
                                        <option value="jenis_asset">Jenis Asset
                                        </option>
                                        <option value="so">SO</option>
                                        <option value="jenis_customer">Jenis
                                            Customer</option>
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
                                        <option value="dealer">Dealer</option>
                                    </select>
                                </div>
                                <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                    style="margin-right: -15px;">
                                    <select class="form-select" id="sub-filter" disabled>
                                        <option value="">Pilih Sub-Filter</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button id="filter-btn" class="btn btn-warning btn-search" onclick=""
                                        type="button"><i class='bx bx-search me-1'></i>Search</button>
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
                                    <th>Nama Dealer</th>
                                    <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                    <th>Lending MTD <span class="show_month"></span> (M)</th>
                                    <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                    <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <th>Lending YTD <span class="show_prev_year"></span> </th>
                                    <th>Lending YTD <span class="show_year"></span> </th>
                                    <th>Unit YTD <span class="show_prev_year"></span> </th>
                                    <th>Unit YTD <span class="show_year"></span> </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
    <?php
        $items_dealer = array();
$ids_dealer = array();
$ids_asset = array();
$ids_ro = array();
$items_profesi = array();
$ids_profesi = array();
$items_so = array();
$ids_so = array();
foreach ($subfilter_dealer as $row) {
    $items_dealer[]=htmlentities($row -> nama_dealer);
    $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
}
foreach ($subfilter_jenis_assets as $row) {
    $ids_asset[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_aset));
}
foreach ($subfilter_jenis_ro as $row) {
    $ids_ro[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_ro));
}
foreach ($subfilter_profesi as $row) {
    $items_profesi[]=htmlentities($row -> profesi_cust);
    $ids_profesi[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_customer));
}
foreach ($subfilter_so as $row) {
    $items_so[]=htmlentities($row -> nama_so);
    $ids_so[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_so));
}
?>
    let num_abv = document.querySelectorAll('.get_val');
    let months_field = document.querySelectorAll('.show_month');
    let months_prev_field = document.querySelectorAll('.show_prev_month');
    let years_field = document.querySelectorAll('.show_year');
    let years_prev_field = document.querySelectorAll('.show_prev_year');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    months_field.forEach((field, idx) => {
        field.innerHTML = month_name(new Date().getMonth() + 1) + ' ' + (new Date().getFullYear());
        if (new Date().getMonth() == 0) {
            months_prev_field[idx].innerHTML = month_name(12) + ' ' + (new Date().getFullYear() - 1);
        } else {
            months_prev_field[idx].innerHTML = month_name(new Date().getMonth()) + ' ' + (new Date()
                .getFullYear());
        }
    })
    years_field.forEach((field, idx) => {
        field.innerHTML = new Date().getFullYear();
        years_prev_field[idx].innerHTML = new Date().getFullYear() - 1;
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["jenis_asset", "so", "jenis_customer", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Second", "New"],
            'sub2': <?php echo json_encode($items_so) ?> ,
            'sub3': ["NONRO", "RO"],
            'sub4': <?php echo json_encode($items_profesi) ?> ,
            'sub5': <?php echo json_encode($items_dealer) ?> ,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_asset) ?> ,
            'sub2': <?php echo json_encode($ids_so) ?> ,
            'sub3': <?php echo json_encode($ids_ro) ?> ,
            'sub4': <?php echo json_encode($ids_profesi) ?> ,
            'sub5': <?php echo json_encode($ids_dealer) ?> ,
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0, valuesSubFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)], valuesSubFilters[
                        'sub' + (idx + 1)]);
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
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };

    var chart_performa_produk_mtd = new ApexCharts(document.querySelector("#performa_produk_mtd_chart"),
        options_performa_produk_mtd);
    chart_performa_produk_mtd.render();

    // chart performa_produk ytd
    var options_performa_produk_ytd = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
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
    var product_mtd, product_ytd
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk/double_chartdata',
            data: {
                'params': 'curr_month',
                'params2': 'last_month'
            },
            dataType: "json",
            success: function(res) {
                var keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_performa_produk_mtd.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_performa_produk_mtd.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        // enabledOnSeries: [1,2]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: keys_mtd.map(i => (res.data_gp)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk/double_chartdata',
            data: {
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                var keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res
                    .data_lending)[b] - (res.data_lending)[a])
                chart_performa_produk_ytd.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i])
                        .slice(0, 5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' +
                        month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending).map(bFormatter)[i])
                        .slice(0, 5)
                }])
                chart_performa_produk_ytd.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                        // enabledOnSeries: [1,2]
                    },
                    stroke: {
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: keys_ytd.map(i => (res.data_gp)[i]).slice(0, 5),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [{
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: '#008FFB'
                        },
                        labels: {
                            style: {
                                colors: '#008FFB',
                            }
                        },
                        title: {
                            text: "Milyar (M)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    legend: {
                        horizontalAlign: 'center',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        }
                    }],
                })
            }
        });
        product_ytd = $('#performa_produk_ytd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk/listdata',
                type: "POST",
                data: {
                    'params': 'curr_year',
                    'params2': 'last_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        product_mtd = $('#performa_produk_mtd_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            info: true,
            paging: true,
            lengthChange: true,
            ordering: true,
            language: {
                "infoFiltered": ""
            },
            ajax: {
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk/listdata',
                type: "POST",
                data: {
                    'params': 'curr_month',
                    'params2': 'last_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [2],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }],
            scrollX: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
    });
</script>
<!-- / Content -->