<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        Performa ARMO</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa ARMO<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                <div id="chart_mtd" class="d-none">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_armo_mtd_chart"></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_armo_mtd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_armo_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama ARMO</th>
                                    <th>Supervisor</th>
                                    <th>Pencapaian Bulan Ini (Unit)</th>
                                    <th>Target Bulan Ini (Unit)</th>
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
                                        <?= htmlentities($row->nama_armo);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->nama_spv);?>
                                    </td>
                                    <td >
                                        <?= htmlentities($row->pencapaian);?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->target);?>
                                    </td>
                                    <td class="get_achv">
                                        <?= htmlentities($row->persentasi);?>
                                    </td>
                                    <td><button onclick="window.location.href='<?= site_url('performa_armo_detail/'.$CI->security_idx->encrypt_url($row->id_armo))?>';sessionStorage.setItem('is_mtd', true);"
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
</div>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    let ach_abv = document.querySelectorAll('.get_achv');
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
        $target_mtd = array();
        $pencapaian_mtd = array();
        $pencapaian_last_mtd = array();
        $outside_items_mtd = array();
        $outside_target_mtd = array();
        $outside_pencapaian_mtd = array();
        $outside_pencapaian_last_mtd = array();
        foreach($performa_month_inside as $row) {
            $items_mtd[] = htmlentities($row -> nama_armo);
            $target_mtd[] = htmlentities($row -> target);
            $pencapaian_mtd[] = htmlentities($row -> pencapaian);
        }
        foreach($performa_last_month_inside as $row) {
            $pencapaian_last_mtd[] = htmlentities($row -> pencapaian);
        }
        //outside
        foreach($performa_month_outside as $row) {
            $outside_items_mtd[] = htmlentities($row -> nama_armo);
            $outside_target_mtd[] = htmlentities($row -> target);
            $outside_pencapaian_mtd[] = htmlentities($row -> pencapaian);
        }
        foreach($performa_last_month_outside as $row) {
            $outside_pencapaian_last_mtd[] = htmlentities($row -> pencapaian);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var target_mtd = <?php echo json_encode($target_mtd) ?>;
    var pencapaian_mtd = <?php echo json_encode($pencapaian_mtd) ?>;
    var pencapaian_last_mtd = <?php echo json_encode($pencapaian_last_mtd) ?>;
    //outside
    var outside_fields_mtd = <?php echo json_encode($outside_items_mtd) ?>;
    var outside_target_mtd = <?php echo json_encode($outside_target_mtd) ?>;
    var outside_pencapaian_mtd = <?php echo json_encode($outside_pencapaian_mtd) ?>;
    var outside_pencapaian_last_mtd = <?php echo json_encode($outside_pencapaian_last_mtd) ?>;
    // chart performa_armo mtd
    var options_performa_armo_mtd = {
        title: {
            text: 'ARMO Cabang',
            align: 'left',
            offsetX: 0,
            offsetY: 0,
        },
        series: [{
            name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth())) + ')',
            type: 'column',
            data: pencapaian_last_mtd
        },{
            name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth()) + 1) + ')',
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
                return val + " Unit";
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
    var chart_performa_armo_mtd = new ApexCharts(document.querySelector("#performa_armo_mtd_chart"),
        options_performa_armo_mtd);
    chart_performa_armo_mtd.render();
    //outside
    var options_performa_armo_mtd_2 = {
        title: {
            text: 'ARMO Luar Cabang',
            align: 'left',
            offsetX: 0,
            offsetY: 0,
        },
        series: [{
            name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth())) + ')',
            type: 'column',
            data: outside_pencapaian_last_mtd
        },{
            name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: outside_pencapaian_mtd
        },  {
            name: 'Target (' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'line',
            data: outside_target_mtd
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
                return val + " Unit";
            },
            // enabledOnSeries: [1,2]
        },
        stroke: {
            width: [1, 1,4]
        },
        xaxis: {
            categories: outside_fields_mtd,
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
    var chart_performa_armo_mtd_2 = new ApexCharts(document.querySelector("#performa_armo_mtd_chart_2"),
    options_performa_armo_mtd_2);
    chart_performa_armo_mtd_2.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_armo_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->