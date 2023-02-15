<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
    <span class="text-muted fw-light">Strategi Dealer /</span> Performa Dealer Detail</h5>
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
                    <p style="font-size: 38px;margin-top:10px;"><b><?= $performa_detail_month[0]->nama_dealer;?></b></p>
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
                                                    <h6 class="fs-6 "><?= $performa_detail_month[0]->alamat_dealer;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kota : <?= $performa_detail_month[0]->kota_dealer;?></h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Kecamatan : <?= $performa_detail_month[0]->kecamatan_dealer;?></h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Kelurahan : <?= $performa_detail_month[0]->kelurahan_dealer;?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="d-grid gap-2 d-md-bloc">
                                            <div class="row">
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">Nama PIC : <?= $performa_detail_month[0]->nama_pic;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12" style="margin-bottom: -10px;">
                                                    <h6 class="fs-6 ">No Telepon PIC: <?= $performa_detail_month[0]->no_telp;?>
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fs-6 ">Jabatan PIC: <?= $performa_detail_month[0]->jabatan;?>
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
                                    <button class="btn btn-warning btn-search" onclick="" type="button"><i
                                            class='bx bx-search me-1'></i>Search</button>
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
                            <?php 
                                    $no=1; 
                                    foreach ($performa_detail_month as $row) { ?>
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
                            <?php 
                                    $no=1; 
                                    foreach ($performa_detail_year as $row) { ?>
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
    const to_performa_detail = () => {
        window.location.href = "<?= site_url('performa_dealer')?>"
    }
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "jenis_pekerjaan"]
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
            'sub5': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"]
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
        $brand_mtd = array();
        $count_brand_mtd = array();
        //ytd init
        $items_ytd = array();
        $lending_ytd = array();
        $lending_last_ytd = array();
        $brand_ytd = array();
        $count_brand_ytd = array();
        foreach($graph_performa_detail_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> tgl_golive)) -> format('d M');
            $lending_mtd[] = htmlentities($row -> mtd_lending);
        }
        foreach($graph_performa_detail_year as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $lending_ytd[] = htmlentities($row -> mtd_lending);
        }
        foreach($graph_performa_detail_last_year as $row) {
            $lending_last_ytd[] = htmlentities($row -> mtd_lending);
        }
        foreach($get_brand_mtd as $row) {
            $brand_mtd[] = htmlentities($row -> brand);
            $count_brand_mtd[] = htmlentities($row -> total_jenis);
        }
        foreach($get_brand_ytd as $row) {
            $brand_ytd[] = htmlentities($row -> brand);
            $count_brand_ytd[] = htmlentities($row -> total_jenis);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var lending_mtd = <?php echo json_encode($lending_mtd) ?>;
    var brand_mtd = <?php echo json_encode($brand_mtd) ?>;
    var count_brand_mtd =<?php echo json_encode($count_brand_mtd) ?>;
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var lending_ytd = <?php echo json_encode($lending_ytd) ?>;
    var lending_last_ytd = <?php echo json_encode($lending_last_ytd) ?>;
    var used_lending_last_ytd = lending_last_ytd.slice(0, fields_ytd.length)
    var brand_ytd = <?php echo json_encode($brand_ytd) ?>;
    var count_brand_ytd =<?php echo json_encode($count_brand_ytd) ?>;
    // performa dealer detail mtd
    var options_performa_dealer_detail_mtd = {
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
    var chart_performa_dealer_detail_mtd = new ApexCharts(document.querySelector("#performa_dealer_detail_mtd_chart"),
        options_performa_dealer_detail_mtd);
    chart_performa_dealer_detail_mtd.render();

    var options_performa_dealer_detail_mtd_2 = {
        title: {
            text: 'Brand Dealer <?= $performa_detail_month[0]->nama_dealer;?>',
            align: 'center'
        },
        series: count_brand_mtd.map((e)=>parseInt(e)),
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: brand_mtd,
    };
    var chart_performa_dealer_detail_mtd_2 = new ApexCharts(document.querySelector("#performa_dealer_detail_mtd_chart_2"),
        options_performa_dealer_detail_mtd_2);
    chart_performa_dealer_detail_mtd_2.render();

    // chart performa_dealer_detail ytd
    var options_performa_dealer_detail_ytd = {
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
    var chart_performa_dealer_detail_ytd = new ApexCharts(document.querySelector("#performa_dealer_detail_ytd_chart"),
        options_performa_dealer_detail_ytd);
    chart_performa_dealer_detail_ytd.render();

    var options_performa_dealer_detail_ytd_2 = {
        title: {
            text: 'Brand Dealer <?= $performa_detail_month[0]->nama_dealer;?>',
            align: 'center'
        },
        series: count_brand_ytd.map((e)=>parseInt(e)),
        chart:
        {
            height: 350,
            type: 'pie',
        },
        legend:
        {
            position: 'bottom'
        },
        labels: brand_ytd,
    };
    var chart_performa_dealer_detail_ytd_2 = new ApexCharts(document.querySelector("#performa_dealer_detail_ytd_chart_2"),
        options_performa_dealer_detail_ytd_2);
    chart_performa_dealer_detail_ytd_2.render();
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
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        $('#performa_dealer_detail_ytd').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->