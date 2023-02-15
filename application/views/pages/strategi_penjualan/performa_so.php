<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Performa SO</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa SO<b>
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
                                        <option value="jenis_customer">Jenis
                                            Customer</option>
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
                                        <option value="dealer">Dealer</option>
                                        <option value="pareto">Dealer Pareto</option>
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
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SO</th>
                                    <th>Supervisor</th>
                                    <th>Pencapaian Bulan Ini (Unit)</th>
                                    <th>Target Bulan Ini (Unit)</th>
                                    <th>Lending (M)</th>
                                    <th>Prestasi Pencapaian (%)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1; 
                                foreach ($performa_month as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->nama_so);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->nama_spv);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->mtd_pencapaian);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->target);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->mtd_lending);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->mtd_persentasi);?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url();?>performa_so_detail/<?php echo $this->security_idx->encrypt_url($row->id_so);?>"
                                            onclick="sessionStorage.setItem('is_mtd', true);">
                                            <button id="to_detail_mtd" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>

                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SO</th>
                                    <th>Supervisor</th>
                                    <th>Pencapaian Tahun Ini (Unit)</th>
                                    <th>Target Tahun Ini (Unit)</th>
                                    <th>Lending (M)</th>
                                    <th>Prestasi Pencapaian (%)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1; 
                                foreach ($performa_year as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->nama_so);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->nama_spv);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->ytd_pencapaian);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->ytd_target);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_lending);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->ytd_persentasi);?>
                                    </td>
                                    <td> <a href="<?php echo base_url();?>performa_so_detail/<?php echo $this->security_idx->encrypt_url($row->id_so);?>"
                                            onclick="sessionStorage.setItem('is_mtd', false);">
                                            <button id="to_detail_ytd" type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></a></td>
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
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "jenis_customer", "jenis_pekerjaan", "dealer","pareto"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["New", "Second"],
            'sub3': ["NONRO", "RO"],
            'sub4': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"],
            'sub5': ["PT Cipta Karya", "Tunas", "Agung Auto", "PT Ida", "PT Sukacita", "Benny Automotives",
                "Kelapa Hijau", "PT Prakarsa", "Taskia Auto"
            ],
            'sub6': ["PT Cipta Karya","PT Prakarsa","PT Ida","Benny Automotives"]
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
        $target_mtd = array();
        $pencapaian_mtd = array();
        $pencapaian_last_mtd = array();
        //ytd init
        $items_ytd = array();
        $target_ytd = array();
        $target_last_ytd = array();
        $pencapaian_ytd = array();
        $pencapaian_last_ytd = array();
        foreach($performa_month as $row) {
            $items_mtd[] = htmlentities($row -> nama_so);
            $target_mtd[] = htmlentities($row -> target);
            $pencapaian_mtd[] = htmlentities($row -> mtd_pencapaian);
        }
        foreach($performa_last_month as $row) {
            $pencapaian_last_mtd[] = htmlentities($row -> mtd_pencapaian);
        }
        foreach($performa_year as $row) {
            $items_ytd[] = htmlentities($row -> nama_so);
            $target_ytd[] = htmlentities($row -> ytd_target);
            $pencapaian_ytd[] = htmlentities($row -> ytd_pencapaian);
        }
        foreach($performa_last_year as $row) {
            $pencapaian_last_ytd[] = htmlentities($row -> ytd_pencapaian);
            $target_last_ytd[] = htmlentities($row -> ytd_target);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var target_mtd = <?php echo json_encode($target_mtd) ?>;
    var pencapaian_mtd = <?php echo json_encode($pencapaian_mtd) ?>;
    var pencapaian_last_mtd = <?php echo json_encode($pencapaian_last_mtd) ?>;
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var target_ytd = <?php echo json_encode($target_ytd) ?>;
    var target_last_ytd = <?php echo json_encode($target_last_ytd) ?>;
    var pencapaian_ytd = <?php echo json_encode($pencapaian_ytd) ?>;
    var pencapaian_last_ytd = <?php echo json_encode($pencapaian_last_ytd) ?>;
    // chart performa_so mtd
    var options_performa_so_mtd = {
        series: [{
            name: 'Akumulasi Aktual (' + month_name((new Date().getMonth())) + ')',
            type: 'column',
            data: pencapaian_last_mtd
        },{
            name: 'Akumulasi Aktual (' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: pencapaian_mtd
        },  {
            name: 'Target (' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'line',
            data: target_mtd
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
            width: [1, 1,4]
        },
        xaxis: {
            categories: fields_mtd,
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
    var chart_performa_so_mtd = new ApexCharts(document.querySelector("#performa_so_mtd_chart"),
        options_performa_so_mtd);
    chart_performa_so_mtd.render();

    // chart performa_so ytd
    var options_performa_so_ytd = {
        series: [{
            name: 'Pencapaian ' + (new Date().getFullYear() - 1),
            type: 'column',
            data: pencapaian_last_ytd
        },
        {
            name: 'Target ' + (new Date().getFullYear() - 1),
            type: 'line',
            data: target_last_ytd
        },
        {
            name: 'Pencapaian ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: pencapaian_ytd
        }, {
            name: 'Target ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'line',
            data: target_ytd
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
    var chart_performa_so_ytd = new ApexCharts(document.querySelector("#performa_so_ytd_chart"),
        options_performa_so_ytd);
    chart_performa_so_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_so_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#performa_so_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->