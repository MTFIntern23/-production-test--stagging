<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand',false);
    sessionStorage.setItem('is_kecamatan',false);
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
        Performa Dealer</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header text-dark fs-4 text-start">
                    Performa Dealer<b>
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
                                        <option value="jenis_asset">Jenis Asset
                                        </option>
                                        <option value="so">SO</option>
                                        <option value="jenis_customer">Jenis
                                            Customer</option>
                                        <option value="jenis_pekerjaan">Jenis Pekerjaan</option>
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
                                <b>Top 5</b> Dealer Cabang
                                <?= $current_cabang->nama_cabang;?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div id="chart_mtd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_dealer_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_dealer_mtd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dealer</th>
                                    <th>Lending MTD <span class="show_prev_month"></span> (M)</th>
                                    <th>Lending MTD <span class="show_month"></span> (M)</th>
                                    <th>Unit MTD <span class="show_prev_month"></span> (Unit)</th>
                                    <th>Unit MTD <span class="show_month"></span> (Unit)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($current_month_dealer as $key=>$row) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++;?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_dealer);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($last_month_dealer[$key]->mtd_amt);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->mtd_amt);?>
                                        </td>
                                        <td >
                                        <?= htmlentities($last_month_dealer[$key]->mtd_unit);?>
                                        </td>
                                        <td >
                                            <?= htmlentities($row->mtd_unit);?>
                                        </td>
                                        <td><button onclick="window.location.href='<?= site_url('performa_dealer_detail/'.$CI->security_idx->encrypt_url($row->id_dealer))?>';sessionStorage.setItem('is_mtd', true);"
                                                type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>

                <div id="chart_ytd" class="d-none">
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_dealer_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_dealer_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dealer</th>
                                    <th>Lending YTD <span class="show_prev_year"></span> </th>
                                    <th>Lending YTD <span class="show_year"></span> </th>
                                    <th>Unit YTD <span class="show_prev_year"></span> </th>
                                    <th>Unit YTD <span class="show_year"></span> </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($current_year_dealer as $key=>$row) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++;?>
                                        </td>
                                        <td>
                                            <?= htmlentities($row->nama_dealer);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($last_year_dealer[$key]->mtd_amt);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->mtd_amt);?>
                                        </td>
                                        <td >
                                        <?= htmlentities($last_year_dealer[$key]->mtd_unit);?>
                                        </td>
                                        <td >
                                            <?= htmlentities($row->mtd_unit);?>
                                        </td>
                                                <td><button onclick="window.location.href='<?= site_url('performa_dealer_detail/'.$CI->security_idx->encrypt_url($row->id_dealer))?>';sessionStorage.setItem('is_mtd', false);"
                                                type="button"
                                                class="btn_session badge btn btn-primary me-2"><i
                                                    class='bx bx-detail me-1'></i>
                                                Detail</button></td>
                                    </tr>
                                <?php } ?>
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
    let setSubFilter = function(dataFilter) {
        let filters = ["group_product", "jenis_asset", "so", "jenis_customer", "jenis_pekerjaan"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Captive Fleet", "Captive KKB", "Captive Multiguna", "Reguler Retail", "Reguler Multiguna",
                "Reguler Fleet"
            ],
            'sub2': ["New", "Second"],
            'sub3': ["Aji Andika", "Abyan Estu", "Ana Lestari", "Budi Yoga", "Yupi Wardana", "Oti Satria",
                "Haydar Ekawira", "Hamid Irawan", "Rania Parama"
            ],
            'sub4': ["NONRO", "RO"],
            'sub5': ["Buruh", "Guru", "Dosen", "Manager", "Teller", "Wiraswasta"]
        }
        if (dataFilter == "all") {
            areaSubFilter.forEach((subs) => {
                subs.innerHTML = callSubFilter(subFilters.sub0);
                subs.setAttribute("disabled", 'true');
            })
        }
        filters.forEach((filter, idx) => {
            if (dataFilter == filter) {
                areaSubFilter.forEach((subs) => {
                    subs.innerHTML = callSubFilter(subFilters['sub' + (idx + 1)]);
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
    <?php
        //mtd init
        $items_mtd = array();
        $lending_mtd = array();
        $lending_prev_mtd = array();
        //ytd init
        $items_ytd = array();
        $lending_ytd = array();
        $lending_prev_ytd = array();
        foreach($current_month_dealer as $key=>$row) {
            $items_mtd[] = htmlentities($row -> nama_dealer);
            $lending_mtd[] = htmlentities($row -> mtd_amt);
            $lending_prev_mtd[] = htmlentities($last_month_dealer[$key]->mtd_amt);
        }
        foreach($current_year_dealer as $key=>$row) {
            $items_ytd[] = htmlentities($row -> nama_dealer);
            $lending_ytd[] = htmlentities($row -> mtd_amt);
            $lending_prev_ytd[] = htmlentities($last_year_dealer[$key]->mtd_amt);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var lending_mtd = <?php echo json_encode($lending_mtd) ?>;
    var lending_prev_mtd = <?php echo json_encode($lending_prev_mtd) ?>;
    var keys_mtd = Array.from(lending_mtd.keys()).sort((a, b) => lending_mtd[b] - lending_mtd[a])
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var lending_ytd = <?php echo json_encode($lending_ytd) ?>;
    var lending_prev_ytd = <?php echo json_encode($lending_prev_ytd) ?>;
    var keys_ytd = Array.from(lending_ytd.keys()).sort((a, b) => lending_ytd[b] - lending_ytd[a])
    // chart performa_dealer mtd
    var options_performa_dealer_mtd = {
        series: [{
            name: 'Lending ' + months_prev_field[0].innerHTML,
            type: 'column',
            data: keys_mtd.map(i => lending_prev_mtd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + months_field[0].innerHTML,
            type: 'column',
            data: keys_mtd.map(i => lending_mtd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            categories:  keys_mtd.map(i => fields_mtd[i]).slice(0,5),
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
    };

    var chart_performa_dealer_mtd = new ApexCharts(document.querySelector("#performa_dealer_mtd_chart"),
        options_performa_dealer_mtd);
    chart_performa_dealer_mtd.render();

    // chart performa_dealer ytd
    var options_performa_dealer_ytd = {
        series: [{
            name: 'Lending ' + years_prev_field[0].innerHTML,
            type: 'column',
            data: keys_ytd.map(i => lending_prev_ytd.map(bFormatter)[i]).slice(0,5)
        }, {
            name: 'Lending ' + years_field[0].innerHTML + ' (s.d. ' + month_name((new Date().getMonth()) + 1) + ')',
            type: 'column',
            data: keys_ytd.map(i => lending_ytd.map(bFormatter)[i]).slice(0,5)
        }],
        chart: {
            height: 350,
            type: 'line',
        },
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
            categories: keys_ytd.map(i => fields_ytd[i]).slice(0,5),
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
    };
    var chart_performa_dealer_ytd = new ApexCharts(document.querySelector("#performa_dealer_ytd_chart"),
        options_performa_dealer_ytd);
    chart_performa_dealer_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_dealer_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
        $('#performa_dealer_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, 'All']]
        });
    });
</script>
<!-- / Content -->