<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        NPL Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4" style="height: 901px;">
                <h5 class="card-header text-dark fs-4 text-start">
                    NPL Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="npl_monitoring_mtd_chart"></div>
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
    // chart npl_monitoring mtd
    var options_npl_monitoring_mtd = {
        series: [],
        chart: {
            height: 450,
            type: 'bar',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_npl_monitoring_mtd = new ApexCharts(document.querySelector("#npl_monitoring_mtd_chart"),
        options_npl_monitoring_mtd);
    chart_npl_monitoring_mtd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/npl_monitoring/double_chartdata',
            data:{'params':'curr_month','params2':'curr_year','params3':'last_year'},
            dataType: "json",
            success: function(res){
                var fields_tot = (res.data_fields2).concat(res.data_fields);
                var persentasi_year= (res.data_persentasi2).concat(res.data_persentasi);
                var used_persentasi_last_ytd = (res.data_persentasi3).slice(0, fields_tot.length)
                chart_npl_monitoring_mtd.updateOptions({
                    colors: [function({ value, seriesIndex, w }) {
                        if(value < 1){
                            return '#26E7A6'
                        }else if(value == 1){
                            return '#FEB830'
                        }else if(value >1){
                            return '#FF5870'
                        }
                        
                    }],
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
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: fields_tot.map(month_name),
                        tooltip: {
                            enabled: false
                        }
                    },
                    yaxis: [
                        {
                            forceNiceScale: true,
                            min: 0,
                            max: (get_max_interval(persentasi_year)),
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
                })
                chart_npl_monitoring_mtd.updateSeries([{
                    name: 'Persentase ' + (new Date().getFullYear()-1),
                    type: 'column',
                    data: used_persentasi_last_ytd
                },{
                    name: 'Persentase ' + new Date().getFullYear(),
                    type: 'column',
                    data: persentasi_year
                }])
            }
        });
    });
</script>
<!-- / Content -->