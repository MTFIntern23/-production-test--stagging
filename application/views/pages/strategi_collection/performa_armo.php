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
<script defer>
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart performa_armo mtd
    var options_performa_armo_mtd = {
        title: {
            text: 'ARMO Cabang',
            align: 'left',
            offsetX: 0,
            offsetY: 0,
        },
        series: [],
        chart: {
            type: 'line',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
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
        series: [],
        chart: {
            type: 'line',
            height: 350,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
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
    var armo_mtd
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/performa_armo/double_chartdata',
            data:{'params':'curr_month_inside','params2':'last_month_inside'},
            dataType: "json",
            success: function(res){
                chart_performa_armo_mtd.updateSeries([{
                    name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth())) + ')',
                    type: 'column',
                    data: res.data_pencapaian2
                },{
                    name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: res.data_pencapaian
                },  {
                    name: 'Target (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'line',
                    data: res.data_target
                }])
                chart_performa_armo_mtd.updateOptions({
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
                        categories: res.data_fields,
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
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/performa_armo/double_chartdata',
            data:{'params':'curr_month_outside','params2':'last_month_outside'},
            dataType: "json",
            success: function(res){
                chart_performa_armo_mtd_2.updateSeries([{
                    name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth())) + ')',
                    type: 'column',
                    data: res.data_pencapaian2
                },{
                    name: 'Akumulasi Pencapaian (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: res.data_pencapaian
                },  {
                    name: 'Target (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'line',
                    data: res.data_target
                }])
                chart_performa_armo_mtd_2.updateOptions({
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
                        categories: res.data_fields,
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
                })
            }
        });
        armo_mtd=$('#performa_armo_mtd_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                info: true,
                paging: true,                   
                lengthChange: true,
                ordering: true,
                language: {
                    "infoFiltered": ""
                },
                ajax: {
                    url: '<?php echo base_url(); ?>/strategi_collection/performa_armo/listdata',
                    type: "POST",
                    data:{
                            filter:'', subFilter:''
                    },
                    datatype: "json"
                },
                columnDefs: [
                    { 
                        targets: [ 0 ], 
                        orderable: false, 
                    },{
                        targets: [5], 
                        render:function ( data, type, row, meta ) {return parseFloat(data).toFixed(2);} 
                    }
                ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->