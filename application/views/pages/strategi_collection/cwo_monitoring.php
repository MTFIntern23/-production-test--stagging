<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        CWO Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4" style="height: 901px;">
                <h5 class="card-header text-dark fs-4 text-start">
                    CWO Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                <div id="chart_mtd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="cwo_monitoring_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
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
    //here
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
        $persentasi_mtd = array();
        //ytd init
        $items_ytd = array();
        $persentasi_ytd = array();
        $persentasi_last_ytd = array();
        foreach($performa_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $persentasi_mtd[] = htmlentities($row -> persentasi);
        }
        foreach($performa_year as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $persentasi_ytd[] = htmlentities($row -> ytd_persentasi);
        }
        foreach($performa_last_year as $row) {
            $persentasi_last_ytd[] = htmlentities($row -> ytd_persentasi);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var persentasi_mtd = <?php echo json_encode($persentasi_mtd) ?>;
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var persentasi_ytd = <?php echo json_encode($persentasi_ytd) ?>;
    var persentasi_last_ytd = <?php echo json_encode($persentasi_last_ytd) ?>;
    var used_persentasi_last_ytd = persentasi_last_ytd.slice(0, fields_ytd.length)
    // chart cwo_monitoring mtd
    var options_cwo_monitoring_mtd = {
        colors: [function({ value, seriesIndex, w }) {
            if(value < 20){
                return '#26E7A6'
            }else if(value == 20){
                return '#FEB830'
            }else if(value >20){
                return '#FF5870'
            }
            
        }],
        series: [{
            name: 'Persentase',
            type: 'column',
            data: persentasi_mtd
        }],
        chart: {
            type: 'bar',
            height: 450,
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
                return val + " %";
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
                    text: "% (Persen)",
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
            y: {
                formatter: function (val) {
                    return val + " % (Persen)"
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
    var chart_cwo_monitoring_mtd = new ApexCharts(document.querySelector("#cwo_monitoring_mtd_chart"),
        options_cwo_monitoring_mtd);
    chart_cwo_monitoring_mtd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>

</script>
<!-- / Content -->