<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Lending Cabang</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Lending Cabang<b>
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
                <div id="chart_mtd">
                    <div class="row">
                        <div class="col-12">
                            <div class="ms-2 me-4 mb-4">
                                <p class="text-dark fw-bold ps-4 chart-has-two-title">Monitoring Lending Bulan </p>
                                <div id="lending_mtd_chart_2"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ms-2 me-4 mb-4">
                                <p class="text-dark fw-bold ps-4 chart-has-two-title">Pertumbuhan Lending Bulan </p>
                                <div id="lending_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="lending_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal MTD</th>
                                    <th>Komitment (M)</th>
                                    <th>Target (M)</th>
                                    <th>Aktual (M)</th>
                                    <th>Achv (%)</th>
                                    <th>Gap (M)</th>
                                    <th>App In (M)</th>
                                    <th>Approved (M)</th>
                                    <th>PO (M)</th>
                                    <th>Golive (M)</th>
                                    <th>Actual + PO (M)</th>
                                    <th>Actual + PO + Approved (M)</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>
                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-2 me-4 mb-4">
                                <div id="lending_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="lending_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan YTD</th>
                                    <th>Komitment (M)</th>
                                    <th>Target (M)</th>
                                    <th>Aktual (M)</th>
                                    <th>Achv (%)</th>
                                    <th>Gap (M)</th>
                                    <th>App In (M)</th>
                                    <th>Approved (M)</th>
                                    <th>PO (M)</th>
                                    <th>Golive (M)</th>
                                    <th>Actual + PO (M)</th>
                                    <th>Actual + PO + Approved (M)</th>
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
    //mtd
    var titles_fields = document.querySelectorAll('.chart-has-two-title');
    var titles = [`Monitoring Lending Bulan ${month_name((new Date().getMonth())+1)} ${new Date().getFullYear()}`,`Pertumbuhan Lending Bulan ${month_name((new Date().getMonth())+1)} ${new Date().getFullYear()}`];
    titles_fields.forEach((field,idx)=>{
        field.innerHTML = titles[idx];
    })
    // chart lending mtd
    var options_lending_mtd = {
        series: [],
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
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_lending_mtd = new ApexCharts(document.querySelector("#lending_mtd_chart"), options_lending_mtd);
    chart_lending_mtd.render();
    
    initialize_=0;
    var options_lending_mtd1 = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    }
    var chart_lending_mtd_2 = new ApexCharts(document.querySelector("#lending_mtd_chart_2"), options_lending_mtd1);
    chart_lending_mtd_2.render();

    // chart lending ytd
    var options_lending_ytd = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_lending_ytd = new ApexCharts(document.querySelector("#lending_ytd_chart"), options_lending_ytd);
    chart_lending_ytd.render();
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
            url: '<?php echo base_url(); ?>/strategi_penjualan/lending/chartdata',
            data:{'params':'curr_month'},
            dataType: "json",
            success: function(res){
                chart_lending_mtd.updateOptions({
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " M";
                        },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    xaxis: {
                        categories: res.data_fields.map(dmFormat),
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
                            forceNiceScale: true,
                            min: 0,
                            max: bFormatter(get_max_interval(res.data_aktual)),
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
                })
                chart_lending_mtd.updateSeries([{
                    name: 'Aktual',
                    data: res.data_aktual.map(bFormatter)
                }])
                chart_lending_mtd_2.updateSeries([{
                    name: 'Akumulasi Aktual',
                    type: 'column',
                    data: ((res.data_aktual).map(sum_to_prev)).map(bFormatter)
                }, {
                    name: 'Target',
                    type: 'line',
                    data: (res.data_target).map(bFormatter)
                }, {
                    name: 'Komitmen',
                    type: 'line',
                    data: (res.data_komitment).map(bFormatter)
                }])
                chart_lending_mtd_2.updateOptions({
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " M";
                        },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    stroke: {
                        width: [1, 4, 4]
                    },
                    xaxis: {
                        categories: res.data_fields.map(dmFormat),
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
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/lending/double_chartdata',
            data:{'params':'curr_year','params2':'last_year'},
            dataType: "json",
            success: function(res){
                chart_lending_ytd.updateSeries([{
                    name: 'Aktual ' + (new Date().getFullYear() - 1),
                    type: 'column',
                    data: (res.data_aktual2.slice(0, res.data_fields.length)).map(bFormatter)
                }, {
                    name: 'Aktual ' + new Date().getFullYear(),
                    type: 'column',
                    data: res.data_aktual.map(bFormatter)
                }, {
                    name: 'Target ' + new Date().getFullYear(),
                    type: 'line',
                    data: res.data_target.map(bFormatter)
                },{
                    name: 'Komitmen ' + new Date().getFullYear(),
                    type: 'line',
                    data: res.data_komitment.map(bFormatter)
                }])
                chart_lending_ytd.updateOptions({
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) {
                            return val + " M";
                        },
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            dataLabels: {
                                position: 'bottom',
                            },
                        }
                    },
                    stroke: {
                        width: [1,1,4,4],
                    },
                    xaxis: {
                        categories: (res.data_fields).map(month_name),
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
                })
            }
        });
        var lending_mtd,lending_ytd
        lending_mtd = $('#lending_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/lending/listdata',
                type: "POST",
                data:{'params':'curr_month'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [1], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [2], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [4], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  parseFloat(data).toFixed(2);} 
                },{
                    targets: [6], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [7], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [8], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [9], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [10], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [11], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [12], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 15, 31], [10, 15, 'All']],
        });
        lending_ytd = $('#lending_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/lending/listdata',
                type: "POST",
                data:{'params':'curr_year'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [1], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [2], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [4], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  parseFloat(data).toFixed(2);} 
                },{
                    targets: [6], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [7], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [8], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [9], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [10], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [11], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [12], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [
                [-1],
                ['All'],
            ],

        });
    });
</script>
<!-- / Content -->