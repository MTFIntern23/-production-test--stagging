<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Collection /</span>
        EPD Monitoring</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    EPD Monitoring<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
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
                                        <option value="dealer">Dealer</option>
                                        <option value="armo">Armo</option>
                                    </select>
                                </div>
                                <div class="select-sub-filter col-xl-3 col-lg-3 col-md-5 col-sm-12 col-sub-filter"
                                    style="margin-right: -15px;">
                                    <select class="form-select" id="sub-filter" disabled>
                                        <option value="">Pilih Sub-Filter</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button id="filter-btn" class="btn btn-warning btn-search" onclick="" type="button"><i
                                            class='bx bx-search me-1'></i>Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row mb-4">
                        <div
                            class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 pt-4  d-flex justify-content-center mt-3">
                                <div id="epd_monitoring_mtd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div id="epd_monitoring_mtd_chart_2"></div> 
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div id="epd_monitoring_mtd_chart_3"></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="d-flex justify-content-center">
                        <div class="card ms-4 me-4 mb-5  " style="background: #eae9e9;width: 80%;">
                            <div class="card-body">
                                <table id="epd_monitoring_2_mtd_table"
                                    class="table table-striped table-hover display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center"></th>
                                            <th colspan="2" class="text-center">MTD Jan 23</th>
                                            <th colspan="2" class="text-center">MTD Des 22</th>
                                            <th colspan="2" class="text-center">MTD Jan 22</th>
                                        </tr>
                                        <tr>
                                            <th>EPD</th>
                                            <th>Target</th>
                                            <th>Account</th>
                                            <th>%</th>
                                            <th>Account</th>
                                            <th>%</th>
                                            <th>Account</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                foreach ($graph_monitoring_detail_month as $key=>$row) { ?>
                                                    <tr>
                                                        <td class="get_epd_status">
                                                        <?= htmlentities($row->epd);?>
                                                        </td>
                                                        <td>
                                                            <?= htmlentities($row->target);?>
                                                        </td>
                                                        <td>
                                                            <?= htmlentities($row->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($row->persentasi);?>
                                                        </td>
                                                        <!-- prev month -->
                                                        <td>
                                                            <?= htmlentities($graph_monitoring_detail_last_month[$key]->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($graph_monitoring_detail_last_month[$key]->persentasi);?>
                                                        </td>
                                                        <!-- prev year -->
                                                        <td>
                                                            <?= htmlentities($graph_monitoring_detail_last_year[$key]->account);?>
                                                        </td>
                                                        <td class="get_val">
                                                            <?= htmlentities($graph_monitoring_detail_last_year[$key]->persentasi);?>
                                                        </td>
                                                        
                                                    </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ms-4 me-4 mb-4">
                        <table id="epd_monitoring_mtd_table" class="table table-striped table-hover display nowrap"
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
                                    <th>Nama Armo</th>
                                    <th>EPD (%)</th>
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
    <?php
        $ids_gp = array();
        $items_gp = array();
        $ids_asset = array();
        $items_so = array();
        $ids_so = array();
        $ids_ro = array();
        $ids_profesi = array();
        $items_profesi = array();
        $items_dealer = array();
        $ids_dealer = array();
        $items_armo = array();
        $ids_armo = array();
        foreach($subfilter_gp as $row) {
            $items_gp[]=htmlentities($row -> gp);
            $ids_gp[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_gp));
        }
        foreach($subfilter_jenis_assets as $row) {
            $ids_asset[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_aset));
        }
        foreach($subfilter_so as $row) {
            $items_so[]=htmlentities($row -> nama_so);
            $ids_so[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_so));
        }
        foreach($subfilter_jenis_ro as $row) {
            $ids_ro[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_ro));
        }
        foreach($subfilter_profesi as $row) {
            $items_profesi[]=htmlentities($row -> profesi_cust);
            $ids_profesi[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_profesi));
        }
        foreach($subfilter_dealer as $row) {
            $items_dealer[]=htmlentities($row -> nama_dealer);
            $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
        }
        foreach($subfilter_armo as $row) {
            $items_armo[]=htmlentities($row -> nama_armo);
            $ids_armo[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_armo));
        }
    ?>
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    var epd_status = ['8-30','>30']
    var epd_field = document.querySelectorAll('.get_epd_status')
    epd_field.forEach((field,idx)=>{
        field.innerHTML = epd_status[idx]
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "jenis_pekerjaan", "dealer", "armo"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?>,
            'sub2': ["Second","New"],
            'sub3': <?php echo json_encode($items_so) ?>,
            'sub4': ["NONRO", "RO"],
            'sub5': <?php echo json_encode($items_profesi) ?>,
            'sub6': <?php echo json_encode($items_dealer) ?>,
            'sub7': <?php echo json_encode($items_armo) ?>,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?>,
            'sub2': <?php echo json_encode($ids_asset) ?>,
            'sub3': <?php echo json_encode($ids_so) ?>,
            'sub4': <?php echo json_encode($ids_ro) ?>,
            'sub5': <?php echo json_encode($ids_profesi) ?>,
            'sub6': <?php echo json_encode($ids_dealer) ?>,
            'sub7': <?php echo json_encode($ids_armo) ?>,
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0,valuesSubFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)],valuesSubFilters['sub' + (idx + 1)]);
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
    //!!mtd
    // var val_0_last = persentasi_0_last_mtd[persentasi_0_last_mtd.length-1]
    // var val_1_last = persentasi_1_last_mtd[persentasi_1_last_mtd.length-1]
    // chart epd_monitoring mtd
    var options_epd_monitoring_mtd = {
        colors:['#775DD0','#FEB019'],
        title: {
            text: 'EPD <?php echo Date("F Y");?>',
            align: 'center'
        },
        series: [],
        chart:
        {
            height: 350,
            type: 'pie',
        },
        dataLabels: {
            enabled: true
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['EPD 8-30', 'EPD >30'],
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_epd_monitoring_mtd = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart"),
        options_epd_monitoring_mtd);
    chart_epd_monitoring_mtd.render();

    // chart epd_monitoring mtd
    var options_epd_monitoring_mtd_2 = {
        colors:['#26A0FC','#1ADF8D'],
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
    var chart_epd_monitoring_mtd_2 = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart_2"),
        options_epd_monitoring_mtd_2);
    chart_epd_monitoring_mtd_2.render();

    var options_epd_monitoring_mtd_3 = {
        colors:['#775DD0','#FF4862'],
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
    var chart_epd_monitoring_mtd_3 = new ApexCharts(document.querySelector("#epd_monitoring_mtd_chart_3"),
        options_epd_monitoring_mtd_3);
    chart_epd_monitoring_mtd_3.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var epd_table
    $(document).ready(function () {
        mtd_datatable()
        function mtd_datatable(filter='',subFilter=''){
            epd_table=$('#epd_monitoring_mtd_table').DataTable({
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
                    url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/listdata',
                    type: "POST",
                    data:{
                            params:'curr_month',filter:filter, subFilter:subFilter
                        },
                    datatype: "json"
                },
                columnDefs: [
                    { 
                        targets: [ 0 ], 
                        orderable: false, 
                    },{
                        targets: [3], 
                        render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                    },{
                        targets: [4], 
                        render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                    },{
                        targets: [5], 
                        render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                    }
                ],
                scrollX: true,
                lengthMenu: [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
            });
        }
        //chart
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/pie_chartdata',
            dataType: "json",
            success: function(res){
                chart_epd_monitoring_mtd.updateSeries((res.data_total).map(e=>parseInt(e)))
                chart_epd_monitoring_mtd.updateOptions({
                    legend:
                    {
                        position: 'bottom'
                    },
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/double_chartdata',
            data:{'params':'curr_month_0','params2':'last_month_0'},
            dataType: "json",
            success: function(res){
                var val_0_last = (res.data_lending2)[(res.data_lending2).length-1]
                chart_epd_monitoring_mtd_2.updateSeries([{
                    name: 'EPD 8-30 (' + new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
                    type: 'column',
                    data: [(res.data_lending)[(res.data_fields).length-1]]
                },{
                    name: 'EPD 8-30 (Akhir ' + month_name((new Date().getMonth())) +')',
                    type: 'column',
                    data: [(res.data_lending2).map(e=>e=val_0_last).slice(0,(res.data_fields).length)]
                }])
                chart_epd_monitoring_mtd_2.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 2,
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
                        enabledOnSeries: [0,1]
                    },
                    stroke: {
                        width: [1,1]
                    },
                    xaxis: {
                        categories: [(res.data_fields)[(res.data_fields).length-1]].map(dmyFormat),
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
                                text: "EPD (%)",
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
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_collection/epd_monitoring/double_chartdata',
            data:{'params':'curr_month_1','params2':'last_month_1'},
            dataType: "json",
            success: function(res){
                var val_1_last = (res.data_lending2)[(res.data_lending2).length-1]
                chart_epd_monitoring_mtd_3.updateSeries([{
                    name: 'EPD 8-30 (' + new Date().getDate() +' ' + month_name((new Date().getMonth()+1)) +')',
                    type: 'column',
                    data: [(res.data_lending)[(res.data_fields).length-1]]
                },{
                    name: 'EPD 8-30 (Akhir ' + month_name((new Date().getMonth())) +')',
                    type: 'column',
                    data: [(res.data_lending2).map(e=>e=val_1_last).slice(0,(res.data_fields).length)]
                }])
                chart_epd_monitoring_mtd_3.updateOptions({
                    plotOptions: {
                        bar: {
                            borderRadius: 2,
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
                        enabledOnSeries: [0,1]
                    },
                    stroke: {
                        width: [1,1]
                    },
                    xaxis: {
                        categories: [(res.data_fields)[(res.data_fields).length-1]].map(dmyFormat),
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
                                text: "EPD (%)",
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
                })
            }
        });
        //datatable
        $('#epd_monitoring_2_mtd_table').DataTable({
            scrollX: true,
            lengthMenu: [[-1],['All']],
        });
        $('#filter-btn').click(function(){
            var filter_values = $('#filter').val();
            var subFilter_values = $('#sub-filter').val();
            console.log(filter_values)
            if(filter_values != '' && subFilter_values != ''){
                $('#epd_monitoring_mtd_table').DataTable().destroy();
                mtd_datatable(filter_values, subFilter_values);
            }
            else{
                notyf.error('Pastikan isi subfilter !')
                $('#epd_monitoring_mtd_table').DataTable().destroy();
                mtd_datatable();
            }
        });
    });
</script>
<!-- / Content -->