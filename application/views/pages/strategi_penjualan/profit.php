<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light"><span class="bx bx-home-circle"></span> /</span>
        Profitabilitas Cabang</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Profit Cabang<b>
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
                            <!-- onclick="show_komponen_chart()" -->
                        </div>
                    </div>
                </div>
                <div id="chart_mtd">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_mtd_chart_nii"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_mtd_chart_feebased"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_mtd_chart_coc"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_mtd_chart_overheadexp"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="profit_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komponen Profit</th>
                                    <th>Profit <span class="show_prev_month"></span> (M)</th>
                                    <th>Profit <span class="show_month"></span> (M)</th>
                                    <th>Action</th>
                                    <!-- <th>Est Profit V2 <span class="show_month"></span> (M)</th>
                                    <th>Simulasi Profit V2 <span class="show_month"></span> (M)</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /datatables -->
                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_ytd_chart_nii"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_ytd_chart_feebased"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_ytd_chart_coc"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ms-2 me-4 mb-4">
                                <div id="profit_ytd_chart_overheadexp"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="profit_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komponen Profit</th>
                                    <th>Profit YTD <span class="show_prev_year"> </span></th>
                                    <th>Profit YTD <span class="show_year"> </span></th>
                                    <th>Action</th>
                                    <!-- <th>Est Profit V2 YTD <span class="show_year"> </span></th>
                                    <th>Simulasi Profit V2 YTD <span class="show_year"> </span></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
    //get date bug
    var now_month = month_name(new Date().getMonth() + 1) + ' ' + (new Date().getFullYear());
    var prev_month;
    var now_year = month_name(new Date().getMonth()+1) + ' ' + (new Date().getFullYear())
    var prev_year = month_name(new Date().getMonth()+1) + ' ' + (new Date().getFullYear()-1)
    if (new Date().getMonth() == 0) {
        prev_month = month_name((12)) + ' ' + (new Date().getFullYear() - 1);
    } else {
        prev_month = month_name(new Date().getMonth()) + ' ' + (new Date().getFullYear());
    }
    //config global
    let num_abv = document.querySelectorAll('.get_val');
    let months_field = document.querySelectorAll('.show_month');
    let months_prev_field = document.querySelector('.show_prev_month');
    let years_field = document.querySelectorAll('.show_year');
    let years_prev_field = document.querySelector('.show_prev_year');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    months_field.forEach((field, idx) => {
        field.innerHTML = now_month
    })
    months_prev_field.innerHTML = prev_month
    years_field.forEach((fieldz, idx) => {
        fieldz.innerHTML = month_name(new Date().getMonth()+1)+' '+(new Date().getFullYear())
    })
    years_prev_field.innerHTML = month_name(new Date().getMonth()+1)+' '+(new Date().getFullYear() - 1)
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
    // chart profit mtd
    var options_profit_mtd_nii = {
        title:{
            text:"NII",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_mtd_nii = new ApexCharts(document.querySelector("#profit_mtd_chart_nii"), options_profit_mtd_nii);
    chart_profit_mtd_nii.render();

    var options_profit_mtd_feebased = {
        title:{
            text:"Feebased",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_mtd_feebased = new ApexCharts(document.querySelector("#profit_mtd_chart_feebased"),
        options_profit_mtd_feebased);
    chart_profit_mtd_feebased.render();

    var options_profit_mtd_coc = {
        title:{
            text:"COC",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_mtd_coc = new ApexCharts(document.querySelector("#profit_mtd_chart_coc"), options_profit_mtd_coc);
    chart_profit_mtd_coc.render();

    var options_profit_mtd_overheadexp = {
        title:{
            text:"EXP",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_mtd_overheadexp = new ApexCharts(document.querySelector("#profit_mtd_chart_overheadexp"),
        options_profit_mtd_overheadexp);
    chart_profit_mtd_overheadexp.render();

    // chart profit ytd
    var options_profit_ytd_nii = {
        title:{
            text:"NII",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_ytd_nii = new ApexCharts(document.querySelector("#profit_ytd_chart_nii"), options_profit_ytd_nii);
    chart_profit_ytd_nii.render();

    var options_profit_ytd_feebased = {
        title:{
            text:"Feebased",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_ytd_feebased = new ApexCharts(document.querySelector("#profit_ytd_chart_feebased"),
        options_profit_ytd_feebased);
    chart_profit_ytd_feebased.render();

    var options_profit_ytd_coc = {
        title:{
            text:"COC",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_ytd_coc = new ApexCharts(document.querySelector("#profit_ytd_chart_coc"), options_profit_ytd_coc);
    chart_profit_ytd_coc.render();

    var options_profit_ytd_overheadexp = {
        title:{
            text:"EXP",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_profit_ytd_overheadexp = new ApexCharts(document.querySelector("#profit_ytd_chart_overheadexp"),
        options_profit_ytd_overheadexp);
    chart_profit_ytd_overheadexp.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var profit_mtd,profit_ytd
    $(document).ready(function () {
        setTimeout(() => {
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'1','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_profit_mtd_nii.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[0],(res.data_profit).map(bFormatter)[0]]
                }])
                chart_profit_mtd_nii.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_month,now_month],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'1','params':'curr_year_val','params2':'last_year_val'},
            dataType: "json",
            success: function(res){
                chart_profit_ytd_nii.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[new Date().getMonth()],(res.data_profit).map(bFormatter)[new Date().getMonth()]]
                }])
                chart_profit_ytd_nii.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_year,now_year],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        
        }, 200);
        setTimeout(() => {
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'2','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_profit_mtd_feebased.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[0],(res.data_profit).map(bFormatter)[0]]
                }])
                chart_profit_mtd_feebased.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_month,now_month],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'2','params':'curr_year_val','params2':'last_year_val'},
            dataType: "json",
            success: function(res){
                chart_profit_ytd_feebased.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[new Date().getMonth()],(res.data_profit).map(bFormatter)[new Date().getMonth()]]
                }])
                chart_profit_ytd_feebased.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_year,now_year],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        }, 600);
        setTimeout(() => {
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'3','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_profit_mtd_coc.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[0],(res.data_profit).map(bFormatter)[0]]
                }])
                chart_profit_mtd_coc.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_month,now_month],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'3','params':'curr_year_val','params2':'last_year_val'},
            dataType: "json",
            success: function(res){
                chart_profit_ytd_coc.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[new Date().getMonth()],(res.data_profit).map(bFormatter)[new Date().getMonth()]]
                }])
                chart_profit_ytd_coc.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_year,now_year],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        }, 1000);
        setTimeout(() => {
            $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'4','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_profit_mtd_overheadexp.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[0],(res.data_profit).map(bFormatter)[0]]
                }])
                chart_profit_mtd_overheadexp.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_month,now_month],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/profit/double_chartdata',
            data:{'id_komponen':'4','params':'curr_year_val','params2':'last_year_val'},
            dataType: "json",
            success: function(res){
                chart_profit_ytd_overheadexp.updateSeries([{
                    name: 'Profit',
                    type: 'column',
                    data: [(res.data_profit2).map(bFormatter)[new Date().getMonth()],(res.data_profit).map(bFormatter)[new Date().getMonth()]]
                }])
                chart_profit_ytd_overheadexp.updateOptions({
                    
                    colors: [function({ value, seriesIndex, w }) {
                        return (value <(res.data_profit2).map(bFormatter)[0])?'#26E7A6':'#26A0FC'
                    }],
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
                        enabledOnsSeries: [1,2]
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [prev_year,now_year],
                    },
                    yaxis: {
                        title: {
                            text: 'M (Milyar)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " M (Milyar)"
                            }
                        }
                    }
                })
            }
        });
        }, 1400);
        profit_mtd=$('#profit_mtd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/profit/listdata',
                type: "POST",
                data:{'params':'curr_month','params2':'last_month'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [2], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ], 
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 'All']]
        });
        profit_ytd=$('#profit_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/profit/listdata',
                type: "POST",
                data:{'params':'curr_year_val_2','params2':'last_year_val_2'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [2], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ], 
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->