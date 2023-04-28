<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    sessionStorage.setItem('is_aov', true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        <span class="text-muted fw-light">Strategi Dealer /</span> Performa Dealer Detail
    </h5>
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
                        <?= $current_cabang->nama_cabang;?>
                    </b><br>
                    <p style="font-size: 38px;margin-top:10px;">
                        <b><?= $performa_detail_month[0]->nama_dealer;?></b>
                    </p>
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
                                                    <h6 class="fs-6 ">
                                                        <?= $performa_detail_month[0]->alamat_dealer;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kota :
                                                        <?= $performa_detail_month[0]->kota_dealer;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kecamatan :
                                                        <?= $performa_detail_month[0]->kecamatan_dealer;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Kelurahan :
                                                        <?= $performa_detail_month[0]->kelurahan_dealer;?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="d-grid gap-2 d-md-bloc">
                                            <div class="row">
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Nama PIC :
                                                        <?= $performa_detail_month[0]->nama_pic;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">No Telepon PIC:
                                                        <?= $performa_detail_month[0]->no_telp;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Jabatan PIC:
                                                        <?= $performa_detail_month[0]->jabatan;?>
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
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
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
                <!-- chart mtd -->
                <div id="chart_mtd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="performa_dealer_detail_mtd_chart_2"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
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
                                    <th>Lending Amount (M)</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>
                <!-- / chart mtd -->
                <!-- chart ytd -->
                <div id="chart_ytd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="performa_dealer_detail_ytd_chart_2"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
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
                                    <th>Lending Amount (M)</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
                                </tr>
                            </thead>
                            <tbody>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/dataTables.buttons.min.js"
    integrity="sha512-ByVolLA8VqrHkWVq/IG5unPl1eHV0DEkdvUBdTTxTNPXV7xYrqqR+EhRlf9R3qWEHiUVaqCXwcZfrlTpZKVjdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"
    integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
    integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"
    integrity="sha512-P0bOMePRS378NwmPDVPU455C/TuxDS+8QwJozdc7PGgN8kLqR4ems0U/3DeJkmiE31749vYWHvBOtR+37qDCZQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/buttons.html5.min.js"
    integrity="sha512-cBlHTLVISzl4A2An/1uQCqUq7MPJlCTqk/Uvwf1OU8lAB87V72oPdllhBD7hYpSDhmcOqY/PIeJ5bUN/EHcgpw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/buttons.print.min.js"
    integrity="sha512-b956UIE6Nx8REYgGGJEyAlCUPgei+JdTU41lrOIvH8LrH+REzjjQOeNhOatI2wOr1eC6+v1rhv5UqJ0GF6LMQQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
    <?php
        $items_gp = array();
$ids_gp = array();
$ids_asset = array();
$ids_ro = array();
$items_profesi = array();
$ids_profesi = array();
$items_so = array();
$ids_so = array();
foreach ($subfilter_gp as $row) {
    $items_gp[]=htmlentities($row -> gp);
    $ids_gp[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_gp));
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
    const to_performa_detail = () => {
        window.location.href =
            "<?= site_url('performa_dealer')?>"
    }
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "jenis_pekerjaan"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?> ,
            'sub2': ["Second", "New"],
            'sub3': <?php echo json_encode($items_so) ?> ,
            'sub4': ["NONRO", "RO"],
            'sub5': <?php echo json_encode($items_profesi) ?> ,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?> ,
            'sub2': <?php echo json_encode($ids_asset) ?> ,
            'sub3': <?php echo json_encode($ids_so) ?> ,
            'sub4': <?php echo json_encode($ids_ro) ?> ,
            'sub5': <?php echo json_encode($ids_profesi) ?> ,
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
    // performa dealer detail mtd
    var options_performa_dealer_detail_mtd = {
        series: [],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_performa_dealer_detail_mtd = new ApexCharts(document.querySelector("#performa_dealer_detail_mtd_chart"),
        options_performa_dealer_detail_mtd);
    chart_performa_dealer_detail_mtd.render();
    var options_performa_dealer_detail_mtd_2 = {
        title: {
            text: 'Brand Dealer <?= $performa_detail_month[0]->nama_dealer;?>',
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_performa_dealer_detail_mtd_2 = new ApexCharts(document.querySelector(
            "#performa_dealer_detail_mtd_chart_2"),
        options_performa_dealer_detail_mtd_2);
    chart_performa_dealer_detail_mtd_2.render();

    // chart performa_dealer_detail ytd
    var options_performa_dealer_detail_ytd = {
        series: [],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_performa_dealer_detail_ytd = new ApexCharts(document.querySelector("#performa_dealer_detail_ytd_chart"),
        options_performa_dealer_detail_ytd);
    chart_performa_dealer_detail_ytd.render();
    var options_performa_dealer_detail_ytd_2 = {
        title: {
            text: 'Brand Dealer <?= $performa_detail_month[0]->nama_dealer;?>',
            align: 'center'
        },
        series: [],
        chart: {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_performa_dealer_detail_ytd_2 = new ApexCharts(document.querySelector(
            "#performa_dealer_detail_ytd_chart_2"),
        options_performa_dealer_detail_ytd_2);
    chart_performa_dealer_detail_ytd_2.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var dealer_detail_mtd, dealer_detail_ytd
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_dealer_detail/pie_chartdata',
            data: {
                'id_dealer': <?= $performa_detail_month[0]->id_dealer;?> ,
                'params': 'curr_month',
                'params2': 'curr_year'
            },
            dataType: "json",
            success: function(res) {
                chart_performa_dealer_detail_mtd_2.updateSeries((res.data_total).map(e => parseInt(
                    e)))
                chart_performa_dealer_detail_mtd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_fields,
                })
                chart_performa_dealer_detail_ytd_2.updateSeries((res.data_total2).map(e => parseInt(
                    e)))
                chart_performa_dealer_detail_ytd_2.updateOptions({
                    legend: {
                        position: 'bottom'
                    },
                    labels: res.data_fields2,
                    // dataLabels: {
                    //     formatter: function (val, opts) {
                    //         return opts.w.config.series[opts.seriesIndex]
                    //     },
                    // },
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_dealer_detail/chartdata',
            data: {
                'id_dealer': <?= $performa_detail_month[0]->id_dealer;?> ,
                'params': 'curr_month'
            },
            dataType: "json",
            success: function(res) {
                chart_performa_dealer_detail_mtd.updateSeries([{
                    name: 'Total Lending',
                    data: res.data_lending.map(bFormatter)
                }])
                chart_performa_dealer_detail_mtd.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return val + " M";
                        },
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: res.data_fields.map(dmFormat),
                        labels: {
                            style: {
                                colors: '#000000',
                            }
                        },
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
                            text: "M (Milyar)",
                            style: {
                                color: '#008FFB',
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        x: {
                            formatter: function(val) {
                                return val + " (Golive)"
                            }
                        },
                        y: {
                            formatter: function(val) {
                                return val + " M (Milyar)"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            dataLabels: {
                                enabled: false,
                            },
                        }
                    }],
                })
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_dealer_detail/double_chartdata',
            data: {
                'id_dealer': <?= $performa_detail_month[0]->id_dealer;?> ,
                'params': 'curr_year',
                'params2': 'last_year'
            },
            dataType: "json",
            success: function(res) {
                chart_performa_dealer_detail_ytd.updateSeries([{
                    name: 'Total Lending ' + (new Date().getFullYear() - 1),
                    type: 'column',
                    data: (res.data_lending2.slice(0, res.data_fields.length)).map(
                        bFormatter)
                }, {
                    name: 'Total Lending ' + (new Date().getFullYear()),
                    type: 'column',
                    data: res.data_lending.map(bFormatter)
                }])
                chart_performa_dealer_detail_ytd.updateOptions({
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
                        categories: (res.data_fields).map(month_name),
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
                            text: "Pencapaian (Unit)",
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
        dealer_detail_mtd = $('#performa_dealer_detail_mtd').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_dealer_detail/listdata',
                type: "POST",
                data: {
                    'id_dealer': <?= $performa_detail_month[0]->id_dealer;?> ,
                    'params': 'curr_month'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [4],
                render: function(data, type, row, meta) {
                    return dmyFormat(data);
                }
            }, {
                targets: [5],
                render: function(data, type, row, meta) {
                    return dmyFormat(data);
                }
            }],
            scrollX: true,
            lengthMenu: [
                [10, 25, 50, 75, -1],
                [10, 25, 50, 75, 'All']
            ],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                extend: 'copyHtml5',
                text: '<i class="bx bx-copy-alt me-1"></i>Copy',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'excelHtml5',
                text: '<i class="bx bx-data me-1"></i>Excel',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'csvHtml5',
                text: '<i class="bx bx-bar-chart-alt me-1"></i>CSV',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'pdfHtml5',
                titleAttr: '',
                text: '<i class="bx bxs-file-pdf me-1"></i>PDF',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'print',
                text: '<i class="bx bx-printer me-1"></i>Print',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, ],
        });
        dealer_detail_ytd = $('#performa_dealer_detail_ytd').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_dealer_detail/listdata',
                type: "POST",
                data: {
                    'id_dealer': <?= $performa_detail_month[0]->id_dealer;?> ,
                    'params': 'curr_year'
                },
                datatype: "json"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [3],
                render: function(data, type, row, meta) {
                    return bFormatter(data);
                }
            }, {
                targets: [4],
                render: function(data, type, row, meta) {
                    return dmyFormat(data);
                }
            }, {
                targets: [5],
                render: function(data, type, row, meta) {
                    return dmyFormat(data);
                }
            }],
            scrollX: true,
            lengthMenu: [
                [10, 25, 50, 75, -1],
                [10, 25, 50, 75, 'All']
            ],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                extend: 'copyHtml5',
                text: '<i class="bx bx-copy-alt me-1"></i>Copy',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'excelHtml5',
                text: '<i class="bx bx-data me-1"></i>Excel',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'csvHtml5',
                text: '<i class="bx bx-bar-chart-alt me-1"></i>CSV',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'pdfHtml5',
                titleAttr: '',
                text: '<i class="bx bxs-file-pdf me-1"></i>PDF',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, {
                extend: 'print',
                text: '<i class="bx bx-printer me-1"></i>Print',
                className: 'btn btn-sm btn-warning',
                "action": newexportaction
            }, ],
        });
        var search = document.querySelectorAll('input[type=search]');
        search.forEach((src, idx) => {
            src.classList.add('search-responsive-2');
        })
    });
</script>
<!-- / Content -->