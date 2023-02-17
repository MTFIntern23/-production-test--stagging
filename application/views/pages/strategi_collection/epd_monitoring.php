<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        EPD Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    EPD Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
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
                                        <option value="dealer">Dealer</option>
                                        <option value="armo">Armo</option>
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
                <div id="chart_mtd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 pt-4  d-flex justify-content-center mt-3">
                                <div id="epd_monitoring_mtd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div id="epd_monitoring_mtd_chart_2"></div> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div id="epd_monitoring_mtd_chart_3"></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="d-flex justify-content-center">
                        <div class="card ms-4 me-4 mb-5  " style="background: #eae9e9;width: 80%;">
                            <div class="card-body">
                                <table id="epd_monitoring_2_mtd_table"
                                    class="table table-striped table-hover display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center"></th>
                                            <th colspan="2" class="text-center">MTD Jan 23</th>
                                            <th colspan="2" class="text-center">MTD Des 22</th>
                                            <th colspan="2" class="text-center">MTD Jan 22</th>
                                        </tr>
                                        <tr>
                                            <th>EPD</th>
                                            <th>Target</th>
                                            <th>Account</th>
                                            <th>%</th>
                                            <th>Account</th>
                                            <th>%</th>
                                            <th>Account</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                foreach ($graph_monitoring_detail_month as $key=>$row) { ?>
                                                    <tr>
                                                        <td class="get_epd_status">
                                                        <?= htmlentities($row->epd);?>
                                                        </td>
                                                        <td>
                                                            <?= htmlentities($row->target);?>
                                                        </td>
                                                        <td>
                                                            <?= htmlentities($row->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($row->persentasi);?>
                                                        </td>
                                                        <!-- prev month -->
                                                        <td>
                                                            <?= htmlentities($graph_monitoring_detail_last_month[$key]->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($graph_monitoring_detail_last_month[$key]->persentasi);?>
                                                        </td>
                                                        <!-- prev year -->
                                                        <td>
                                                            <?= htmlentities($graph_monitoring_detail_last_year[$key]->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($graph_monitoring_detail_last_year[$key]->persentasi);?>
                                                        </td>
                                                        
                                                    </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ms-4 me-4 mb-4">
                        <table id="epd_monitoring_mtd_table" class="table table-striped table-hover display nowrap"
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
                                    <th>Nama Armo</th>
                                    <th>EPD (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($monitoring_detail_month as $row) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++;?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->no_aplikasi);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_cust);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->lending_amt);?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_appin))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_golive))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->jenis);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_so);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_armo);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->epd);?>
                                        </td>
                                    </tr>
                                <?php } ?>
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
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    var epd_status = ['8-30','>30']
    var epd_field = document.querySelectorAll('.get_epd_status')
    epd_field.forEach((field,idx)=>{
        field.innerHTML = epd_status[idx]
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "jenis_pekerjaan", "dealer", "armo"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["New", "Second"],
            'sub3': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub4': ["NONRO", "RO"],
            'sub5': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"],
            'sub6': ["PT Cipta Karya", "Tunas", "Agung Auto", "PT Ida", "PT Sukacita", "Benny Automotives",
                "Kelapa Hijau", "PT Prakarsa", "Taskia Auto"
            ],
            'sub7': ["Hamid", "Mamat", "Toren", "Ciles", "Meng", "Oreo"]
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
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
    <?php
        //mtd init
        $items_mtd = array();
        $persentasi_0_mtd = array();
        $persentasi_1_mtd = array();
        $persentasi_0_last_mtd = array();
        $persentasi_1_last_mtd = array();
        $count_epd_mtd = array();
        foreach($graph_monitoring_0_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $persentasi_0_mtd[] = htmlentities($row -> persentasi);
        }
        foreach($graph_monitoring_1_month as $row) {
            $persentasi_1_mtd[] = htmlentities($row -> persentasi);
        }
        foreach($graph_monitoring_0_last_month as $row) {
            $persentasi_0_last_mtd[] = htmlentities($row -> persentasi);
        }
        foreach($graph_monitoring_1_last_month as $row) {
            $persentasi_1_last_mtd[] = htmlentities($row -> persentasi);
        }
        foreach($graph_monitoring_detail_month as $row) {
            $count_epd_mtd[] = htmlentities($row -> account);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var persentasi_0_mtd = <?php echo json_encode($persentasi_0_mtd) ?>;
    var persentasi_1_mtd = <?php echo json_encode($persentasi_1_mtd) ?>;
    var persentasi_0_last_mtd = <?php echo json_encode($persentasi_0_last_mtd) ?>;
    var persentasi_1_last_mtd = <?php echo json_encode($persentasi_1_last_mtd) ?>;
    var val_0_last = persentasi_0_last_mtd[persentasi_0_last_mtd.length-1]
    var val_1_last = persentasi_1_last_mtd[persentasi_1_last_mtd.length-1]
    var count_epd_mtd = <?php echo json_encode($count_epd_mtd) ?>;
    // chart epd_monitoring mtd
    var options_epd_monitoring_mtd = {
        colors:['#775DD0','#FEB019'],
        title: {
            text: 'EPD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: count_epd_mtd.map(e=>parseInt(e)),
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['EPD 8-30', 'EPD >30'],
    };
    var chart_epd_monitoring_mtd = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart"),
        options_epd_monitoring_mtd);
    chart_epd_monitoring_mtd.render();

    // chart epd_monitoring mtd
    var options_epd_monitoring_mtd_2 = {
        colors:['#26A0FC','#1ADF8D'],
        series: [{
            name: 'EPD 8-30 (' + new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
            type: 'column',
            data: [persentasi_0_mtd[fields_mtd.length-1]]
        },{
            name: 'EPD 8-30 (Akhir ' + month_name((new Date().getMonth())) +')',
            type: 'column',
            data: [persentasi_0_last_mtd.map(e=>e=val_0_last).slice(0,fields_mtd.length)]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 2,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + " %";
            },
            enabledOnSeries: [0,1]
        },
        stroke: {
            width: [1,1]
        },
        xaxis: {
            categories: [fields_mtd[fields_mtd.length-1]],
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
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
                    text: "EPD (%)",
                    style: {
                        color: '#008FFB',
                    }
                },
                tooltip: {
                    enabled: true
                }
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " % (Persen)"
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_epd_monitoring_mtd_2 = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart_2"),
        options_epd_monitoring_mtd_2);
    chart_epd_monitoring_mtd_2.render();

    var options_epd_monitoring_mtd_3 = {
        colors:['#775DD0','#FF4862'],
        series: [{
            name: 'EPD >30 ('+ new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
            type: 'column',
            data: [persentasi_1_mtd[fields_mtd.length-1]]
        },{
            name: 'EPD >30 (Akhir ' + month_name((new Date().getMonth())) +')',
            type: 'column',
            data: [persentasi_1_last_mtd.map(e=>e=val_1_last).slice(0,fields_mtd.length)]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 2,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + " %";
            },
            enabledOnSeries: [0,1]
        },
        stroke: {
            width: [1,1]
        },
        xaxis: {
            categories: [fields_mtd[fields_mtd.length-1]],
            tooltip: {
                enabled: false
            }
        },
        yaxis: [
            {
                axisTicks: {
                    show: true,
                },
                axisBorder: {
                    show: true,
                    color: '#775DD0'
                },
                labels: {
                    style: {
                        colors: '#775DD0',
                    }
                },
                title: {
                    text: "EPD (%)",
                    style: {
                        color: '#775DD0',
                    }
                },
                tooltip: {
                    enabled: true
                }
            },
        ],
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " % (Persen)"
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_epd_monitoring_mtd_3 = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart_3"),
        options_epd_monitoring_mtd_3);
    chart_epd_monitoring_mtd_3.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#epd_monitoring_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        $('#epd_monitoring_2_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->