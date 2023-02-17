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
                                <?php 
                                    $no=1; 
                                    foreach ($current_month_profit as $key=>$row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->komponen_profit);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($last_month_profit[$key]->profit);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->profit);?>
                                    </td>
                                    <td><button onclick="window.location.href='<?= site_url('performa_profit_detail/'.$CI->security_idx->encrypt_url($row->id_komponen))?>';sessionStorage.setItem('is_mtd', true);"
                                                type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    <!-- <td class="get_val">
                                            <?= htmlentities($row->profit_v2);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->sim_profit);?>
                                        </td> -->
                                </tr>
                                <?php } ?>
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
                                <?php 
                                    $no=1; 
                                    foreach ($current_year_profit as $key=>$row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td>
                                        <?= htmlentities($row->komponen_profit);?>
                                    </td>
                                    <td class="get_val">
                                        <?php 
                                        echo htmlentities($last_year_profit[$key]->profit);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->profit);?>
                                    </td>
                                    <td><button onclick="window.location.href='<?= site_url('performa_profit_detail/'.$CI->security_idx->encrypt_url($row->id_komponen))?>';sessionStorage.setItem('is_mtd', true);"
                                                type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    <!-- <td class="get_val">
                                            <?= htmlentities($row->profit_v2);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->sim_profit);?>
                                        </td> -->
                                </tr>
                                <?php } ?>
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
    <?php
    //mtd init
    $nii_profit_mtd = array();
    $feebased_profit_mtd = array();
    $coc_profit_mtd = array();
    $exp_profit_mtd = array();
    $nii_profit_prev_mtd = array();
    $feebased_profit_prev_mtd = array();
    $coc_profit_prev_mtd = array();
    $exp_profit_prev_mtd = array();
    //ytd init
    $nii_profit_ytd = array();
    $feebased_profit_ytd = array();
    $coc_profit_ytd = array();
    $exp_profit_ytd = array();
    $nii_profit_prev_ytd = array();
    $feebased_profit_prev_ytd = array();
    $coc_profit_prev_ytd = array();
    $exp_profit_prev_ytd = array();
    foreach($nii_current_month_profit as $key=> $row) {
        $nii_profit_mtd[] = htmlentities($row -> profit);
        $nii_profit_prev_mtd[] = htmlentities($nii_last_month_profit[$key] -> profit);
    }
    foreach($feebased_current_month_profit as $key=> $row) {
        $feebased_profit_mtd[] = htmlentities($row -> profit);
        $feebased_profit_prev_mtd[] = htmlentities($feebased_last_month_profit[$key] -> profit);
    }
    foreach($coc_current_month_profit as $key=> $row) {
        $coc_profit_mtd[] = htmlentities($row -> profit);
        $coc_profit_prev_mtd[] = htmlentities($coc_last_month_profit[$key] -> profit);
    }
    foreach($exp_current_month_profit as $key=> $row) {
        $exp_profit_mtd[] = htmlentities($row -> profit);
        $exp_profit_prev_mtd[] = htmlentities($exp_last_month_profit[$key] -> profit);
    }
    foreach($nii_current_year_profit as $key=> $row) {
        $nii_profit_ytd[] = htmlentities($row -> profit);
    }
    foreach($nii_last_year_profit as $key=> $row) {
        $nii_profit_prev_ytd[] = htmlentities($row -> profit);
    }
    foreach($feebased_current_year_profit as $key=> $row) {
        $feebased_profit_ytd[] = htmlentities($row -> profit);
    }
    foreach($feebased_last_year_profit as $key=> $row) {
        $feebased_profit_prev_ytd[] = htmlentities($row -> profit);
    }
    foreach($coc_current_year_profit as $key=> $row) {
        $coc_profit_ytd[] = htmlentities($row -> profit);
    }
    foreach($coc_last_year_profit as $key=> $row) {
        $coc_profit_prev_ytd[] = htmlentities($row -> profit);
    }
    foreach($exp_current_year_profit as $key=> $row) {
        $exp_profit_ytd[] = htmlentities($row -> profit);
    }
    foreach($exp_last_year_profit as $key=> $row) {
        $exp_profit_prev_ytd[] = htmlentities($row -> profit);
    }
    ?>
    //mtd
    var nii_profit_mtd = <?php echo json_encode($nii_profit_mtd) ?>;
    var feebased_profit_mtd = <?php echo json_encode($feebased_profit_mtd) ?>;
    var coc_profit_mtd = <?php echo json_encode($coc_profit_mtd) ?>;
    var exp_profit_mtd = <?php echo json_encode($exp_profit_mtd) ?>;
    var nii_profit_prev_mtd = <?php echo json_encode($nii_profit_prev_mtd) ?>;
    var feebased_profit_prev_mtd = <?php echo json_encode($feebased_profit_prev_mtd) ?>;
    var coc_profit_prev_mtd = <?php echo json_encode($coc_profit_prev_mtd) ?>;
    var exp_profit_prev_mtd = <?php echo json_encode($exp_profit_prev_mtd) ?>;
    //ytd
    var nii_profit_ytd = <?php echo json_encode($nii_profit_ytd) ?>;
    var feebased_profit_ytd = <?php echo json_encode($feebased_profit_ytd) ?>;
    var coc_profit_ytd = <?php echo json_encode($coc_profit_ytd) ?>;
    var exp_profit_ytd = <?php echo json_encode($exp_profit_ytd) ?>;
    var nii_profit_prev_ytd = <?php echo json_encode($nii_profit_prev_ytd) ?>;
    var feebased_profit_prev_ytd = <?php echo json_encode($feebased_profit_prev_ytd) ?>;
    var coc_profit_prev_ytd = <?php echo json_encode($coc_profit_prev_ytd) ?>;
    var exp_profit_prev_ytd = <?php echo json_encode($exp_profit_prev_ytd) ?>;
    // chart profit mtd
    var options_profit_mtd_nii = {
        colors: [function({ value, seriesIndex, w }) {
            return (value <nii_profit_prev_mtd.map(bFormatter)[0])?'#26E7A6':'#26A0FC'
        }],
        title:{
            text:"NII",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [nii_profit_prev_mtd.map(bFormatter)[0],nii_profit_mtd.map(bFormatter)[0]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_mtd_nii = new ApexCharts(document.querySelector("#profit_mtd_chart_nii"), options_profit_mtd_nii);
    chart_profit_mtd_nii.render();

    var options_profit_mtd_feebased = {
        colors: [function({ value, seriesIndex, w }) {
            return (value <feebased_profit_prev_mtd.map(bFormatter)[0])?'#26E7A6':'#26A0FC'
        }],
        title:{
            text:"Feebased",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [feebased_profit_prev_mtd.map(bFormatter)[0],feebased_profit_mtd.map(bFormatter)[0]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_mtd_feebased = new ApexCharts(document.querySelector("#profit_mtd_chart_feebased"),
        options_profit_mtd_feebased);
    chart_profit_mtd_feebased.render();

    var options_profit_mtd_coc = {
        colors: [function({ value, seriesIndex, w }) {
            return (value <coc_profit_prev_mtd.map(bFormatter)[0])?'#26E7A6':'#26A0FC'
        }],
        title:{
            text:"COC",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [coc_profit_prev_mtd.map(bFormatter)[0],coc_profit_mtd.map(bFormatter)[0]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_mtd_coc = new ApexCharts(document.querySelector("#profit_mtd_chart_coc"), options_profit_mtd_coc);
    chart_profit_mtd_coc.render();

    var options_profit_mtd_overheadexp = {
        colors: [function({ value, seriesIndex, w }) {
            return (value <exp_profit_prev_mtd.map(bFormatter)[0])?'#26E7A6':'#26A0FC'
        }],
        title:{
            text:"EXP",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [exp_profit_prev_mtd.map(bFormatter)[0],exp_profit_mtd.map(bFormatter)[0]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_mtd_overheadexp = new ApexCharts(document.querySelector("#profit_mtd_chart_overheadexp"),
        options_profit_mtd_overheadexp);
    chart_profit_mtd_overheadexp.render();

    // chart profit ytd
    var options_profit_ytd_nii = {
        colors: [function({ value, seriesIndex, w }) {
            return (value == nii_profit_prev_ytd.map(bFormatter)[new Date().getMonth()])?'#26A0FC':'#26E7A6'
        }],
        title:{
            text:"NII",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [nii_profit_prev_ytd.map(bFormatter)[new Date().getMonth()],nii_profit_ytd.map(bFormatter)[new Date().getMonth()]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_ytd_nii = new ApexCharts(document.querySelector("#profit_ytd_chart_nii"), options_profit_ytd_nii);
    chart_profit_ytd_nii.render();

    var options_profit_ytd_feebased = {
        colors: [function({ value, seriesIndex, w }) {
            return (value == feebased_profit_prev_ytd.map(bFormatter)[new Date().getMonth()])?'#26A0FC':'#26E7A6'
        }],
        title:{
            text:"Feebased",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [feebased_profit_prev_ytd.map(bFormatter)[new Date().getMonth()],feebased_profit_ytd.map(bFormatter)[new Date().getMonth()]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_ytd_feebased = new ApexCharts(document.querySelector("#profit_ytd_chart_feebased"),
        options_profit_ytd_feebased);
    chart_profit_ytd_feebased.render();

    var options_profit_ytd_coc = {
        colors: [function({ value, seriesIndex, w }) {
            return (value == coc_profit_prev_ytd.map(bFormatter)[new Date().getMonth()])?'#26A0FC':'#26E7A6'
        }],
        title:{
            text:"coc",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [coc_profit_prev_ytd.map(bFormatter)[new Date().getMonth()],coc_profit_ytd.map(bFormatter)[new Date().getMonth()]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    };
    var chart_profit_ytd_coc = new ApexCharts(document.querySelector("#profit_ytd_chart_coc"), options_profit_ytd_coc);
    chart_profit_ytd_coc.render();

    var options_profit_ytd_overheadexp = {
        colors: [function({ value, seriesIndex, w }) {
            return (value == exp_profit_prev_ytd.map(bFormatter)[new Date().getMonth()])?'#26A0FC':'#26E7A6'
        }],
        title:{
            text:"exp",
            offsetX: 20,
            offsetY: 0,
            style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                },
        },
        series: [{
            name: 'Profit',
            type: 'column',
            data: [exp_profit_prev_ytd.map(bFormatter)[new Date().getMonth()],exp_profit_ytd.map(bFormatter)[new Date().getMonth()]]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
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
    $(document).ready(function () {
        $('#profit_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 'All']]
        });
        $('#profit_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->