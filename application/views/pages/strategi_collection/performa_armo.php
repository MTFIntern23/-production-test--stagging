<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
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
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_armo_mtd_chart"></div>
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
                                    <td>
                                        <a href="<?php echo base_url();?>performa_armo_detail/<?php echo $CI->security_idx->encrypt_url($row->id_armo);?>"
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
        foreach($performa_month as $row) {
            $items_mtd[] = htmlentities($row -> nama_armo);
            $target_mtd[] = htmlentities($row -> target);
            $pencapaian_mtd[] = htmlentities($row -> pencapaian);
        }
        foreach($performa_last_month as $row) {
            $pencapaian_last_mtd[] = htmlentities($row -> pencapaian);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var target_mtd = <?php echo json_encode($target_mtd) ?>;
    var pencapaian_mtd = <?php echo json_encode($pencapaian_mtd) ?>;
    var pencapaian_last_mtd = <?php echo json_encode($pencapaian_last_mtd) ?>;
    // chart performa_armo mtd
    var options_performa_armo_mtd = {
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
    var chart_performa_armo_mtd = new ApexCharts(document.querySelector("#performa_armo_mtd_chart"),
        options_performa_armo_mtd);
    chart_performa_armo_mtd.render();
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