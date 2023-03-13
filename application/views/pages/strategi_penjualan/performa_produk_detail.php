<!-- Content -->
<?php $CI =& get_instance(); ?>
<script>
    sessionStorage.setItem('is_aov',true);
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold text-warning py-3 mb-4"><span class="text-muted fw-light">Strategi Penjualan /</span>
    <span class="text-muted fw-light">Performa Product /</span> Performa Product Detail</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="row pt-3 ms-2 me-2">
                    <div class="col ">
                        <div class="d-md-block">
                            <button class="badge btn btn-warning" type="button" onclick="to_performa_produk()"><i
                                    class='bx bxs-left-arrow-alt me-1'></i>Kembali
                                &nbsp;</button>
                        </div>
                    </div>
                </div>
                <h5 class="card-header text-dark fs-4 text-start" style="margin-bottom: -30px;">
                    Performa Group Product<b>
                        <?= $current_cabang->nama_cabang;?>
                    </b><br>
                    <p style="font-size: 38px;margin-top:10px;"><b><?= $performa_product_month[0]->gp;?></b></p>
                </h5>
                <!-- button -->
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
                <!-- / button -->
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
                                        <option value="jenis_asset">Jenis Asset
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
                <!-- chart mtd -->
                <div id="chart_mtd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="performa_produk_detail_mtd_chart_2"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="performa_produk_detail_mtd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_produk_detail_mtd" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Nama Produk</th>
                                    <th>Lending Amount (M)</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /datatables -->
                </div>
                <!-- / chart mtd -->
                <!-- chart ytd -->
                <div id="chart_ytd" class="d-none">
                    <div class="row mb-4">
                        <div
                            class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 order-xl-0 order-lg-0 order-md-0 order-1 ">
                            <div class="ms-3 me-4 d-flex justify-content-center mt-3">
                                <div id="performa_produk_detail_ytd_chart_2"></div>
                            </div>
                        </div>
                        <div
                            class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-0">
                            <div class="ms-3 me-4">
                                <div id="performa_produk_detail_ytd_chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- datatables -->
                    <div class="ms-4 me-4 mb-4">
                        <table id="performa_produk_detail_ytd" class="table table-striped table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Aplikasi</th>
                                    <th>Nama Debitur</th>
                                    <th>Nama Produk</th>
                                    <th>Lending Amount (M)</th>
                                    <th>Tanggal Aplikasi Masuk</th>
                                    <th>Tanggal Golive</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama SO</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/dataTables.buttons.min.js" integrity="sha512-ByVolLA8VqrHkWVq/IG5unPl1eHV0DEkdvUBdTTxTNPXV7xYrqqR+EhRlf9R3qWEHiUVaqCXwcZfrlTpZKVjdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js" integrity="sha512-P0bOMePRS378NwmPDVPU455C/TuxDS+8QwJozdc7PGgN8kLqR4ems0U/3DeJkmiE31749vYWHvBOtR+37qDCZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/buttons.html5.min.js" integrity="sha512-cBlHTLVISzl4A2An/1uQCqUq7MPJlCTqk/Uvwf1OU8lAB87V72oPdllhBD7hYpSDhmcOqY/PIeJ5bUN/EHcgpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.5/js/buttons.print.min.js" integrity="sha512-b956UIE6Nx8REYgGGJEyAlCUPgei+JdTU41lrOIvH8LrH+REzjjQOeNhOatI2wOr1eC6+v1rhv5UqJ0GF6LMQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
    <?php
        $items_dealer = array();
        $ids_dealer = array();
        $ids_asset = array();
        $ids_ro = array();
        $items_profesi = array();
        $ids_profesi = array();
        $items_so = array();
        $ids_so = array();
        foreach($subfilter_dealer as $row) {
            $items_dealer[]=htmlentities($row -> nama_dealer);
            $ids_dealer[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_dealer));
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
        foreach($subfilter_so as $row) {
            $items_so[]=htmlentities($row -> nama_so);
            $ids_so[]=$CI->security_idx->sodiumEncrypt(htmlentities($row -> id_so));
        }
    ?>
    const to_performa_produk = () => {
        window.location.href = "<?= site_url('performa_produk')?>"
    }
    let num_abv = document.querySelectorAll('.get_val');
    num_abv.forEach((val) => {
        val.innerHTML = bFormatter(parseFloat(val.innerHTML));
    })
    let setSubFilter = function(dataFilter) {
        let filters = ["jenis_asset", "so", "jenis_customer", "jenis_pekerjaan", "dealer"]
        let subFilters = {
            'sub0': ["Pilih Sub-Filter"],
            'sub1': ["Second","New"],
            'sub2': <?php echo json_encode($items_so) ?>,
            'sub3': ["NONRO", "RO"],
            'sub4': <?php echo json_encode($items_profesi) ?>,
            'sub5': <?php echo json_encode($items_dealer) ?>,
        }
        let valuesSubFilters = {
            'sub0': ["null"],
            'sub1': <?php echo json_encode($ids_asset) ?>,
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
    // chart produk_detail mtd
    var options_performa_produk_detail_mtd_2 = {
        title: {
            text: 'Produk Terlaku <?php echo Date("F Y");?>',
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
    };
    var chart_performa_produk_detail_mtd_2 = new ApexCharts(document.querySelector("#performa_produk_detail_mtd_chart_2"),
        options_performa_produk_detail_mtd_2);
    chart_performa_produk_detail_mtd_2.render();
    // performa produk detail mtd
    var options_performa_produk_detail_mtd = {
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
    var chart_performa_produk_detail_mtd = new ApexCharts(document.querySelector("#performa_produk_detail_mtd_chart"),
        options_performa_produk_detail_mtd);
    chart_performa_produk_detail_mtd.render();

    // chart produk_detail ytd
    var options_performa_produk_detail_ytd_2 = {
        title: {
            text: 'Produk Terlaku <?php echo Date("F Y");?>',
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
    };
    var chart_performa_produk_detail_ytd_2 = new ApexCharts(document.querySelector("#performa_produk_detail_ytd_chart_2"),
        options_performa_produk_detail_ytd_2);
    chart_performa_produk_detail_ytd_2.render();
    // chart performa_produk_detail ytd
    var options_performa_produk_detail_ytd = {
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
    var chart_performa_produk_detail_ytd = new ApexCharts(document.querySelector("#performa_produk_detail_ytd_chart"),
        options_performa_produk_detail_ytd);
    chart_performa_produk_detail_ytd.render();
</script>
<!-- ==================== -->
<!-- ==================== -->
<!-- CONFIG DATATABLES JS -->
<!-- ==================== -->
<!-- ==================== -->
<script defer>
    var product_detail_mtd, product_detail_ytd
    $(document).ready(function () {
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk_detail/pie_chartdata',
            data:{'id_gp':<?= $performa_product_month[0]->id_gp;?>,'params':'curr_month','params2':'curr_year'},
            dataType: "json",
            success: function(res){
                chart_performa_produk_detail_mtd_2.updateSeries((res.data_total).map(e=>parseInt(e)))
                chart_performa_produk_detail_mtd_2.updateOptions({
                    legend:
                    {
                        position: 'bottom'
                    },
                    labels: res.data_fields,
                })
                chart_performa_produk_detail_ytd_2.updateSeries((res.data_total2).map(e=>parseInt(e)))
                chart_performa_produk_detail_ytd_2.updateOptions({
                    legend:
                    {
                        position: 'bottom'
                    },
                    labels: res.data_fields2,
                })
            }
        });
        $.ajax({
            type:"POST",
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk_detail/chartdata',
            data:{'id_gp':<?= $performa_product_month[0]->id_gp;?>,'params':'curr_month'},
            dataType: "json",
            success: function(res){
                chart_performa_produk_detail_mtd.updateSeries([{
                    name: 'Total Lending',
                    data: res.data_lending.map(bFormatter)
                }])
                chart_performa_produk_detail_mtd.updateOptions({
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
            url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk_detail/double_chartdata',
            data:{'id_gp':<?= $performa_product_month[0]->id_gp;?>,'params':'curr_year','params2':'last_year'},
            dataType: "json",
            success: function(res){
                chart_performa_produk_detail_ytd.updateSeries([{
                    name: 'Total Lending ' + (new Date().getFullYear() - 1),
                    type: 'column',
                    data: (res.data_lending2.slice(0, res.data_fields.length)).map(bFormatter)
                }, {
                    name: 'Total Lending ' + (new Date().getFullYear()),
                    type: 'column',
                    data: res.data_lending.map(bFormatter)
                }])
                chart_performa_produk_detail_ytd.updateOptions({
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
        product_detail_mtd=$('#performa_produk_detail_mtd').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk_detail/listdata',
                type: "POST",
                data:{'id_product':<?= $performa_product_month[0]->id_gp;?>,'params':'curr_month'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [4], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [6], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'copyHtml5',                       
                    text: '<i class="bx bx-copy-alt me-1"></i>Copy',
                    className: 'btn btn-sm btn-warning',                       
                    "action": newexportaction
                },{
                    extend: 'excelHtml5',                       
                    text: '<i class="bx bx-data me-1"></i>Excel',
                    className: 'btn btn-sm btn-warning',                                        
                    "action": newexportaction
                },{
                    extend: 'csvHtml5',                       
                    text: '<i class="bx bx-bar-chart-alt me-1"></i>CSV',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },{
                    extend: 'pdfHtml5',                       
                    titleAttr: '',
                    text: '<i class="bx bxs-file-pdf me-1"></i>PDF',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },{
                    extend: 'print',                       
                    text: '<i class="bx bx-printer me-1"></i>Print',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },                   
            ],
        });
        product_detail_ytd=$('#performa_produk_detail_ytd').DataTable({
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
                url: '<?php echo base_url(); ?>/strategi_penjualan/performa_produk_detail/listdata',
                type: "POST",
                data:{'id_product':<?= $performa_product_month[0]->id_gp;?>,'params':'curr_year'},
                datatype: "json"
            },
            columnDefs: [
                { 
                    targets: [ 0 ], 
                    orderable: false, 
                },{
                    targets: [4], 
                    render:function ( data, type, row, meta ) {return  bFormatter(data);} 
                },{
                    targets: [5], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                },{
                    targets: [6], 
                    render:function ( data, type, row, meta ) {return  dmyFormat(data);} 
                }
            ],
            scrollX: true,
            "lengthMenu": [[10, 25, 50, 75, -1],[10, 25, 50, 75, 'All']],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'copyHtml5',                       
                    text: '<i class="bx bx-copy-alt me-1"></i>Copy',
                    className: 'btn btn-sm btn-warning',                       
                    "action": newexportaction
                },{
                    extend: 'excelHtml5',                       
                    text: '<i class="bx bx-data me-1"></i>Excel',
                    className: 'btn btn-sm btn-warning',                                        
                    "action": newexportaction
                },{
                    extend: 'csvHtml5',                       
                    text: '<i class="bx bx-bar-chart-alt me-1"></i>CSV',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },{
                    extend: 'pdfHtml5',                       
                    titleAttr: '',
                    text: '<i class="bx bxs-file-pdf me-1"></i>PDF',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },{
                    extend: 'print',                       
                    text: '<i class="bx bx-printer me-1"></i>Print',
                    className: 'btn btn-sm btn-warning',                        
                    "action": newexportaction
                },                   
            ],
        });
        var search = document.querySelectorAll('input[type=search]');
        search.forEach((src, idx) => {
            src.classList.add('search-responsive-2');
        })
    });
</script>
<!-- / Content -->