<!-- Content -->
<script>
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light"><span class="bx bx-home-circle"></span> /</span>
    <span class="text-muted fw-light">Profitabilitas Cabang /</span> Komponen Profit Detail</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row pt-3 ms-2 me-2">
                    <div class="col ">
                        <div class="d-md-block">
                            <button class="badge btn btn-warning" type="button" onclick="to_performa_profit()"><i
                                    class='bx bxs-left-arrow-alt me-1'></i>Kembali
                                &nbsp;</button>
                        </div>
                    </div>
                </div>
                <h5 class="card-header text-dark fs-4 text-start">
                    Komponen Profit<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b> <br>
                    <p style="font-size: 38px;margin-top:10px;"><b><?= $current_month_detail_profit[0]->komponen_profit;?></b></p>

                </h5>
                <!-- button -->
                <!-- <div class="row mb-4 ms-2 me-2">
                    <div class="col">
                        <div class="d-grid gap-2 d-md-block">
                            <button id="btn-chart-mtd" class="badge btn bg-chart-active" onclick="show_mtd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending MTD</button>
                            <button id="btn-chart-ytd" class="badge btn btn-secondary" onclick="show_ytd_chart()"
                                type="button"><i class='bx bxs-color me-1'></i>Lending YTD</button>
                        </div>
                    </div>
                </div> -->
                <!-- / button -->
                <!-- chart mtd -->
                <!-- / chart mtd -->
                <!-- chart ytd -->
                <div id="chart_ytd" >
                    <div class="row">
                        <div class="col">
                            <div class="ms-3 me-4 mb-4">
                                <div id="performa_profit_detail_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_profit_detail_ytd_table" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Akumulasi Profit <span class="get_year"></span> (M)</th>
                                    <th>Akumulasi Profit  <span class="get_last_year"></span> (M)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach ($current_year_detail_profit as $key=>$row) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++;?>
                                        </td>
                                        <td class="get_month">
                                            <?= htmlentities($row->month);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($row->profit);?>
                                        </td>
                                        <td class="get_val">
                                            <?= htmlentities($last_year_detail_profit[$key]->profit);?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- / datatables -->
                </div>
                <!-- chart ytd -->
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
    const to_performa_profit = () => {
        window.location.href = "<?= site_url('profit')?>"
    }
    let num_abv = document.querySelectorAll('.get_val');
    let months_val = document.querySelectorAll('.get_month');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    months_val.forEach((month) => {
        let names = month_name(month.innerHTML)
        month.innerHTML = names
    })
    var tag_year = document.querySelector('.get_year')
    var tag_last_year  = document.querySelector('.get_last_year')
    tag_year.innerHTML = new Date().getFullYear()
    tag_last_year.innerHTML = (new Date().getFullYear()-1)
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG CHART JS -->
<!-- ==================== -->
<!-- ==================== -->
<script async>
        <?php
        //ytd init
        $items_ytd = array();
        $profit_ytd = array();
        $profit_last_ytd = array();
        foreach($current_year_detail_profit as $row) {
            $items_ytd[] = htmlentities($row -> month);
            $profit_ytd[] = htmlentities($row -> profit);
        }
        foreach($last_year_detail_profit as $row) {
            $profit_last_ytd[] = htmlentities($row -> profit);
        }
    ?>
    //ytd
    var fields_ytd = <?php echo json_encode($items_ytd) ?>;
    var profit_ytd = <?php echo json_encode($profit_ytd) ?>;
    var profit_last_ytd = <?php echo json_encode($profit_last_ytd) ?>;
    var used_profit_last_ytd = profit_last_ytd.slice(0, fields_ytd.length)
    
    // chart performa_profit_detail ytd
    var options_performa_profit_detail_ytd = {
        series: [{
            name: 'Akumulasi Profit ' + (new Date().getFullYear() - 1),
            type: 'line',
            data: used_profit_last_ytd.map(bFormatter)
        }, {
            name: 'Akumulasi Profit ' + (new Date().getFullYear()),
            type: 'column',
            data: profit_ytd.map(bFormatter)
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
            width: [4, 1]
        },
        xaxis: {
            categories: fields_ytd.map(month_name),
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
                    text: "Akumulasi Profit (M)",
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
    var chart_performa_profit_detail_ytd = new ApexCharts(document.querySelector("#performa_profit_detail_ytd_chart"),
        options_performa_profit_detail_ytd);
    chart_performa_profit_detail_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    $(document).ready(function () {
        $('#performa_profit_detail_mtd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
        $('#performa_profit_detail_ytd_table').DataTable({
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->