<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
        // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_kecamatan',false);
    sessionStorage.setItem('is_aov',true);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        History Assets</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="border-bottom: 3px solid #202657;">
                    <h5 class="card-header text-dark fs-4 text-start">
                        History Assets <b>
                            <?= $current_cabang->nama_cabang;?>
                        </b>
                    </h5>
                    <div class="row ms-2 me-2">
                        <div class="col">
                            <div class="d-md-block">
                                <button id="btn-history" class="badge btn bg-chart-active-2" onclick="show_history()"
                                    type="button"><i class='bx bxs-car me-1'></i>Tipe Kendaraan</button>
                                <button id="btn-history-jbrand" class="badge btn btn-history-null "
                                    onclick="show_jbrand()" type="button"><i class='bx bxs-credit-card me-1'></i>Jenis
                                    Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tipe-kendaraan-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
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
                                            <option value="so">SO</option>
                                            <option value="jenis_customer">Jenis
                                                Customer</option>
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
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Tipe Kendaraan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_mtd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
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
                                    <div id="history_assets_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_ytd_table" class="table table-striped table-hover display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
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
                <div id="jenis-brand-field" class="d-none">
                    <div class="row mt-4 mb-4 ms-2 me-2">
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
                                            </option>
                                            <option value="so">SO</option>
                                            <option value="jenis_customer">Jenis
                                                Customer</option>
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
                    <div class="row  ms-2 me-2 mt-3">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-block">
                                <h5 class="text-dark fs-5 text-start">
                                    <b>Top 5</b> Jenis Brand Kendaraan Cabang
                                    <?= $current_cabang->nama_cabang;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart_mtd">
                        <div class="row">
                            <div class="col">
                                <div class="ms-3 me-4 mb-4">
                                    <div id="history_assets_jbrand_mtd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_mtd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand Kendaraan</th>
                                        <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                        <th>Lending MTD <span class="show_month"></span> (M)</th>
                                        <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                        <th>Unit MTD <span class="show_month"></span> (Unit)</th>
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
                                    <div id="history_assets_jbrand_ytd_chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- datatables -->
                        <div class="ms-4 me-4 mb-4">
                            <table id="history_assets_jbrand_ytd_table"
                                class="table table-striped table-hover display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Brand Kendaraan</th>
                                        <th>Lending YTD <span class="show_prev_year"></span> </th>
                                        <th>Lending YTD <span class="show_year"></span> </th>
                                        <th>Unit YTD <span class="show_prev_year"></span> </th>
                                        <th>Unit YTD <span class="show_year"></span> </th>
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
        $items_so = array();
        $ids_so = array();
        $ids_ro = array();
        $items_profesi = array();
        $ids_profesi = array();
        $items_dealer = array();
        $ids_dealer = array();
        foreach($subfilter_gp as $row) {
            $items_gp[]=htmlentities($row -> gp);
            $ids_gp[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_gp));
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
            $ids_profesi[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_customer));
        }
        foreach($subfilter_dealer as $row) {
            $items_dealer[]=htmlentities($row -> nama_dealer);
            $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
        }
    ?>
    let num_abv = document.querySelectorAll('.get_val');
    let months_field = document.querySelectorAll('.show_month');
    let months_prev_field = document.querySelectorAll('.show_prev_month');
    let years_field = document.querySelectorAll('.show_year');
    let years_prev_field = document.querySelectorAll('.show_prev_year');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    months_field.forEach((field,idx)=>{
        field.innerHTML=month_name(new Date().getMonth()+1) + ' '+ (new Date().getFullYear());
        if(new Date().getMonth()==0){
            months_prev_field[idx].innerHTML=month_name(12) + ' '+ (new Date().getFullYear()-1);
        }else{
            months_prev_field[idx].innerHTML=month_name(new Date().getMonth()) + ' '+ (new Date().getFullYear());
        }
    })
    years_field.forEach((field,idx)=>{
        field.innerHTML=new Date().getFullYear();
        years_prev_field[idx].innerHTML=new Date().getFullYear()-1;
    })
    //config
    const btn_history = document.querySelector('#btn-history')
    const btn_history_jbrand = document.querySelector('#btn-history-jbrand')
    const history_field = document.querySelector('#tipe-kendaraan-field')
    const jbrand_field = document.querySelector('#jenis-brand-field')
    //btn session
    if ((sessionStorage.getItem("is_jbrand") == 'true')) {
            if (btn_history_jbrand.classList.contains('btn-history-null')) {
                btn_history_jbrand.classList.remove('btn-history-null');
            }
            if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
                btn_history_jbrand.classList.add('bg-chart-active-2');
            }
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
    }
    //show btn
    function show_history() {
        sessionStorage.setItem('is_jbrand',false);
        history_field.classList.remove('d-none');
        if (!jbrand_field.classList.contains('d-none')) {
            jbrand_field.classList.add('d-none');
        }
        //btn
        if (btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('bg-chart-active-2');
            btn_history_jbrand.classList.add('btn-history-null');
        }
        if (!btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('btn-history-null');
            btn_history.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
        chart_history_assets_jbrand_mtd.resetSeries()
        chart_history_assets_jbrand_ytd.resetSeries()
        history_jbrand_ytd.destroy()
        history_jbrand_mtd.destroy()
    }
    function show_jbrand() {
        sessionStorage.setItem('is_jbrand',true)
        jbrand_field.classList.remove('d-none');
        if (!history_field.classList.contains('d-none')) {
            history_field.classList.add('d-none');
        }
        //btn
        if (btn_history.classList.contains('bg-chart-active-2')) {
            btn_history.classList.remove('bg-chart-active-2');
            btn_history.classList.add('btn-history-null');
        }
        if (!btn_history_jbrand.classList.contains('bg-chart-active-2')) {
            btn_history_jbrand.classList.remove('btn-history-null');
            btn_history_jbrand.classList.add('bg-chart-active-2');
        }
        show_mtd_chart()
        show_content_brand()
    }
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "so", "jenis_customer", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': <?php echo json_encode($items_gp) ?>,
            'sub2': <?php echo json_encode($items_so) ?>,
            'sub3': ["NONRO", "RO"],
            'sub4': <?php echo json_encode($items_profesi) ?>,
            'sub5': <?php echo json_encode($items_dealer) ?>,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_gp) ?>,
            'sub2': <?php echo json_encode($ids_so) ?>,
            'sub3': <?php echo json_encode($ids_ro) ?>,
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
    // chart history_assets mtd
    var options_history_assets_mtd = {
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

    var chart_history_assets_mtd = new ApexCharts(document.querySelector("#history_assets_mtd_chart"),
        options_history_assets_mtd);
    chart_history_assets_mtd.render();
    // chart history_assets ytd
    var options_history_assets_ytd = {
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
    var chart_history_assets_ytd = new ApexCharts(document.querySelector("#history_assets_ytd_chart"),
        options_history_assets_ytd);
    chart_history_assets_ytd.render();

    // chart history_assets jbrand_ mtd
    var options_history_assets_jbrand_mtd = {
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
    var chart_history_assets_jbrand_mtd = new ApexCharts(document.querySelector("#history_assets_jbrand_mtd_chart"),
        options_history_assets_jbrand_mtd);
    chart_history_assets_jbrand_mtd.render();

    // chart history_assets ytd
    var options_history_assets_jbrand_ytd = {
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
    var chart_history_assets_jbrand_ytd = new ApexCharts(document.querySelector("#history_assets_jbrand_ytd_chart"),
        options_history_assets_jbrand_ytd);
    chart_history_assets_jbrand_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var history_mtd,history_jbrand_mtd,history_ytd,history_jbrand_ytd
    function show_content_brand(){
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/double_chartdata',
            data:{'tipe':'brand','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                var keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[b] - (res.data_lending)[a])
                chart_history_assets_jbrand_mtd.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(0,5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,5)
                }])
                chart_history_assets_jbrand_mtd.updateOptions({
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
                        width: [1, 1]
                    },
                    xaxis: {
                        categories:  keys_mtd.map(i => (res.data_tipe)[i]).slice(0,5),
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
                                text: "Milyar (M)",
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
            url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/double_chartdata',
            data:{'tipe':'brand','params':'curr_year','params2':'last_year'},
            dataType: "json",
            success: function(res){
                var keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[b] - (res.data_lending)[a])
                chart_history_assets_jbrand_ytd.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(0,5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,5)
                }])
                chart_history_assets_jbrand_ytd.updateOptions({
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
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: keys_ytd.map(i => (res.data_tipe)[i]).slice(0,5),
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
                                text: "Milyar (M)",
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
            history_jbrand_ytd=$('#history_assets_jbrand_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/listdata',
                type: "POST",
                data:{'tipe':'brand','params':'curr_year','params2':'last_year'},
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
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        history_jbrand_mtd=$('#history_assets_jbrand_mtd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/listdata',
                type: "POST",
                data:{'tipe':'brand','params':'curr_month','params2':'last_month'},
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
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    }
    //chart field session
    if (sessionStorage.getItem("is_jbrand") == 'true') {
            jbrand_field.classList.remove('d-none');
            if (!history_field.classList.contains('d-none')) {
                history_field.classList.add('d-none');
            }
            show_content_brand()
    } else {
            history_field.classList.remove('d-none');
            if (!jbrand_field.classList.contains('d-none')) {
                jbrand_field.classList.add('d-none');
            }
    }
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/double_chartdata',
            data:{'tipe':'tipe','params':'curr_month','params2':'last_month'},
            dataType: "json",
            success: function(res){
                var keys_mtd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[b] - (res.data_lending)[a])
                chart_history_assets_mtd.updateSeries([{
                    name: 'Lending ' + months_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(0,5)
                }, {
                    name: 'Lending ' + months_field[0].innerHTML,
                    type: 'column',
                    data: keys_mtd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,5)
                }])
                chart_history_assets_mtd.updateOptions({
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
                        width: [1, 1]
                    },
                    xaxis: {
                        categories:  keys_mtd.map(i => (res.data_tipe)[i]).slice(0,5),
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
                                text: "Milyar (M)",
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
            url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/double_chartdata',
            data:{'tipe':'tipe','params':'curr_year','params2':'last_year'},
            dataType: "json",
            success: function(res){
                var keys_ytd = Array.from((res.data_lending).keys()).sort((a, b) => (res.data_lending)[b] - (res.data_lending)[a])
                chart_history_assets_ytd.updateSeries([{
                    name: 'Lending ' + years_prev_field[0].innerHTML,
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending2).map(bFormatter)[i]).slice(0,5)
                }, {
                    name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
                    type: 'column',
                    data: keys_ytd.map(i => (res.data_lending).map(bFormatter)[i]).slice(0,5)
                }])
                chart_history_assets_ytd.updateOptions({
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
                        width: [1, 1]
                    },
                    xaxis: {
                        categories: keys_ytd.map(i => (res.data_tipe)[i]).slice(0,5),
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
                                text: "Milyar (M)",
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
        
        history_ytd=$('#history_assets_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/listdata',
                type: "POST",
                data:{'tipe':'tipe','params':'curr_year','params2':'last_year'},
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
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        history_mtd=$('#history_assets_mtd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/history_assets/listdata',
                type: "POST",
                data:{'tipe':'tipe','params':'curr_month','params2':'last_month'},
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
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->