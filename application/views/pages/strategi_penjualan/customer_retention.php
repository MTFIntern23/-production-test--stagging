<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_aov',true);
    sessionStorage.setItem('is_jbrand', false);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Customer Retention</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Customer Retention<b>
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
                                        <option value="jenis_asset">Jenis Assets</option>
                                        <option value="so">SO</option>
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
                                        <option value="dealer">Dealer</option>
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
                <div id="chart_mtd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="customer_retention_mtd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="customer_retention_mtd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="customer_retention_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Status</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount (M)</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>
                <div id="chart_ytd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="customer_retention_ytd_chart"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="customer_retention_ytd_chart_2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="customer_retention_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No YTD</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Status</th>
                                    <th>Total RO</th>
                                    <th>Total Lending Amount (M)</th>
                                    <th>Total Jumlah Unit</th>
                                    <th>Tanggal Aplikasi Masuk Terakhir</th>
                                    <th>Tanggal Golive Terakhir</th>
                                    <th>Sumber Dealer</th>
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
    <?php
        $ids_gp = array();
        $items_gp = array();
        $ids_asset = array();
        $items_so = array();
        $ids_so = array();
        $ids_profesi = array();
        $items_profesi = array();
        $items_dealer = array();
        $ids_dealer = array();
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
        foreach($subfilter_profesi as $row) {
            $items_profesi[]=htmlentities($row -> profesi_cust);
            $ids_profesi[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_customer));
        }
        foreach($subfilter_dealer as $row) {
            $items_dealer[]=htmlentities($row -> nama_dealer);
            $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
        }
    ?>
    function name_status(val){
        val=='1'?val = "RO":val = "NON"
        return val
    }
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?>,
            'sub2': ["Second","New"],
            'sub3': <?php echo json_encode($items_so) ?>,
            'sub4': <?php echo json_encode($items_profesi) ?>,
            'sub5': <?php echo json_encode($items_dealer) ?>,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?>,
            'sub2': <?php echo json_encode($ids_asset) ?>,
            'sub3': <?php echo json_encode($ids_so) ?>,
            'sub4': <?php echo json_encode($ids_profesi) ?>,
            'sub5': <?php echo json_encode($ids_dealer) ?>,
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
    // chart customer_retention mtd
    var options_customer_retention_mtd = {
        title: {
            text: 'Status <?php echo Date("F Y");?>',
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
        noData: {
            text: 'API Loading...'
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Total RO', 'Total non-RO'],
    };
    var chart_customer_retention_mtd = new ApexCharts(document.querySelector("#customer_retention_mtd_chart"),
        options_customer_retention_mtd);
    chart_customer_retention_mtd.render();

    // chart customer_retention mtd
    var options_customer_retention_mtd_2 = {
        series: [],
        chart: {
            type: 'line',
            height: 350,

        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_customer_retention_mtd_2 = new ApexCharts(document.querySelector("#customer_retention_mtd_chart_2"),
        options_customer_retention_mtd_2);
    chart_customer_retention_mtd_2.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd = {
        title: {
            text: 'Status <?php echo Date("Y");?>',
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
        noData: {
            text: 'API Loading...'
        },
        legend:
        {
            position: 'bottom'
        },
        labels: ['Total RO', 'Total non-RO'],
    };
    var chart_customer_retention_ytd = new ApexCharts(document.querySelector("#customer_retention_ytd_chart"),
        options_customer_retention_ytd);
    chart_customer_retention_ytd.render();

    // chart customer_retention ytd
    var options_customer_retention_ytd_2 = {
        series: [],
        chart: {
            type: 'line',
            height: 350,
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: 'API Loading...'
        },
    };
    var chart_customer_retention_ytd_2 = new ApexCharts(document.querySelector("#customer_retention_ytd_chart_2"),
        options_customer_retention_ytd_2);
    chart_customer_retention_ytd_2.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var cust_retention_mtd,cust_retention_ytd
    var mtd_ro = [0,0]
    var ytd_ro = [0,0]
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/customer_retention/pie_chartdata',
            data:{'params':'curr_month','params2':'curr_year'},
            dataType: "json",
            success: function(res){
                Object.values((res.data_fields)).forEach(val => {
                    val=='1'?mtd_ro[0]++:mtd_ro[1]++
                });
                Object.values((res.data_fields2)).forEach(val => {
                    val=='1'?ytd_ro[0]++:ytd_ro[1]++
                });
                chart_customer_retention_mtd.updateSeries(mtd_ro)
                chart_customer_retention_ytd.updateSeries(ytd_ro)
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/customer_retention/chartdata',
            data:{'params':'curr_month','is_ro':'1','is_ro_2':'0'},
            dataType: "json",
            success: function(res){
                chart_customer_retention_mtd_2.updateSeries([{
                    name: 'Total Lending RO',
                    type: 'column',
                    data: (res.data_lending).map(bFormatter)
                }, {
                    name: 'Total Lending non-RO',
                    type: 'column',
                    data: (res.data_lending2).map(bFormatter)
                }])
                chart_customer_retention_mtd_2.updateOptions({
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
                        style: {
                            fontSize: '8px',
                        },
                    },
                    stroke: {
                        width: [1, 1]
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
                    legend: {
                        horizontalAlign: 'center',
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
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/customer_retention/double_chartdata',
            data:{'params':'curr_year','params2':'last_year','is_ro':'1','is_ro_2':'0'},
            dataType: "json",
            success: function(res){
                chart_customer_retention_ytd_2.updateSeries([{
                    name: 'Total Lending RO ' + new Date().getFullYear() + ')',
                    type: 'column',
                    data: (res.data_lending_ro1).map(bFormatter)
                },
                {
                    name: 'Total Lending RO ' + (new Date().getFullYear() - 1),
                    type: 'line',
                    data: (res.data_lending_last_ro1.slice(0, res.data_fields.length)).map(bFormatter)
                },
                {
                    name: 'Total Lending non-RO ' + new Date().getFullYear() + ')',
                    type: 'column',
                    data: (res.data_lending_ro0).map(bFormatter)
                }, {
                    name: 'Total Lending non-RO ' + (new Date().getFullYear() - 1),
                    type: 'line',
                    data: (res.data_lending_last_ro0).map(bFormatter)
                }])
                chart_customer_retention_ytd_2.updateOptions({
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
                    },
                    stroke: {
                        width: [1, 4, 1, 4],
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
                                text: "(Unit)",
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
        cust_retention_mtd=$('#customer_retention_mtd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/customer_retention/listdata',
                type: "POST",
                data:{'params':'curr_month'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) { return name_status(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [7], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [8], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        cust_retention_ytd=$('#customer_retention_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/customer_retention/listdata',
                type: "POST",
                data:{'params':'curr_year'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [3], 
                    render:function ( data, type, row, meta ) { return name_status(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [7], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [8], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->