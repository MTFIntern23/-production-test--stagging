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
    // chart performa_profit_detail ytd
    var options_performa_profit_detail_ytd = {
        series: [],
        chart: {
            type: 'line',
            height: 350
        },
        dataLabels: {
            enabled: false,
        },
        noData: {
            text: 'API Loading...'
        },
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
    var profit_detail_ytd
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_profit_detail/double_chartdata',
            data:{'id_komponen':<?= $current_month_detail_profit[0]->id_komponen;?>,'params':'curr_year_val','params2':'last_year_val'},
            dataType: "json",
            success: function(res){
                chart_performa_profit_detail_ytd.updateSeries([{
                    name: 'Akumulasi Profit ' + (new Date().getFullYear() - 1),
                    type: 'line',
                    data: ((res.data_profit2).slice(0, (res.data_fields).length)).map(bFormatter) 
                }, {
                    name: 'Akumulasi Profit ' + (new Date().getFullYear()),
                    type: 'column',
                    data: (res.data_profit).map(bFormatter)
                }])
                chart_performa_profit_detail_ytd.updateOptions({
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
                        categories: (res.data_fields).map(month_name),
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
                })
            }
        });
        profit_detail_ytd=$('#performa_profit_detail_ytd_table').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_profit_detail/listdata',
                type: "POST",
                data:{'id_komponen':<?= $current_month_detail_profit[0]->id_komponen;?>,'params':'curr_year_val','params2':'last_year_val'},
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
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
        });
    });
</script>
<!-- / Content -->