<!-- Content -->
<script>
    // (performance.navigation.type == performance.navigation.TYPE_RELOAD)?sessionStorage.setItem("is_mtd", true):sessionStorage.setItem("is_mtd", true);
    sessionStorage.setItem('is_jbrand', false);
    sessionStorage.setItem('is_kecamatan', false);
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
                                <div id="lending_mtd_chart"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ms-2 me-4 mb-4">
                                <p class="text-dark fw-bold ps-4 chart-has-two-title">Pertumbuhan Lending Bulan </p>
                                <div id="lending_mtd_chart_2"></div>
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
                                <?php 
                                $no=1; 
                                foreach ($performa_month as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td>
                                        <?= DateTime::createFromFormat('Y-m-d h:i:s', htmlentities($row->periode))->format('d-M-Y');?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->komitment);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->target);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->aktual);?>
                                    </td>
                                    <td class="get_achv">
                                        <?= htmlentities($row->achv);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->gap);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->app_in);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->approved);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->purchase_order);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->golive);?>
                                    </td>
                                    <td class="get_val">
                                        <?= (float)htmlentities($row->aktual)+(float)htmlentities($row->purchase_order);?>
                                    </td>
                                    <td class="get_val">
                                        <?= (float)htmlentities($row->aktual)+(float)htmlentities($row->purchase_order)+(float)htmlentities($row->approved);?>
                                    </td>
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
                                <?php 
                                    $no=1; 
                                    foreach ($performa_year as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++;?>
                                    </td>
                                    <td class="get_month">
                                        <?= htmlentities($row->month);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_komitment);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_target);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_aktual);?>
                                    </td>
                                    <td class="get_achv">
                                        <?= htmlentities($row->ytd_achv);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_gap);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_appin);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_approved);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_po);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_golive);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_actpo);?>
                                    </td>
                                    <td class="get_val">
                                        <?= htmlentities($row->ytd_actpoapp);?>
                                    </td>
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
    let ach_abv = document.querySelectorAll('.get_achv');
    let months_val = document.querySelectorAll('.get_month');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    ach_abv.forEach((val) => {
        val.innerHTML = parseFloat(val.innerHTML).toFixed(2);
    })
    months_val.forEach((month) => {
        let names = month_name(month.innerHTML)
        month.innerHTML = names
    })
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
        $aktual_mtd = array();
        $target_mtd = array();
        $komitmen_mtd = array();
        //ytd init
        $items_ytd = array();
        $aktual_ytd = array();
        $aktual_last_ytd = array();
        $target_ytd = array();
        $komitmen_ytd = array();
        foreach($performa_month as $row) {
            $items_mtd[] = DateTime:: createFromFormat('Y-m-d h:i:s', htmlentities($row -> periode)) -> format('d M');
            $aktual_mtd[] = htmlentities($row -> aktual);
            $target_mtd[] = htmlentities($row -> target);
            $komitmen_mtd[] = htmlentities($row -> komitment);
        }
        foreach($performa_year as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $aktual_ytd[] = htmlentities($row -> ytd_aktual);
            $target_ytd[] = htmlentities($row -> ytd_target);
            $komitmen_ytd[] = htmlentities($row -> ytd_komitment);
        }
        foreach($performa_last_year as $row) {
            $aktual_last_ytd[] = htmlentities($row -> ytd_aktual);
        }
    ?>
    //mtd
    var fields_mtd = <?php echo json_encode($items_mtd) ?>;
    var aktual_mtd = <?php echo json_encode($aktual_mtd) ?>;
    var komitmen_mtd = <?php echo json_encode($komitmen_mtd) ?>;
    var target_mtd = <?php echo json_encode($target_mtd) ?>;
    var titles_fields = document.querySelectorAll('.chart-has-two-title');
    var titles = [`Monitoring Lending Bulan ${month_name((new Date().getMonth())+1)} ${new Date().getFullYear()}`,`Pertumbuhan Lending Bulan ${month_name((new Date().getMonth())+1)} ${new Date().getFullYear()}`];
    titles_fields.forEach((field,idx)=>{
        field.innerHTML = titles[idx];
    })
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var aktual_ytd = <?php echo json_encode($aktual_ytd) ?>;
    var aktual_last_ytd = <?php echo json_encode($aktual_last_ytd) ?>;
    var used_aktual_last_ytd = aktual_last_ytd.slice(0, fields_ytd.length)
    var target_ytd = <?php echo json_encode($target_ytd) ?>;
    var komitmen_ytd = <?php echo json_encode($komitmen_ytd) ?>;
    // chart lending mtd
    var options_lending_mtd = {
        series: [{
            name: 'Aktual',
            data: aktual_mtd.map(bFormatter)
        }],
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
        // forceNiceScale: true,
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
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: fields_mtd,
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
                max: bFormatter(get_max_interval(aktual_mtd)),
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
    };
    var chart_lending_mtd = new ApexCharts(document.querySelector("#lending_mtd_chart"), options_lending_mtd);
    chart_lending_mtd.render();
    
    initialize_=0;
    var options_lending_mtd1 = {
        series: [{
            name: 'Akumulasi Aktual',
            type: 'column',
            data: (aktual_mtd.map(sum_to_prev)).map(bFormatter)
        }, {
            name: 'Target',
            type: 'line',
            data: target_mtd.map(bFormatter)
        }, {
            name: 'Komitmen',
            type: 'line',
            data: komitmen_mtd.map(bFormatter)
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
            width: [1, 4, 4]
        },
        xaxis: {
            categories: fields_mtd,
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
    }
    var chart_lending_mtd_2 = new ApexCharts(document.querySelector("#lending_mtd_chart_2"), options_lending_mtd1);
    chart_lending_mtd_2.render();

    // chart lending ytd
    var options_lending_ytd = {
        series: [{
            name: 'Aktual ' + (new Date().getFullYear() - 1),
            type: 'column',
            data: used_aktual_last_ytd.map(bFormatter)
        }, {
            name: 'Aktual ' + new Date().getFullYear(),
            type: 'column',
            data: aktual_ytd.map(bFormatter)
        }, {
            name: 'Target ' + new Date().getFullYear(),
            type: 'line',
            data: target_ytd.map(bFormatter)
        },{
            name: 'Komitmen ' + new Date().getFullYear(),
            type: 'line',
            data: komitmen_ytd.map(bFormatter)
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
        },
        stroke: {
            width: [1,1,4,4],
        },
        xaxis: {
            categories: fields_ytd.map(month_name),
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
        $('#lending_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 15, 31], [10, 15, 'All']],
        });
        $('#lending_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [
                [10, 31, 61, 92, 122, 153, 183, 214, 244, 275, 305, 336, 366],
                [10, 31, 61, 92, 122, 153, 183, 214, 244, 275, 305, 336, 'All'],
            ],

        });
    });
</script>
<!-- / Content -->