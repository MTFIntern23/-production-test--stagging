<!-- Content -->
<script>
    sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_aov',true);
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
                                        <option value="jenis_asset">Jenis Assets</option>
                                        <option value="so">SO</option>
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
                                    <th>Status</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount (M)</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($cust_retention_month as $row) { ?>
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
                                        <td class="get_status_ro_mtd">
                                            <?= htmlentities($row->status_ro);?>
                                        </td>
                                        <td >
                                            <?= htmlentities($row->total_ro);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->mtd_amt);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->mtd_unit);?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_appin))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_golive))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_dealer);?>
                                        </td>
                                    </tr>
                                <?php } ?>
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
                                    <th>Status</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount (M)</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($cust_retention_year as $row) { ?>
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
                                        <td class="get_status_ro_ytd">
                                            <?= htmlentities($row->status_ro);?>
                                        </td>
                                        <td >
                                            <?= htmlentities($row->total_ro);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->mtd_amt);?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->mtd_unit);?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_appin))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->tgl_golive))->format('d M Y');?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_dealer);?>
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
    let status_ro_mtd = document.querySelectorAll('.get_status_ro_mtd');
    let status_ro_ytd = document.querySelectorAll('.get_status_ro_ytd');
    <?php
        $status_ro_mtd = array();
        $status_ro_ytd = array();
        foreach($cust_retention_month as $row) {
            $status_ro_mtd[] = htmlentities($row -> status_ro);
        }
        foreach($cust_retention_year as $row) {
            $status_ro_ytd[] = htmlentities($row -> status_ro);
        }
    ?>
    function name_status(val){
        val=='1'?val = "RO":val = "NON"
        return val
    }
    let ro_mtd = <?php echo json_encode($status_ro_mtd) ?>;
    let ro_ytd = <?php echo json_encode($status_ro_ytd) ?>;
    let used_ro_mtd=ro_mtd.map(name_status);
    let used_ro_ytd=ro_ytd.map(name_status);
    status_ro_mtd.forEach((val,idx)=>{
        val.innerHTML = used_ro_mtd[idx]
    })
    status_ro_ytd.forEach((val,idx)=>{
        val.innerHTML = used_ro_ytd[idx]
    })
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["New", "Second"],
            'sub3': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub4': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"],
            'sub5': ["PT Cipta Karya", "Tunas", "Agung Auto", "PT Ida", "PT Sukacita", "Benny Automotives",
                "Kelapa Hijau", "PT Prakarsa", "Taskia Auto"
            ]
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
        $lending_mtd = array();
        $lending_mtd_0 = array();
        $count_ro_mtd = array();
        //ytd init
        $items_ytd = array();
        $lending_ytd = array();
        $lending_ytd_0 = array();
        $lending_last_ytd = array();
        $lending_last_ytd_0 = array();
        $count_ro_ytd = array();
        foreach($graph_cust_retention_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> tgl_golive)) -> format('d M');
            $lending_mtd[] = htmlentities($row -> mtd_amt);
        }
        foreach($graph_cust_retention_month_0 as $row) {
            $lending_mtd_0[] = htmlentities($row -> mtd_amt);
        }
        foreach($graph_cust_retention_year as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $lending_ytd[] = htmlentities($row -> mtd_amt);
        }
        foreach($graph_cust_retention_year_0 as $row) {
            $lending_ytd_0[] = htmlentities($row -> mtd_amt);
        }
        foreach($graph_cust_retention_last_year as $row) {
            $lending_last_ytd[] = htmlentities($row -> mtd_amt);
        }
        foreach($graph_cust_retention_last_year_0 as $row) {
            $lending_last_ytd_0[] = htmlentities($row -> mtd_amt);
        }
        foreach($get_ro_mtd as $row) {
            $count_ro_mtd[] = htmlentities($row -> status_ro);
        }
        foreach($get_ro_ytd as $row) {
            $count_ro_ytd[] = htmlentities($row -> status_ro);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var lending_mtd = <?php echo json_encode($lending_mtd) ?>;
    var lending_mtd_0 = <?php echo json_encode($lending_mtd_0) ?>;
    var count_ro_mtd =<?php echo json_encode($count_ro_mtd) ?>;
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var lending_ytd = <?php echo json_encode($lending_ytd) ?>;
    var lending_ytd_0 = <?php echo json_encode($lending_ytd_0) ?>;
    var lending_last_ytd = <?php echo json_encode($lending_last_ytd) ?>;
    var lending_last_ytd_0 = <?php echo json_encode($lending_last_ytd_0) ?>;
    var used_lending_last_ytd = lending_last_ytd.slice(0, fields_ytd.length)
    var used_lending_last_ytd_0 = lending_last_ytd_0.slice(0, fields_ytd.length)
    var count_ro_ytd =<?php echo json_encode($count_ro_ytd) ?>;
    var mtd_ro = [0,0]
    var ytd_ro = [0,0]
    count_ro_mtd.forEach((val)=>{
        val=='1'?mtd_ro[0]++:mtd_ro[1]++
    })
    count_ro_ytd.forEach((val)=>{
        val=='1'?ytd_ro[0]++:ytd_ro[1]++
    })
    // chart customer_retention mtd
    var options_customer_retention_mtd = {
        title: {
            text: 'Status <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: mtd_ro,
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Total RO', 'Total non-RO'],
    };
    var chart_customer_retention_mtd = new ApexCharts(document.querySelector("#customer_retention_mtd_chart"),
        options_customer_retention_mtd);
    chart_customer_retention_mtd.render();

    // chart customer_retention mtd
    var options_customer_retention_mtd_2 = {
        series: [{
            name: 'Total Lending RO',
            type: 'column',
            data: lending_mtd.map(bFormatter)
        }, {
            name: 'Total Lending non-RO',
            type: 'column',
            data: lending_mtd_0.map(bFormatter)
        }],
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
            formatter: function (val) {
                return val + " M";
            },
            style: {
                fontSize: '8px',
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories: fields_mtd,
            labels: {
                style: {
                    colors: '#000000',
                }
            },
        },
        yaxis: [
            {
                forceNiceScale: true,
                min: 0,
                max: bFormatter(get_max_interval(lending_mtd)),
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
            },
        ],
        fill: {
            opacity: 1
        },
        tooltip: {
            x: {
                formatter: function (val) {
                    return val + " (Golive)"
                }
            },
            y: {
                formatter: function (val) {
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
                    enabled: false,
                },
            }
        }],
    };
    var chart_customer_retention_mtd_2 = new ApexCharts(document.querySelector("#customer_retention_mtd_chart_2"),
        options_customer_retention_mtd_2);
    chart_customer_retention_mtd_2.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd = {
        title: {
            text: 'Status <?php echo Date("Y");?>',
            align: 'center'
        },
        series: ytd_ro,
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Total RO', 'Total non-RO'],
    };
    var chart_customer_retention_ytd = new ApexCharts(document.querySelector("#customer_retention_ytd_chart"),
        options_customer_retention_ytd);
    chart_customer_retention_ytd.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd_2 = {
        series: [{
            name: 'Total Lending RO ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: lending_ytd.map(bFormatter)
        },
        {
            name: 'Total Lending RO ' + (new Date().getFullYear() - 1),
            type: 'line',
            data: used_lending_last_ytd.map(bFormatter)
        },
        {
            name: 'Total Lending non-RO ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: lending_ytd_0.map(bFormatter)
        }, {
            name: 'Total Lending non-RO ' + (new Date().getFullYear() - 1),
            type: 'line',
            data: used_lending_last_ytd_0.map(bFormatter)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
        },
        stroke: {
            width: [1, 4, 1, 4],
            // width: [1,1,4],
        },
        xaxis: {
            categories: fields_ytd.map(month_name),
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
                    text: "(Unit)",
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
                    return val + " (Unit)"
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
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        $('#customer_retention_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->