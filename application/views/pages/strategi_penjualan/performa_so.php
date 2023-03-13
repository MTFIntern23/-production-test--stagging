<!-- Content -->
<?php $CI =& get_instance(); ?>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css"
    as="style"
    onload="this.onload=null;this.rel='stylesheet'"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Performa SO</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa SO<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b>
                </h5>
                <div class="row mb-0 ms-2 me-2">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="d-grid gap-2 d-md-block">
                            <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                            <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2 mt-xl-0 mt-lg-0 mt-md-0">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end me-2" >
                            <div class="input-group detopiku mb-3" >
                                <input type="text" class="form-control docs-date" data-toggle="datepicker" name="date" placeholder="Pilih Tanggal" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off >
                                <span class="btn btn-danger" disabled="">
                                    <i class="bx bxs-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
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
                                        <option value="jenis_asset">Jenis Asset
                                        </option>
                                        <option value="jenis_customer">Jenis
                                            Customer</option>
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
                                        <option value="dealer">Dealer</option>
                                        <option value="pareto">Dealer Pareto</option>
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
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SO</th>
                                    <th>Supervisor</th>
                                    <th>Pencapaian Bulan Ini (Unit)</th>
                                    <th>Target Bulan Ini (Unit)</th>
                                    <th>Lending (M)</th>
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
                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_so_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_so_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SO</th>
                                    <th>Supervisor</th>
                                    <th>Pencapaian Tahun Ini (Unit)</th>
                                    <th>Target Tahun Ini (Unit)</th>
                                    <th>Lending (M)</th>
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
</div>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG Dashboard JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $('[data-toggle="datepicker"]').datepicker({
        autoHide:true,
        autoPick:true,
    });
    <?php
        $items_gp = array();
        $ids_gp = array();
        $ids_asset = array();
        $ids_ro = array();
        $items_profesi = array();
        $ids_profesi = array();
        $items_dealer = array();
        $ids_dealer = array();
        $items_pareto = array();
        $ids_pareto = array();
        foreach($subfilter_gp as $row) {
            $items_gp[]=htmlentities($row -> gp);
            $ids_gp[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_gp));
        }
        foreach($subfilter_jenis_assets as $row) {
            $ids_asset[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_aset));
        }
        foreach($subfilter_jenis_ro as $row) {
            $ids_ro[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> status_ro));
        }
        foreach($subfilter_profesi as $row) {
            $items_profesi[]=htmlentities($row -> profesi_cust);
            $ids_profesi[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_customer));
        }
        foreach($subfilter_dealer as $row) {
            $items_dealer[]=htmlentities($row -> nama_dealer);
            $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
        }
        foreach($subfilter_pareto as $row) {
            $items_pareto[]=htmlentities($row -> nama_dealer);
            $ids_pareto[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
        }
    ?>
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "jenis_customer", "jenis_pekerjaan", "dealer","pareto"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?>,
            'sub2': ["Second","New"],
            'sub3': ["NONRO", "RO"],
            'sub4': <?php echo json_encode($items_profesi) ?>,
            'sub5': <?php echo json_encode($items_dealer) ?>,
            'sub6': <?php echo json_encode($items_pareto) ?>
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?>,
            'sub2': <?php echo json_encode($ids_asset) ?>,
            'sub3': <?php echo json_encode($ids_ro) ?>,
            'sub4': <?php echo json_encode($ids_profesi) ?>,
            'sub5': <?php echo json_encode($ids_dealer) ?>,
            'sub6': <?php echo json_encode($ids_pareto) ?>
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
    // chart performa_so mtd
    var options_performa_so_mtd = {
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
    var chart_performa_so_mtd = new ApexCharts(document.querySelector("#performa_so_mtd_chart"),
        options_performa_so_mtd);
    chart_performa_so_mtd.render();

    // chart performa_so ytd
    var options_performa_so_ytd = {
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
    var chart_performa_so_ytd = new ApexCharts(document.querySelector("#performa_so_ytd_chart"),
        options_performa_so_ytd);
    chart_performa_so_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var so_mtd,so_ytd
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_so/double_chartdata',
            data:{'params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                chart_performa_so_mtd.updateSeries([{
                    name: 'Akumulasi Aktual (' + month_name((new Date().getMonth())) + ')',
                    type: 'column',
                    data: res.data_pencapaian2
                },{
                    name: 'Akumulasi Aktual (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: res.data_pencapaian
                },  {
                    name: 'Target (' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'line',
                    data: res.data_target
                }])
                chart_performa_so_mtd.updateOptions({
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
                        categories: res.data_nama_so,
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
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_so/double_chartdata',
            data:{'params':'curr_year','params2':'last_year'},
            dataType: "json",
            success: function(res){
                chart_performa_so_ytd.updateSeries([{
                    name: 'Pencapaian ' + (new Date().getFullYear() - 1),
                    type: 'column',
                    data: res.data_pencapaian2
                },
                {
                    name: 'Target ' + (new Date().getFullYear() - 1),
                    type: 'line',
                    data: res.data_target2
                },
                {
                    name: 'Pencapaian ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: res.data_pencapaian
                }, {
                    name: 'Target ' + new Date().getFullYear() + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'line',
                    data: res.data_target
                }])
                chart_performa_so_ytd.updateOptions({
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
                        // width: [1,1,4],
                    },
                    xaxis: {
                        categories: res.data_nama_so,
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
        so_ytd=$('#performa_so_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_so/listdata',
                type: "POST",
                data:{'params':'curr_year'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        so_mtd=$('#performa_so_mtd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_so/listdata',
                type: "POST",
                data:{'params':'curr_month'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->