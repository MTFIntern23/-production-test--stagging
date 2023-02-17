<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand',false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        TOD Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    TOD Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                <div class="row mb-4 ms-2 me-2">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-block">
                            <!--  onclick="show_mtd_chart()" -->
                            <!--  onclick="show_ytd_chart()" -->
                            <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>TOD PerBucket</button>
                            <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>TOD Akumulasi</button>
                            <!-- onclick="show_komponen_chart()" -->
                        </div>
                    </div>
                </div>
                
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="tod_monitoring_mtd_chart"></div>
                            </div>
                        </div>
                            <div id="chart_mtd"
                                class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0 d-none">
                                <div class="ms-3 me-4">
                                    <div id="tod_monitoring_mtd_chart_2"></div>
                                </div>
                            </div>
                            <div id="chart_ytd" 
                                class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0 d-none">
                                <div class="ms-3 me-4">
                                    <div id="tod_monitoring_mtd_chart_akumulasi"></div>
                                </div>
                            </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="tod_monitoring_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>BucketOD</th>
                                    <th>OSP All (M)</th>
                                    <th>OSP Restru (M)</th>
                                    <th>OSP Normal (M)</th>
                                    <th>Ratio All</th>
                                    <th>Ratio Restru</th>
                                    <th>Ratio Normal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($current_month_tod as $key=>$row) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++;?>
                                        </td>
                                        <td class="get_od_status">
                                            <?= htmlentities($row->bucket_od);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->osp_all);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->osp_restru);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->osp_normal);?>
                                        </td>
                                        <td class="get_achv">
                                            <?= htmlentities($row->ratio_all);?>
                                        </td>
                                        <td class="get_achv">
                                            <?= htmlentities($row->ratio_restru);?>
                                        </td>
                                        <td class="get_achv">
                                            <?= htmlentities($row->ratio_normal);?>
                                        </td>
                                        <td><button onclick="window.location.href='<?= site_url('tod_monitoring_detail/'.$CI->security_idx->encrypt_url($row->bucket_od))?>';sessionStorage.setItem('is_mtd', true);"
                                                type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></td>
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
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script>
    var status_fields = document.querySelectorAll('.get_od_status');
    var used_status_tod = ['Current','1-30','31-60','61-90','91-120','121-150','151-180']
    status_fields.forEach((field,idx)=>{
        field.innerHTML = used_status_tod[idx];
    })
</script>
<script>
    let num_abv = document.querySelectorAll('.get_val');
    let ach_abv = document.querySelectorAll('.get_achv');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    ach_abv.forEach((val) => {
        val.innerHTML = parseFloat(val.innerHTML).toFixed(2);
    })
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
        $pencapaian_mtd = array();
        $pencapaian_last_mtd = array();
        $count_od = array();
        foreach($current_month_tod as $row) {
            $items_mtd[] = htmlentities($row -> bucket_od);
            $pencapaian_mtd[] = htmlentities($row -> osp_all);
        }
        foreach($last_month_tod as $row) {
            $pencapaian_last_mtd[] = htmlentities($row -> osp_all);
        }
        foreach($count_bucket_od as $row) {
            $count_od[] = htmlentities($row -> jml_bucket);
        }
    ?>
    //mtd
    var count_bucket_od = <?php echo json_encode($count_od) ?>;
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var pencapaian_mtd = <?php echo json_encode($pencapaian_mtd) ?>;
    var pencapaian_last_mtd = <?php echo json_encode($pencapaian_last_mtd) ?>;
    var sum_mtd = (pencapaian_mtd.map(e=>parseInt(e))).reduce((partialSum, a) => partialSum + a, 0);
    var sum_last_mtd = (pencapaian_last_mtd.map(e=>parseInt(e))).reduce((partialSum, a) => partialSum + a, 0);
    // chart tod_monitoring mtd
    var options_tod_monitoring_mtd = {
        title: {
            text: 'MTD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: count_bucket_od.map(e=>parseInt(e)),
        chart: {
            height: 350,
            type: 'pie',
        },
        legend: {
            position: 'bottom'
        },
        labels: used_status_tod,
    };
    var chart_tod_monitoring_mtd = new ApexCharts(document.querySelector("#tod_monitoring_mtd_chart"),
        options_tod_monitoring_mtd);
    chart_tod_monitoring_mtd.render();

    // chart epd_monitoring mtd
    var options_tod_monitoring_mtd_2 = {
        series: [{
            name: 'RATIO All (' + month_name((new Date().getMonth())) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: pencapaian_last_mtd.map(bFormatter)
        },{
            name: 'RATIO All (' + month_name((new Date().getMonth()) + 1) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: pencapaian_mtd.map(bFormatter)
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
                return val + " %";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1,4]
        },
        xaxis: {
            categories: used_status_tod,
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
                    text: "RATIO ALL (%)",
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
    var chart_tod_monitoring_mtd_2 = new ApexCharts(document.querySelector("#tod_monitoring_mtd_chart_2"),
        options_tod_monitoring_mtd_2);
    chart_tod_monitoring_mtd_2.render();

    // chart epd_monitoring mtd akumulasi
    var options_tod_monitoring_mtd_akumulasi = {
        series: [{
            name: 'AKUMULASI RATIO All (' + month_name((new Date().getMonth())) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: [bFormatter(sum_last_mtd)]
        },{
            name: 'AKUMULASI RATIO All (' + month_name((new Date().getMonth()) + 1) +' '+ new Date().getFullYear()+')',
            type: 'column',
            data: [bFormatter(sum_mtd)]
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
                return val + " %";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 4]
        },
        xaxis: {
            categories: ['Akumulasi All Bucket'],
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
                    text: "AKUMULASI RATIO ALL (%)",
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
    var chart_tod_monitoring_mtd_akumulasi = new ApexCharts(document.querySelector("#tod_monitoring_mtd_chart_akumulasi"),
        options_tod_monitoring_mtd_akumulasi);
    chart_tod_monitoring_mtd_akumulasi.render();

</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function() {
        $('#tod_monitoring_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#tod_monitoring_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->