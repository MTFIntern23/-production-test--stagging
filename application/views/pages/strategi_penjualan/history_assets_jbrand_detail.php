<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
    <span class="text-muted fw-light">History Assets /</span> History Assets Detail</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row pt-3 ms-2 me-2">
                    <div class="col ">
                        <div class="d-md-block">
                            <button class="badge btn btn-warning" type="button" onclick="to_history_assets()"><i
                                    class='bx bxs-left-arrow-alt me-1'></i>Kembali
                                &nbsp;</button>
                        </div>
                    </div>
                </div>
                <h5 class="card-header text-dark fs-4 text-start" style="margin-bottom: -30px;">
                    History Assets <b>
                        <?= $current_cabang->nama_cabang;?>
                    </b><br>
                    <p style="font-size: 38px;margin-top:10px;"><img class="me-2" src='<?= $history_assets_month[0]->logo;?>'
                            alt="<?= $history_assets_month[0]->brand;?>" width="40" height="40"><b><?= $history_assets_month[0]->brand;?></b></p>
                </h5>
                <!-- button -->
                <div class="row mt-4 mb-4 ms-2 me-2">
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
                                <div id="history_assets_jbrand_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="history_assets_jbrand_mtd" class="table table-striped table-hover display nowrap"
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
                            <?php 
                                    $no=1; 
                                    foreach ($history_assets_month as $row) { ?>
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
                                    </tr>
                                <?php } ?>
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
                                <div id="history_assets_jbrand_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="history_assets_jbrand_ytd" class="table table-striped table-hover display nowrap"
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
                                <?php 
                                    $no=1; 
                                    foreach ($history_assets_year as $row) { ?>
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
                                    </tr>
                                <?php } ?>
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
    const to_history_assets = () => {
        window.location.href = "<?= site_url('history_assets')?>"
    }
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "so", "jenis_customer", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub3': ["NONRO", "RO"],
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
        //ytd init
        $items_ytd = array();
        $lending_ytd = array();
        $lending_last_ytd = array();
        foreach($graph_history_assets_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> tgl_golive)) -> format('d M');
            $lending_mtd[] = htmlentities($row -> mtd_lending);
        }
        foreach($graph_history_assets_year as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $lending_ytd[] = htmlentities($row -> mtd_lending);
        }
        foreach($graph_history_assets_last_year as $row) {
            $lending_last_ytd[] = htmlentities($row -> mtd_lending);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var lending_mtd = <?php echo json_encode($lending_mtd) ?>;
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var lending_ytd = <?php echo json_encode($lending_ytd) ?>;
    var lending_last_ytd = <?php echo json_encode($lending_last_ytd) ?>;
    var used_lending_last_ytd = lending_last_ytd.slice(0, fields_ytd.length)
    // history_assets_jbrand_ detail mtd
    var options_history_assets_jbrand_mtd = {
        series: [{
            name: 'Total Lending',
            data: lending_mtd.map(bFormatter)
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
        // forceNiceScale: true,
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
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
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
            }
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
        responsive: [{
            breakpoint: 480,
            options: {
                dataLabels: {
                    enabled: false,
                },
            }
        }],
    };
    var chart_history_assets_jbrand_mtd = new ApexCharts(document.querySelector("#history_assets_jbrand_mtd_chart"),
        options_history_assets_jbrand_mtd);
    chart_history_assets_jbrand_mtd.render();

    // chart history_assets_jbrand_detail ytd
    var options_history_assets_jbrand_ytd = {
        series: [{
            name: 'Total Lending ' + (new Date().getFullYear() - 1),
            type: 'column',
            data: used_lending_last_ytd.map(bFormatter)
        }, {
            name: 'Total Lending ' + (new Date().getFullYear()),
            type: 'column',
            data: lending_ytd.map(bFormatter)
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
            formatter: function (val) {
                return val + " M";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1]
        },
        xaxis: {
            categories: fields_ytd.map(month_name),
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
        tooltip: {
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
                    formatter: function (val) {
                        return val;
                    },
                },
            }
        }],
    };
    var chart_history_assets_jbrand_ytd = new ApexCharts(document.querySelector("#history_assets_jbrand_ytd_chart"),
        options_history_assets_jbrand_ytd);
    chart_history_assets_jbrand_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#history_assets_jbrand_mtd').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        $('#history_assets_jbrand_ytd').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->